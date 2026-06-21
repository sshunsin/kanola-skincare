<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanola Skincare Monitoring</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        .profile-dropdown-menu { display: none; }
        .profile-menu-container:hover .profile-dropdown-menu { display: block; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <nav class="bg-white shadow-sm p-4 flex justify-between items-center px-10 border-b" style="border-color: #D88C9A;">
        <a href="{{ route('frontend.v1.index') }}" class="font-bold text-2xl" style="color: #D88C9A;">Kanola</a>
        
        <div class="flex items-center gap-6">
            @if(Auth::guard('customer')->check())
                <div class="profile-menu-container relative">
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:opacity-80 transition">
                    <i class="fa-regular fa-user" style="color: #D88C9A;"></i>
                </a>

                <div class="profile-dropdown-menu absolute right-0 mt-2 w-48 bg-white border rounded-xl shadow-xl py-2 z-50" style="border-color: #e5b9c1;">
                    <a href="{{ route('frontend.v1.profile.edit') }}" class="block px-4 py-2 hover:bg-rose-50 transition">Profil Saya</a>
                    <hr class="my-1 border-rose-100">
                    <form action="{{ route('logout.customer') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-red-50 transition">Keluar</button>
                    </form>
                </div>
            </div>
            @else
                <a href="{{ route('frontend.v1.login') }}" class="font-medium hover:opacity-80 transition" style="color: #D88C9A;">Login</a>
                <a href="{{ route('frontend.v1.signup') }}" class="text-white px-5 py-2 rounded-xl hover:opacity-90 transition shadow-md" style="background-color: #D88C9A;">Sign Up</a>
            @endif
        </div>
    </nav>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>