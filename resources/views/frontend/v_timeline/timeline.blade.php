<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Timeline Inspirasi - Kanola Skincare</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('d0e96ed1-0659-49d3-b2e0-3158df73c582.jpeg') no-repeat center center/cover;
      margin: 0;
      padding: 20px;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #e75480;
      color: white;
      padding: 12px 24px;
      border-radius: 12px;
      margin-bottom: 30px;
    }

    .navbar .logo {
      font-weight: 600;
      font-size: 20px;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      margin-left: 16px;
      font-weight: 500;
    }

    h1 {
      text-align: center;
      color: #e75480;
      margin-bottom: 10px;
    }

    p.sub {
      text-align: center;
      color: #666;
      font-size: 14px;
      margin-bottom: 40px;
    }

    .timeline {
      max-width: 880px;
      margin: auto;
      position: relative;
    }

    .timeline::before {
      content: '';
      position: absolute;
      left: 30px;
      width: 4px;
      background: #e75480;
      top: 0;
      bottom: 0;
    }

    .event {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      margin-left: 70px;
      margin-bottom: 40px;
      box-shadow: 0 6px 14px rgba(0,0,0,0.08);
      position: relative;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }

    .event.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .event::before {
      content: '';
      width: 16px;
      height: 16px;
      background: #e75480;
      border-radius: 50%;
      position: absolute;
      left: -36px;
      top: 24px;
      border: 3px solid #fff;
    }

    .event h3 {
      margin-bottom: 8px;
      color: #e75480;
      font-size: 18px;
    }

    .event p, .event ul {
      color: #555;
      font-size: 14px;
      line-height: 1.6;
    }

    .event img {
      max-width: 100%;
      margin-top: 15px;
      border-radius: 12px;
    }

    .event a.btn-link {
      display: inline-block;
      margin-top: 10px;
      background: #e75480;
      color: white;
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 13px;
    }

    .back-btn {
      display: block;
      margin: 50px auto 20px;
      text-align: center;
      background: #e75480;
      color: white;
      text-decoration: none;
      padding: 12px 22px;
      border-radius: 8px;
      font-size: 14px;
      width: max-content;
    }

    footer {
      text-align: center;
      font-size: 14px;
      color: #aaa;
      margin-top: 40px;
      border-top: 1px solid #eee;
      padding: 20px 0;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="logo">Kanola Skincare</div>
    <div class="menu">
      <a href="dashboard.html">🏠 Dashboard</a>
      <a href="produk.html">🧴 Produk</a>
      <a href="edukasi.html">📚 Edukasi</a>
      <a href="profil.html">👤 Profil</a>
    </div>
  </div>

  <h1>✨ Timeline Inspirasi & Komunitas</h1>
  <p class="sub">Berita terbaru, peluncuran produk, diskusi komunitas, dan manfaat menggunakan Kanola Skincare 💖</p>

  <div class="timeline">
    <div class="event">
      <h3>🆕 Launching: Brightening Serum + Facial Wash</h3>
      <p>Kanola merilis produk terbaru untuk kulit cerah dan sehat! Formulasi ringan, cocok untuk semua jenis kulit. Dapatkan diskon launching!</p>
      <a href="produkbaru.html" class="btn-link">Lihat Produk Baru</a>
    </div>

    <div class="event">
      <h3>🌐 Website Resmi Kami Kini Hadir</h3>
      <p>Platform ini dirancang khusus untuk kamu yang ingin mengenal dan memilih produk skincare terbaik dengan panduan terpercaya dari Kanola. Jelajahi fitur-fitur menarik seperti edukasi, kuis jenis kulit, keranjang pintar, hingga checkout via WhatsApp!</p>
    </div>

    <div class="event">
      <h3>💬 Komentar Komunitas Kanola Beauty</h3>
      <p>"Serumnya bikin glowing dalam seminggu!" - @nadiaskin<br>"Packaging-nya gemas, cocok untuk hadiah juga!" - @beauty.by.lia</p>
    </div>

    <div class="event">
      <h3>📌 Tips Penggunaan Rangkaian Kanola</h3>
      <ul>
        <li>Cuci muka dengan Facial Wash (pagi & malam)</li>
        <li>Gunakan toner & serum secara rutin</li>
        <li>Gunakan sunscreen setiap pagi</li>
        <li>Gunakan night cream di malam hari</li>
      </ul>
    </div>

    <div class="event">
      <h3>🎉 Fitur Seru di Website Kanola</h3>
      <ul>
        <li>Kuis jenis kulit & rekomendasi produk</li>
        <li>Live Chat dengan Beauty Assistant</li>
        <li>Voucher belanja eksklusif komunitas</li>
        <li>Komentar & review tiap produk</li>
      </ul>
      <a href="dashboard.html" class="btn-link">Mulai Jelajahi</a>
    </div>
  </div>

  <a href="dashboard.html" class="back-btn">← Kembali ke Dashboard</a>

  <footer>
    © 2025 Kanola Skincare. All rights reserved.
  </footer>

  <script>
    const events = document.querySelectorAll('.event');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, { threshold: 0.2 });

    events.forEach(event => observer.observe(event));
  </script>
</body>
</html>