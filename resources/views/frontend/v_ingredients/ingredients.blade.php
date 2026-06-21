<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Ingredients | Kanola Skincare</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
}

/* NAVBAR */

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
}

.nav-links a:hover{
    color:#D88C9A;
}

/* HERO */

.hero{
    min-height:60vh;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;
    padding:0 20px;
}

.hero h1{

    font-size:70px;

    color:#D88C9A;

    font-family:'Playfair Display',serif;
}

.hero p{

    margin-top:20px;

    max-width:700px;

    color:#777;

    line-height:1.8;
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
}

.hero-image{
    flex:1;
    text-align:center;
}

.hero-image img{
    width:100%;
    max-width:450px;
    border-radius: 25px;
}

/* SECTION */

.section-title{
    text-align:center;
    margin-bottom:50px;
}

.section-title h2{
    font-size:45px;
    font-family:'Playfair Display',serif;
    color:#D88C9A;
}

/* INGREDIENTS */

.ingredients{
    width:84%;
    margin:auto;
    padding-bottom:100px;
}

.ingredients-grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));

    gap:25px;
}

.ingredient-card{

    background:white;

    padding:30px;

    border-radius:25px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.4s;
}

.ingredient-card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 20px 40px rgba(216,140,154,.15);
}

.ingredient-card i{

    font-size:40px;

    color:#D88C9A;

    margin-bottom:20px;
}

.ingredient-card h3{

    margin-bottom:15px;
}

.ingredient-card p{

    color:#777;

    line-height:1.8;
}

.products{
    width:84%;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
    margin-bottom:80px;
}

.product-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:.4s;
}

.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(216,140,154,.15);
}

.product-image{
    text-align:center;
    background:#FFF6F7;
}

.product-content{
    padding:20px;
    text-align:center;
}

.product-content h3{
    margin-bottom:10px;
}

/* BENEFITS */

.benefits{

    width:84%;
    margin:100px auto;
}

.benefits-box{

    background:white;

    padding:50px;

    border-radius:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);
}

.benefits-list{

    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:20px;

    margin-top:30px;
}

