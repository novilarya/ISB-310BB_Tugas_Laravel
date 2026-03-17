<?php
    session_start();

    if($_SESSION['user'] ?? null) {
        $user = $_SESSION['user'];
    } else {
        $user = null;
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>narentcar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">NARENT</a>

            <button class="navbar-toggler white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Reservasi Online</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Layanan Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Armada Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bantuan</a></li>

                    <?php if (!$user): ?>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-login btn-sm px-4" href="../login.php">
                                Login
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-4"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="background-color: #76663b;">
                                <li><a class="dropdown-item text-white" href=""><i class="bi bi-person me-2"></i>Profil</a></li>
                                <li><hr class="dropdown-divider border-secondary"></li>
                                <li><a class="dropdown-item text-white" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link position-relative px-3" href="javascript:void(0)" onclick="tampilkanWishlist()" title="Keranjang Wishlist">
                            <i class="bi bi-cart3 fs-5"></i> 
                            <span id="wishlist-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem; padding: 0.35em 0.5em;">
                                0
                            </span>
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <button id="btn-theme" class="btn nav-link border-0 shadow-none" title="Ganti Tema">
                            <i class="bi bi-moon-stars fs-5" id="theme-icon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="armada-gpc text-white d-flex align-items-center">
        <div class="container">
            <h1 class="text-right fw-bold">Grand Priority Class</h1>
            <p>Kelas dengan konfigurasi seat 2-2 dimana penumpang mendapatkan layanan berupa <br> AC, Toilet, Recleaning Seat, Selimut, Bantal, Guling, Snack, Wifi, Layanan Makan Khusus, <br> USB Plug, Android Entertainment System, dan Layanan Pramugara/i.</p>
        </div>
    </div>

    <div class="gpc-interior text-center text-white d-flex align-items-center">
        <div class="container">
            <h1 class="text-right fw-bold">Konfigurasi Seat 2-2</h1>
            <p>Konfigurasi seat 2-2 menawarkan ruang yang lebih luas dan kenyamanan optimal bagi setiap penumpang. Cocok untuk perjalanan jarak jauh menggunakan bus pariwisata NA Jaya Utama, dengan ruang gerak yang memadai demi menunjang kenyamanan sepanjang perjalanan.</p>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <img src="../assets/logo.png" alt="Logo" class="mb-3" style="max-height: 50px;">
                    <p class="fw-bold mb-1">PT. MS Group</p>
                    <div class="office-info mt-4">
                        <p class="fw-bold mb-1">Kantor Pusat :</p>
                        <p class="small">
                            Solo Indonesia<br>
                            Phone | +62 83896711234
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3">NA Rent</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="../index.php">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                    <h6 class="fw-bold mb-3 mt-4">Layanan Kami</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Big Bus</a></li>
                        <li><a href="#">Medium Bus</a></li>
                        <li><a href="#">Micro Bus</a></li>
                        <li><a href="#">Van</a></li>
                        <li><a href="#">Car</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3">Armada Kami</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Grand Priority Class</a></li>
                        <li><a href="#">Priority Class</a></li>
                        <li><a href="#">Pioneer</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3">Bantuan</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Ajukan Pertanyaan</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12">
                    <h6 class="fw-bold mb-3">Metode Pembayaran</h6>
                    <div class="payment-grid">
                        <img src="../assets/footer-payment.png" alt="Metode Pembayaran">
                    </div>
                    <h6 class="fw-bold mb-3 mt-4">Ikuti Kami</h6>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <a href="https://instagram.com/msgroup" class="text-white text-decoration-none">
                                <i class="bi bi-instagram me-2"></i>@msgroup
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/najayautama" class="text-white text-decoration-none">
                                <i class="bi bi-instagram me-2"></i>@najayautama
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3 border-top border-secondary">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-0 small">© 2026 PT. MS Group. All Rights Reserved.</p>
                <p class="mb-0 small">
                    <i class="bi bi-telephone-fill me-2"></i>Call Center 021 38967112
                </p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>