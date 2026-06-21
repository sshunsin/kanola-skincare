<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us | Kanola Skincare</title>

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

animation:fadeIn 1s ease;
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

.nav-links a:hover::after{
width:100%;
}

.nav-links a:hover{
    color:#D88C9A;
}

/* HERO */

.hero{
    width:100%;
    min-height:80vh;
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
    max-width:500px;
    border-radius:30px;

    animation:floatImage 4s ease-in-out infinite;
}

@keyframes floatImage{

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

/* SECTION TITLE */

.section-title{
    text-align:center;
    margin-bottom:40px;
}

.section-title h2{
    font-size:45px;
    font-family:'Playfair Display',serif;
    color:#D88C9A;
}

.section-title p{
    color:#777;
}

/* STORY */

.story{
    width:84%;
    margin:80px auto;
}

.story-box{
    background:white;
    padding:50px;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.story-box p{
    color:#777;
    line-height:1.9;
    margin-bottom:20px;
}

/* FEATURES */

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

box-shadow:
0 15px 35px rgba(216,140,154,.18);

}

.feature-card i{
    font-size:35px;
    color:#D88C9A;
    margin-bottom:15px;
}

.feature-card h3{
    color:#D88C9A;
    margin-bottom:10px;
}

.feature-card p{
    color:#777;
}

/* VALUES */

.values{
    width:84%;
    margin:80px auto;
}

.values-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.value-card{
    background:white;
    border-radius:25px;
    padding:30px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:.4s;
}

.value-card:hover{

transform:translateY(-10px);

box-shadow:
0 20px 40px rgba(216,140,154,.18);

}

.value-card h3{
    color:#D88C9A;
    margin-bottom:15px;
}

.value-card p{
    color:#777;
    line-height:1.8;
}

.stats{

width:84%;
margin:80px auto;

display:grid;
grid-template-columns:repeat(4,1fr);

gap:20px;
}

.stat-card{

background:white;

padding:30px;

text-align:center;

border-radius:25px;

box-shadow:0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.stat-card:hover{

transform:translateY(-10px);

box-shadow:
0 20px 40px rgba(216,140,154,.18);

}

.stat-card h2{

color:#D88C9A;

font-size:42px;

margin-bottom:10px;
}

.stat-card p{
color:#777;
}

.team-section{

width:84%;

margin:80px auto;
}

.team-grid{

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));

gap:25px;
}

.team-card{

background:white;

border-radius:25px;

padding:30px;

text-align:center;

box-shadow:
0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.team-card:first-child{

border:2px solid #D88C9A;

background:
linear-gradient(
    180deg,
    #FFF6F8,
    #FFFFFF
);
}

.team-card:hover{

transform:translateY(-10px);

box-shadow:
0 20px 40px rgba(216,140,154,.18);
}

.team-photo{

width:100px;
height:100px;

margin:auto;

border-radius:50%;

background:#FFF0F3;

display:flex;

justify-content:center;
align-items:center;

margin-bottom:20px;
}

.team-photo i{

font-size:40px;

color:#D88C9A;
}

.team-card h3{

margin-bottom:8px;

color:#4A3F3F;
}

.team-card span{

color:#D88C9A;

font-size:14px;

font-weight:600;
}

.faq-section{

width:84%;

margin:80px auto;
}

.faq-grid{

display:grid;

grid-template-columns:
repeat(2,1fr);

gap:25px;
}

.faq-card{

background:white;

padding:30px;

border-radius:25px;

box-shadow:
0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.faq-card:hover{

transform:translateY(-10px);

box-shadow:
0 20px 40px rgba(216,140,154,.18);

}

.faq-card h3{

color:#D88C9A;

margin-bottom:15px;
}

.faq-card p{

color:#777;

line-height:1.8;
}

/* NEWSLETTER */

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
    padding:30px;
    text-align:center;
    color:#888;
}

/* RESPONSIVE */
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

    .stats{
    grid-template-columns:repeat(2,1fr);
}

.hero{
    flex-direction:column;
}

.features{
    grid-template-columns:repeat(2,1fr);
}

.values-grid{
    grid-template-columns:1fr;
}

}

