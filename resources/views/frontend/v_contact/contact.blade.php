<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us | Kanola Skincare</title>

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
    min-height:60vh;

    padding:50px 8%;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;
}

.hero-content{

    max-width:800px;
}

.hero-content p{

    color:#D88C9A;

    letter-spacing:2px;

    margin-bottom:15px;
}

.hero-content h1{

    font-size:70px;

    font-family:'Playfair Display',serif;

    margin-bottom:20px;
}

.hero-content h1 span{
    color:#D88C9A;
}

.hero-content .desc{

    color:#777;

    line-height:1.8;
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

/* CONTACT CARDS */

.contact-section{

    width:84%;

    margin:auto;
}

.contact-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:25px;
}

.contact-card{

    background:white;

    padding:30px;

    border-radius:25px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.4s;
}

.contact-card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 20px 40px rgba(216,140,154,.18);
}

.contact-card i{

    font-size:40px;

    color:#D88C9A;

    margin-bottom:20px;
}

.contact-card h3{

    margin-bottom:10px;

    color:#D88C9A;
}

.contact-card p{

    color:#777;

    line-height:1.8;
}

/* CONTACT FORM */

.contact-form-section{

    width:84%;

    margin:80px auto;
}

.contact-box{

    background:white;

    padding:50px;

    border-radius:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);
}

.contact-form{

    display:grid;

    gap:20px;
}

.contact-form input,
.contact-form textarea{

    padding:15px 20px;

    border:none;

    background:#FFF5F7;

    border-radius:15px;

    outline:none;
}

.contact-form textarea{

    min-height:150px;

    resize:none;
}

.contact-form button{

    width:200px;

    padding:15px;

    border:none;

    border-radius:40px;

    background:#D88C9A;

    color:white;

    cursor:pointer;

    transition:.3s;
}

.contact-form button:hover{

    transform:translateY(-3px);
}

/* SOCIAL */

.social-section{

    width:84%;

    margin:80px auto;
}

.social-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:25px;
}

.social-card{

    background:white;

    padding:25px;

    border-radius:25px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.4s;
}

.social-card:hover{

    transform:translateY(-10px);
}

.social-card i{

    font-size:35px;

    color:#D88C9A;

    margin-bottom:15px;
}

/* MAP */

.map-section{

width:84%;

margin:80px auto;
}

.map-container{

background:white;

padding:20px;

border-radius:30px;

box-shadow:
0 10px 30px rgba(0,0,0,.05);
}

