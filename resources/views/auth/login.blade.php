<x-guest-layout>

{{-- GOOGLE FONT --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;
}

/* Wrapper */
.auth-wrapper{
    display:flex;
    justify-content:center;
    align-items:center;

}

/* Glass Card */
.login-card{
    background:rgba(255,255,255,0.6);
    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);
    border-radius:22px;
    padding:40px;
    width:430px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    border:1px solid rgba(255,255,255,.8);
}

/* Logo */
.logo-box{
    text-align:center;
    margin-bottom:10px;
}

.logo-icon{
    width:300px;
}

/* Title */
.login-title{
    text-align:center;
    font-weight:800;
    font-size:25px;
    color:#d63384;
}

.subtitle{
    text-align:center;
    margin-top:-5px;
    margin-bottom:15px;
    color:#7a7a7a;
}

/* Inputs */
input{
    border-radius:12px !important;
}

/* Button */
.btn-pink{
    background:#ff4fa1;
    border:none;
    width:100%;
    border-radius:12px;
    padding:10px;
    font-weight:600;
}

.btn-pink:hover{
    background:#ff2d8b;
}

/* Links */
a{
    color:#d63384;
}

input, input:focus{
    background:#ffffff !important;
    color:#333 !important;
    border:1px solidrgb(255, 200, 227) !important;
    box-shadow:0 0 8px rgba(255,105,180,.35);
}


</style>


<div class="auth-wrapper">

    <div class="login-card">

        <div class="logo-box">
            {{-- kalau ada logo custom pakai ini --}}
            <img src="{{ asset('logoKBC.png') }}" class="logo-icon" alt="Logo">
            <!-- <x-application-logo class="w-16 h-16 mx-auto"/> -->
        </div>

        <h3 class="login-title">Welcome Back 💗</h3>
        <p class="subtitle">Stay glowing & productive ✨</p>

        <form action="{{ route('backend.login.submit') }}" method="POST">
            @csrf

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="mb-4">
                    <ul class="text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Email --}}
            <div class="mt-4">
                <x-input-label value="Email"/>
                <x-text-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-input-label value="Password"/>
                <x-text-input class="block mt-1 w-full" type="password" name="password" required/>
            </div>

            {{-- Remember --}}
            <div class="mt-3 flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span>Remember me</span>
            </div>

            {{-- Login Button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-pink">
                    LOGIN
                </button>
            </div>

        </form>
    </div>

</div>

</x-guest-layout>