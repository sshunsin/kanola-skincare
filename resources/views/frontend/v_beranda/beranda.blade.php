<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kanola Skincare</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}
html{
    scroll-behavior:smooth;
}
body{
background:linear-gradient(
    135deg,
    #FFF8FA,
    #FFF4F6,
    #FFFDFD
);
color:#4A3F3F;
animation:fadeIn 1s ease;
overflow-x:hidden;
}
body::before{
content:'';
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:
radial-gradient(
    circle at 20% 20%,
    rgba(255,255,255,.4),
    transparent 40%
),
radial-gradient(
    circle at 80% 80%,
    rgba(255,255,255,.3),
    transparent 40%
);
pointer-events:none;
z-index:-1;
}
@keyframes fadeIn{
from{
    opacity:0;
    transform:translateY(20px);
}
to{
    opacity:1;
    transform:translateY(0);
}
}
.navbar{
    width:100%;
    padding:25px 8%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:#FDF8F6;
}
.logo h1{
    font-family:'Playfair Display',serif;
    font-size:32px;
    color:#D88C9A;
}
.logo span{
    font-size:11px;
    letter-spacing:4px;
    color:#999;
}
.nav-links{
    display:flex;
    gap:40px;
}
.nav-links a{
    text-decoration:none;
    color:#4A3F3F;
    font-weight:500;
    position:relative;
    transition:all .3s ease;
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
.nav-links a:hover::after{
    width:100%;
}
.nav-links a:hover{
    color:#D88C9A;
}
.icons{
    display:flex;
    gap:20px;
    font-size:22px;
    cursor:pointer;
}
.hero{
    width:100%;
    padding:50px 8%;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:50px;
}
.hero-text{
    flex:1;
}
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
.hero-text h1 span{
    color:#D88C9A;
}
.hero-text p{
    color:#777;
    line-height:1.8;
    margin-bottom:30px;
}
.buttons{
    display:flex;
    gap:15px;
}
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 28px;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    outline: none;
}

