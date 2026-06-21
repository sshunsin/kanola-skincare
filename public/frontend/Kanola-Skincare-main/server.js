const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const bodyParser = require('body-parser');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 5000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Koneksi MongoDB
mongoose.connect(process.env.MONGO_URI, {
  useNewUrlParser: true,
  useUnifiedTopology: true,
}).then(() => {
  console.log("✅ Terhubung ke MongoDB");
}).catch((err) => {
  console.error("❌ Gagal koneksi MongoDB:", err.message);
});

// Schema dan Model
const Komentar = mongoose.model('Komentar', {
  nama: String,
  pesan: String,
  createdAt: {
    type: Date,
    default: Date.now
  }
});

// Endpoint GET semua komentar
app.get('/komentar', async (req, res) => {
  const semuaKomentar = await Komentar.find().sort({ createdAt: -1 });
  res.json(semuaKomentar);
});

// Endpoint POST komentar baru
app.post('/komentar', async (req, res) => {
  const { nama, pesan } = req.body;
  if (!nama || !pesan) {
    return res.status(400).json({ message: 'Nama dan pesan harus diisi.' });
  }
  const komentarBaru = new Komentar({ nama, pesan });
  await komentarBaru.save();
  res.status(201).json(komentarBaru);
});

// Endpoint DELETE komentar berdasarkan ID
app.delete('/komentar/:id', async (req, res) => {
  const { id } = req.params;
  await Komentar.findByIdAndDelete(id);
  res.json({ message: 'Komentar berhasil dihapus.' });
});

// Jalankan server
app.listen(PORT, () => {
  console.log(`🚀 Server berjalan di http://localhost:${PORT}`);
});
