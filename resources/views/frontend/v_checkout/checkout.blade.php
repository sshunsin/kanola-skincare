<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kanola Luxury Checkout</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
/* =========================
   GLOBAL
========================= */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    background: linear-gradient(135deg,#ffe4ec,#fff7f0,#ffffff);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* penting biar bisa scroll */
    padding: 30px;
    overflow-x: hidden;
    overflow-y: auto;
}

.wrapper{
    width: 100%;
    max-width: 1150px;
    display: grid;
    grid-template-columns: 1.3fr .9fr;
    gap: 20px;
    z-index: 2;
    align-items: start;
    margin-top: 20px;
}

/* =========================
   BUBBLE BACKGROUND
========================= */
.bubble {
    position: absolute;
    border-radius: 50%;
    filter: blur(45px);
    opacity: .35;
    z-index: 0;
    animation: float 10s infinite ease-in-out;
}

.bubble{
    pointer-events: none;
}

.b1 { width: 280px; height: 280px; background: #ff9bb5; top: 10%; left: 5%; }
.b2 { width: 220px; height: 220px; background: #ffd6e0; bottom: 10%; right: 5%; animation-delay: 2s; }
.b3 { width: 180px; height: 180px; background: #ffe7c7; top: 60%; left: 45%; animation-delay: 4s; }

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

/* =========================
   LAYOUT
========================= */
.wrapper {
    width: 100%;
    max-width: 1150px;
    display: grid;
    grid-template-columns: 1.3fr .9fr;
    gap: 20px;
    z-index: 2;
}

/* CARD */
.card {
    background: rgba(255, 255, 255, .75);
    backdrop-filter: blur(14px);
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, .08);
}

/* =========================
   STEPPER
========================= */
.stepper {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    position: relative;
}

.stepper::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: #f0e6e6;
}

.step {
    font-size: 12px;
    padding: 6px 10px;
    border-radius: 20px;
    background: #fff;
    border: 1px solid #eee;
    z-index: 1;
    color: #aaa;
    transition: .3s;
}

.step.active {
    border-color: #ff7aa2;
    color: #ff4f86;
}

/* =========================
   PAGE CONTROL
========================= */
.page {
    display: none;
    animation: fade .4s ease;
}

.page.active {
    display: block;
}

@keyframes fade {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* =========================
   TEXT & FORM
========================= */
.title {
    font-size: 18px;
    margin-bottom: 15px;
    font-weight: 500;
}

.section-title {
    font-size: 11px;
    font-weight: 600;
    color: #ff4f86;
    margin-bottom: 12px;
    letter-spacing: .6px;
    text-transform: uppercase;
}

.group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

label {
    font-size: 11px;
    color: #888;
    text-transform: uppercase;
    letter-spacing: .4px;
}

input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #eee;
    background: #fff;
    outline: none;
    font-size: 13px;
    transition: .2s;
}

input:focus {
    border-color: #ff7aa2;
    box-shadow: 0 0 0 3px rgba(255, 122, 162, .12);
}

/* GRID */
.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

/* =========================
   CART
========================= */
.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    font-size: 13px;
}

.qty {
    display: flex;
    gap: 8px;
    align-items: center;
}

.qty button {
    width: 24px;
    height: 24px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    background: #ff7aa2;
    color: #fff;
}

.total {
    margin-top: 15px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
}

.empty {
    color: #888;
    font-size: 13px;
    text-align: center;
    padding: 20px;
}

/* =========================
   PAYMENT
========================= */
.pay-box{
    display:flex;
    align-items:center;
    gap:14px;
    padding:14px;
    border:1px solid #eee;
    border-radius:14px;
    cursor:pointer;
    transition:.25s;
    background:#fff;
}

.pay-box:hover{
    transform:translateY(-2px);
    border-color:#ff7aa2;
    box-shadow:0 10px 25px rgba(255,122,162,.15);
}