.btn-primary {
    background: linear-gradient(135deg, #ff7aa2, #ff4f86);
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(255, 122, 162, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(255, 122, 162, 0.45);
    background: linear-gradient(135deg, #ff4f86, #ff7aa2);
}

.btn-primary:active {
    transform: translateY(0);
}

.cart-btn{
    transition:.4s;
}
.cart-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(216,140,154,.35);
}
.btn-secondary{
    background:white;
    color:#D88C9A;
    border:1px solid #D88C9A;
}
.hero-image{
    flex:1;
    text-align:center;
}
.hero-image img{
    width:100%;
    max-width:500px;
    animation:float 4s ease-in-out infinite;
    border-radius: 25px;
}
@keyframes float{
0%{
    transform:translateY(0);
}
50%{
    transform:translateY(-15px);
}
100%{
    transform:translateY(0);
}
}
.features{
    width:84%;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:80px;
}
.feature-card{
    background:white;
    border-radius:20px;
    padding:25px;
    text-align:center;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    transition:.4s;
}
.feature-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.08);
}
.feature-card h3{
    margin-bottom:10px;
    color:#D88C9A;
}
.section-title{
    text-align:center;
    margin-bottom:40px;
}
.section-title h2{
    font-family:'Playfair Display',serif;
    font-size:45px;
}
.products{
    width:84%;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;
    margin-bottom:80px;
}
.product-card{
    background:white;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:all .4s ease;
}
.product-card:hover{
    transform:translateY(-12px);
    box-shadow:0 20px 40px rgba(216,140,154,.2);
}
.product-image{
    padding:25px;
    background:#FFF6F7;
    overflow:hidden;
}
.product-image img{
    width:100%;
    height:250px;
    object-fit:contain;
    transition:transform .5s ease;
}
.product-card:hover .product-image img{
    transform:scale(1.08);
}
.product-content{
    padding:20px;
    text-align:center;
}
.product-content h3{
    margin-bottom:10px;
}
.price{
    color:#D88C9A;
    font-size:22px;
    font-weight:700;
    margin-bottom:20px;
}
.profile-menu-container {
    position: relative;
    display: inline-block;
}
.profile-dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    background-color: #ffffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 4px;
    padding: 8px 0;
}
.profile-dropdown-menu a, 
.profile-dropdown-menu button {
    color: #333333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    width: 100%;
    text-align: left;
    background: none;
    border: none;
}
.profile-menu-container:hover .profile-dropdown-menu {
    display: block;
}
.cart-btn{
    width:100%;
    padding:14px;
    border:none;
    background:#D88C9A;
    color:white;
    border-radius:40px;
    cursor:pointer;
    font-weight:600;
}
.results{
    width:84%;
    margin:80px auto;
    background:white;
    border-radius:30px;
    padding:50px;
    display:flex;
    align-items:center;
    gap:50px;
}
.results-text{
    flex:1;
}
.results-text h2{
    font-family:'Playfair Display',serif;
    font-size:45px;
    margin-bottom:15px;
}
.results-text span{
    color:#D88C9A;
}
.results-image{
    flex:1;
    display:flex;
    gap:15px;
}
.results-image img{
    width:50%;
    border-radius:20px;
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
}
.newsletter p{
    color:#777;
    margin-bottom:25px;
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
}
.newsletter button{
    padding:15px 30px;
    border:none;
    border-radius:40px;
    background:#D88C9A;
    color:white;
    cursor:pointer;
}
footer{
    margin-top:60px;
    padding:30px;
    text-align:center;
    color:#888;
}
.background-bubbles{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
overflow:hidden;
z-index:-1;
pointer-events:none;
}
.bubble{
position:absolute;
border-radius:50%;
filter:blur(80px);
opacity:.5;
}
.bubble1{
width:300px;
height:300px;
background:#FFD6E0;
top:10%;
left:5%;
animation:floatBubble1 18s infinite alternate ease-in-out;
}
.bubble2{
width:400px;
height:400px;
background:#FFE8EF;
top:40%;
right:10%;
animation:floatBubble2 22s infinite alternate ease-in-out;
}
.bubble3{
width:250px;
height:250px;
background:#F9C5D1;
bottom:5%;
left:20%;
animation:floatBubble3 16s infinite alternate ease-in-out;
}
.bubble4{
width:350px;
height:350px;
background:#FEEBF1;
top:20%;
right:35%;
animation:floatBubble4 20s infinite alternate ease-in-out;
}
.bubble5{
width:280px;
height:280px;
background:#FFDCE7;
bottom:10%;
right:25%;
animation:floatBubble5 24s infinite alternate ease-in-out;
}
@keyframes floatBubble1{
from{transform:translate(0,0);}
to{transform:translate(100px,80px);}
}
@keyframes floatBubble2{
from{transform:translate(0,0);}
to{transform:translate(-120px,-60px);}
}
@keyframes floatBubble3{
from{transform:translate(0,0);}
to{transform:translate(80px,-100px);}
}
@keyframes floatBubble4{
from{transform:translate(0,0);}
to{transform:translate(-80px,100px);}
}
@keyframes floatBubble5{
from{transform:translate(0,0);}
to{transform:translate(120px,-70px);}
}
@media(max-width:992px){
.hero{flex-direction:column;}
.features{grid-template-columns:repeat(2,1fr);}
.products{grid-template-columns:repeat(2,1fr);}
.results{flex-direction:column;}
}
@media(max-width:768px){
.nav-links{display:none;}
.features{grid-template-columns:1fr;}
.products{grid-template-columns:1fr;}
.hero-text h1{font-size:45px;}
.newsletter form{flex-direction:column;}
.newsletter input{width:100%;}
}
.icons{
    display:flex;
    align-items:center;
    gap:25px;
}
.icons a{
    text-decoration:none;
    color:#4A3F3F;
    font-size:20px;
    transition:.3s;
}
.icons a:hover{
    color:#D88C9A;
}
.products-section{
    width:84%;
    margin:80px auto;
}
.section-title{
    text-align:center;
    margin-bottom:40px;
}
.section-title h2{
    font-size:42px;
    color:#D88C9A;
    font-family:'Playfair Display', serif;
}
.section-title p{
    color:#888;
}
.products{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
}
.product-card{
    background:white;
    border-radius:25px;
    padding:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    cursor:pointer;
    transition:.4s;
}
.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(216,140,154,.2);
}
.product-card img{
    width:100%;
    height:220px;
    object-fit:contain;
    margin-bottom:15px;
    transition:.4s;
    border-radius: 25px;
}
.product-card:hover img{
    transform:scale(1.05);
}
.product-card h3{
    color:#4A3F3F;
    margin-bottom:8px;
}
.product-card span{
    color:#D88C9A;
    font-weight:600;
}
.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.4);
    z-index:999;
    animation:fadeIn .3s;
}
.modal-content{
    background:white;
    width:90%;
    max-width:650px;
    margin:70px auto;
    padding:35px;
    border-radius:25px;
    position:relative;
    animation:slideUp .4s;
}
.close-btn{
    position:absolute;
    top:15px;
    right:20px;
    font-size:30px;
    cursor:pointer;
    color:#D88C9A;
}
.modal-content h2{
    color:#D88C9A;
    margin-bottom:10px;
    font-family:'Playfair Display', serif;
}
.modal-price{
    font-size:24px;
    font-weight:bold;
    color:#4A3F3F;
    margin-bottom:20px;
}
.info-block:first-child{
    border-top:none;
    padding-top:0;
}
.info-block{
margin-top:20px;
padding-top:20px;
border-top:1px solid #F0E0E3;
}
.info-block h4{
color:#D88C9A;
margin-bottom:10px;
display:flex;
align-items:center;
gap:8px;
font-size:16px;
}
.info-block h4 i{
font-size:14px;
}
.info-block p{
    color:#666;
    line-height:1.8;
}
.cart-nav-item {
    position: relative;
    text-decoration: none;
    color: #4A3F3F;
}
.cart-nav-count {
    position: absolute;
    top: -10px;
    right: -10px;
    background: #D88C9A;
    color: white;
    font-size: 11px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}
