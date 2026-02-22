<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin - Website Sekolah</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dashboard-style.css">
</head>

<body>
    <!-- Navbar Dashboard -->
    <nav class="dashboard-navbar">
        <div class="nav-container">
            <div class="logo" style="display: flex; align-items: center; gap: 12px; font-weight: bold; color: white;">
                <img src="Screenshot_2026-02-22-13-16-05-58_1c337646f29875672b5a61192b9010f9.png" alt="Logo"
                    style="height: 40px; width: auto; object-fit: contain; border-radius: 4px;">
                SUPER ADMIN PANEL
            </div>
            <div class="user-menu">
                <span class="user-name" id="userName">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <span class="user-role super-admin">SMP IBNU AQIL</span>
                <button onclick="window.location.href='menanyakan logout.php'" class="logout-btn">Logout</button>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="sidebar-menu">
                <a href="#" class="menu-item active" onclick="showTab('overview')">
                    <span class="icon"></span>
                    <span>Overview</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('users')">
                    <span class="icon"></span>
                    <span>Kelola User</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('content')">
                    <span class="icon"></span>
                    <span>Kelola Konten</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('messages')">
                    <span class="icon"></span>
                    <span>Pesan Masuk</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('settings')">
                    <span class="icon"></span>
                    <span>Pengaturan</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('logs')">
                    <span class="icon"></span>
                    <span>Activity Logs</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('backup')">
                    <span class="icon"></span>
                    <span>Backup & Restore</span>
                </a>
                <hr style="margin: 1rem 0; border: none; border-top: 1px solid #e5e7eb;">
                <a href="index.php" class="menu-item">
                    <span class="icon"></span>
                    <span>Lihat Website</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-content">
            <!-- Overview Tab -->
            <div id="overview" class="tab-content active">
                <div class="page-header">
                    <h1>Dashboard Overview</h1>
                    <p>Selamat datang di panel Super Admin</p>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card green">
                        <div class="stat-icon"></div>
                        <div class="stat-info">
                            <h3>1,250</h3>
                            <p>Total Siswa</p>
                        </div>
                    </div>
                    <div class="stat-card blue">
                        <div class="stat-icon"></div>
                        <div class="stat-info">
                            <h3>75</h3>
                            <p>Total Guru</p>
                        </div>
                    </div>
                    <div class="stat-card orange">
                        <div class="stat-icon"></div>
                        <div class="stat-info">
                            <h3>2</h3>
                            <p>Total Admin</p>
                        </div>
                    </div>
                    <div class="stat-card purple">
                        <div class="stat-icon"></div>
                        <div class="stat-info">
                            <h3>150</h3>
                            <p>Total Prestasi</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="section-card">
                    <h2>Quick Actions</h2>
                    <div class="action-grid">
                        <button class="action-btn" onclick="showTab('users')">
                            <span class="icon"></span>
                            Tambah User Baru
                        </button>
                        <button class="action-btn" onclick="showTab('content')">
                            <span class="icon"></span>
                            Edit Konten Website
                        </button>
                        <button class="action-btn" onclick="showTab('backup')">
                            <span class="icon"></span>
                            Backup Database
                        </button>
                        <button class="action-btn" onclick="showTab('logs')">
                            <span class="icon"></span>
                            Lihat Activity Logs
                        </button>
                        <button class="action-btn" onclick="showTab('messages')">
                            <span class="icon"></span>
                            Lihat Pesan Masuk
                        </button>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="section-card">
                    <h2>Recent Activity</h2>
                    <div class="activity-list">
                        <div class="activity-item">
                            <span class="activity-icon green"></span>
                            <div class="activity-info">
                                <p><strong>Admin</strong> mengedit halaman Fasilitas</p>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <span class="activity-icon blue"></span>
                            <div class="activity-info">
                                <p><strong>Super Admin</strong> menambah user baru</p>
                                <span class="activity-time">5 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <span class="activity-icon orange"></span>
                            <div class="activity-info">
                                <p><strong>System</strong> backup otomatis berhasil</p>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Management Tab -->
            <div id="users" class="tab-content">
                <div class="page-header">
                    <h1>Kelola User</h1>
                    <button class="btn-primary" onclick="openAddUserModal()">Tambah User</button>
                </div>

                <div class="section-card">
                    <h2>Daftar User</h2>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>superadmin</td>
                                    <td>Super Administrator</td>
                                    <td>superadmin@sekolahkita.sch.id</td>
                                    <td><span class="badge super-admin">Super Admin</span></td>
                                    <td><span class="badge active">Aktif</span></td>
                                    <td>
                                        <button class="btn-small btn-edit">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>admin</td>
                                    <td>Administrator</td>
                                    <td>admin@sekolahkita.sch.id</td>
                                    <td><span class="badge admin">Admin</span></td>
                                    <td><span class="badge active">Aktif</span></td>
                                    <td>
                                        <button class="btn-small btn-edit">Edit</button>
                                        <button class="btn-small btn-delete">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Content Management Tab -->
            <div id="content" class="tab-content">
                <div class="page-header">

                    <h1>Kelola Konten</h1>
                    <p>Edit konten website sekolah</p>
                </div>

                <div class="content-grid">
                    <div class="content-card">
                        <h3>Profil Sekolah</h3>
                        <p>Edit informasi profil sekolah</p>
                        <button class="btn-primary" onclick="openProfilModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Visi & Misi</h3>
                        <p>Edit visi dan misi sekolah</p>
                        <button class="btn-primary" onclick="openVisiMisiModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Fasilitas</h3>
                        <p>Kelola fasilitas sekolah</p>
                        <button class="btn-primary" onclick="openFasilitasModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Ekstrakulikuler</h3>
                        <p>Kelola ekstrakurikuler</p>
                        <button class="btn-primary" onclick="openEkskulModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Lokasi</h3>
                        <p>Edit alamat dan peta</p>
                        <button class="btn-primary" onclick="openLokasiModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Kontak</h3>
                        <p>Edit informasi kontak</p>
                        <button class="btn-primary" onclick="openKontakModal()">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Berita Sekolah</h3>
                        <p>Kelola berita dan update artikel</p>
                        <button class="btn-primary" onclick="openBeritaModal()">Edit Berita</button>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                <div class="page-header">
                    <h1>Pengaturan</h1>
                    <p>Konfigurasi sistem</p>
                </div>

                <div class="section-card">
                    <h2>Pengaturan Website</h2>
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" class="form-control" value="SMA NEGERI PRESTASI">
                    </div>
                    <div class="form-group">
                        <label>Email Sekolah</label>
                        <input type="email" class="form-control" value="info@sekolahkita.sch.id">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" value="021-1234-5678">
                    </div>
                    <button class="btn-primary">Simpan Perubahan</button>
                </div>

                <div class="section-card" style="margin-top: 2rem;">
                    <h2>Pengaturan Keamanan</h2>
                    <div class="settings-item">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                        <div>
                            <strong>Two-Factor Authentication</strong>
                            <p>Aktifkan autentikasi dua faktor</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Activity Logs Tab -->
            <div id="logs" class="tab-content">
                <div class="page-header">
                    <h1>Activity Logs</h1>
                    <p>Riwayat aktivitas sistem</p>
                </div>

                <div class="section-card">
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>User</th>
                                    <th>Aktivitas</th>
                                    <th>IP Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>04/02/2024 14:30</td>
                                    <td>superadmin</td>
                                    <td>Login ke sistem</td>
                                    <td>192.168.1.1</td>
                                    <td><span class="badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>04/02/2024 12:15</td>
                                    <td>admin</td>
                                    <td>Edit halaman Fasilitas</td>
                                    <td>192.168.1.2</td>
                                    <td><span class="badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>04/02/2024 09:00</td>
                                    <td>system</td>
                                    <td>Backup otomatis</td>
                                    <td>127.0.0.1</td>
                                    <td><span class="badge success">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Backup Tab -->
            <div id="backup" class="tab-content">
                <div class="page-header">
                    <h1>Backup & Restore</h1>
                    <button class="btn-primary" onclick="createBackup()">Buat Backup Sekarang</button>
                </div>

                <div class="section-card">
                    <h2>Riwayat Backup</h2>
                    <div class="backup-list">
                        <div class="backup-item">
                            <div class="backup-info">
                                <strong>backup-2024-02-04.sql</strong>
                                <p>Database backup - 15.2 MB</p>
                                <span class="backup-date">04 Februari 2024, 00:00</span>
                            </div>
                            <div class="backup-actions">
                                <button class="btn-small btn-download">Download</button>
                                <button class="btn-small btn-restore">Restore</button>
                            </div>
                        </div>
                        <div class="backup-item">
                            <div class="backup-info">
                                <strong>backup-2024-02-03.sql</strong>
                                <p>Database backup - 15.1 MB</p>
                                <span class="backup-date">03 Februari 2024, 00:00</span>
                            </div>
                            <div class="backup-actions">
                                <button class="btn-small btn-download">Download</button>
                                <button class="btn-small btn-restore">Restore</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card" style="margin-top: 2rem;">
                    <h2>Pengaturan Backup Otomatis</h2>
                    <div class="settings-item">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                        <div>
                            <strong>Backup Otomatis</strong>
                            <p>Backup database setiap hari pada pukul 00:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Tab -->
            <div id="messages" class="tab-content">
                <div class="page-header">
                    <h1>Pesan Masuk</h1>
                    <p>Melihat pesan yang terkirim dari halaman Kontak/Pesan</p>
                </div>

                <div class="section-card">
                    <h2>Daftar Pesan Pengunjung</h2>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pengirim</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ibnul Qayyim</td>
                                    <td>ibnul@example.com</td>
                                    <td>Tanya Pendaftaran Siswa Baru</td>
                                    <td>17 Feb 2026, 15:10</td>
                                    <td>
                                        <button class="btn-small btn-view"
                                            onclick="alert('Isi Pesan: \n\nAssalamu\'alaikum, saya ingin bertanya tentang syarat pendaftaran untuk tahun ajaran baru. Terima kasih.')">Lihat
                                            Pesan</button>
                                        <button class="btn-small btn-delete">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Siti Sarah</td>
                                    <td>sarah@test.id</td>
                                    <td>Saran Fasilitas Perpustakaan</td>
                                    <td>16 Feb 2026, 09:45</td>
                                    <td>
                                        <button class="btn-small btn-view"
                                            onclick="alert('Isi Pesan: \n\nMohon untuk menambah koleksi buku fiksi di perpustakaan agar lebih bervariasi. Sukses selalu!')">Lihat
                                            Pesan</button>
                                        <button class="btn-small btn-delete">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ahmad Faisal</td>
                                    <td>faisal_a@ymail.com</td>
                                    <td>Konfirmasi Pembayaran</td>
                                    <td>15 Feb 2026, 20:12</td>
                                    <td>
                                        <button class="btn-small btn-view"
                                            onclick="alert('Isi Pesan: \n\nSaya sudah melakukan transfer untuk biaya seragam. Mohon dicek ya pak/bu. Nama: Ahmad Faisal.')">Lihat
                                            Pesan</button>
                                        <button class="btn-small btn-delete">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal Profil Sekolah -->
    <div id="profilModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 700px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Edit Profil Sekolah</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('profilModal')">&times;</span>
            </div>
            <form onsubmit="event.preventDefault(); alert('Profil berhasil diperbarui!'); closeModal('profilModal');">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Sekolah</label>
                        <input type="text" value="SMP IBNU AQIL"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">NPSN</label>
                        <input type="text" value="20231052"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Tahun Berdiri</label>
                        <input type="text" value="1992"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Akreditasi</label>
                        <input type="text" value="A (Amat Baik)"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Kepala Sekolah</label>
                        <input type="text" value="Ade Irawan"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Status Sekolah</label>
                        <input type="text" value="Swasta"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">Tentang Kami</label>
                    <textarea
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 150px; line-height: 1.6;"
                        required>Sekolah Ibnu Aqil Bogor adalah lembaga pendidikan yang mengintegrasikan pembelajaran akademik dengan nilai-nilai keislaman. Kami berkomitmen membentuk peserta didik yang berakhlak mulia, berilmu, dan berkarakter.&#10;&#10;Dengan dukungan tenaga pendidik profesional serta lingkungan belajar yang kondusif, Sekolah Ibnu Aqil menghadirkan pendidikan yang inspiratif untuk menyiapkan generasi yang siap menghadapi tantangan masa depan.</textarea>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn-primary" style="flex: 1;">Simpan Perubahan</button>
                    <button type="button" class="btn-secondary" style="flex: 1;"
                        onclick="closeModal('profilModal')">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Visi & Misi -->
    <div id="visimisiModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 600px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Edit Visi & Misi</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('visimisiModal')">&times;</span>
            </div>
            <form
                onsubmit="event.preventDefault(); alert('Visi & Misi berhasil diperbarui!'); closeModal('visimisiModal');">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Visi</label>
                    <textarea
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 80px;"
                        required>Mewujudkan generasi yang unggul dalam IPTEK dan kokoh dalam IMTAK.</textarea>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Misi</label>
                    <textarea
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 120px;"
                        required>1. Menyelenggarakan pendidikan berkualitas...&#10;2. Membentuk karakter islami...&#10;3. Mengembangkan potensi bakat dan minat siswa...</textarea>
                </div>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- Modal Fasilitas -->
    <div id="fasilitasModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 700px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Kelola Fasilitas</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('fasilitasModal')">&times;</span>
            </div>
            <button class="btn-primary" style="margin-bottom: 15px;" onclick="showAddFasilitasForm()">+ Tambah Fasilitas
                Baru</button>
            <div id="fasilitasForm"
                style="display: none; background: #f9fafb; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e5e7eb;">
                <h4 style="margin-bottom: 15px;">Tambah Fasilitas Baru</h4>
                <form
                    onsubmit="event.preventDefault(); alert('Fasilitas baru berhasil ditambahkan!'); hideFasilitasForm();">
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; font-size: 14px; margin-bottom: 5px;">Nama Fasilitas</label>
                        <input type="text" placeholder="Contoh: Perpustakaan Modern"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 14px; margin-bottom: 5px;">Deskripsi</label>
                        <textarea
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; min-height: 60px;"
                            required></textarea>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-primary" style="padding: 8px 15px;">Simpan</button>
                        <button type="button" class="btn-secondary" style="padding: 8px 15px;"
                            onclick="hideFasilitasForm()">Batal</button>
                    </div>
                </form>
            </div>
            <div style="border-top: 1px solid #eee; padding-top: 15px;">
                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; background: #f9fafb; border-radius: 6px;">
                    <span>Ruang Kelas AC</span>
                    <button class="btn-small btn-edit"
                        style="background: #3b82f6; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Edit</button>
                </div>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; background: #f9fafb; border-radius: 6px;">
                    <span>Lab Komputer</span>
                    <button class="btn-small btn-edit"
                        style="background: #3b82f6; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ekstrakurikuler -->
    <div id="ekskulModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 700px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Kelola Ekstrakurikuler</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('ekskulModal')">&times;</span>
            </div>
            <button class="btn-primary" style="margin-bottom: 15px;" onclick="showAddEkskulForm()">+ Tambah Ekskul
                Baru</button>
            <div id="ekskulForm"
                style="display: none; background: #f9fafb; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e5e7eb;">
                <h4 style="margin-bottom: 15px;">Tambah Ekskul Baru</h4>
                <form
                    onsubmit="event.preventDefault(); alert('Ekstrakurikuler baru berhasil ditambahkan!'); hideEkskulForm();">
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; font-size: 14px; margin-bottom: 5px;">Nama Ekskul</label>
                        <input type="text" placeholder="Contoh: Robotik"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; font-size: 14px; margin-bottom: 5px;">Jadwal</label>
                        <input type="text" placeholder="Contoh: Sabtu, 09:00 - 11:00"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 14px; margin-bottom: 5px;">Deskripsi</label>
                        <textarea
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; min-height: 60px;"
                            required></textarea>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-primary" style="padding: 8px 15px;">Simpan</button>
                        <button type="button" class="btn-secondary" style="padding: 8px 15px;"
                            onclick="hideEkskulForm()">Batal</button>
                    </div>
                </form>
            </div>
            <div style="border-top: 1px solid #eee; padding-top: 15px;">
                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; background: #f9fafb; border-radius: 6px;">
                    <span>Sepak Bola</span>
                    <button class="btn-small btn-edit"
                        style="background: #3b82f6; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Edit</button>
                </div>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; background: #f9fafb; border-radius: 6px;">
                    <span>Memanah</span>
                    <button class="btn-small btn-edit"
                        style="background: #3b82f6; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Lokasi -->
    <div id="lokasiModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 600px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Edit Lokasi</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('lokasiModal')">&times;</span>
            </div>
            <form onsubmit="event.preventDefault(); alert('Lokasi berhasil diperbarui!'); closeModal('lokasiModal');">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Alamat Lengkap</label>
                    <textarea
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 80px;"
                        required>Jl. Pendidikan No. 45, Bogor, Jawa Barat</textarea>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Google Maps Embed URL</label>
                    <input type="text" value="https://www.google.com/maps/embed?..."
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- Modal Kontak -->
    <div id="kontakModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 600px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Edit Kontak</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeModal('kontakModal')">&times;</span>
            </div>
            <form onsubmit="event.preventDefault(); alert('Kontak berhasil diperbarui!'); closeModal('kontakModal');">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Nomor Telepon</label>
                    <input type="text" value="021-1234-5678"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Email Sekolah</label>
                    <input type="email" value="info@sekolahkita.sch.id"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Instagram</label>
                    <input type="text" value="@smp_ibnu_aqil"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                </div>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
    <!-- Modal Berita -->
    <div id="beritaModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 12px; width: 80%; max-width: 800px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1f2937;">Kelola Berita Sekolah</h2>
                <span style="font-size: 28px; font-weight: bold; cursor: pointer; color: #9ca3af;"
                    onclick="closeBeritaModal()">&times;</span>
            </div>

            <button class="btn-primary" style="margin-bottom: 20px;" onclick="showAddNewsForm()">+ Tambah Berita
                Baru</button>

            <div id="newsList">
                <div
                    style="border: 1px solid #e5e7eb; padding: 15px; border-radius: 8px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="display: block; font-size: 16px;">SMP IBNU AQIL Meresmikan Laboratorium
                            Komputer</strong>
                        <span style="font-size: 13px; color: #6b7280;">22 Feb 2026 | Kategori: Fasilitas</span>
                    </div>
                    <button class="btn-small btn-edit"
                        style="background: #3b82f6; color: white; border: none; padding: 5px 15px; border-radius: 4px; cursor: pointer;"
                        onclick="alert('Fitur edit detail akan segera hadir!')">Edit</button>
                </div>
            </div>

            <!-- Form Edit (Hidden by default) -->
            <div id="newsForm"
                style="display: none; margin-top: 20px; border-top: 2px solid #f3f4f6; padding-top: 20px;">
                <h3 id="formTitle">Update Berita</h3>
                <form onsubmit="event.preventDefault(); alert('Berita berhasil diperbarui!'); closeBeritaModal();">
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">Judul</label>
                        <input type="text"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">Upload Foto Berita</label>
                        <input type="file" accept="image/*"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                        <small style="color: #6b7280; display: block; margin-top: 5px;">Format: JPG, PNG, atau WebP.
                            Maks 2MB.</small>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">Ringkasan</label>
                        <textarea
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 80px;"
                            required></textarea>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">Isi Lengkap Berita</label>
                        <textarea
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; min-height: 200px;"
                            required></textarea>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn-secondary" onclick="hideNewsForm()">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
    <script>
        // General modal functions
        function openModal(id) {
            document.getElementById(id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        // Specific functions to maintain compatibility with existing calls
        function openProfilModal() { openModal('profilModal'); }
        function openVisiMisiModal() { openModal('visimisiModal'); }
        function openFasilitasModal() { openModal('fasilitasModal'); }
        function openEkskulModal() { openModal('ekskulModal'); }
        function openLokasiModal() { openModal('lokasiModal'); }
        function openKontakModal() { openModal('kontakModal'); }
        function openBeritaModal() { openModal('beritaModal'); }

        function closeBeritaModal() {
            closeModal('beritaModal');
            hideNewsForm();
        }

        function showAddNewsForm() {
            document.getElementById('newsForm').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Berita Baru';
        }

        function hideNewsForm() {
            document.getElementById('newsForm').style.display = 'none';
        }

        function showAddFasilitasForm() {
            document.getElementById('fasilitasForm').style.display = 'block';
        }

        function hideFasilitasForm() {
            document.getElementById('fasilitasForm').style.display = 'none';
        }

        function showAddEkskulForm() {
            document.getElementById('ekskulForm').style.display = 'block';
        }

        function hideEkskulForm() {
            document.getElementById('ekskulForm').style.display = 'none';
        }

        // Close any modal when clicking outside
        window.onclick = function (event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
                if (event.target.id === 'beritaModal') hideNewsForm();
                if (event.target.id === 'fasilitasModal') hideFasilitasForm();
                if (event.target.id === 'ekskulModal') hideEkskulForm();
            }
        }
    </script>
</body>

</html>