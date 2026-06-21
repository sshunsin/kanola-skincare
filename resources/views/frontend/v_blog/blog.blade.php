<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Blog | Kanola Skincare</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* BASE */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#FFF8FA,#FFF4F6,#FFFDFD);
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
    gap:25px;
}

.nav-links a{
    text-decoration:none;
    color:#4A3F3F;
    font-weight:500;
    position:relative;
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

/* HERO BLOG */
.blog-hero{
    width:84%;
    margin:60px auto;
    text-align:center;
}

.blog-hero h1{
    font-family:'Playfair Display',serif;
    font-size:55px;
    color:#D88C9A;
}

.blog-hero p{
    color:#777;
    margin-top:10px;
}

/* BLOG GRID */
.blog-section{
    width:84%;
    margin:60px auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.blog-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:.4s;
}

.blog-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(216,140,154,.2);
}

.blog-img{
    height:200px;
    background:linear-gradient(135deg,#FFD6E0,#FFF0F3);
    display:flex;
    justify-content:center;
    align-items:center;
    color:#D88C9A;
    font-size:40px;
}

.blog-content{
    padding:20px;
}

.blog-content h3{
    color:#D88C9A;
    margin-bottom:10px;
    font-family:'Playfair Display',serif;
}

.blog-content p{
    color:#777;
    font-size:14px;
    line-height:1.7;
    margin-bottom:15px;
}

.blog-content a{
    text-decoration:none;
    color:white;
    background:#D88C9A;
    padding:8px 15px;
    border-radius:20px;
    font-size:13px;
}

/* FEATURE BLOG HIGHLIGHT */
.featured{
    width:84%;
    margin:80px auto;
    display:flex;
    gap:30px;
    align-items:center;
    background:white;
    padding:40px;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.featured-text h2{
    font-family:'Playfair Display',serif;
    color:#D88C9A;
    font-size:35px;
}

.featured-text p{
    color:#777;
    margin-top:15px;
    line-height:1.8;
}

.featured-image{
    flex:1;
    height:250px;
    background:linear-gradient(135deg,#FFE8EF,#FFD6E0);
    border-radius:25px;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#D88C9A;
    font-size:50px;
}

/* FOOTER */
footer{
    text-align:center;
    padding:30px;
    color:#888;
}

/* RESPONSIVE */
@media(max-width:992px){
    .blog-section{
        grid-template-columns:repeat(2,1fr);
    }

    .featured{
        flex-direction:column;
    }
}

@media(max-width:600px){
    .blog-section{
        grid-template-columns:1fr;
    }

    .blog-hero h1{
        font-size:38px;
    }
}

.background-bubbles{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:-1;
    pointer-events:none;
}

.bubble{
    position:absolute;
    border-radius:50%;
    filter:blur(80px);
    opacity:.5;
    animation:floatBubble 20s infinite alternate ease-in-out;
}

.b1{width:300px;height:300px;background:#FFD6E0;top:10%;left:5%;}
.b2{width:400px;height:400px;background:#FFE8EF;top:40%;right:10%;}
.b3{width:250px;height:250px;background:#F9C5D1;bottom:5%;left:20%;}
.b4{width:350px;height:350px;background:#FEEBF1;top:20%;right:35%;}

@keyframes floatBubble{
    from{transform:translate(0,0);}
    to{transform:translate(100px,-80px);}
}

/* ===== POPUP ===== */
.modal{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.5);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:999;
}

.modal-content{
    background:white;
    width:60%;
    padding:30px;
    border-radius:25px;
    animation:popup .4s ease;
    max-height:85vh;
    overflow-y:auto;
}

@keyframes popup{
    from{transform:scale(.8);opacity:0;}
    to{transform:scale(1);opacity:1;}
}

.close{
    float:right;
    font-size:25px;
    cursor:pointer;
    color:#D88C9A;
}

/* COMMENT */
.comment-box{
    margin-top:20px;
    border-top:1px solid #eee;
    padding-top:20px;
}

.comment-box input,
.comment-box textarea{
    width:100%;
    padding:10px;
    margin-top:10px;
    border-radius:10px;
    border:1px solid #eee;
}

.comment-box button{
    margin-top:10px;
    padding:10px 20px;
    border:none;
    background:#D88C9A;
    color:white;
    border-radius:20px;
    cursor:pointer;
}

.comment-item{
    background:#FFF0F3;
    padding:10px;
    margin-top:10px;
    border-radius:10px;
}

.modal{
    opacity:0;
    transition:.2s ease;
}

.blog-card{
    cursor:pointer;
    transition:.4s ease;
}

.blog-card:hover{
    transform:translateY(-12px) scale(1.02);
}

.blog-content a{
    display:inline-block;
    transition:.3s;
}

.blog-content a:hover{
    transform:scale(1.05);
    background:#c77486;
}

</style>

</head>

<body>
    <div class="background-bubbles">
        <div class="bubble b1"></div>
        <div class="bubble b2"></div>
        <div class="bubble b3"></div>
        <div class="bubble b4"></div>
    </div>
    
<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        <h1>Kanola</h1>
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
</div>

<!-- HERO -->
<div class="blog-hero">
    <h1>Kanola Beauty Journal</h1>
    <p>Tips skincare, insight kulit sehat, dan update terbaru dari Kanola Skincare</p>
</div>

<!-- FEATURED -->
<div class="featured">
    <div class="featured-text">
        <h2>Skincare Routine yang Benar untuk Kulit Glowing</h2>
        <p>
            Perawatan kulit tidak hanya tentang produk, tetapi juga urutan pemakaian yang tepat.
            Kanola membantu kamu memahami cara membangun skincare routine yang efektif agar kulit tetap sehat, lembap, dan glowing natural.
        </p>
    </div>

    <div class="featured-image">
        <i class="fa-solid fa-spa"></i>
    </div>
</div>

<!-- BLOG LIST -->
<div class="blog-section">

    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-droplet"></i></div>
        <div class="blog-content">
            <h3>Pentingnya Hydration untuk Kulit</h3>
            <p>Kulit yang terhidrasi dengan baik akan terlihat lebih sehat, kenyal, dan glowing alami.</p>
            <a href="javascript:void(0)" onclick="openModal(
                'Pentingnya Hydration untuk Kulit',
                'Kulit yang terhidrasi dengan baik akan terlihat lebih sehat, kenyal, dan glowing alami. Kanola Skincare menekankan pentingnya hidrasi untuk menjaga skin barrier tetap kuat.'
                )">
                Read More
                </a>
        </div>
    </div>

    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-sun"></i></div>
        <div class="blog-content">
            <h3>Manfaat Sunscreen Setiap Hari</h3>
            <p>Sunscreen bukan hanya untuk di luar ruangan, tapi wajib setiap hari untuk melindungi kulit.</p>
            <a href="javascript:void(0)" onclick="openModal(
            'Manfaat Sunscreen Setiap Hari',
            'Sunscreen adalah langkah penting dalam skincare routine. Melindungi kulit dari sinar UVA & UVB, mencegah penuaan dini, dan menjaga skin barrier tetap sehat. Gunakan setiap pagi bahkan saat di dalam ruangan.'
            )">Read More</a>
        </div>
    </div>
    
    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-seedling"></i></div>
        <div class="blog-content">
            <h3>Bahan Natural dalam Skincare</h3>
            <p>Kanola menggunakan bahan alami yang aman untuk kulit sensitif dan semua jenis kulit.</p>
            <a href="javascript:void(0)" onclick="openModal(
            'Bahan Natural dalam Skincare',
            'Skincare berbahan natural seperti aloe vera, green tea, dan centella asiatica membantu menenangkan kulit, mengurangi iritasi, dan menjaga kelembapan alami kulit tanpa efek keras.'
            )">Read More</a>
        </div>
    </div>
    
    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-face-smile"></i></div>
        <div class="blog-content">
            <h3>Cara Mengatasi Jerawat</h3>
            <p>Kenali penyebab jerawat dan cara merawatnya dengan produk yang tepat.</p>
            <a href="javascript:void(0)" onclick="openModal(
            'Cara Mengatasi Jerawat',
            'Jerawat bisa disebabkan oleh hormon, kebersihan wajah, atau produk yang tidak cocok. Gunakan cleanser lembut, hindari memencet jerawat, dan pilih skincare dengan salicylic acid atau niacinamide.'
            )">Read More</a>
        </div>
    </div>
    
    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
        <div class="blog-content">
            <h3>Tips Glowing Natural</h3>
            <p>Rahasia kulit glowing bukan makeup, tapi perawatan yang konsisten.</p>
            <a href="javascript:void(0)" onclick="openModal(
            'Tips Glowing Natural',
            'Kulit glowing berasal dari rutinitas skincare yang konsisten: cleansing, hydration, sunscreen, dan tidur cukup. Hindari over-exfoliating agar skin barrier tetap sehat.'
            )">Read More</a>
        </div>
    </div>
    
    <div class="blog-card">
        <div class="blog-img"><i class="fa-solid fa-heart"></i></div>
        <div class="blog-content">
            <h3>Self Care & Skincare</h3>
            <p>Skincare juga bagian dari self love untuk menjaga kesehatan kulit dan mental.</p>
            <a href="javascript:void(0)" onclick="openModal(
            'Self Care & Skincare',
            'Skincare bukan hanya tentang penampilan, tapi juga self-care. Merawat kulit membantu meningkatkan rasa percaya diri dan membuat kamu lebih menghargai diri sendiri.'
            )">Read More</a>
        </div>
    </div>

