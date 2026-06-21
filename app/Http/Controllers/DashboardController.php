<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Division;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Produk
        $total_products = Product::where('status','active')->count();
        $low_stock = Product::where('stock','<',20)->count();
        $near_expired = Product::where('expired_at','<=',now()->addDays(30))->count();

        // Karyawan
        $total_employees = Employee::count();
        $employees_by_division = Division::withCount('employees')->get();

        // Absensi
        $present_today = Attendance::where('date',$today)->where('status','hadir')->count();
        $izin_today = Attendance::where('date',$today)->where('status','izin')->count();
        $sakit_today = Attendance::where('date',$today)->where('status','sakit')->count();
        $alpha_today = Attendance::where('date',$today)->where('status','alpha')->count();

        return view('dashboard.index', compact(
            'total_products',
            'low_stock',
            'near_expired',
            'total_employees',
            'employees_by_division',
            'present_today',
            'izin_today',
            'sakit_today',
            'alpha_today'
        ));
    }

    public function settings() {
        return view('settings.index');
    }

    public function statistik() {
        return view('statistik.index');
    }
}