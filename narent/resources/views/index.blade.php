<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>narentcar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
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

                    @if (!session()->has('user'))
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-login btn-sm px-4" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @else

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
                    @endif

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

    <div class="hero text-center text-white d-flex align-items-center">
        <div class="container">
            <h1>Sistem Manajemen Rental Kendaraan</h1>
            <p>Platform efisien untuk mempermudah operasional bisnis rental Anda, mulai dari manajemen armada hingga pendaftaran pelanggan secara online.</p>
        </div>
    </div>

    <div class="daftar-armada container mt-5">
        <h3 class="mb-4 fw-bold">Daftar Armada</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/jb5-shdt.jpg" class="card-img-top"/>
                    <div class="card-body">
                        <h5 class="card-title">Grand Priority Class</h5>
                        <p class="card-text">Mulai Dari 6.5 Mio per Hari</p>
                        <span class="stok-text mb-3">2 Unit Ready</span> <div class="d-flex justify-content-between w-100 mb-2">
                            <button class="btn btn-primary btn-sewa w-50 me-1">Sewa</button>
                            <button class="btn btn-primary btn-wishlist w-50 ms-1">Wishlist</button>
                        </div>
                        <a href="{{ route('armada.grand_priority') }}" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/jb5-mhd.jpg" class="card-img-top"/>
                    <div class="card-body">
                        <h5 class="card-title">Priority Class</h5>
                        <p class="card-text">Mulai Dari 4.5 Mio per Hari</p>
                        <span class="stok-text mb-3">4 Unit Ready</span> <div class="d-flex justify-content-between w-100 mb-2">
                            <button class="btn btn-primary btn-sewa w-50 me-1">Sewa</button>
                            <button class="btn btn-primary btn-wishlist w-50 ms-1">Wishlist</button>
                        </div>
                        <a href="" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/jb5-med.jpg" class="card-img-top"/>
                    <div class="card-body">
                        <h5 class="card-title">Pioneer Class</h5>
                        <p class="card-text">Mulai Dari 3.25 Mio per Hari</p>
                        <span class="stok-text mb-3">2 Unit Ready</span> <div class="d-flex justify-content-between w-100 mb-2">
                            <button class="btn btn-primary btn-sewa w-50 me-1">Sewa</button>
                            <button class="btn btn-primary btn-wishlist w-50 ms-1">Wishlist</button>
                        </div>
                        <a href="" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tambah-armada container mt-5 mb-5">
        <h3 class="mb-4 fw-bold text-white">Tambah Armada</h3>
        <div class="card p-4">
            <form>
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <i class="bi bi-car-front-fill me-2"></i> Nama Armada
                    </label>
                    <input style="-webkit-text-fill-color: rgb(49, 49, 49);" type="text" class="form-control" placeholder="Masukkan nama armada" />
                </div>

                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <i class="bi bi-tags-fill me-2"></i> Harga
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input style="-webkit-text-fill-color: rgb(49, 49, 49);" type="number" class="form-control" placeholder="Masukkan harga armada per hari" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <i class="bi bi-box-seam-fill me-2"></i> Jumlah Unit Ready
                    </label>
                    <input style="-webkit-text-fill-color: rgb(49, 49, 49);" type="number" class="form-control" placeholder="Masukkan jumlah unit armada yang tersedia" />
                </div>

                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i> Kategori Armada
                    </label>
                    <select style="-webkit-text-fill-color: rgb(49, 49, 49);" class="form-select">
                        <option selected disabled>Pilih kategori...</option>
                        <option>Big Bus</option>
                        <option>Medium Bus</option>
                        <option>Micro Bus</option>
                        <option>Van</option>
                        <option>Car</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="bi bi-check-circle-fill me-2"></i> Simpan Armada
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="main-footer">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <img src="assets/logo.png" alt="Logo" class="mb-3" style="max-height: 50px;">
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
                        <li><a href="#">Beranda</a></li>
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
                        <li><a href="{{ route('armada.grand_priority') }}">Grand Priority Class</a></li>
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
                        <img src="assets/footer-payment.png" alt="Metode Pembayaran">
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
    
    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Daftar Wishlist Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="daftar-wishlist" class="list-group list-group-flush">
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="hapusWishlist()">Kosongkan</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>