@media(max-width:768px){

    .faq-grid{
    grid-template-columns:1fr;
}

    .stats{
    grid-template-columns:1fr;
}

.hero-text h1{
    font-size:45px;
}

.features{
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

.results-showcase{

width:84%;

margin:80px auto;
}

.before-after-grid{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:25px;
}

.before-after-card{

background:white;

padding:15px;

border-radius:25px;

box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.before-after-card img{

width:100%;

border-radius:20px;
}

.results-showcase{

width:84%;

margin:80px auto;
}

.before-after-grid{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:25px;
}

.before-after-card{

background:white;

padding:15px;

border-radius:25px;

box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.before-after-card img{

width:100%;

border-radius:20px;
}

.stats{

width:84%;

margin:80px auto;

display:grid;

grid-template-columns:repeat(4,1fr);

gap:25px;
}

.stat-card{

background:white;

padding:30px;

text-align:center;

border-radius:25px;

box-shadow:0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.stat-card:hover{

transform:translateY(-10px);
}

.stat-card h2{

color:#D88C9A;

font-size:42px;
}

.review-grid{

width:84%;

margin:auto;

display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;
}

.review-card{

background:white;

padding:30px;

border-radius:25px;

box-shadow:0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.review-card:hover{

transform:translateY(-10px);
}

.review-card h3{

color:#D88C9A;

margin-bottom:15px;
}

.story-section{

width:84%;

margin:80px auto;
}

.story-box{

background:white;

padding:60px;

border-radius:30px;

text-align:center;

box-shadow:0 10px 30px rgba(0,0,0,.05);
}

@media(max-width:992px){

.stats{
    grid-template-columns:repeat(2,1fr);
}

.review-grid{
    grid-template-columns:repeat(2,1fr);
}

.before-after-grid{
    grid-template-columns:1fr;
}
}

@media(max-width:768px){

.nav-links{
    display:none;
}

.hero{
    flex-direction:column;
    text-align:center;
}

.hero-text h1{
    font-size:45px;
}

.stats,
.review-grid{
    grid-template-columns:1fr;
}
}

</style>
</head>

<body>
    <div class="background-bubbles">

        <div class="bubble bubble1"></div>
    
        <div class="bubble bubble2"></div>
    
        <div class="bubble bubble3"></div>
    
        <div class="bubble bubble4"></div>
    
        <div class="bubble bubble5"></div>
    
    </div>

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

<section class="hero">

    <div class="hero-text">

        <p>REAL RESULTS. REAL CONFIDENCE.</p>

        <h1>
            Visible Results With
            <span>Kanola Skincare</span>
        </h1>

        <p>
            Discover how Kanola helps improve skin hydration,
            brightness, acne reduction, and overall skin health
            through consistent daily skincare routines.
        </p>

    </div>

    <div class="hero-image">

        <img src="{{ asset('assets/img/6160777c-c42c-431d-8807-9ed5ba0f37f1.jpeg') }}" alt="Women Beauty">

    </div>

</section>
<section class="results-showcase">

    <div class="section-title">

        <h2>Before & After</h2>

        <p>
            Real skin transformations from Kanola users.
        </p>

    </div>

    <div class="before-after-grid">

        <div class="before-after-card">

            <img src="{{ asset('assets/img/99d135f6-5dc6-4761-b483-ed66f8a525b1.jpeg') }}" alt="Women Face Before">

            <div class="label before">
                BEFORE
            </div>

        </div>

        <div class="before-after-card">

            <img src="{{ asset('assets/img/99d135f6-5dc6-4761-b483-ed66f8a525b1.jpeg') }}" alt="Women Face After">

            <div class="label after">
                AFTER
            </div>

        </div>

    </div>

</section>
<section class="stats">

    <div class="stat-card">

        <h2>95%</h2>

        <p>
            Reported Brighter Skin
        </p>

    </div>

    <div class="stat-card">

        <h2>90%</h2>

        <p>
            Improved Hydration
        </p>

    </div>

    <div class="stat-card">

        <h2>87%</h2>

        <p>
            Reduced Acne Appearance
        </p>

    </div>

    <div class="stat-card">

        <h2>98%</h2>

        <p>
            Customer Satisfaction
        </p>

    </div>

</section>
<section class="reviews-section">

    <div class="section-title">

        <h2>Customer Reviews</h2>

        <p>
            What our customers say about Kanola.
        </p>

    </div>

    <div class="review-grid">

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                My skin feels brighter and smoother
                after only three weeks.
            </p>

            <span>
                - Sarah A.
            </span>

        </div>

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                The hydration effect is amazing
                and my skin barrier feels healthier.
            </p>

            <span>
                - Amelia R.
            </span>

        </div>

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                One of the best skincare products
                I've ever used.
            </p>

            <span>
                - Nadia P.
            </span>

        </div>

    </div>

</section>
<section class="story-section">

    <div class="story-box">

        <h2>
            30 Days Skin Transformation
        </h2>

        <p>

            Users who consistently used
            Kanola Glow Hydra Serum,
            Deep Moisture Cream,
            and UV Shield Sunscreen
            experienced noticeable improvements
            in skin texture, hydration,
            and overall brightness.

        </p>

    </div>

</section>
<section class="features">

    <div class="feature-card">

        <h3>Clinically Inspired</h3>

        <p>
            Formulated with proven active ingredients.
        </p>

    </div>

    <div class="feature-card">

        <h3>Dermatologically Tested</h3>

        <p>
            Safe for daily use.
        </p>

    </div>

    <div class="feature-card">

        <h3>Visible Improvement</h3>

        <p>
            Noticeable results within weeks.
        </p>

    </div>

    <div class="feature-card">

        <h3>Trusted Formula</h3>

        <p>
            Loved by thousands of skincare enthusiasts.
        </p>

    </div>

</section>
<section class="hero">

    <div class="hero-text">

        <p>REAL RESULTS. REAL CONFIDENCE.</p>

        <h1>
            Visible Results With
            <span>Kanola</span>
        </h1>

        <p>
            Discover how Kanola Skincare helps improve
            hydration, brightness and skin texture through
            carefully formulated skincare routines.
        </p>

    </div>

    <div class="hero-image">

        <img src="{{ asset('assets/img/beranda2-design.png') }}" alt="Kanola Skincare">

    </div>

</section>

<section class="results-showcase">

    <div class="section-title">

        <h2>Before & After</h2>

        <p>
            Real transformations from Kanola users.
        </p>

    </div>

    <div class="before-after-grid">

        <div class="before-after-card">

            <img src="{{ asset('assets/img/42d6b627-b535-4f62-91e8-3d083efafb90.jpeg') }}" alt="Women Before Use Kanola Skincare">

        </div>

        <div class="before-after-card">

            <img src="{{ asset('assets/img/42d6b627-b535-4f62-91e8-3d083efafb90.jpeg') }}" alt="Women Before Use Kanola Skincare">

        </div>

    </div>

</section>

<section class="stats">

    <div class="stat-card">
        <h2>95%</h2>
        <p>Brighter Skin</p>
    </div>

    <div class="stat-card">
        <h2>90%</h2>
        <p>Hydrated Skin</p>
    </div>

    <div class="stat-card">
        <h2>87%</h2>
        <p>Reduced Acne</p>
    </div>

    <div class="stat-card">
        <h2>98%</h2>
        <p>Customer Satisfaction</p>
    </div>

</section>

<section>

    <div class="section-title">

        <h2>Customer Reviews</h2>

    </div>

    <div class="review-grid">

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                My skin became smoother and brighter.
            </p>

            <span>- Sarah A.</span>

        </div>

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                The hydration effect is amazing.
            </p>

            <span>- Amelia R.</span>

        </div>

        <div class="review-card">

            <h3>★★★★★</h3>

            <p>
                Best skincare routine I've tried.
            </p>

            <span>- Nadia P.</span>

        </div>

    </div>

</section>

<section class="story-section">

    <div class="story-box">

        <h2>
            30 Days Transformation
        </h2>

        <p>

            Consistent use of Kanola Glow Hydra Serum,
            Deep Moisture Cream and UV Shield Sunscreen
            showed noticeable improvements in hydration,
            brightness and skin texture.

        </p>

    </div>

</section>

<section class="features">

    <div class="feature-card">

        <h3>Visible Improvement</h3>

        <p>
            Results you can actually see.
        </p>

    </div>

    <div class="feature-card">

        <h3>Science Backed</h3>

        <p>
            Active ingredients with proven benefits.
        </p>

    </div>

    <div class="feature-card">

        <h3>Daily Safe</h3>

        <p>
            Suitable for everyday use.
        </p>

    </div>

    <div class="feature-card">

        <h3>Trusted Formula</h3>

        <p>
            Loved by skincare enthusiasts.
        </p>

    </div>

</section>
</body>
</html>