.modal-action-btn {
    padding: 12px 25px;
    background: #D88C9A;
    color: white;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-weight: 600;
    margin-top: 15px;
    transition: .3s;
}
.modal-action-btn:hover {
    background: #c97b89;
}
@keyframes slideUp{
    from{
        transform:translateY(30px);
        opacity:0;
    }
    to{
        transform:translateY(0);
        opacity:1;
    }
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.2s ease-out forwards;
}
</style>
</head>

<body>
  <div class="background-bubbles">
    <span class="bubble bubble1"></span>
    <span class="bubble bubble2"></span>
    <span class="bubble bubble3"></span>
    <span class="bubble bubble4"></span>
    <span class="bubble bubble5"></span>
</div>

<nav class="navbar">
<div class="logo">
<h1>KANOLA</h1>
<span>SKINCARE</span>
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

<div class="icons">
@if(Auth::guard('customer')->check())
    <div class="profile-menu-container">
        <a href="{{ route('frontend.v1.profile.edit') }}" class="profile-icon-link">
            <i class="fa-regular fa-user"></i>
        </a>
        <div class="profile-dropdown-menu absolute right-0 mt-2 w-52 bg-white border border-rose-100 rounded-2xl shadow-xl py-1.5 z-50">
            <a href="{{ route('frontend.v1.profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-rose-50 hover:text-rose-500 transition-colors duration-200 font-medium">
                <i class="fa-solid fa-user-gear text-base style="color: #D88C9A;"></i>
                <span>Pengaturan Profil</span>
            </a>
            <hr class="my-1 border-rose-100">
            <form action="{{ route('logout.customer') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors duration-200 font-medium text-left">
                    <i class="fa-solid fa-right-from-bracket text-base"></i>
                    <span>Keluar Akun</span>
                </button>
            </form>
        </div>
    </div>
