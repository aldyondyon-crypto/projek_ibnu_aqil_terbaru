<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
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
            <div class="logo">
                🎓 SUPER ADMIN PANEL
            </div>
            <div class="user-menu">
                <span class="user-name" id="userName"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <span class="user-role super-admin">Koboy Admin</span>
                <button onclick="if(confirm('Apakah Anda yakin ingin logout?')) window.location.href='index.php'"
                    class="logout-btn">Logout</button>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="sidebar-menu">
                <a href="#" class="menu-item active" onclick="showTab('overview')">
                    <span class="icon">📊</span>
                    <span>Overview</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('users')">
                    <span class="icon">👥</span>
                    <span>Kelola User</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('content')">
                    <span class="icon">📝</span>
                    <span>Kelola Konten</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('messages')">
                    <span class="icon">📩</span>
                    <span>Pesan Masuk</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('settings')">
                    <span class="icon">⚙️</span>
                    <span>Pengaturan</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('logs')">
                    <span class="icon">📋</span>
                    <span>Activity Logs</span>
                </a>
                <a href="#" class="menu-item" onclick="showTab('backup')">
                    <span class="icon">💾</span>
                    <span>Backup & Restore</span>
                </a>
                <hr style="margin: 1rem 0; border: none; border-top: 1px solid #e5e7eb;">
                <a href="index.php" class="menu-item">
                    <span class="icon">🌐</span>
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
                        <div class="stat-icon">👨‍🎓</div>
                        <div class="stat-info">
                            <h3>1,250</h3>
                            <p>Total Siswa</p>
                        </div>
                    </div>
                    <div class="stat-card blue">
                        <div class="stat-icon">👨‍🏫</div>
                        <div class="stat-info">
                            <h3>75</h3>
                            <p>Total Guru</p>
                        </div>
                    </div>
                    <div class="stat-card orange">
                        <div class="stat-icon">👥</div>
                        <div class="stat-info">
                            <h3>2</h3>
                            <p>Total Admin</p>
                        </div>
                    </div>
                    <div class="stat-card purple">
                        <div class="stat-icon">🏆</div>
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
                            <span class="icon">➕</span>
                            Tambah User Baru
                        </button>
                        <button class="action-btn" onclick="showTab('content')">
                            <span class="icon">📝</span>
                            Edit Konten Website
                        </button>
                        <button class="action-btn" onclick="showTab('backup')">
                            <span class="icon">💾</span>
                            Backup Database
                        </button>
                        <button class="action-btn" onclick="showTab('logs')">
                            <span class="icon">📊</span>
                            Lihat Activity Logs
                        </button>
                        <button class="action-btn" onclick="showTab('messages')">
                            <span class="icon">📩</span>
                            Lihat Pesan Masuk
                        </button>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="section-card">
                    <h2>Recent Activity</h2>
                    <div class="activity-list">
                        <div class="activity-item">
                            <span class="activity-icon green">✓</span>
                            <div class="activity-info">
                                <p><strong>Admin</strong> mengedit halaman Fasilitas</p>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <span class="activity-icon blue">👤</span>
                            <div class="activity-info">
                                <p><strong>Super Admin</strong> menambah user baru</p>
                                <span class="activity-time">5 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <span class="activity-icon orange">⚙️</span>
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
                    <button class="btn-primary" onclick="openAddUserModal()">➕ Tambah User</button>
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
                        <h3>📄 Profil Sekolah</h3>
                        <p>Edit informasi profil sekolah</p>
                        <button class="btn-primary">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>👁️ Visi & Misi</h3>
                        <p>Edit visi dan misi sekolah</p>
                        <button class="btn-primary">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>🏫 Fasilitas</h3>
                        <p>Kelola fasilitas sekolah</p>
                        <button class="btn-primary">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>⚽ Ekstrakulikuler</h3>
                        <p>Kelola ekstrakurikuler</p>
                        <button class="btn-primary">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Lokasi</h3>
                        <p>Edit alamat dan peta</p>
                        <button class="btn-primary">Edit</button>
                    </div>
                    <div class="content-card">
                        <h3>Kontak</h3>
                        <p>Edit informasi kontak</p>
                        <button class="btn-primary">Edit</button>
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
                    <div class="settings-item">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                        <div>
                            <strong>Login Notifications</strong>
                            <p>Notifikasi setiap ada login baru</p>
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
                    <button class="btn-primary" onclick="createBackup()">💾 Buat Backup Sekarang</button>
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
                                        <button class="btn-small btn-view" onclick="alert('Isi Pesan: \n\nAssalamu\'alaikum, saya ingin bertanya tentang syarat pendaftaran untuk tahun ajaran baru. Terima kasih.')">Lihat Pesan</button>
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
                                        <button class="btn-small btn-view" onclick="alert('Isi Pesan: \n\nMohon untuk menambah koleksi buku fiksi di perpustakaan agar lebih bervariasi. Sukses selalu!')">Lihat Pesan</button>
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
                                        <button class="btn-small btn-view" onclick="alert('Isi Pesan: \n\nSaya sudah melakukan transfer untuk biaya seragam. Mohon dicek ya pak/bu. Nama: Ahmad Faisal.')">Lihat Pesan</button>
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

    <!-- <script src="auth.js"></script> -->
    <script src="dashboard.js"></script>
    <script>
        // Require super admin access
        // requireRole('super_admin');

        // const user = getCurrentUser();
        // if (user) {
        //     document.getElementById('userName').textContent = user.name;
        // }
    </script>
</body>

</html>