@extends('layouts.app')

@section('content')
<style>
    /* ===================================
    RESET & GLOBAL ADJUSTMENT FOR BACKEND
    =================================== */
    .logo,
    .title h1,
    .section-title {
        font-family: 'Playfair Display', serif;
    }

    /* ===================================
    SIDEBAR
    =================================== */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        padding: 30px;
        background: #fff;
        border-right: 1px solid #fde2e7;
        z-index: 100;
    }

    .logo {
        font-size: 30px;
        font-weight: 700;
        color: #ec4899;
        margin-bottom: 30px;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px;
        text-decoration: none;
        color: #777;
        font-weight: 500;
        border-radius: 16px;
        transition: 0.3s;
    }

    .menu a:hover {
        background: #fdf2f8;
    }

    .menu a.active {
        background: #fce7f3;
        color: #ec4899;
    }

    .menu a i {
        width: 20px;
        font-size: 16px;
    }

    /* ===================================
    PROFILE
    =================================== */
    .profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #fce7f3;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ec4899;
        font-size: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .profile:hover {
        transform: scale(1.05);
    }

    /* ===================================
    SEARCH
    =================================== */
    .search {
        display: flex;
        align-items: center;
        background: #fff;
        padding: 0 20px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .search i {
        color: #aaa;
    }

    .search input {
        width: 250px;
        padding: 15px;
        border: none;
        outline: none;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-box input {
        width: 260px;
        padding: 14px;
        border: none;
        outline: none;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(236, 72, 153, 0.08);
    }

    /* ===================================
    MAIN CONTENT AREA
    =================================== */
    .main {
        padding: 40px 60px;
        background-color: #fcfcfd;
        min-height: 100vh;
    }

    /* ===================================
    HEADER
    =================================== */
    .header {
        margin-bottom: 50px;
    }

    .title h1 {
        font-size: 32px;
    }

    .title p {
        margin-top: 5px;
        color: #888;
    }

    /* ===================================
    CARDS
    =================================== */
    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px; /* Jarak antar kartu */
        margin-bottom: 40px;
    }

    .card {
        background: #fff;
        padding: 30px;
        border-radius: 24px;
        border: 1px solid #f3f4f6;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03); /* Lebih halus */
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(236, 72, 153, 0.1);
    }

    .card i {
        font-size: 25px;
        color: #ec4899;
        margin-bottom: 15px;
    }

    .card-title {
        color: #999;
        font-size: 14px;
    }

    .card-value {
        margin: 10px 0;
        font-size: 30px;
        font-weight: 700;
    }

    .card-growth {
        color: #ec4899;
    }

    /* ===================================
    GRID SYSTEM
    =================================== */
    .grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px; /* Jarak antar box */
        margin-bottom: 30px;
    }

    .box {
        background: #fff;
        padding: 35px;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }

    /* ===================================
    SECTION TITLE
    =================================== */
    .section-title {
        margin-bottom: 30px;
        font-size: 18px;
        letter-spacing: -0.02em;
    }

    /* ===================================
    PROGRESS CIRCLE
    =================================== */
    .circle {
        width: 160px;
        height: 160px;
        margin: auto;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: conic-gradient(#fde2e7 0deg, #fde2e7 360deg);
        padding: 12px;
        box-shadow: inset 0 0 0 12px #fff;
        position: relative;
        cursor: pointer;
        margin-bottom: 25px;
    }

    .circle-number {
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%) translateY(-5px);
        color: #ec4899;
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
        z-index: 50;
        opacity: 0;
        transition: all 0.3s ease;
        pointer-events: none;
        white-space: nowrap;
    }

    /* Efek saat lingkaran di-hover */
    .circle:hover .circle-number {
        opacity: 1; /* Muncul sepenuhnya */
        transform: translateX(-50%) translateY(0); /* Efek animasi turun perlahan ke posisi aslinya */
    }

    /* ===================================
    PRODUCT LIST
    =================================== */
    .product {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #fae5ec;
    }

    /* ===================================
    TABLE
    =================================== */
    table {
        width: 100%;
        border-spacing: 0 10px;
        border-collapse: separate;
    }

    tr {
        background: #fff;
        transition: 0.3s;
    }

    tr:hover {
        background: #fff7fa;
    }

    th {
        text-align: left;
        padding: 15px;
        color: #999;
    }

    td {
        padding: 18px;
    }

    .status {
        padding: 7px 15px;
        border-radius: 20px;
        font-size: 13px;
    }

    .paid {
        background: #dcfce7;
        color: #16a34a;
        font-weight: 600;
    }

    .pending {
        background: #fef3c7;
        color: #d97706;
        font-weight: 600;
    }

    /* ===================================
    ACTIVITY
    =================================== */
    .activity {
        padding: 12px 0;
        border-bottom: 1px solid #fae5ec;
    }

    .activity small {
        color: #999;
    }

    /* ===================================
    RESPONSIVE MEDIA QUERIES
    =================================== */
    @media (max-width: 1200px) {
        .cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 1024px) {
        .cards { grid-template-columns: repeat(2, 1fr); }
        .grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }

        .main {
            margin-left: 0;
            padding: 15px;
        }

        .cards {
            grid-template-columns: 1fr;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .search-box input {
            border: 1px solid #e5e7eb;
            padding: 12px 20px;
            transition: border 0.3s;
        }
    
        .search-box input:focus {
            border-color: #ec4899;
            outline: none;
        }
    }
