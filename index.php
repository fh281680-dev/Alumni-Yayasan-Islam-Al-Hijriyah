<?php
require_once 'config/database.php';
$page_title = 'Beranda - Alumni AL-Hijriyah Puri';
$is_home = true; // Flag untuk homepage

// Ambil statistik
$stmt = $pdo->query("SELECT COUNT(*) as total FROM alumni");
$total_alumni = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM beasiswa WHERE status = 'aktif'");
$total_beasiswa = $stmt->fetch()['total'];

// Berita terbaru
$stmt = $pdo->query("SELECT * FROM berita WHERE status = 'publish' ORDER BY tanggal_publish DESC LIMIT 3");
$berita_terbaru = $stmt->fetchAll();

// Alumni terbaru
$stmt = $pdo->query("SELECT * FROM alumni ORDER BY created_at DESC LIMIT 6");
$alumni_terbaru = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/navbar.php';
?>


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center hero-content">
                    <h1 class="hero-title animate__animated animate__fadeInDown">Selamat Datang di Portal Alumni</h1>
                    <p class="hero-subtitle animate__animated animate__fadeInUp">Yayasan Pendidikan Islam AL-Hijriyah Puri - Menghubungkan Alumni, Berbagi Pengalaman, Membangun Masa Depan Bersama</p>
                    <div class="animate__animated animate__fadeInUp animate__delay-1s">
                        <a href="pages/alumni.php" class="btn btn-hero btn-hero-primary"><i class="bi bi-search"></i> Cari Alumni</a>
                        <a href="pages/beasiswa.php" class="btn btn-hero btn-hero-outline"><i class="bi bi-award"></i> Info Beasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-number"><?= $total_alumni ?>+</div>
                        <div class="stat-label">Total Alumni</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div class="stat-number"><?= $total_beasiswa ?></div>
                        <div class="stat-label">Beasiswa Aktif</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Tahun Berprestasi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Kenapa Bergabung Dengan Kami?</h2>
            <p class="section-subtitle">Platform terbaik untuk menghubungkan sesama alumni AL-Hijriyah Puri</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                        <h3 class="feature-title">Database Alumni Lengkap</h3>
                        <p class="feature-text">Temukan dan hubungi teman-teman alumni dari berbagai angkatan dengan mudah melalui sistem pencarian yang canggih.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <h3 class="feature-title">Info Beasiswa Terkini</h3>
                        <p class="feature-text">Dapatkan informasi beasiswa terbaru dan terpercaya untuk melanjutkan pendidikan ke jenjang yang lebih tinggi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-camera-fill"></i>
                        </div>
                        <h3 class="feature-title">Galeri & Dokumentasi</h3>
                        <p class="feature-text">Kenang kembali momen-momen indah selama bersekolah melalui galeri foto dan dokumentasi kegiatan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alumni Section -->
    <?php if (count($alumni_terbaru) > 0): ?>
    <section class="alumni-section">
        <div class="container">
            <h2 class="section-title">Alumni Terbaru</h2>
            <p class="section-subtitle">Keluarga besar alumni AL-Hijriyah Puri yang terus berkembang</p>
            
            <div class="row g-4">
                <?php foreach ($alumni_terbaru as $alumni): ?>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card alumni-card">
                        <?php if ($alumni['foto']): ?>
                        <img src="assets/uploads/alumni/<?= clean($alumni['foto']) ?>" class="alumni-photo" alt="<?= clean($alumni['nama_lengkap']) ?>">
                        <?php else: ?>
                        <div class="alumni-photo bg-secondary d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill text-white" style="font-size: 2.5rem;"></i>
                        </div>
                        <?php endif; ?>
                        <div class="alumni-name"><?= clean($alumni['nama_lengkap']) ?></div>
                        <div class="alumni-year">Angkatan <?= $alumni['tahun_lulus'] ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="pages/alumni.php" class="btn btn-hero btn-hero-primary">Lihat Semua Alumni <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- News Section -->
    <?php if (count($berita_terbaru) > 0): ?>
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Berita & Artikel Terbaru</h2>
            <p class="section-subtitle">Ikuti perkembangan dan informasi terkini seputar AL-Hijriyah Puri</p>
            
            <div class="row g-4">
                <?php foreach ($berita_terbaru as $berita): ?>
                <div class="col-md-4">
                    <div class="card news-card">
                        <?php if ($berita['gambar']): ?>
                        <img src="assets/uploads/berita/<?= clean($berita['gambar']) ?>" class="news-image" alt="<?= clean($berita['judul']) ?>">
                        <?php else: ?>
                        <div class="news-image bg-gradient" style="background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
                        <?php endif; ?>
                        <div class="news-body">
                            <div class="news-date">
                                <i class="bi bi-calendar3"></i>
                                <?= date('d M Y', strtotime($berita['tanggal_publish'])) ?>
                            </div>
                            <h3 class="news-title"><?= clean($berita['judul']) ?></h3>
                            <p class="news-excerpt"><?= substr(strip_tags($berita['konten']), 0, 120) ?>...</p>
                            <a href="pages/berita.php?slug=<?= clean($berita['slug']) ?>" class="btn-read">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Bergabunglah Dengan Komunitas Alumni Kami</h2>
            <p class="cta-text">Daftar sekarang dan terhubung dengan ribuan alumni AL-Hijriyah Puri di seluruh Indonesia</p>
            <a href="auth/login.php" class="btn btn-hero btn-hero-primary btn-lg">Daftar Sekarang <i class="bi bi-arrow-right"></i></a>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>