@else
    <a href="{{ route('frontend.v1.login') }}" class="login-navigation-link">Login</a>
    <a href="{{ route('frontend.v1.signup') }}" class="signup-navigation-link">Sign Up</a>
@endif
  
  {{-- <a href="{{ route('frontend.v1.checkout') }}" class="cart-nav-item">
      <i class="fa-solid fa-bag-shopping"></i>
      <span id="cartCount" class="cart-nav-count">0</span>
  </a> --}}
  </div>
</nav>

<section class="hero">
<div class="hero-text">
<p>RADIANT SKIN. REAL CONFIDENCE.</p>
<h1>
<span>Glow Beyond</span><br>
The Surface
</h1>
<p>
Scientifically proven skincare that nourishes,
renews, and reveals your natural glow.
</p>
<div class="buttons">
<a href="{{ route('frontend.v1.products') }}">
    <button type="button" class="btn btn-primary">SHOP NOW</button>
</a>
<a href="{{ route('frontend.v1.blog') }}">
    <button class="btn btn-secondary">LEARN MORE</button>
</a>
</div>
</div>
<div class="hero-image">
<img src="{{ asset('assets/img/Locally made and glow inducing!_The post Get your….jpeg') }}" alt="Kanola Skincare">
</div>
</section>

{{-- <section class="features">
<div class="feature-card">
<h3>Brightens Skin</h3>
<p>Enhances natural glow and radiance.</p>
</div>
<div class="feature-card">
<h3>Deep Hydration</h3>
<p>Locks moisture for soft skin.</p>
</div>
<div class="feature-card">
<h3>Skin Barrier</h3>
<p>Protects and restores skin.</p>
</div>
<div class="feature-card">
<h3>Natural & Safe</h3>
<p>Clean and effective formulas.</p>
</div>
</section> --}}

{{-- <section class="products-section">
  <div class="section-title">
      <h2>Our Products</h2>
      <p>Click on a product to see more details</p>
  </div>

  <div class="products">
      <div class="product-card"
          onclick="openModal(
          'Glow Serum',
          149000,
          'Mencerahkan kulit, menyamarkan noda hitam, menjaga kelembapan.',
          'Niacinamide, Vitamin C, Hyaluronic Acid.',
          'Gunakan 2-3 tetes setelah mencuci wajah.'
          )">
          <img src="{{ asset('assets/img/WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg') }}" alt="Glow Serum">
          <h3>Glow Serum</h3>
          <span>Rp149.000</span>
      </div>

      <div class="product-card"
          onclick="openModal(
          'Radiance Moisturizer',
          189000,
          'Mengunci kelembapan dan memperkuat skin barrier.',
          'Ceramide, Centella Asiatica, Hyaluronic Acid.',
          'Gunakan setelah serum pada pagi dan malam hari.'
          )">
          <img src="{{ asset('assets/img/WhatsApp Image 2025-06-17 at 08.59.37_b2adab46.jpg') }}" alt="Radiance Moisturizer">
          <h3>Radiance Moisturizer</h3>
          <span>Rp189.000</span>
      </div>

      <div class="product-card"
          onclick="openModal(
          'Face Cleanser',
          99000,
          'Membersihkan wajah tanpa membuat kulit kering.',
          'Tea Tree, Aloe Vera, Glycerin.',
          'Gunakan pagi dan malam hari.'
          )">
          <img src="{{ asset('assets/img/WhatsApp Image 2025-06-17 at 03.33.50_a879fc5f.jpg') }}" alt="Face Cleanser">
          <h3>Face Cleanser</h3>
          <span>Rp99.000</span>
      </div>

      <div class="product-card"
          onclick="openModal(
          'Hydrating Toner',
          129000,
          'Menyeimbangkan pH kulit dan memberikan hidrasi ekstra.',
          'Rose Water, Panthenol, Hyaluronic Acid.',
          'Gunakan setelah membersihkan wajah.'
          )">
          <img src="{{ asset('assets/img/hydra-mist.jpg') }}" alt="Hydrating Toner">
          <h3>Hydrating Toner</h3>
          <span>Rp129.000</span>
      </div>

      <div class="product-card"
          onclick="openModal(
          'Night Cream',
          219000,
          'Membantu regenerasi kulit selama tidur.',
          'Retinol, Ceramide, Peptide.',
          'Gunakan sebagai langkah terakhir skincare malam.'
          )">
          <img src="{{ asset('assets/img/tone-up.jpeg') }}" alt="Night Cream">
          <h3>Night Cream</h3>
          <span>Rp219.000</span>
      </div>
  </div>
