<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Sekolah - SMP IBNU AQIL</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .news-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid #f0f0f0;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.15);
        }

        .news-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background-color: #f3f4f6;
        }

        .news-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-date {
            font-size: 0.85rem;
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-card h3 {
            font-size: 1.4rem;
            color: var(--text-dark);
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .news-card p {
            color: var(--text-gray);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .read-more {
            margin-top: auto;
            color: var(--dark-green);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.2s;
        }

        .read-more:hover {
            gap: 0.8rem;
        }

        .featured-news {
            margin-bottom: 4rem;
            background: linear-gradient(135deg, var(--white) 0%, var(--light-gray) 100%);
            border-radius: 30px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        @media (max-width: 992px) {
            .featured-news {
                grid-template-columns: 1fr;
            }
        }

        .featured-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .featured-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge-special {
            background: #fbbf24;
            color: #78350f;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            width: fit-content;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="Screenshot_2026-02-22-13-16-05-58_1c337646f29875672b5a61192b9010f9.png"
                    alt="Logo SMP IBNU AQIL" class="logo-img">
                SMP IBNU AQIL
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Tentang ▾</a>
                    <ul class="dropdown-content">
                        <li><a href="profile.php">Profil Sekolah</a></li>
                        <li><a href="visi-misi.php">Visi & Misi</a></li>
                    </ul>
                </li>
                <li><a href="berita.php" class="active">Berita</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Kegiatan ▾</a>
                    <ul class="dropdown-content">
                        <li><a href="fasilitas.php">Fasilitas</a></li>
                        <li><a href="ekskul.php">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Hubungi ▾</a>
                    <ul class="dropdown-content">
                        <li><a href="lokasi.php">Lokasi</a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="pesan.php">Kirim Pesan</a></li>
                    </ul>
                </li>
                <li><a href="login.php" class="nav-login-btn">Login</a></li>
            </ul>
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="section active" style="margin-top: 100px;">
        <h2 class="section-title">Berita Terkini</h2>

        <!-- Featured News -->
        <div class="featured-news">
            <img src="unnamed.jpg" alt="Featured News" class="featured-img">
            <div class="featured-content">
                <div class="badge-special">PILIHAN UTAMA</div>
                <div class="news-date">📅 22 Februari 2026</div>
                <h2>SMP IBNU AQIL Meresmikan Laboratorium Komputer Generasi Terbaru</h2>
                <p>Dalam upaya meningkatkan literasi digital siswa, SMP IBNU AQIL resmi membuka fasilitas laboratorium
                    komputer tercanggih yang dilengkapi dengan 40 unit PC terbaru. Laboratorium ini diharapkan menjadi
                    pusat inovasi dan kreativitas bagi seluruh peserta didik.</p>
                <a href="#" class="read-more">Baca Selengkapnya →</a>
            </div>
        </div>

        <div class="news-grid">
            <!-- News Item 1 -->
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=2071&auto=format&fit=crop"
                    alt="Berita 1" class="news-image">
                <div class="news-content">
                    <div class="news-date">📅 20 Februari 2026</div>
                    <h3>Siswa SMP IBNU AQIL Juara 1 Olimpiade Matematika Nasional</h3>
                    <p>Prestasi membanggakan kembali diraih oleh salah satu siswa didik kami, Ahmad Rizki, yang berhasil
                        menyabet medali emas dalam ajang Olimpiade Matematika tingkat Nasional.</p>
                    <a href="#" class="read-more">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 2 -->
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1523050335456-cbb6e0b20152?q=80&w=2070&auto=format&fit=crop"
                    alt="Berita 2" class="news-image">
                <div class="news-content">
                    <div class="news-date">📅 15 Februari 2026</div>
                    <h3>Kegiatan Field Trip: Mengenal Ekosistem Hutan Mangrove</h3>
                    <p>Siswa kelas VIII melakukan kunjungan edukatif ke kawasan konservasi mangrove. Kegiatan ini
                        bertujuan untuk menanamkan kepedulian terhadap lingkungan sejak dini.</p>
                    <a href="#" class="read-more">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1491333078588-55b6733c7de6?q=80&w=2070&auto=format&fit=crop"
                    alt="Berita 3" class="news-image">
                <div class="news-content">
                    <div class="news-date">📅 10 Februari 2026</div>
                    <h3>Peringatan Hari Guru: Apresiasi untuk Pahlawan Tanpa Tanda Jasa</h3>
                    <p>Suasana haru dan ceria mewarnai perayaan hari guru di SMP IBNU AQIL. Para siswa memberikan
                        kejutan manis sebagai bentuk tanda terima kasih kepada para guru.</p>
                    <a href="#" class="read-more">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 SMP IBNU AQIL. All Rights Reserved.</p>
        <p style="margin-top: 0.5rem; font-size: 0.9rem;">Membentuk Generasi Cerdas & Berkarakter</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>