.pay-box.active{
    border-color:#ff7aa2;
    background:linear-gradient(135deg,#fff3f7,#ffffff);
}

.pay-box img{
    width:34px;
    height:34px;
    object-fit:contain;
}

.pay-box > div{
    display:flex;
    flex-direction:column;
    gap:2px;
}

.pay-title{
    font-size:14px;
    font-weight:600;
    color:#222;
}

.pay-desc{
    font-size:12px;
    color:#777;
}

/* =========================
   BUTTON
========================= */
button.main {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #ff7aa2, #ffb3c7);
    color: #fff;
    font-weight: 500;
    cursor: pointer;
    transition: .2s;
    margin-top: 15px;
}

button.main:hover {
    transform: translateY(-2px);
}

.right-card{
    position: sticky;
    top: 20px;
    height: fit-content;
}

.wrapper{
    width: 100%;
    max-width: 1150px;
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 20px;
    align-items: start;
}

.pay-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.pay-box img{
    width:28px;
    height:28px;
    object-fit:contain;
}

.modal-email{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.55);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:999999;
    backdrop-filter:blur(6px);
}

.modal-email.show{
    display:flex;
}

.modal-content-email{
    width:90%;
    max-width:440px;
    background:#fff;
    border-radius:18px;
    padding:28px;
    text-align:center;
    box-shadow:0 25px 70px rgba(0,0,0,.25);
    animation:pop .25s ease;
}

.modal-content-email h2{
    font-size:20px;
    font-weight:700;
}

.sub{
    font-size:13px;
    color:#666;
    margin-bottom:18px;
}

