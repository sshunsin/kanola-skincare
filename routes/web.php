<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController, DivisionController, EmployeeController, AttendanceController,
    DashboardController, ProfileController, LeaveRequestController, ProjectStatusController,
    ProjectTimelineController, ProjectProgressController, ProjectEvaluationController,
    ProductCategoryController, DivisionEmployeeCountController, DivisionPerformanceController,
    DivisionTargetController, DivisionEvaluationController, BerandaKanolaSkincareController,
    AuthControllerFrontEnd, CustomerController, SettingsController, OrdersController, StatistikController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__.'/auth.php';

// --- FRONTEND ROUTES (Prefix: /front/v1) ---
Route::prefix('front')->name('frontend.')->group(function () {
    Route::prefix('v1')->name('v1.')->group(function () {
        
        // Akses untuk Guest (Belum Login)
        Route::middleware('guest:customer')->group(function () {
            Route::controller(BerandaKanolaSkincareController::class)->group(function () {
                Route::get('/login', 'showLogin')->name('login');
                Route::get('/signup', 'showSignup')->name('signup');
            });
            Route::controller(AuthControllerFrontEnd::class)->group(function () {
                Route::post('/login', 'login')->name('login.submit');
                Route::post('/signup', 'register')->name('register.submit');
            });
        });

        // Akses untuk Customer (Sudah Login)
        Route::middleware(['auth:customer'])->group(function () {
            Route::controller(BerandaKanolaSkincareController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/about', 'about')->name('about');
                Route::get('/products', 'products')->name('products');
                Route::get('/ingredients', 'ingredients')->name('ingredients');
                Route::get('/results', 'results')->name('results');
                Route::get('/blog', 'blog')->name('blog');
                Route::get('/contact', 'contact')->name('contact');
                Route::get('/search', 'search')->name('search');
                Route::get('/cart', 'cart')->name('cart');
                Route::get('/checkout', fn() => view('frontend.v_checkout.checkout'))->name('checkout');
                Route::post('/checkout/process', [BerandaKanolaSkincareController::class, 'processCheckout'])->name('checkout.process');
                Route::get('/profile', fn() => view('frontend.v_profile.profil'))->name('profile.edit');
                Route::put('/profile/update', [CustomerController::class, 'update'])->name('profile.update');
            });
        });

        Route::prefix('auth')->name('auth.')->controller(AuthControllerFrontEnd::class)->group(function () {
            Route::get('/google', 'redirectToGoogle')->name('google');
            Route::get('/google/callback', 'handleGoogleCallback')->name('google.callback');
            Route::get('/facebook', 'redirectToFacebook')->name('facebook');
            Route::get('/facebook/callback', 'handleFacebookCallback')->name('facebook.callback');
        });
    });
});

// --- BACKEND ROUTES (Prefix: /backend/v1) ---
Route::prefix('backend')->name('backend.')->group(function () {
    
    // Login Backend Khusus (Memisahkan sesi dari Customer)
    Route::middleware('guest')->group(function () {
        Route::get('/v1/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/v1/login', [AuthenticatedSessionController::class, 'store'])->name('login.submit');
    });

    // Dashboard & Modul Backend
    Route::prefix('v1')->name('v1.')->middleware(['auth'])->group(function () {    
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Products
        Route::prefix('products')->name('products.')->middleware('role:admin,manager')
            ->controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/export/pdf', 'exportPdf')->name('export.pdf');
        });

        // Projects Feature Group
        Route::prefix('projects')->name('projects.')->group(function () {
            Route::resources([
                'status'     => ProjectStatusController::class,
                'timeline'   => ProjectTimelineController::class,
                'progress'   => ProjectProgressController::class,
                'evaluation' => ProjectEvaluationController::class,
            ]);
        });

        // Analytics Feature Group
        Route::prefix('analytics')->name('analytics.')->group(function () {
            Route::resources([
                'employee-counts' => DivisionEmployeeCountController::class,
                'performances'    => DivisionPerformanceController::class,
                'targets'         => DivisionTargetController::class,
                'evaluations'     => DivisionEvaluationController::class,
            ]);
        });

        // Orders
        Route::prefix('orders')->name('orders.')->controller(OrdersController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/{id}/accept', 'acceptOrder')->name('accept');
        });
        
        // Manajemen lainnya
        Route::get('/customers', fn() => view('customers.customers'))->name('customers');
        Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('/settings/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.preferences.update');

        // Divisions
        Route::prefix('divisions')->name('divisions.')->middleware('role:admin,manager')
            ->controller(DivisionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{division}', 'edit')->name('edit');
            Route::put('/update/{division}', 'update')->name('update');
            Route::delete('/delete/{division}', 'destroy')->name('destroy');
        });
        
        // Employees
        Route::prefix('employees')->name('employees.')->middleware('role:admin,hrd,manager')
            ->controller(EmployeeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{employee}', 'edit')->name('edit');
            Route::put('/update/{employee}', 'update')->name('update');
            Route::post('/delete/{employee}', 'destroy')->name('destroy');
        });
        
        // Attendances
        Route::prefix('attendances')->name('attendances.')->middleware('role:admin,hrd,manager,staff')
            ->controller(AttendanceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::post('/delete', 'destroy')->name('destroy');
        });

        // Leave Requests
        Route::prefix('leave-requests')->name('leave.')->controller(LeaveRequestController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/approve/{id}', 'approve')->name('approve');
            Route::post('/reject/{id}', 'reject')->name('reject');
        });

        // Resources
        Route::resource('categories', ProductCategoryController::class);
        
        // Profile Backend
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::put('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
            Route::put('/password', 'updatePassword')->name('password.update');
        });
    });
});

// Logout Khusus Customer
Route::post('/logout-customer', [CustomerController::class, 'logout'])->name('logout.customer');