</style>

{{-- <div class="sidebar">
    <div class="logo">
        Kanola
    </div>

    <div class="profile">
        <i class="fa-solid fa-user"></i>
    </div>

    <br>

    <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search...">
    </div>

    <br><br>

    <div class="menu">
        <a href="{{ route('backend.v1.dashboard') }}">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="{{ route('backend.v1.products.index') }}">
            <i class="fa-solid fa-bag-shopping"></i>
            Products
        </a>

        <a href="{{ route('backend.v1.orders') }}">
            <i class="fa-solid fa-box"></i>
            Orders
        </a>

        <a href="{{ route('backend.v1.customers') }}">
            <i class="fa-solid fa-users"></i>
            Customers
        </a>

        <a href="{{ route('backend.v1.statistik.index') }}" class="active">
            <i class="fa-solid fa-chart-line"></i>
            Statistics
        </a>

        <a href="{{ route('backend.v1.settings.index') }}">
            <i class="fa-solid fa-gear"></i>
            Settings
        </a>

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div> --}}

<div class="main">
    <div class="header">
        <div class="title">
            <h1 id="greeting">Hello, {{ auth()->user()->name }} 👋</h1>
            <p id="live-clock">Selamat datang di Dashboard Statistik Kanola</p>
        </div>
    </div>

    <div class="cards">
        <div class="card">
            <i class="fa-solid fa-wallet"></i>
            <div class="card-title">Total Revenue</div>
            <div class="card-value">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</div>
            <div class="card-growth">Verified Transactions</div>
        </div>
        <div class="card">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="card-title">Total Orders</div>
            <div class="card-value">{{ $totalOrders }}</div>
            <div class="card-growth">Transactions logged</div>
        </div>
        <div class="card">
            <i class="fa-solid fa-users"></i>
            <div class="card-title">Customers</div>
            <div class="card-value">{{ $totalCustomers }}</div>
            <div class="card-growth">Unique buyers</div>
        </div>
        <div class="card">
            <i class="fa-solid fa-box-open"></i>
            <div class="card-title">Product Sold</div>
            <div class="card-value">{{ $totalSold }}</div>
            <div class="card-growth">Items delivered</div>
        </div>
    </div>

    <div class="grid">
        <div class="box">
            <div class="section-title">Sales Analytics (7 Hari Terakhir)</div>
            <div style="position: relative; height: 250px; width: 100%;">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
        <div class="box">
            <div class="section-title">Target Sales</div>
            <div class="circle" data-target="{{ $targetPercentage }}">
                <span class="circle-number">{{ $targetPercentage }}%</span>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="box">
            <div class="section-title">Monthly Revenue (6 Bulan Terakhir)</div>
            <div style="position: relative; height: 250px; width: 100%;">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
        <div class="box">
            <div class="section-title">Produk Terlaris</div>
            <div id="product-list">
                @forelse($topProducts as $name => $count)
                    <div class="product">
                        <span>{{ $name }}</span>
                        <b>{{ $count }}</b>
                    </div>
                @empty
                    <div class="product">
                        <span>Belum ada data pesanan</span>
                        <b>0</b>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const title = document.querySelector(".title h1");
    const currentHour = new Date().getHours();
    const userName = "{{ auth()->user()->name }}";

    if (currentHour < 12) {
        title.textContent = `Good Morning, ${userName} ☀️`;
    } else if (currentHour < 18) {
        title.textContent = `Good Afternoon, ${userName} 🌸`;
    } else {
        title.textContent = `Good Evening, ${userName} 🌙`;
    }

    const cards = document.querySelectorAll(".card");
    cards.forEach((card) => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "translateY(-8px)";
        });
        card.addEventListener("mouseleave", () => {
            card.style.transform = "translateY(0)";
        });
    });

    const searchInput = document.querySelector(".search-box input");
    if (searchInput) {
        searchInput.addEventListener("keyup", () => {
            const filter = searchInput.value.toLowerCase();
            const products = document.querySelectorAll(".product");

            products.forEach((product) => {
                const text = product.textContent.toLowerCase();
                if (text.includes(filter)) {
                    product.style.display = "flex";
                } else {
                    product.style.display = "none";
                }
            });
        });
    }

    const activities = document.querySelectorAll(".activity");
    activities.forEach((activity) => {
        activity.style.transition = "padding-left 0.2s ease";
        activity.addEventListener("mouseenter", () => {
            activity.style.paddingLeft = "10px";
        });
        activity.addEventListener("mouseleave", () => {
            activity.style.paddingLeft = "0";
        });
    });

    const profiles = document.querySelectorAll(".profile");
    profiles.forEach((profile) => {
        profile.addEventListener("mouseenter", () => {
            profile.style.transform = "scale(1.08)";
        });
        profile.addEventListener("mouseleave", () => {
            profile.style.transform = "scale(1)";
        });
    });

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: {!! json_encode($values) !!},
                borderColor: '#ec4899',
                backgroundColor: 'rgba(236, 72, 153, 0.05)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#ec4899',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
    new Chart(ctxMonthly, {
        type: 'bar',
        data: {
            labels: {!! json_encode($monthLabels) !!},
            datasets: [{
                label: 'Pendapatan Bulanan (Rp)',
                data: {!! json_encode($monthValues) !!},
                backgroundColor: 'rgba(236, 72, 153, 0.6)',
                borderColor: '#ec4899',
                borderWidth: 1,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    const circle = document.querySelector(".circle");
    const circleNumber = document.querySelector(".circle-number");
    let percentage = 0;
    const targetPercentage = parseInt(circle.getAttribute('data-target')) || 0;

    const loading = setInterval(() => {
        if (targetPercentage <= 0 || percentage >= targetPercentage) {
            clearInterval(loading);
            if (circleNumber) {
                circleNumber.textContent = `${targetPercentage}%`;
            }
            const degree = (targetPercentage / 100) * 360;
            circle.style.background = `conic-gradient(#ec4899 ${degree}deg, #fde2e7 0deg)`;
        } else {
            percentage++;
            if (circleNumber) {
                circleNumber.textContent = `${percentage}%`;
            }
            const degree = (percentage / 100) * 360;
            circle.style.background = `conic-gradient(#ec4899 ${degree}deg, #fde2e7 0deg)`;
        }
    }, 20);

    const tableRows = document.querySelectorAll("tbody tr");
    tableRows.forEach((row) => {
        row.addEventListener("mouseenter", () => {
            row.style.background = "#fff7fa";
        });
        row.addEventListener("mouseleave", () => {
            row.style.background = "#ffffff";
        });
    });

    const subtitle = document.querySelector(".title p");
    setInterval(() => {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const seconds = String(now.getSeconds()).padStart(2, "0");
        subtitle.textContent = `Dashboard Statistik Kanola • ${hours}:${minutes}:${seconds}`;
    }, 1000);
</script>
@endsection