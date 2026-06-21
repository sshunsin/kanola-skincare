@extends('layouts.app')

@section('content')
<style>
    /* ==================================================
                        GLOBAL UTILITIES
    ================================================== */
    :root {
        --primary: #ec4899;
        --primary-light: #f9a8d4;
        --soft: #fce7f3;
        --cream: #fff7ed;
        --white: #ffffff;
        --text: #444;
        --gray: #888;
        --border: #f8dce7;
        --shadow: 0 10px 30px rgba(236, 72, 153, 0.05);
    }

    .sidebar-orders,
    .title-orders h1,
    .section-title-orders {
        font-family: 'Playfair Display', serif;
    }

    /* ==================================================
                        SIDEBAR
    ================================================== */
    .sidebar-orders {
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        padding: 30px;
        background: var(--white);
        border-right: 1px solid var(--border);
        z-index: 100;
    }

    .logo-orders {
        font-size: 30px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 30px;
        font-family: 'Playfair Display', serif;
    }

    .menu-orders {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .menu-orders a {
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

    .menu-orders a:hover {
        background: #fdf2f8;
    }

    .menu-orders a.active {
        background: var(--soft);
        color: var(--primary);
    }

    .menu-orders a i {
        width: 20px;
        font-size: 16px;
    }

    .profile-orders {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--soft);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .profile-orders:hover {
        transform: scale(1.05);
    }

    .search-orders {
        display: flex;
        align-items: center;
        background: #fff;
        padding: 0 20px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .search-orders i {
        color: #aaa;
    }

    .search-orders input {
        width: 250px;
        padding: 15px;
        border: none;
        outline: none;
    }

    /* ==================================================
                        MAIN AREA
    ================================================== */
    .main-orders {
        padding: 30px 5%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .header-orders {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .title-orders h1 {
        font-size: 32px;
        color: #333;
    }

    .title-orders p {
        color: var(--gray);
        margin-top: 5px;
    }

    .search-box-orders input {
        width: 300px;
        padding: 14px 20px;
        border: 1px solid var(--border);
        border-radius: 16px;
        outline: none;
        background: var(--white);
        box-shadow: var(--shadow);
        transition: 0.3s;
    }

    .search-box-orders input:focus {
        border-color: var(--primary);
    }

    /* ==================================================
                        TABLE
    ================================================== */
    .table-container-orders {
        background: var(--white);
        border-radius: 24px;
        padding: 30px;
        box-shadow: var(--shadow);
        border: 1px solid #fff3f6;
    }

    .section-title-orders {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #333;
        position: relative;
        padding-left: 15px;
    }

    .section-title-orders::before {
        content: "";
        position: absolute;
        top: 6px;
        left: 0;
        width: 5px;
        height: 22px;
        background: var(--primary);
        border-radius: 10px;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    th {
        text-align: left;
        padding: 15px 20px;
        color: var(--gray);
        font-weight: 500;
        font-size: 14px;
        border-bottom: 1px solid #fce7f3;
    }

    td {
        padding: 18px 20px;
        background: var(--white);
        font-size: 15px;
    }

    tr-orders {
        cursor: pointer;
        transition: 0.2s;
    }

    tr-orders:hover td {
        background: #fff7fa;
    }

    /* STATUS BADGES */
    .status {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .status.completed { background: #dcfce7; color: #16a34a; }
    .status.pending { background: #fef3c7; color: #d97706; }
    .status.processing { background: #e0f2fe; color: #0284c7; }
    .status.cancelled { background: #fee2e2; color: #dc2626; }

    /* ==================================================
                        MODAL DETIL
    ================================================== */
    .modal-orders {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(5px);
    }

    .modal-content-orders {
        background: var(--white);
        width: 90%;
        max-width: 600px;
        border-radius: 30px;
        padding: 35px;
        position: relative;
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        animation: slideUp 0.4s ease;
    }

    .close-btn-orders {
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 28px;
        cursor: pointer;
        color: var(--primary);
    }

    .modal-content-orders h2 {
        font-family: 'Playfair Display', serif;
        color: var(--primary);
        margin-bottom: 25px;
    }

    .info-grid-orders {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }

    .info-item-orders label {
        font-size: 12px;
        color: var(--gray);
        text-transform: uppercase;
        display: block;
        margin-bottom: 5px;
    }

    .info-item-orders span, 
    .info-item-orders select {
        font-size: 16px;
        font-weight: 500;
        color: #333;
    }

    .info-item-orders select {
        width: 100%;
        padding: 10px;
        border: 1px solid var(--border);
        border-radius: 12px;
        outline: none;
        background: #fff;
    }

    @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .sidebar-orders { display: none; }
        .main-orders { margin-left: 0; padding: 20px; }
    }

    @media (max-width: 768px) {
        .header-orders { flex-direction: column; align-items: flex-start; gap: 20px; }
        .search-box-orders input { width: 100%; }
        .info-grid-orders { grid-template-columns: 1fr; }
    }
</style>

<div class="main-orders">
    <div class="header-orders">
        <div class="title-orders">
            <h1>Kelola Pesanan 📦</h1>
            <p>Pantau, proses, dan konfirmasi transaksi masuk pelanggan Kanola</p>
        </div>
        <div class="search-box-orders">
            <input type="text" id="tableSearch" placeholder="Cari ID, customer, atau produk...">
        </div>
    </div>
    
    <div class="table-container-orders">
        <div class="section-title-orders">Daftar Transaksi Masuk</div>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="ordersTableBody">
                @forelse($orders as $order)
                @php
                    $productArray = is_array($order->products) ? $order->products : json_decode($order->products, true);
                    $productNames = is_array($productArray) ? implode(', ', array_column($productArray, 'name')) : 'Tidak ada detail produk';
                @endphp
                <tr class="tr-orders" 
                    data-id="#KNL{{ $order->id }}" 
                    data-customer="{{ $order->customer_name }}" 
                    data-product="{{ e($productNames) }}" 
                    data-date="{{ $order->created_at->format('d M Y') }}" 
                    data-payment="{{ strtoupper($order->payment_method) }}" 
                    data-shipping="{{ strtoupper($order->shipping_method ?? 'Belum memilih') }}"
                    data-status="{{ $order->status }}" 
                    data-total="Rp{{ number_format($order->total_price, 0, ',', '.') }}">
                    
                    <td><b>#KNL{{ $order->id }}</b></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        <div class="space-y-1">
                            @if(is_array($productArray))
                                @foreach($productArray as $item)
                                    <div class="text-sm">
                                        <span class="font-medium text-gray-800">{{ $item['name'] }}</span>
                                        <span class="text-xs text-gray-500">({{ $item['quantity'] }}x)</span>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-gray-400">Tidak ada detail produk</span>
                            @endif
                        </div>
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>{{ strtoupper($order->payment_method) }}</td>
                    <td><span class="status {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                    <td><b>Rp{{ number_format($order->total_price, 0, ',', '.') }}</b></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada transaksi ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div id="orderModal" class="modal-orders">
    <div class="modal-content-orders">
        <span class="close-btn-orders">&times;</span>
        <h2>Detail Transaksi</h2>
        
        <div class="info-grid-orders">
            <div class="info-item-orders">
                <label>Order ID</label>
                <span id="mId">-</span>
            </div>
            <div class="info-item-orders">
                <label>Customer Name</label>
                <span id="mCustomer">-</span>
            </div>
            <div class="info-item-orders">
                <label>Tanggal Transaksi</label>
                <span id="mDate">-</span>
            </div>
            <div class="info-item-orders">
                <label>Metode Pembayaran</label>
                <span id="mPayment">-</span>
            </div>
            <div class="info-item-orders">
                <label>Metode Pengiriman</label>
                <span id="mShipping">-</span>
            </div>
            <div class="info-item-orders">
                <label>Total Pembayaran</label>
                <span id="mTotal" style="color: var(--primary); font-size: 20px; font-weight: 700;">-</span>
            </div>
            <div class="info-item-orders" style="grid-column: span 2;">
                <label>Produk yang Dibeli</label>
                <span id="mProduct">-</span>
            </div>
            <div class="info-item-orders" style="grid-column: span 2;">
                <label>Status Pelacakan Kurir</label>
                <div id="mTrackingStatus" style="font-size: 14px; padding: 12px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; margin-top: 5px; line-height: 1.5; color: #333;">
                    -
                </div>
            </div>
            <div class="info-item-orders" style="grid-column: span 2;">
                <label>Aksi / Status Pesanan</label>
                <select id="mStatus">
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("orderModal");
        const closeBtn = document.querySelector(".close-btn-orders");
        
        const mId = document.getElementById("mId");
        const mCustomer = document.getElementById("mCustomer");
        const mProduct = document.getElementById("mProduct");
        const mDate = document.getElementById("mDate");
        const mPayment = document.getElementById("mPayment");
        const mStatus = document.getElementById("mStatus");
        const mTotal = document.getElementById("mTotal");
        const mShipping = document.getElementById("mShipping");
        const mTrackingStatus = document.getElementById("mTrackingStatus");

        let activeRow = null;
        let currentOrderId = null;

        document.querySelectorAll(".tr-orders").forEach(row => {
            row.addEventListener("click", () => {
                activeRow = row;
                
                const rawId = row.getAttribute("data-id");
                currentOrderId = rawId.replace('#KNL', '');

                const currentStatus = row.getAttribute("data-status");
                const currentShipping = row.getAttribute("data-shipping");

                mId.textContent = rawId;
                mCustomer.textContent = row.getAttribute("data-customer");
                mProduct.textContent = row.getAttribute("data-product");
                mDate.textContent = row.getAttribute("data-date");
                mPayment.textContent = row.getAttribute("data-payment");
                mShipping.textContent = currentShipping;
                mStatus.value = currentStatus;
                mTotal.textContent = row.getAttribute("data-total");

                updateTrackingUI(currentStatus, currentShipping);

                modal.style.display = "flex";
            });
        });

        closeBtn.addEventListener("click", () => modal.style.display = "none");
        window.addEventListener("click", (e) => {
            if (e.target === modal) modal.style.display = "none";
        });

        mStatus.addEventListener("change", () => {
            if (activeRow && currentOrderId) {
                const newValue = mStatus.value;
                const currentShipping = activeRow.getAttribute("data-shipping");
                const url = `/backend/v1/orders/${currentOrderId}/accept`;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status: newValue
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('HTTP error, status = ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const approvedStatus = data.status;

                        activeRow.setAttribute("data-status", approvedStatus);
                        mStatus.value = approvedStatus;
                        
                        const statusCell = activeRow.querySelector("td .status");
                        statusCell.className = `status ${approvedStatus}`;
                        statusCell.textContent = approvedStatus.charAt(0).toUpperCase() + approvedStatus.slice(1);

                        updateTrackingUI(approvedStatus, currentShipping);
                    } else {
                        alert('Gagal menyetujui pesanan: ' + (data.message || 'Error tidak diketahui'));
                    }
                })
                .catch(error => {
                    console.error('Detail Error:', error);
                    alert('Terjadi kesalahan koneksi sistem atau akun Anda tidak memiliki akses.');
                });
            }
        });

        const searchInput = document.getElementById("tableSearch");
        searchInput.addEventListener("keyup", () => {
            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll("#ordersTableBody .tr-orders");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        function updateTrackingUI(status, shipping) {
            let trackingText = "";
            
            if (status === "pending") {
                trackingText = `⏳ Menunggu konfirmasi pembayaran pembeli untuk diproses oleh kurir <b>${shipping}</b>.`;
            } else if (status === "processing") {
                trackingText = `📦 Gudang Kanola sedang menyiapkan paket untuk diserahkan ke agen <b>${shipping}</b> terdekat.`;
            } else if (status === "completed") {
                trackingText = `🚚 Paket telah sukses diantarkan dan diterima pelanggan via armada kurir <b>${shipping}</b>.`;
            } else if (status === "cancelled") {
                trackingText = `❌ Alur pengiriman otomatis dibatalkan karena pesanan dihentikan oleh admin toko.`;
            } else {
                trackingText = "Tidak ada informasi riwayat perjalanan kurir.";
            }

            mTrackingStatus.innerHTML = trackingText;
        }
    });
</script>
@endsection