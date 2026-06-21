<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products | Kanola Skincare</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}
body{
    background:linear-gradient(
        135deg,
        #FFF8FA,
        #FFF4F6,
        #FFFDFD
    );
    color:#4A3F3F;
    overflow-x:hidden;
    animation:fadeIn 1s ease;
}
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
.navbar{
    width:100%;
    padding:25px 8%;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.logo h1{
    font-family:'Playfair Display',serif;
    color:#D88C9A;
}
.nav-links{
    display:flex;
    gap:30px;
}
.nav-links a{
    text-decoration:none;
    color:#4A3F3F;
    font-weight:500;
    position:relative;
    transition:.3s;
}
.nav-links a::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-6px;
    width:0;
    height:2px;
    background:#D88C9A;
    transition:.3s;
}
.nav-links a:hover::after{width:100%;}
.nav-links a:hover{color:#D88C9A;}
.hero{
    width:100%;
    min-height:80vh;
    padding:50px 8%;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:50px;
}
.hero-text{flex:1;}
.hero-text p:first-child{
    color:#D88C9A;
    letter-spacing:2px;
    font-size:13px;
    margin-bottom:15px;
}
.hero-text h1{
    font-family:'Playfair Display',serif;
    font-size:70px;
    line-height:1.1;
    margin-bottom:20px;
}
.hero-text h1 span{color:#D88C9A;}
.hero-text p{
    color:#777;
    line-height:1.8;
}
.hero-image{flex:1; text-align:center;}
.hero-image img{
    width:100%;
    max-width:500px;
    animation:floatImage 4s ease-in-out infinite;
    border-radius: 25px;
}
@keyframes floatImage{
    0%{transform:translateY(0);}
    50%{transform:translateY(-15px);}
    100%{transform:translateY(0);}
}
.section-title{
    text-align:center;
    margin-bottom:40px;
}
.section-title h2{
    font-size:45px;
    font-family:'Playfair Display',serif;
    color:#D88C9A;
}
.section-title p{color:#777;}
.products-section{
width:84%;
margin:80px auto;
}
.products{
display:grid;
grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}
.product-card{
background:white;
border-radius:25px;
overflow:hidden;
text-align:center;
box-shadow: 0 10px 30px rgba(0,0,0,.05);
transition:.4s;
cursor:pointer;
}
.product-card:hover{
transform:translateY(-10px);
box-shadow: 0 20px 40px rgba(216,140,154,.18);
}
.product-card img{
width:100%;
height:220px;
object-fit:contain;
}
.product-card:hover img{transform:scale(1.05);}
.product-card h3{padding:20px 20px 10px; font-size:18px;}
.product-card span{
    display:block;
    color:#D88C9A;
    font-weight:600;
    padding-bottom:25px;
}
.features{
width:84%;
margin:80px auto;
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
}
.feature-card{
background:white;
border-radius:20px;
padding:25px;
text-align:center;
box-shadow:0 5px 20px rgba(0,0,0,.05);
transition:.4s;
}
.feature-card:hover{
transform:translateY(-8px);
box-shadow: 0 15px 35px rgba(216,140,154,.18);
}
.feature-card i{font-size:35px; color:#D88C9A; margin-bottom:15px;}
.feature-card h3{color:#D88C9A; margin-bottom:10px;}
.feature-card p{color:#777;}
.best-seller{
width:84%;
margin:80px auto;
}
.best-content{
background:white;
border-radius:30px;
padding:50px;
display:flex;
align-items:center;
justify-content:space-between;
gap:50px;
box-shadow:0 10px 30px rgba(0,0,0,.05);
}
.best-text{flex:1;}
.best-text h2{
font-size:45px;
font-family:'Playfair Display',serif;
margin-bottom:20px;
}
.best-text span{color:#D88C9A;}
.best-text p{color:#777; line-height:1.8;}
.best-image{flex:1; text-align:center;}
.best-image img{width:100%; max-width:350px;}
.why-kanola{
width:84%;
margin:80px auto;
}
.why-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
}
.why-card{
background:white;
padding:30px;
border-radius:25px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,.05);
transition:.4s;
}
.why-card:hover{
transform:translateY(-10px);
box-shadow: 0 20px 40px rgba(216,140,154,.18);
}
.why-card i{font-size:40px; color:#D88C9A; margin-bottom:20px;}
.why-card h3{color:#D88C9A; margin-bottom:15px;}
.why-card p{color:#777; line-height:1.8;}
.product-modal{
position:fixed;
top:0; left:0;
width:100%; height:100%;
background:rgba(0,0,0,.45);
backdrop-filter:blur(5px);
display:none;
justify-content:center;
align-items:center;
z-index:9999;
}
.modal-content{
width:90%; max-width:650px;
background:white;
border-radius:30px;
padding:35px;
position:relative;
animation:modalShow .4s ease;
}
@keyframes modalShow{
from{opacity:0; transform:translateY(30px);}
to{opacity:1; transform:translateY(0);}
}
.close-btn{
position:absolute;
top:20px; right:25px;
font-size:30px;
cursor:pointer;
color:#D88C9A;
}
.modal-content h2{
color:#D88C9A;
margin-bottom:25px;
font-family:'Playfair Display',serif;
}
.modal-section h3{color:#D88C9A; margin-bottom:10px;}
.modal-section p{color:#777; line-height:1.8;}
.divider{
width:100%; height:1px;
background:#F2D5DC;
margin:20px 0;
}
@media(max-width:992px){
.features{grid-template-columns:repeat(2,1fr);}
.why-grid{grid-template-columns:repeat(2,1fr);}
.best-content{flex-direction:column;}
}
@media(max-width:768px){
.nav-links{display:none;}
.hero{flex-direction:column; text-align:center;}
.hero-text h1{font-size:45px;}
.products{grid-template-columns:1fr;}
.features{grid-template-columns:1fr;}
.why-grid{grid-template-columns:1fr;}
.newsletter form{flex-direction:column;}
.newsletter input{width:100%;}
}
.newsletter{
width:84%;
margin:80px auto;
background:#FFF0F3;
border-radius:30px;
padding:50px;
text-align:center;
}
.newsletter h2{
font-family:'Playfair Display',serif;
margin-bottom:15px;
color:#D88C9A;
}
.newsletter p{
color:#777;
margin-bottom:25px;
line-height:1.8;
}
.newsletter form{
display:flex;
justify-content:center;
gap:10px;
}
.newsletter input{
width:350px;
padding:15px;
border:none;
border-radius:40px;
outline:none;
}
.newsletter button{
padding:15px 30px;
border:none;
border-radius:40px;
background:#D88C9A;
color:white;
cursor:pointer;
font-weight:600;
transition:.3s;
}
.newsletter button:hover{
background:#c97b89;
transform:translateY(-3px);
}
footer{
margin-top:60px;
padding:30px;
text-align:center;
color:#888;
}
.cart-icon{
    position:fixed;
    top:20px;
    left:20px;
    width:50px;
    height:50px;
    background:white;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
    cursor:pointer;
    z-index:9999;
    transition:.3s;
}
.cart-icon i{
    color:#D88C9A;
    font-size:18px;
}
.cart-icon:hover{transform:scale(1.1);}
.cart-icon span{
    position:absolute;
    top:-5px;
    right:-5px;
    background:#D88C9A;
    color:white;
    font-size:12px;
    width:20px;
    height:20px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}
.modal-cart-action-btn {
    padding: 12px 25px;
    background: #D88C9A;
    color: white;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-weight: 600;
    transition: .3s;
}
.modal-cart-action-btn:hover {
    background: #c97b89;
}
</style>
</head>

<body>
<nav class="navbar">
    <div class="logo">
        <h1>KANOLA</h1>
    </div>
    <div class="nav-links">
        <a href="{{ route('frontend.v1.index') }}">Home</a>
        <a href="{{ route('frontend.v1.ingredients') }}">Ingredients</a>
        <a href="{{ route('frontend.v1.products') }}">Products</a>
        <a href="{{ route('frontend.v1.about') }}">About</a>
        <a href="{{ route('frontend.v1.contact') }}">Contact</a>
        <a href="{{ route('frontend.v1.results') }}">Results</a>
        <a href="{{ route('frontend.v1.blog') }}">Blog</a>
    </div>
</nav>

<div class="cart-icon" onclick="goCart()">
    <i class="fa-solid fa-cart-shopping"></i>
    <span id="cartCount">0</span>
</div>

<section class="hero">
    <div class="hero-text">
        <p>PREMIUM SKINCARE COLLECTION</p>
        <h1>Discover Your <span>Perfect Skin</span></h1>
        <p>
            Explore Kanola's skincare collection,
            carefully formulated with premium ingredients
            to nourish, hydrate and protect your skin.
        </p>
    </div>
    <div class="hero-image">
        <img src="{{ asset('assets/img/18ec5c5f-8bc4-451b-91fb-d7db3c5b0964.jpeg') }}" alt="Women Picture">
    </div>
</section>

<section class="products-section">
    <div class="section-title">
        <h2>Featured Products</h2>
        <p>Discover our premium skincare collection</p>
    </div>

    <div class="products">
        @foreach($products as $product)
            @php
                $benefits = str_replace(["'", "\r", "\n"], ["\'", "", ""], $product->benefits ?? 'Manfaat belum diisi.');
                $ingredients = str_replace(["'", "\r", "\n"], ["\'", "", ""], $product->ingredients ?? 'Kandungan belum diisi.');
                $usage = str_replace(["'", "\r", "\n"], ["\'", "", ""], $product->how_to_use ?? 'Cara pakai belum diisi.');
            @endphp

            <div class="product-card" onclick="openModal('{{ $product->name }}', '{{ $benefits }}', '{{ $ingredients }}', '{{ $usage }}', {{ $product->price }}, {{ $product->stock }})">
                
                @if($product->image)
                    @if(file_exists(public_path('assets/img/'.$product->image)))
                        <img src="{{ asset('assets/img/'.$product->image) }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    @endif
                @else
                    <img src="{{ asset('assets/img/sampleproduk.jpg') }}" alt="No Image">
                @endif

                <h3>{{ $product->name }}</h3>
                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>
        @endforeach
    </div>
</section>

<section>
    <div class="section-title">
        <h2>Shop By Category</h2>
        <p>Find products that fit your skincare needs</p>
    </div>
    <div class="features">
        <div class="feature-card">
            <i class="fa-solid fa-droplet"></i>
            <h3>Serum</h3>
            <p>Intensive treatment for hydration and brightening.</p>
        </div>
        <div class="feature-card">
            <i class="fa-solid fa-pump-soap"></i>
            <h3>Cleanser</h3>
            <p>Gentle cleansing without stripping moisture.</p>
        </div>
        <div class="feature-card">
            <i class="fa-solid fa-flask"></i>
            <h3>Treatment</h3>
            <p>Targeted solutions for acne and skin concerns.</p>
        </div>
        <div class="feature-card">
            <i class="fa-solid fa-jar"></i>
            <h3>Moisturizer</h3>
            <p>Deep nourishment and long-lasting hydration.</p>
        </div>
    </div>
</section>      

<section class="best-seller">
    <div class="best-content">
        <div class="best-text">
            <h2>Best Seller <span>Glow Hydra Serum</span></h2>
            <p>Formulated with Niacinamide and Hyaluronic Acid to help brighten, hydrate, and strengthen the skin barrier.</p>
        </div>
        <div class="best-image">
            <img src="{{ asset('assets/img/WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg') }}" alt="Glow Hydra Serum">
        </div>
    </div>
</section>

<section class="why-kanola">
    <div class="section-title">
        <h2>Why Choose Kanola</h2>
        <p>Skincare designed with quality, safety, and effectiveness in mind.</p>
    </div>
    <div class="why-grid">
        <div class="why-card">
            <i class="fa-solid fa-shield-heart"></i>
            <h3>Dermatologically Tested</h3>
            <p>Carefully formulated and tested to ensure safety and comfort for daily use.</p>
        </div>
        <div class="why-card">
            <i class="fa-solid fa-leaf"></i>
            <h3>Natural Ingredients</h3>
            <p>Enriched with botanical extracts and active ingredients that nourish the skin.</p>
        </div>
        <div class="why-card">
            <i class="fa-solid fa-flask"></i>
            <h3>Science Backed</h3>
            <p>Every formula is developed using research-driven skincare technology.</p>
        </div>
        <div class="why-card">
            <i class="fa-solid fa-heart"></i>
            <h3>Suitable For All Skin Types</h3>
            <p>Designed to work effectively on dry, oily, combination, and sensitive skin.</p>
        </div>
    </div>
</section>

<section class="newsletter">
    <h2>Stay Updated</h2>
    <p>Subscribe to receive skincare tips, product launches, and exclusive offers from Kanola Skincare.</p>
    <form>
        <input type="email" placeholder="Enter your email address">
        <button>Subscribe</button>
    </form>
</section>

<div class="product-modal" id="productModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle"></h2>
        <p id="modalPrice" style="color:#D88C9A;font-weight:600;margin-bottom:15px;"></p>
        <p id="modalStock" style="display:inline-block;padding:6px 12px;border-radius:20px;background:#FFF0F3;color:#D88C9A;font-size:13px;margin-bottom:15px;"></p>
        
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin:15px 0;">
            <button class="modal-cart-action-btn" onclick="handleAddToCart()">Tambah ke Keranjang</button>
            <a id="waBtn" target="_blank" style="padding:12px 20px; background:#25D366; color:white; border-radius:30px; text-decoration:none; display:flex; align-items:center; gap:8px;">
                <i class="fa-brands fa-whatsapp"></i> Chat Admin
            </a>
        </div>
        
        <div class="modal-section">
            <h3>Benefits</h3>
            <p id="modalBenefits"></p>
        </div>
        <div class="divider"></div>
        <div class="modal-section">
            <h3>Ingredients</h3>
            <p id="modalIngredients"></p>
        </div>
        <div class="divider"></div>
        <div class="modal-section">
            <h3>How To Use</h3>
            <p id="modalUsage"></p>
        </div>
    </div>
</div>

<footer>
    <p>© 2026 Kanola Skincare. All Rights Reserved.</p>
</footer>

<div class="background-bubbles">
    <div class="bubble bubble1"></div>
    <div class="bubble bubble2"></div>
    <div class="bubble bubble3"></div>
    <div class="bubble bubble4"></div>
    <div class="bubble bubble5"></div>
</div>

<script>
    let selectedProduct = {}; 

    function openModal(title, benefits, ingredients, usage, price, stock) {
        selectedProduct = { name: title, price: price };

        const message = `
        Halo Admin Kanola Skincare!
        
        
        Aku lagi tertarik untuk mencoba produk *${title}* nih. Sebelum membeli, aku ingin bertanya beberapa hal terkait produknya. Boleh dibantu informasinya yaa?

        ❤️ Harga produk
        ❤️ Ketersediaan stok saat ini
        ❤️ Manfaat yang bisa didapatkan
        ❤️ Kandungan utama
        ❤️ Cocok untuk jenis kulit apa saja
        ❤️ Cara penggunaan yang benar
        ❤️ Ukuran dan isi produk
        ❤️ Apakah produk dapat digunakan bersamaan dengan skincare lain
        ❤️ Informasi penting lainnya

        Terima kasih banyak atas bantuannya ya, Admin. Aku tunggu balasannyaa!`;

        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalBenefits').innerText = benefits;
        document.getElementById('modalIngredients').innerText = ingredients;
        document.getElementById('modalUsage').innerText = usage;
        document.getElementById('modalPrice').innerText = "Rp " + price.toLocaleString("id-ID");
        document.getElementById('modalStock').innerText = stock > 0 ? "Stock tersedia: " + stock : "Stok habis";
        
        document.getElementById('waBtn').href = "https://wa.me/6285715117841?text=" + encodeURIComponent(message);
        
        document.getElementById('productModal').style.display = "flex";
    }

    function closeModal() {
        document.getElementById('productModal').style.display = "none";
    }

    function handleAddToCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let existing = cart.find(item => item.name === selectedProduct.name);
        if (existing) {
            existing.qty += 1;
        } else {
            cart.push({ name: selectedProduct.name, price: selectedProduct.price, qty: 1 });
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartUI();
        closeModal();
        alert(selectedProduct.name + " ditambahkan ke keranjang!");
    }

    function updateCartUI() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let totalQty = cart.reduce((sum, item) => sum + (item.qty || 0), 0);
        const cartCountElement = document.getElementById("cartCount");
        if (cartCountElement) {
            cartCountElement.innerText = totalQty;
        }
    }

    function goCart() {
        window.location.href = "{{ route('frontend.v1.checkout') }}";
    }

    window.onclick = function(event) {
        const modal = document.getElementById('productModal');
        if (event.target === modal) closeModal();
    }

    document.addEventListener('DOMContentLoaded', updateCartUI);
</script>
</body>
</html>