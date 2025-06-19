<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Halaman Awal</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('upConstruction') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('upConstruction') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('upConstruction') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('upConstruction') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('upConstruction') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('upConstruction') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('upConstruction') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('upConstruction') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('upConstruction') }}/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                
                <h1 class="sitename">Sistem Pemesanan Makanan Sederhana </h1> <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div class="info d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-6 text-center">
                            <h2>Welcomee </h2>
                            <p>haloo selamat datang di halaman awal pada sistem pemesanan sederhana iniiii </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-item">
                    <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
                </div>

                <div class="carousel-item active">
                    <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
                </div>

                <div class="carousel-item">
                    <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
                </div>

                <div class="carousel-item">
                    <img src="assets/img/hero-carousel/hero-carousel-4.jpg" alt="">
                </div>

                <div class="carousel-item">
                    <img src="assets/img/hero-carousel/hero-carousel-5.jpg" alt="">
                </div>

                {{-- <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a> --}}

            </div>

        </section><!-- /Hero Section -->

        <!-- [TAMBAHAN] About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About Us</h2>
                    <p>Sistem Pemesanan Makanan Sederhana ini merupakan sebuah sistem yang dibuat untuk mempermudah 
                        customer dalam melakukan pemesanan makanan dan bahkan memberi komentar serta rating pada pesanan
                        tersebut, jika ada kesalahan dalam sistem mohon dimaklumi baru belajar soalnya.</p>
                </div>
            </div>
        </section>

        <!-- [TAMBAHAN] Contact Section -->
        <section id="contact" class="contact section">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact Us</h2>
                    <p>Hubungi kami untuk informasi lebih lanjut atau pertanyaan mengenai layanan kami.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p>Tawalian Timur, Tawalian, Kabupaten Mamasa 91362</p>
                        </div>
                        <div class="info-box mb-4">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><melisamel278@gmail class="com"></melisamel278@gmail>melisamel278@gmail.com</p>
                        </div>
                        <div class="info-box mb-4">
                            <i class="bi bi-phone"></i>
                            <h3>Telepon</h3>
                            <p>+62 8135 4732 023</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                    required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Memuat</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                            </div>
                            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Sistem Pemesanan Makanan</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Tawalian Timur, Tawalian</p>
                        <p>Kabupaten Mamasa 91362</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 8135 4732 023</span></p>
                        <p><strong>Email:</strong> <span>melisamel278@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Product </a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Sistem Pemesanan Makanan Sederhana</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('upConstruction') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('upConstruction') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('upConstruction') }}/assets/js/main.js"></script>

</body>

</html>