</section>

<div id="productModal" class="modal">
  <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2 id="modalName"></h2>
      <div id="modalPrice" class="modal-price"></div>
      
      <div class="info-block">
        <h4><i class="fa-solid fa-sparkles"></i> Benefits</h4>
        <p id="modalBenefits"></p>
      </div>
    
      <div class="info-block">
        <h4><i class="fa-solid fa-flask"></i> Ingredients</h4>
        <p id="modalIngredients"></p>
      </div>
    
      <div class="info-block">
        <h4><i class="fa-solid fa-book-open"></i> How To Use</h4>
        <p id="modalUsage"></p>
      </div>

      <button class="modal-action-btn" onclick="handleAddToCart()">Tambah ke Keranjang</button>
  </div>
</div> --}}

<section class="results">
<div class="results-text">
<h2>
Real Results.<br>
<span>Visible Glow.</span>
</h2>
<p style="padding-bottom: 10px">
Our skincare works in harmony with your skin to
deliver proven results you can see and feel.
</p>
<button class="btn btn-primary">See More Results</button>
</div>
<div class="results-image">
<img src="{{ asset('assets/img/Photo young asian woman long hair with n….jpeg') }}" alt="Young Asian Woman 1">
<img src="{{ asset('assets/img/Remedi Whitening Cream.jpeg') }}" alt="Young Asian Woman 2">
</div>
</section>

<section class="newsletter">
<h2>Get 10% Off Your First Order</h2>
<p>Exclusive offers, skincare tips, and early access to new launches.</p>
<form>
<input type="email" placeholder="Enter your email address">
    <button>JOIN NOW</button>
</form>
</section>

<footer>
© 2026 Kanola Skincare. All Rights Reserved.
</footer>

<script src="https://unpkg.com/scrollreveal"></script>
<script>
ScrollReveal().reveal('.feature-card', {distance:'50px', duration:1000, interval:200, origin:'bottom'});
ScrollReveal().reveal('.product-card', {distance:'50px', duration:1000, interval:150, origin:'bottom'});
ScrollReveal().reveal('.results', {distance:'80px', duration:1200, origin:'left'});
ScrollReveal().reveal('.newsletter', {distance:'80px', duration:1200, origin:'bottom'});
</script>

<script>
  let selectedProduct = {};

  function openModal(name, price, benefits, ingredients, usage){
      selectedProduct = { name, price };
      document.getElementById('modalName').innerText = name;
      document.getElementById('modalPrice').innerText = "Rp " + price.toLocaleString("id-ID");
      document.getElementById('modalBenefits').innerText = benefits;
      document.getElementById('modalIngredients').innerText = ingredients;
      document.getElementById('modalUsage').innerText = usage;
      document.getElementById('productModal').style.display = 'block';
  }
  
  function closeModal(){
      document.getElementById('productModal').style.display = 'none';
  }
  
  function handleAddToCart() {
      let cart = JSON.parse(localStorage.getItem("cart")) || [];
      let item = cart.find(p => p.name === selectedProduct.name);
      if (item) {
          item.qty += 1;
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
  
  window.onclick = function(event){
      const modal = document.getElementById('productModal');
      if(event.target === modal){
          modal.style.display = 'none';
      }
  }

  document.addEventListener('DOMContentLoaded', updateCartUI);
</script>
</body>
</html>