.invoice-box{
    text-align:left;
    background:linear-gradient(135deg,#fff3f7,#fff);
    padding:16px;
    border-radius:14px;
    font-size:13px;
    color:#333;
    line-height:1.6;
    border:1px solid #ffd1dc;
}

.close-email{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#ff7aa2,#ff4f86);
    color:white;
    cursor:pointer;
    font-weight:600;
    transition:.2s;
}

.close-email:hover{
    transform:scale(1.02);
}

input, .pay-box, button{
    transition:.2s ease;
}

button.main{
    font-weight:600;
    letter-spacing:.2px;
}

.back-btn{
    position: fixed;
    top: 20px;
    left: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: rgba(255,255,255,.9);
    backdrop-filter: blur(10px);
    border: 1px solid #eee;
    border-radius: 12px;
    text-decoration: none;
    color: #444;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 8px 20px rgba(0,0,0,.08);
    transition: .2s;
    z-index: 999;
}

.back-btn:hover{
    transform: translateX(-3px);
    border-color: #ff7aa2;
    color: #ff4f86;
}

</style>
</head>

<body>
    <a href="{{ route('frontend.v1.products') }}" class="back-btn">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 9H3"></path>
            <path d="M9 15L3 9L9 3"></path>
        </svg>
        Kembali
    </a>

<!-- BUBBLE -->
<div class="bubble b1"></div>
<div class="bubble b2"></div>
<div class="bubble b3"></div>

<div class="wrapper">

<!-- LEFT -->
<div class="card">

    <div class="stepper">
        <div class="step active" id="s1">Cart</div>
        <div class="step" id="s2">Shipping</div>
        <div class="step" id="s3">Payment</div>
        <div class="step" id="s4">Done</div>
    </div>

    <div class="page active" id="page1">

        <div class="title">🛒 Checkout</div>
        
        <!-- CONTACT -->
        <div class="section-title">Contact Information</div>
        
        <div class="group">
        <label>Full Name</label>
        <input type="text" placeholder="Full Name">
        </div>
        
        <div class="group">
        <label>Email Address</label>
        <input type="email" placeholder="Email Address">
        </div>
        
        <div class="group">
        <label>Phone Number</label>
        <input type="text" placeholder="Phone Number">
        </div>
        
        <!-- ADDRESS -->
        <div class="section-title">Shipping Address</div>
        
        <div class="group">
        <label>Street Address</label>
        <input type="text">
        </div>
        
        <div class="group">
        <label>City</label>
        <input type="text">
        </div>
        
        <div class="group">
        <label>Province</label>
        <input type="text">
        </div>
        
        <div class="group">
        <label>Postal Code</label>
        <input type="text">
        </div>
        
        <!-- NOTES -->
        <div class="section-title">Additional</div>
        
        <div class="group">
        <label>Catatan untuk penjual (Opsional)</label>
        <input type="text" placeholder="Masukkan catatan untuk penjual (opsional)">
        </div>
        
        <!-- SUMMARY -->
        <div class="section-title">Order Summary</div>
        
        <div id="cart"></div>
        
        <div class="total">
        <span>Subtotal</span>
        <span id="total">Rp0</span>
        </div>
        
        <button class="main" onclick="next(2)">Continue to Shipping</button>
        
        </div>

        <div class="page" id="page2">

            <div class="title">🚚 Shipping</div>
            
            <div class="section-title">Shipping Method</div>
            
            <div class="pay-box active" onclick="selectShipping(this,'jne')">
                <div class="pay-title">JNE Reguler</div>
                <div class="pay-desc">Rp10.000 • 3–5 Hari</div>
            </div>
            
            <div class="pay-box" onclick="selectShipping(this,'jnt')">
                <div class="pay-title">J&T Express</div>
                <div class="pay-desc">Rp15.000 • 2–4 Hari</div>
            </div>
            
            <div class="pay-box" onclick="selectShipping(this,'sicepat')">
                <div class="pay-title">SiCepat</div>
                <div class="pay-desc">Rp12.000 • 1–3 Hari</div>
            </div>
            
            <div class="section-title">Shipping Summary</div>
            
            <div class="cart-item">
            <span>Shipping Fee</span>
            <span>Rp10.000</span>
            </div>
            
            <div class="cart-item">
            <span>Estimated Delivery</span>
            <span>2–4 Hari</span>
            </div>
            
            <button class="main" onclick="next(3)">Continue to Payment</button>
            
            <button class="main" style="margin-top:10px;background:#aaa" onclick="next(1)">
            Back
            </button>
            
            </div>

            <div class="page" id="page3">
                <div id="qrisBox"></div>

        <div class="title">💳 Payment</div>

        <div class="section-title">Payment Method</div>

        <div class="pay-box active" onclick="selectPayment(this,'bca')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" style="height:22px">
            <div>
                <div class="pay-title">Bank BCA</div>
                <div class="pay-desc">Transfer Manual</div>
            </div>
        </div>
        
        <div class="pay-box" onclick="selectPayment(this,'bri')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg" style="height:22px">
            <div>
                <div class="pay-title">Bank BRI</div>
                <div class="pay-desc">Transfer Manual</div>
            </div>
        </div>
        
        <div class="pay-box" onclick="selectPayment(this,'bni')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/Bank_Negara_Indonesia_logo_%282004%29.svg" style="height:22px">
            <div>
                <div class="pay-title">Bank BNI</div>
                <div class="pay-desc">Transfer Manual</div>
            </div>
        </div>
        
        <div class="pay-box" onclick="selectPayment(this,'qris')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/QRIS_Logo.svg" style="height:22px">
            <div>
                <div class="pay-title">QRIS</div>
                <div class="pay-desc">Scan QR Code</div>
            </div>
        </div>
        
        <div class="pay-box" onclick="selectPayment(this,'dana')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" style="height:22px">
            <div>
                <div class="pay-title">DANA</div>
                <div class="pay-desc">E-Wallet</div>
            </div>
        </div>
        <div class="section-title">Upload Bukti Transfer</div>
            <input type="file" id="proofInput" onchange="saveProof(this)">

        <div class="section-title">Payment Summary</div>

        <div class="cart-item">
        <span>Product Total</span>
        <span id="total2">Rp0</span>
        </div>

        <div class="cart-item">
        <span>Shipping Fee</span>
        <span id="shippingFee">Rp0</span>
        </div>

        <div class="cart-item">
        <span><b>Grand Total</b></span>
        <span id="grand">Rp0</span>
        </div>

        <button class="main" onclick="handlePlaceOrder()">Place Order</button>

        <button class="main" style="margin-top:10px;background:#aaa" onclick="next(2)">
        Back
        </button>

        </div>

        <div class="page" id="page4">

            <div class="title">✅ Order Confirmed</div>
            
            <div class="section-title">Order Information</div>
            
            <div class="cart-item">
            <span>Order ID</span>
            <span>#KNL-2026-001</span>
            </div>
            
            <div class="cart-item">
            <span>Payment Status</span>
            <span style="color:green;">Paid</span>
            </div>
            
            <div class="cart-item">
            <span>Payment Method</span>
            <span>QRIS / Transfer</span>
            </div>
            
            <div class="cart-item">
            <span>Estimated Delivery</span>
            <span>2–4 Hari</span>
            </div>
            
            <div class="section-title">Delivery Address</div>
            <p style="font-size:12px;color:#777">
            Recipient Name<br>
            Street Address Example
            </p>
            
            <div class="section-title">Payment Information</div>
            
            <div class="cart-item">
            <span>Total Payment</span>
            <span id="grand2">Rp0</span>
            </div>

        <button 
            class="main" 
            style="margin-top:10px;background:#aaa" 
            onclick="resetAndRedirect('{{ route('frontend.v1.index') }}')">
            Back to Home
        </button>

        <button 
            class="main" 
            style="margin-top:10px;background:#ccc" 
            onclick="resetAndRedirect('{{ route('frontend.v1.products') }}')">
            Continue Shopping
        </button>
            
            </div>

        </div> <!-- tutup LEFT card -->

        <!-- RIGHT SIDEBAR -->
        <div class="card right-card">
            <div class="title">Cart Summary</div>
            <div id="summary"></div>
        
            <div class="section-title">Order Total</div>
        
            <div class="cart-item">
                <span>Subtotal</span>
                <span id="totalSidebar">Rp0</span>
            </div>
        
            <div class="cart-item" id="sidebarShippingRow" style="display: none;">
                <span>Shipping</span>
                <span id="sidebarShippingFee">Rp0</span>
            </div>
        
            <div class="cart-item">
                <span><b>Total</b></span>
                <span id="grandSidebar">Rp0</span>
            </div>
        </div>
        
        </div> <!-- wrapper close -->

</div>

        <script>
            let currentPage = 1;
            let shippingCost = 0;
            let selectedShippingType = null;
            let selectedPayment = null;

            const shippingOptions = {
                jne: { name: "JNE Reguler", cost: 10000, eta: "3–5 Hari" },
                jnt: { name: "J&T Express", cost: 15000, eta: "2–4 Hari" },
                sicepat: { name: "SiCepat", cost: 12000, eta: "1–3 Hari" }
            };

            const paymentMethods = {
                bca: {
                    name: "Bank BCA",
                    instructions: "Transfer ke rekening BCA: 1234567890 a.n Kanola Skincare"
                },
                bri: {
                    name: "Bank BRI",
                    instructions: "Transfer ke rekening BRI: 9876543210 a.n Kanola Skincare"
                },
                bni: {
                    name: "Bank BNI",
                    instructions: "Transfer ke rekening BNI: 4567891230 a.n Kanola Skincare"
                },
                qris: {
                    name: "QRIS",
                    instructions: "Scan QR code yang muncul di halaman pembayaran"
                },
                dana: {
                    name: "DANA",
                    instructions: "Transfer ke DANA: 0812-xxxx-xxxx a.n Kanola"
                }
            };

            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            let currentOrder = {
                orderId: "",
                paymentMethod: "",
                vaNumber: "",
                total: 0,
                qrImage: "",
                proof: null
            };

            function rupiah(n){
                return new Intl.NumberFormat("id-ID",{style:"currency",currency:"IDR"}).format(n);
            }

            function render(){
                let c = document.getElementById("cart");
                let s = document.getElementById("summary");

                if (!c || !s) return;

                c.innerHTML = "";
                s.innerHTML = "";

                if(cart.length === 0){
                    c.innerHTML = `<div class="empty">Cart kosong</div>`;
                    s.innerHTML = `<div class="empty">Tidak ada item</div>`;
                    const totalElement = document.getElementById("total");
                    if (totalElement) totalElement.innerText = "Rp0";
                    return;
                }

                let total = 0;

                cart.forEach((v, i) => {
                    let cleanPrice = typeof v.price === 'string' ? parseInt(v.price.replace(/[^0-9]/g, '')) : v.price;
                    if (isNaN(cleanPrice)) cleanPrice = 0;
                    
                    total += cleanPrice * v.qty;

                    c.innerHTML += `
                    <div class="cart-item" style="display: flex; flex-direction: column; align-items: flex-start; gap: 4px;">
                        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-weight: 500;">${v.name}</span>
                            <div class="qty">
                                <button onclick="change(${i},-1)">-</button>
                                <span>${v.qty}</span>
                                <button onclick="change(${i},1)">+</button>
                            </div>
                        </div>
                        <div style="font-size: 11px; color: #888;">
                            Harga Satuan: ${rupiah(cleanPrice)}
                        </div>
                    </div>`;

                    s.innerHTML += `
                    <div class="cart-item" style="display: flex; flex-direction: column; align-items: flex-start; gap: 2px;">
                        <div style="width: 100%; display: flex; justify-content: space-between;">
                            <span>${v.name} (x${v.qty})</span>
                            <span>${rupiah(cleanPrice * v.qty)}</span>
                        </div>
                        <div style="font-size: 11px; color: #888;">
                            Harga Satuan: ${rupiah(cleanPrice)}
                        </div>
                    </div>`;
                });

                const totalElement = document.getElementById("total");
                if (totalElement) totalElement.innerText = rupiah(total);
            }

            function change(i, v) {
                cart[i].qty += v;
                if (cart[i].qty < 1) {
                    cart.splice(i, 1);
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                render();
                updateTotals();
            }

            function next(n) {
                if (cart.length === 0 && n > 1) {
                    alert("Keranjang Anda kosong! Silakan pilih produk terlebih dahulu.");
                    return;
                }

                if (currentPage === 1 && n === 2) {
                    const inputs = document.querySelectorAll("#page1 input[type='text'], #page1 input[type='email']");
                    let valid = true;
                    inputs.forEach(input => {
                        if (input.placeholder !== "Masukkan catatan untuk penjual (opsional)" && input.value.trim() === "") {
                            valid = false;
                            input.style.borderColor = "#ff4f86";
                        } else {
                            input.style.borderColor = "#eee";
                        }
                    });
                    if (!valid) {
                        alert("Silakan lengkapi semua informasi kontak dan alamat pengiriman terlebih dahulu.");
                        return;
                    }
                }

                if (currentPage === 2 && n === 3) {
                    if (selectedShippingType === null) {
                        alert("Silakan pilih metode pengiriman terlebih dahulu.");
                        return;
                    }
                }

                if (currentPage === 3 && n === 4) {
                    if (currentOrder.paymentMethod === null) {
                        alert("Silakan pilih metode pembayaran terlebih dahulu.");
                        return;
                    }
                }

                currentPage = n;

                const backBtn = document.querySelector(".back-btn");
                if (backBtn) {
                    backBtn.style.display = n > 1 ? "none" : "flex";
                }

                if (currentPage === 1) {
                    shippingCost = 0;
                    selectedShippingType = null;
                    
                    document.querySelectorAll("#page2 .pay-box").forEach(p => p.classList.remove("active"));
                    const feeSummary = document.getElementById("shippingFeeSummary");
                    const etaSummary = document.getElementById("shippingEtaSummary");
                    if (feeSummary) feeSummary.innerText = rupiah(0);
                    if (etaSummary) etaSummary.innerText = "-";
                }

                document.querySelectorAll(".page").forEach(p => p.classList.remove("active"));
                const targetPage = document.getElementById("page" + n);
                if (targetPage) targetPage.classList.add("active");

                document.querySelectorAll(".step").forEach(s => s.classList.remove("active"));
                const targetStep = document.getElementById("s" + n);
                if (targetStep) targetStep.classList.add("active");

                updateTotals();
            }

            function selectShipping(el, type){
                document.querySelectorAll("#page2 .pay-box").forEach(p => p.classList.remove("active"));
                el.classList.add("active");

                selectedShippingType = type;
                shippingCost = shippingOptions[type].cost;

                const feeSummary = document.getElementById("shippingFeeSummary");
                const etaSummary = document.getElementById("shippingEtaSummary");
                if (feeSummary) feeSummary.innerText = rupiah(shippingCost);
                if (etaSummary) etaSummary.innerText = shippingOptions[type].eta;

                updateTotals();
            }

            function pay(el){
                document.querySelectorAll(".pay-box").forEach(p => p.classList.remove("active"));
                el.classList.add("active");
            }

            function updateTotals(){
                let subtotal = 0;

                cart.forEach(v => {
                    let cleanPrice = typeof v.price === 'string' ? parseInt(v.price.replace(/[^0-9]/g, '')) : v.price;
                    if (!isNaN(cleanPrice)) {
                        subtotal += cleanPrice * v.qty;
                    }
                });

                let currentShipping = (cart.length === 0 || currentPage === 1) ? 0 : shippingCost;
                let grand = subtotal + currentShipping;

                const total2Element = document.getElementById("total2");
                if (total2Element) total2Element.innerText = rupiah(subtotal);
                
                const grandElement = document.getElementById("grand");
                if (grandElement) grandElement.innerText = rupiah(grand);
                
                const grand2Element = document.getElementById("grand2");
                if (grand2Element) grand2Element.innerText = rupiah(grand);

                const totalSidebarElement = document.getElementById("totalSidebar");
                if (totalSidebarElement) totalSidebarElement.innerText = rupiah(subtotal);
                
                const grandSidebarElement = document.getElementById("grandSidebar");
                if (grandSidebarElement) grandSidebarElement.innerText = rupiah(grand);
                
                const shippingFeeElement = document.getElementById("shippingFee");
                if (shippingFeeElement) shippingFeeElement.innerText = rupiah(currentShipping);
                
                let sidebarShippingRow = document.getElementById("sidebarShippingRow");
                let sidebarShippingFee = document.getElementById("sidebarShippingFee");
                
                if (currentPage > 1 && cart.length > 0 && selectedShippingType !== null) {
                    if (sidebarShippingRow) sidebarShippingRow.style.display = "flex";
                    if (sidebarShippingFee) sidebarShippingFee.innerText = rupiah(currentShipping);
                } else {
                    if (sidebarShippingRow) sidebarShippingRow.style.display = "none";
                }
            }

            function selectPayment(el, type){
                document.querySelectorAll("#page3 .pay-box").forEach(p => p.classList.remove("active"));
                el.classList.add("active");

                currentOrder.paymentMethod = type; 

                const result = generateVA(type);
                currentOrder.orderId = result.orderId;
                currentOrder.vaNumber = result.vaNumber;

                showPaymentInfo();
                showPaymentInstructions(type);
                showQRIS();
            }

            function showPaymentInstructions(type){
                const data = paymentMethods[type];
                let box = document.getElementById("paymentInstructionsBox");

                if(!box){
                    box = document.createElement("div");
                    box.id = "paymentInstructionsBox";
                    box.style = `
                        margin-top:15px;
                        padding:12px;
                        border-radius:12px;
                        background:#fff3f7;
                        font-size:13px;
                        color:#444;
                        border:1px solid #ffd1dc;
                    `;
                    const page3Element = document.getElementById("page3");
                    if (page3Element) page3Element.appendChild(box);
                }

                box.innerHTML = `
                    <b>${data.name}</b><br>
                    <div style="margin-top:6px">${data.instructions}</div>
                `;
            }

            function generateVA(method){
                const orderId = "KNL" + Date.now();
                const prefix = { bca: "014", bri: "002", bni: "009", qris: "000", dana: "000" };
                return {
                    orderId,
                    vaNumber: (prefix[method] || "000") + orderId
                };
            }

            function showPaymentInfo(){
                let box = document.getElementById("paymentInfo");

                if(!box){
                    box = document.createElement("div");
                    box.id = "paymentInfo";
                    box.style = `
                        margin-top:15px;
                        padding:15px;
                        border-radius:12px;
                        background:#fff3f7;
                        border:1px solid #ffd1dc;
                        font-size:13px;
                    `;
                    const page3Element = document.getElementById("page3");
                    if (page3Element) page3Element.appendChild(box);
                }

                let bankName = currentOrder.paymentMethod.toUpperCase();
                box.innerHTML = `
                    <b>Order ID:</b> ${currentOrder.orderId}<br><br>
                    <b>Virtual Account / No. Tujuan:</b><br>
                    ${bankName} - ${currentOrder.vaNumber}<br><br>
                    <small>Silakan transfer sesuai nominal total checkout</small>
                `;
            }

            function generateQRIS(){
                const total = calculateTotal();
                currentOrder.total = total;
                currentOrder.qrImage = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" + encodeURIComponent("KANOLA|" + currentOrder.orderId + "|" + total);
            }

            function calculateTotal(){
                let subtotal = 0;
                cart.forEach(v => {
                    let cleanPrice = typeof v.price === 'string' ? parseInt(v.price.replace(/[^0-9]/g, '')) : v.price;
                    if (!isNaN(cleanPrice)) subtotal += cleanPrice * v.qty;
                });
                return subtotal + shippingCost;
            }

            function showQRIS(){
                const qrisBoxElement = document.getElementById("qrisBox");
                if(!qrisBoxElement) return;

                if(currentOrder.paymentMethod !== "qris") {
                    qrisBoxElement.innerHTML = "";
                    return;
                }

                generateQRIS();
                qrisBoxElement.innerHTML = `
                    <div style="margin-top:15px;text-align:center;padding:15px;border:1px solid #eee;border-radius:12px;background:#fff;">
                        <img src="${currentOrder.qrImage}" width="180">
                        <p style="font-size:12px;color:#777;margin-top:10px">Scan QR untuk pembayaran</p>
                    </div>
                `;
            }

            function saveProof(input){
                const file = input.files[0];
                currentOrder.proof = file;
                alert("Bukti transfer tersimpan (demo)");
            }

            function sendInvoice(){
                const emailInput = document.querySelector('input[type="email"]');
                const email = emailInput ? emailInput.value : "customer@example.com";
                const totalValue = calculateTotal();
                currentOrder.total = totalValue;

                const invoice = `
                    <b>Kanola Skincare</b><br><br>
                    <b>Order ID:</b> ${currentOrder.orderId || "KNL-" + Date.now()}<br>
                    <b>Payment Method:</b> ${currentOrder.paymentMethod.toUpperCase()}<br>
                    <b>Virtual Account:</b> ${currentOrder.vaNumber || "-"}<br>
                    <b>Total:</b> ${rupiah(currentOrder.total)}<br><br>
                    <b>Status:</b> Pending Payment<br>
                    <b>Email:</b> ${email}
                `;

                const preview = document.getElementById("invoicePreview");
                const modal = document.getElementById("emailModalBox");
                if (preview) preview.innerHTML = invoice;
                if (modal) modal.classList.add("show");
            }

            async function handlePlaceOrder() {
                const fullName = document.querySelector('input[placeholder="Full Name"]').value;
                if (!fullName) {
                    alert("Silakan masukkan Nama Lengkap Anda.");
                    return;
                }
                if (!selectedShippingType) {
                    alert("Silakan pilih metode pengiriman terlebih dahulu.");
                    return;
                }
                if (!currentOrder.paymentMethod) {
                    alert("Silakan pilih metode pembayaran terlebih dahulu.");
                    return;
                }

                const formattedProducts = cart.map(item => ({
                    name: item.name,
                    price: typeof item.price === 'string' ? parseInt(item.price.replace(/[^0-9]/g, '')) : item.price,
                    qty: item.qty,
                    subtotal: (typeof item.price === 'string' ? parseInt(item.price.replace(/[^0-9]/g, '')) : item.price) * item.qty
                }));

                const payload = {
                    customer_name: fullName,
                    payment_method: currentOrder.paymentMethod,
                    shipping_method: selectedShippingType,
                    total: calculateTotal(),
                    products: JSON.stringify(formattedProducts),
                    _token: "{{ csrf_token() }}"
                };

                try {
                    const response = await fetch("{{ route('frontend.v1.checkout.process') }}", {
                        method: "POST",
                        headers: { 
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify(payload)
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.message || "Terjadi kesalahan saat memproses pesanan.");
                    }

                    if (data.success) {
                        localStorage.removeItem("cart");
                        sendInvoice();
                        next(4);
                    }
                } catch (error) {
                    alert(error.message);
                }
            }

            function closeEmailModal(){
                const modal = document.getElementById("emailModalBox");
                if (modal) modal.classList.remove("show");
            }

            function resetAndRedirect(url) {
                localStorage.removeItem("cart");
                window.location.href = url;
            }

            document.addEventListener('DOMContentLoaded', function() {
                cart = JSON.parse(localStorage.getItem("cart")) || [];
                render();
                updateTotals();

                const emailModal = document.getElementById("emailModalBox");
                if (emailModal) {
                    emailModal.addEventListener("click", function(e){
                        if(e.target === this){
                            closeEmailModal();
                        }
                    });
                }
            });
        </script>
        <div id="emailModalBox" class="modal-email">

            <div class="modal-content-email">

                <h2>📧 Invoice Terkirim</h2>

                <p class="sub">
                    Invoice pembelian kamu sudah dibuat dan dikirim (simulasi).
                </p>

                <div class="invoice-box" id="invoicePreview">
                </div>

                <button class="close-email" onclick="closeEmailModal()">
                    Tutup
                </button>

            </div>

        </div>

</body>
</html>