.map-container iframe{

width:100%;

height:450px;

border:none;

border-radius:20px;
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

@media(max-width:992px){

.contact-grid,
.social-grid{

    grid-template-columns:repeat(2,1fr);
}

.support-grid{
    grid-template-columns:repeat(2,1fr);
}

}

@media(max-width:768px){
    .support-grid{
    grid-template-columns:1fr;
}

.nav-links{
    display:none;
}

.hero-content h1{
    font-size:45px;
}

.contact-grid,
.social-grid{

    grid-template-columns:1fr;
}

.newsletter form{
    flex-direction:column;
}

.newsletter input{
    width:100%;
}

}

/* BUSINESS HOURS */

.hours-section{

width:84%;

margin:80px auto;
}

.hours-box{

background:white;

padding:40px;

border-radius:30px;

box-shadow:
0 10px 30px rgba(0,0,0,.05);
}

.hour-row{

display:flex;

justify-content:space-between;

padding:18px 0;

border-bottom:1px solid #F3E3E8;
}

.hour-row:last-child{
border-bottom:none;
}

.hour-row strong{
color:#D88C9A;
}

/* SUPPORT */

.support-section{

width:84%;

margin:80px auto;
}

.support-grid{

display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;
}

.support-card{

background:white;

padding:30px;

border-radius:25px;

text-align:center;

box-shadow:
0 10px 30px rgba(0,0,0,.05);

transition:.4s;
}

.support-card:hover{

transform:translateY(-10px);

box-shadow:
0 20px 40px rgba(216,140,154,.18);
}

.support-card i{

font-size:40px;

color:#D88C9A;

margin-bottom:20px;
}

.support-card h3{

margin-bottom:10px;

color:#D88C9A;
}

.support-card p{
color:#777;
}

.whatsapp-float{

position:fixed;

bottom:25px;
right:25px;

width:65px;
height:65px;

background:#25D366;

border-radius:50%;

display:flex;

justify-content:center;
align-items:center;

text-decoration:none;

color:white;

font-size:30px;

z-index:999;

box-shadow:
0 10px 25px rgba(37,211,102,.35);

transition:.3s;
}

.whatsapp-float:hover{

transform:scale(1.1);
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

<div class="hero-content">

    <p>GET IN TOUCH</p>

    <h1>
        Contact <span>Kanola</span>
    </h1>

    <p class="desc">

        We'd love to hear from you.
        Reach out for skincare consultations,
        product inquiries, collaborations,
        or customer support.

    </p>

</div>

</section>

<section class="contact-section">

<div class="section-title">

    <h2>Contact Information</h2>

    <p>
        We're here to help you.
    </p>

</div>

<section class="map-section">

    <div class="section-title">

        <h2>Visit Our Store</h2>

        <p>
            Find us and experience Kanola Skincare in person.
        </p>

    </div>

    <div class="map-container">

        <iframe
        src="https://www.google.com/maps?q=Jl.%20Sudirman%20Jakarta&output=embed"
        allowfullscreen=""
        loading="lazy">
        </iframe>

    </div>
    <div class="store-info">

        <h3>Head Office</h3>
    
        <p>
            Jl. Sudirman No. 88, Jakarta, Indonesia
        </p>
    
        <p>
            Monday - Friday : 08:00 - 17:00
        </p>
    
        <p>
            Saturday : 09:00 - 15:00
        </p>
    
    </div>
    <section class="hours-section">

        <div class="section-title">
    
            <h2>Business Hours</h2>
    
            <p>
                We're available to assist you during these hours.
            </p>
    
        </div>
    
        <div class="hours-box">
    
            <div class="hour-row">
    
                <span>Monday - Friday</span>
    
                <strong>08:00 AM - 05:00 PM</strong>
    
            </div>
    
            <div class="hour-row">
    
                <span>Saturday</span>
    
                <strong>09:00 AM - 03:00 PM</strong>
    
            </div>
    
            <div class="hour-row">
    
                <span>Sunday</span>
    
                <strong>Closed</strong>
    
            </div>
    
        </div>
    
    </section>

    <section class="support-section">

        <div class="section-title">
    
            <h2>Customer Support</h2>
    
            <p>
                Reach the right team for your needs.
            </p>
    
        </div>
    
        <div class="support-grid">
    
            <div class="support-card">
    
                <i class="fa-solid fa-headset"></i>
    
                <h3>Customer Care</h3>
    
                <p>
                    support@kanolaskincare.com
                </p>
    
            </div>
    
            <div class="support-card">
    
                <i class="fa-solid fa-briefcase"></i>
    
                <h3>Partnership</h3>
    
                <p>
                    partnership@kanolaskincare.com
                </p>
    
            </div>
    
            <div class="support-card">
    
                <i class="fa-solid fa-bullhorn"></i>
    
                <h3>Marketing</h3>
    
                <p>
                    marketing@kanolaskincare.com
                </p>
    
            </div>
    
        </div>
    
    </section>

</section>

<div class="contact-grid">

    <div class="contact-card">

        <i class="fa-solid fa-location-dot"></i>

        <h3>Address</h3>

        <p>
            Jl. Sudirman No. 88<br>
            Jakarta, Indonesia
        </p>

    </div>

    <div class="contact-card">

        <i class="fa-solid fa-phone"></i>

        <h3>Phone</h3>

        <p>
            +62 812 3456 7890
        </p>

    </div>

    <div class="contact-card">

        <i class="fa-solid fa-envelope"></i>

        <h3>Email</h3>

        <p>
            hello@kanolaskincare.com
        </p>

    </div>

    <div class="contact-card">

        <i class="fa-brands fa-whatsapp"></i>

        <h3>WhatsApp</h3>

        <p>
            +62 812 3456 7890
        </p>

    </div>

</div>

</section>

<section class="contact-form-section">

<div class="section-title">

    <h2>Send Us A Message</h2>

</div>

<div class="contact-box">

<form class="contact-form">

<input type="text" placeholder="Your Name">

<input type="email" placeholder="Your Email">

<input type="text" placeholder="Subject">

<textarea placeholder="Write your message..."></textarea>

<button type="submit">
Send Message
</button>

</form>

</div>

</section>

<section class="social-section">

<div class="section-title">

    <h2>Follow Us</h2>

</div>

<div class="social-grid">

    <div class="social-card">

        <i class="fa-brands fa-instagram"></i>

        <h3>@kanolaskincare</h3>

    </div>

    <div class="social-card">

        <i class="fa-brands fa-tiktok"></i>

        <h3>@kanolaskincare</h3>

    </div>

    <div class="social-card">

        <i class="fa-brands fa-facebook-f"></i>

        <h3>Kanola Skincare</h3>

    </div>

    <div class="social-card">

        <i class="fa-brands fa-youtube"></i>

        <h3>Kanola Official</h3>

    </div>

</div>

</section>

<section class="newsletter">

<h2>Stay Updated</h2>

<p>
Subscribe for exclusive offers and skincare tips.
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

<a href="https://wa.me/6285715117841" class="whatsapp-float">

    <i class="fa-brands fa-whatsapp"></i>

</a>
</body>
</html>