.benefit{

    background:#FFF3F6;

    padding:20px;

    border-radius:15px;
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
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.results-text{
    flex:1;
}

.results-text h2{
    font-size:45px;
    font-family:'Playfair Display',serif;
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

/* FORMULATION */

.formulation{

    width:84%;
    margin:100px auto;
}

.formulation-box{

    background:white;

    padding:60px;

    border-radius:30px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);
}

.formulation-box h2{

    margin-bottom:20px;

    color:#D88C9A;

    font-family:'Playfair Display',serif;
}

.formulation-box p{

    color:#777;

    line-height:1.8;

    max-width:800px;

    margin:auto;
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
}

.feature-card h3{
    color:#D88C9A;
    margin-bottom:10px;
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

/* FOOTER */

footer{

    margin-top:80px;

    padding:30px;

    text-align:center;

    color:#888;
}

.ingredients-hero{
    min-height:70vh;
}

.ingredient-icon{

    font-size:80px;

    color:#D88C9A;

    padding:50px 0;

    transition:.4s;
}

.product-card:hover .ingredient-icon{

    transform:scale(1.1);

}

@media(max-width:992px){

.hero{
    flex-direction:column;
}

.products{
    grid-template-columns:repeat(2,1fr);
}

.features{
    grid-template-columns:repeat(2,1fr);
}

.results{
    flex-direction:column;
}

}

@media(max-width:768px){

.hero h1{
    font-size:45px;
}

.products{
    grid-template-columns:1fr;
}

.features{
    grid-template-columns:1fr;
}

.benefits-list{
    grid-template-columns:1fr;
}

.newsletter form{
    flex-direction:column;
}

.newsletter input{
    width:100%;
}

.nav-links{
    display:none;
}

}
</style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

<div class="logo">
    <h1>KANOLA</h1>
</div>

<div class="nav-links">
    <a href="{{ route('frontend.v1.index') }}">Home</a>
    {{-- <a href="{{ route('frontend.v1.login') }}">Login/Sign Up</a> --}}
    <a href="{{ route('frontend.v1.ingredients') }}">Ingredients</a>
    <a href="{{ route('frontend.v1.products') }}">Products</a>
    <a href="{{ route('frontend.v1.about') }}">About</a>
    <a href="{{ route('frontend.v1.contact') }}">Contact</a>
    <a href="{{ route('frontend.v1.results') }}">Results</a>
    <a href="{{ route('frontend.v1.blog') }}">Blog</a>
</div>

</nav>

<!-- HERO -->

<section class="hero ingredients-hero">

    <div class="hero-text">

        <p>SCIENCE MEETS NATURE</p>

        <h1>
            Powerful <span>Ingredients</span>
            For Healthy Skin
        </h1>

        <p>
            Discover the carefully selected active ingredients
            behind every Kanola Skincare product.
        </p>

    </div>

    <div class="hero-image">

        <img src="{{ asset('assets/img/Rescue your sensitive skin with the VinoHydra….jpeg') }}" alt="Kanola Skincare">


    </div>

</section>

<!-- INGREDIENTS -->

<section>

    <div class="section-title">
    
        <h2>Featured Ingredients</h2>
    
        <p>The secret behind your healthy glow</p>
    
    </div>
    
    <div class="products">
    
        <div class="product-card">
    
            <div class="product-image">
                <i class="fa-solid fa-flask ingredient-icon"></i>
            </div>
    
            <div class="product-content">
    
                <h3>Niacinamide</h3>
    
                <p>
                    Brightens skin tone and reduces dark spots.
                </p>
    
            </div>
    
        </div>
    
        <div class="product-card">
    
            <div class="product-image">
                <i class="fa-solid fa-droplet ingredient-icon"></i>
            </div>
    
            <div class="product-content">
    
                <h3>Hyaluronic Acid</h3>
    
                <p>
                    Provides deep hydration and moisture retention.
                </p>
    
            </div>
    
        </div>
    
        <div class="product-card">
    
            <div class="product-image">
                <i class="fa-solid fa-leaf ingredient-icon"></i>
            </div>
    
            <div class="product-content">
    
                <h3>Centella Asiatica</h3>
    
                <p>
                    Soothes irritation and strengthens skin barrier.
                </p>
    
            </div>
    
        </div>
    
    </div>
    
    </section>

<!-- BENEFITS -->

<section class="results">

    <div class="results-text">

        <h2>
            Spotlight:
            <span>Niacinamide</span>
        </h2>

        <p>
            Niacinamide helps brighten skin tone,
            minimize pores, and strengthen the skin barrier.
        </p>

    </div>

    <div class="results-image">

        <img src="{{ asset('assets/img/beauty campaign for Kylie Skin _ Skincare products….jpeg') }}" alt="Kanola Skincare">

        <img src="{{ asset('assets/img/download.jpeg') }}" alt="Kanola Skincare">

    </div>

</section>

<!-- FORMULATION -->

<section>

    <div class="section-title">
    
        <h2>Why We Use These Ingredients</h2>
    
    </div>
    
    <div class="features">
    
        <div class="feature-card">
    
            <h3>Dermatologically Tested</h3>
    
            <p>
                Safe and gentle for everyday use.
            </p>
    
        </div>
    
        <div class="feature-card">
    
            <h3>Natural Extracts</h3>
    
            <p>
                Powered by carefully selected botanicals.
            </p>
    
        </div>
    
        <div class="feature-card">
    
            <h3>Science Backed</h3>
    
            <p>
                Formulated with proven active ingredients.
            </p>
    
        </div>
    
        <div class="feature-card">
    
            <h3>All Skin Types</h3>
    
            <p>
                Suitable for oily, dry and sensitive skin.
            </p>
    
        </div>
    
    </div>
    
    </section>

    <section class="newsletter">

        <h2>Stay Updated</h2>
    
        <p>
            Get skincare tips and exclusive offers.
        </p>
    
        <form>
    
            <input
            type="email"
            placeholder="Enter your email">
    
            <button>
                Subscribe
            </button>
    
        </form>
    
    </section>

<footer>

© 2026 Kanola Skincare. All Rights Reserved.

</footer>

</body>
</html>