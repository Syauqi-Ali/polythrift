
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polythrift | Not Your Ordinary Thrift Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #293950;
            background: #dce5ef;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVBAR */
        .navbar {
            min-height: 54px;
            padding: 0 6%;
            background: #e8f2ff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #2867c7;
        }

        .nav-link {
            font-size: 12px;
            color: #33445d;
        }

        .nav-link:hover {
            color: #2876d2;
        }

        /* HERO BANNER */
        .hero {
            min-height: 330px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 45px 20px;
            color: white;
            background:
                linear-gradient(rgba(15, 25, 38, .48),
                                rgba(15, 25, 38, .48)),
                url('https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=1600&q=85')
                center 45% / cover no-repeat;
        }

        .hero h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-weight: 400;
            font-size: clamp(34px, 5vw, 50px);
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .shop-button {
            display: inline-block;
            padding: 12px 27px;
            border: 1px solid white;
            border-radius: 3px;
            font-size: 11px;
            letter-spacing: 1px;
            transition: .2s;
        }

        .shop-button:hover {
            background: white;
            color: #102e59;
        }

        /* PRODUCT */
        .products {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 6% 40px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            background: #dce5ef;
        }

        .product-card {
            padding: 8px;
            background: white;
            text-align: center;
            box-shadow: 0 2px 8px rgba(31, 50, 73, .08);
        }

        .product-card img {
            width: 100%;
            height: 190px;
            display: block;
            object-fit: cover;
        }

        .product-card h3 {
            font-size: 12px;
            margin: 10px 0 5px;
            color: #34445a;
        }

        .product-card p {
            font-size: 11px;
            color: #778398;
            padding-bottom: 5px;
        }

        /* GENERAL SECTION */
        .section-label {
            font-size: 11px;
            font-weight: bold;
            color: #3474cb;
            margin-bottom: 10px;
        }

        /* ABOUT US */
        .about {
            background: #edf5ff;
            padding: 50px 7%;
        }

        .about-inner {
            max-width: 1050px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 35px;
        }

        .about-image img {
            display: block;
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
        }

        .about h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            font-weight: 400;
            margin-bottom: 15px;
            color: #293d59;
        }

        .about p {
            font-size: 13px;
            line-height: 1.9;
            color: #5c6b7e;
        }

        /* BENEFITS */
        .benefits {
            padding: 12px 7% 50px;
            background: #edf5ff;
        }

        .benefits-inner {
            max-width: 1050px;
            margin: auto;
        }

        .benefits h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 27px;
            font-weight: 400;
            margin-bottom: 22px;
            color: #293d59;
        }

        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .benefit-card {
            background: white;
            border-radius: 9px;
            padding: 20px 15px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            box-shadow: 0 2px 8px rgba(35, 63, 95, .05);
        }

        .benefit-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e2edff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .benefit-card h3 {
            font-size: 12px;
            margin-bottom: 8px;
            color: #304c72;
        }

        .benefit-card p {
            font-size: 11px;
            line-height: 1.7;
            color: #738094;
        }

        /* FOOTER - TRAVELOKA-INSPIRED */
        .footer {
            background: #0b2d5c;
            color: white;
            padding: 50px 6% 25px;
        }

        .footer-container {
            max-width: 1250px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.35fr 1fr 1fr 1fr;
            gap: 42px;
        }

        .footer-logo {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 17px;
            color: white;
        }

        .footer-description {
            color: #d4e1f3;
            font-size: 13px;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 37px;
            height: 37px;
            border: 1px solid rgba(255,255,255,.4);
            border-radius: 50%;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .social-link:hover {
            background: #168be0;
        }

        .footer-column h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 25px;
            color: white;
        }

        .footer-column a {
            display: block;
            color: #e0e9f6;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 19px;
            transition: color .2s;
        }

        .footer-column a:hover {
            color: #70c6ff;
        }

        .footer-bottom {
            max-width: 1250px;
            margin: 30px auto 0;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,.22);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            color: #c8d8ec;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .products {
                gap: 12px;
            }

            .product-card img {
                height: 155px;
            }

            .footer-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 30px 24px;
            }
        }

        @media (max-width: 550px) {
            .navbar {
                min-height: 48px;
                padding: 0 5%;
            }

            .logo {
                font-size: 15px;
            }

            .nav-link {
                font-size: 11px;
            }

            .hero {
                min-height: 245px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .products {
                padding: 0 4% 28px;
                gap: 9px;
            }

            .product-card {
                padding: 5px;
            }

            .product-card img {
                height: 125px;
            }

            .product-card h3 {
                font-size: 10px;
            }

            .product-card p {
                font-size: 9px;
            }

            .about {
                padding: 32px 6%;
            }

            .about-inner {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .about-image img {
                height: 210px;
            }

            .about h2 {
                font-size: 25px;
            }

            .benefits {
                padding: 5px 6% 35px;
            }

            .benefits h2 {
                font-size: 24px;
            }

            .benefit-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .footer {
                padding: 35px 6% 22px;
            }

            .footer-container {
                gap: 28px 16px;
            }

            .footer-logo {
                font-size: 21px;
            }

            .footer-column h3 {
                font-size: 14px;
                margin-bottom: 17px;
            }

            .footer-column a {
                font-size: 12px;
                margin-bottom: 14px;
            }

            .footer-description {
                font-size: 12px;
            }

            .footer-bottom {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <a href="#home" class="logo">POLYTHRIFT</a>
        <a href="#produk" class="nav-link">Let's explore ✦</a>
    </header>

    <main>

        <!-- HERO -->
        <section class="hero" id="home">
            <div>
                <h1>Not Your Ordinary<br>Thrift Store</h1>
                <a href="#produk" class="shop-button">SHOP NOW</a>
            </div>
        </section>

        <!-- PRODUCT LIST -->
        <section class="products" id="produk">

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&w=500&q=80"
                     alt="Sweater vintage">
                <h3>VINTAGE SWEATER</h3>
                <p>Rp85.000 | SIZE M</p>
            </article>

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=500&q=80"
                     alt="Jaket denim">
                <h3>DENIM JACKET</h3>
                <p>Rp120.000 | SIZE L</p>
            </article>

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=500&q=80"
                     alt="Kaos kasual">
                <h3>CASUAL T-SHIRT</h3>
                <p>Rp45.000 | SIZE M</p>
            </article>

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1627225924765-552d49cf47ad?auto=format&fit=crop&w=500&q=80"
                     alt="Koleksi pakaian vintage">
                <h3>VINTAGE COLLECTION</h3>
                <p>Rp65.000 | SIZE L</p>
            </article>

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=500&q=80"
                     alt="Kemeja bergaris">
                <h3>STRIPED SHIRT</h3>
                <p>Rp55.000 | SIZE M</p>
            </article>

            <article class="product-card">
                <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=500&q=80"
                     alt="Jaket kasual">
                <h3>CLASSIC JACKET</h3>
                <p>Rp95.000 | SIZE L</p>
            </article>

        </section>

        <!-- ABOUT US -->
        <section class="about" id="tentang">
            <div class="about-inner">

                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=900&q=85"
                         alt="Fashion pilihan Polythrift">
                </div>

                <div>
                    <div class="section-label">Tentang Kami</div>
                    <h2>POLYTHRIFT</h2>
                    <p>
                        POLYTHRIFT adalah marketplace fashion preloved
                        yang menghadirkan pakaian berkualitas dengan
                        harga bersahabat. Kami percaya bahwa tampil
                        stylish tidak harus mahal. Melalui thrift,
                        kamu bisa menemukan gaya unik sekaligus
                        mendukung fashion yang lebih berkelanjutan.
                    </p>
                </div>

            </div>
        </section>

        <!-- WHY POLYTHRIFT -->
        <section class="benefits">
            <div class="benefits-inner">

                <div class="section-label">KENAPA POLYTHRIFT?</div>
                <h2>Lebih dari sekadar Thrift</h2>

                <div class="benefit-grid">

                    <article class="benefit-card">
                        <div class="benefit-icon">♻</div>
                        <div>
                            <h3>Ramah Lingkungan</h3>
                            <p>
                                Pilihan fashion preloved membantu
                                mengurangi limbah tekstil dan
                                mendukung gaya hidup berkelanjutan.
                            </p>
                        </div>
                    </article>

                    <article class="benefit-card">
                        <div class="benefit-icon">♡</div>
                        <div>
                            <h3>Harga Terjangkau</h3>
                            <p>
                                Temukan pakaian berkualitas dengan
                                harga bersahabat tanpa mengorbankan
                                gaya dan kenyamanan.
                            </p>
                        </div>
                    </article>

                    <article class="benefit-card">
                        <div class="benefit-icon">✦</div>
                        <div>
                            <h3>Ragam Pilihan</h3>
                            <p>
                                Jelajahi berbagai gaya unik untuk
                                menemukan pakaian yang sesuai dengan
                                kepribadianmu.
                            </p>
                        </div>
                    </article>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer" id="kontak">

        <div class="footer-container">

            <div class="footer-brand">
                <div class="footer-logo">POLYTHRIFT.</div>

                <p class="footer-description">
                    Temukan fashion preloved berkualitas dengan
                    harga bersahabat. Tampil unik, belanja bijak,
                    dan dukung fashion berkelanjutan bersama Polythrift.
                </p>

                <p class="footer-description">
                    Secondhand fashion, first choice.
                </p>

                <div class="footer-social">
                    <a class="social-link"
                       href="https://www.instagram.com/"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="Instagram">IG</a>

                    <a class="social-link"
                       href="https://www.tiktok.com/"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="TikTok">TK</a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Tentang Polythrift</h3>
                <a href="#tentang">Tentang Kami</a>
                <a href="#produk">Koleksi Produk</a>
                <a href="#home">Beranda</a>
                <a href="#kontak">Hubungi Kami</a>
            </div>

            <div class="footer-column">
                <h3>Kategori</h3>
                <a href="#produk">Atasan</a>
                <a href="#produk">Celana</a>
                <a href="#produk">Jaket</a>
                <a href="#produk">Aksesori</a>
            </div>

            <div class="footer-column">
                <h3>Bantuan & Lainnya</h3>
                <a href="#kontak">Cara Berbelanja</a>
                <a href="#kontak">Informasi Pengiriman</a>
                <a href="#kontak">Kebijakan Privasi</a>
                <a href="#kontak">Syarat & Ketentuan</a>
                <a href="https://www.instagram.com/"
                   target="_blank" rel="noopener noreferrer">
                    Instagram Polythrift
                </a>
            </div>

        </div>

        <div class="footer-bottom">
            <span>&copy; 2026 Polythrift. All rights reserved.</span>
            <span>Fashion lebih bijak, gaya lebih unik.</span>
        </div>

    </footer>

</body>
</html>