</div>

<div class="modal" id="modal">
    <div class="modal-content">

        <span class="close" onclick="closeModal()">&times;</span>

        <h2 id="modal-title"></h2>
        <p id="modal-text"></p>

        <div class="comment-box">
            <h3>Komentar Pengunjung</h3>

            <input type="text" id="name" placeholder="Nama kamu">
            <textarea id="comment" placeholder="Tulis komentar..."></textarea>

            <button onclick="addComment()">Kirim</button>

            <div id="comments"></div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer>
    © 2026 Kanola Skincare. All Rights Reserved.
</footer>

<script>
    let commentCount = 0;
    
    function openModal(title, text){
        const modal = document.getElementById("modal");
    
        modal.style.display="flex";
        modal.style.opacity="0";
    
        setTimeout(()=>{
            modal.style.opacity="1";
        },50);
    
        document.getElementById("modal-title").innerText=title;
        document.getElementById("modal-text").innerText=text;
    
        document.body.style.overflow="hidden"; // disable scroll
    }
    
    function closeModal(){
        const modal = document.getElementById("modal");
        modal.style.opacity="0";
    
        setTimeout(()=>{
            modal.style.display="none";
        },200);
    
        document.body.style.overflow="auto";
    }
    
    function addComment(){
    
        let name=document.getElementById("name").value.trim();
        let comment=document.getElementById("comment").value.trim();
    
        if(name=="" || comment==""){
            alert("Isi nama dan komentar dulu ya ✨");
            return;
        }
    
        commentCount++;
    
        let div=document.createElement("div");
        div.classList.add("comment-item");
    
        div.innerHTML=`
            <div style="display:flex;gap:10px;align-items:center;">
                <div style="
                    width:30px;
                    height:30px;
                    border-radius:50%;
                    background:#D88C9A;
                    color:white;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:12px;">
                    ${name.charAt(0).toUpperCase()}
                </div>
                <b>${name}</b>
            </div>
            <p style="margin-left:40px;">${comment}</p>
        `;
    
        document.getElementById("comments").appendChild(div);
    
        document.getElementById("name").value="";
        document.getElementById("comment").value="";
    }
    
    // klik luar modal
    window.onclick=function(e){
        if(e.target.id=="modal"){
            closeModal();
        }
    }
    
    // ESC key close
    document.addEventListener("keydown", function(e){
        if(e.key === "Escape"){
            closeModal();
        }
    });
    </script>
</body>
</html>