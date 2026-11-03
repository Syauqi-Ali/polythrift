<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | POLYTHRIFT</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #e7f1ff;
            color: #26364e;
            font-size: 10px;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 195px;
            min-width: 195px;
            background: #fff;
            padding: 24px 16px 14px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #edf1f8;
        }

        .brand {
            padding: 0 7px;
            margin-bottom: 24px;
        }

        .brand-name {
            font-size: 12px;
            font-weight: 800;
            color: #2058c7;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .brand-name span {
            color: #2058c7;
        }

        .menu-label {
            color: #93a2b8;
            font-size: 7px;
            font-weight: 700;
            margin: 0 7px 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .menu a {
            color: #66758b;
            text-decoration: none;
            padding: 9px 10px;
            border-radius: 5px;
            font-size: 9px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .menu a:hover {
            background: #f0f5ff;
            color: #2463e8;
        }

        .menu a.active {
            background: #edf3ff;
            color: #2463e8;
            font-weight: 700;
        }

        .menu-icon {
            width: 12px;
            text-align: center;
            font-size: 11px;
        }

        .settings-label {
            margin-top: 28px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 16px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 0 5px;
        }

        .avatar {
            width: 24px;
            height: 24px;
            background: #dceaff;
            color: #3673e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 700;
        }

        .admin-info strong {
            display: block;
            font-size: 8px;
            margin-bottom: 3px;
        }

        .admin-info small {
            font-size: 7px;
            color: #95a1b4;
        }

        /* MAIN */
        .main {
            flex: 1;
            min-width: 0;
            padding: 24px 22px 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .page-title {
            font-size: 18px;
            font-weight: 750;
            color: #26364e;
        }

        .page-subtitle {
            font-size: 8px;
            color: #8795aa;
            margin-top: 5px;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-box {
            background: white;
            border: 1px solid #e8eef8;
            padding: 8px 12px;
            border-radius: 7px;
            color: #66758b;
            font-size: 8px;
            white-space: nowrap;
        }

        .notification {
            width: 25px;
            height: 25px;
            border: none;
            background: white;
            border-radius: 50%;
            color: #596982;
            font-size: 12px;
            position: relative;
        }

        .notification::after {
            content: "";
            width: 5px;
            height: 5px;
            position: absolute;
            right: 5px;
            top: 4px;
            background: #4778ed;
            border: 1px solid white;
            border-radius: 50%;
        }

        /* STATISTICS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 16px;
        }

        .stat-card {
            background: white;
            border-radius: 9px;
            padding: 13px 12px;
            min-width: 0;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5px;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 8px;
            color: #75849a;
        }

        .stat-icon {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .blue {
            background: #edf3ff;
            color: #4a7ced;
        }

        .purple {
            background: #f1edff;
            color: #8e76e8;
        }

        .orange {
            background: #fff2e2;
            color: #e7a044;
        }

        .green {
            background: #e7f8ef;
            color: #32ae7d;
        }

        .stat-number {
            font-size: 18px;
            font-weight: 750;
            letter-spacing: -0.4px;
            margin-bottom: 5px;
        }

        .stat-description {
            color: #8795aa;
            font-size: 7px;
        }

        .trend-up {
            color: #2db181;
        }

        .stat-card.highlight {
            background: #2861e8;
            color: white;
        }

        .highlight .stat-label,
        .highlight .stat-description {
            color: #dce7ff;
        }

        .highlight .stat-icon {
            background: rgba(255,255,255,.16);
            color: white;
        }

        /* CHARTS */
        .charts-grid {
            display: grid;
            grid-template-columns: 1.7fr 0.8fr;
            gap: 12px;
            margin-bottom: 14px;
        }

        .chart-card {
            background: white;
            border-radius: 9px;
            padding: 14px;
            min-width: 0;
        }

        .card-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 12px;
        }

        .card-title {
            font-size: 10px;
            font-weight: 750;
            color: #26364e;
        }

        .card-description {
            font-size: 7px;
            color: #92a0b3;
            margin-top: 4px;
        }

        .chart-area {
            width: 100%;
            overflow: hidden;
        }

        .chart-area svg {
            display: block;
            width: 100%;
            height: auto;
        }

        .donut-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2px 0 5px;
        }

        .donut {
            width: 118px;
            height: 118px;
            max-width: 100%;
        }

        .status-legend {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 7px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 7px;
            color: #7c8ba0;
        }

        .legend-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* LOWER PANELS */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 12px;
            margin-bottom: 14px;
        }

        .table-card {
            background: white;
            border-radius: 9px;
            padding: 14px;
            min-width: 0;
        }

        .view-all {
            color: #2861e8;
            font-size: 7px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap;
        }

        th {
            color: #8795aa;
            font-size: 6px;
            font-weight: 600;
            padding: 8px 4px;
            border-bottom: 1px solid #edf1f7;
        }

        td {
            padding: 8px 4px;
            font-size: 7px;
            border-bottom: 1px solid #f0f3f8;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            border-radius: 10px;
            padding: 4px 6px;
            font-size: 6px;
            font-weight: 700;
        }

        .status-process {
            color: #d68a25;
            background: #fff3df;
        }

        .status-success {
            color: #21986d;
            background: #e6f8ef;
        }

        .status-cancel {
            color: #d95f66;
            background: #ffeded;
        }

        /* FOOTER */
        .dashboard-footer {
            margin-top: auto;
            padding: 13px 0;
            border-top: 1px solid #dce7f5;
            color: #8a98aa;
            font-size: 8px;
            text-align: center;
        }

        .dashboard-footer span {
            color: #2459c7;
            font-weight: 700;
        }

        /* RESPONSIVE */
        @media (min-width: 1200px) {
            .main {
                padding-left: 26px;
                padding-right: 26px;
            }

            .stat-card {
                padding: 15px;
            }

            .chart-card,
            .table-card {
                padding: 16px;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 155px;
                min-width: 155px;
                padding-left: 10px;
                padding-right: 10px;
            }

            .main {
                padding-left: 14px;
                padding-right: 14px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .app {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 16px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .menu-label,
            .settings-label,
            .sidebar-bottom {
                display: none;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .menu a {
                padding: 8px;
            }

            .main {
                padding: 18px 12px 0;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-name">POLY<span>THRIFT</span></div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ route('dashboard') }}" class="active">
                <span class="menu-icon">▦</span>
                Dashboard
            </a>

            <a href="#">
                <span class="menu-icon">▣</span>
                Produk
            </a>

            <a href="#">
                <span class="menu-icon">▤</span>
                Kategori
            </a>

            <a href="#">
                <span class="menu-icon">▱</span>
                Pesanan
            </a>

            <a href="#">
                <span class="menu-icon">▥</span>
                Laporan
            </a>
        </nav>

        <div class="menu-label settings-label">PENGATURAN</div>

        <nav class="menu">
            <a href="#">
                <span class="menu-icon">♙</span>
                Profil Toko
            </a>

            <a href="#">
                <span class="menu-icon">⚙</span>
                Pengaturan
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="admin-profile">
                <div class="avatar">A</div>
                <div class="admin-info">
                    <strong>Admin Thrifty</strong>
                    <small>Administrator</small>
                </div>
            </div>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- HEADER -->
        <header class="topbar">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">
                    Ringkasan aktivitas toko thrift hari ini
                </p>
            </div>

            <div class="top-actions">
                <div class="date-box">21 September 2026</div>
                <button class="notification" type="button" aria-label="Notifikasi">●</button>
            </div>
        </header>

        <!-- STATISTICS -->
        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Total Produk</span>
                    <div class="stat-icon blue">▣</div>
                </div>
                <div class="stat-number">248</div>
                <div class="stat-description">
                    <span class="trend-up">+12 produk baru</span> bulan ini
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Total Pesanan</span>
                    <div class="stat-icon purple">▱</div>
                </div>
                <div class="stat-number">126</div>
                <div class="stat-description">
                    <span class="trend-up">+14,5%</span> dari bulan lalu
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Pesanan Diproses</span>
                    <div class="stat-icon orange">◷</div>
                </div>
                <div class="stat-number">18</div>
                <div class="stat-description">
                    Perlu ditindaklanjuti
                </div>
            </div>

            <div class="stat-card highlight">
                <div class="stat-top">
                    <span class="stat-label">Total Pendapatan</span>
                    <div class="stat-icon">↗</div>
                </div>
                <div class="stat-number">Rp8,16 jt</div>
                <div class="stat-description">
                    +18,5% dari bulan lalu
                </div>
            </div>

        </section>

        <!-- SALES AND ORDER STATUS -->
        <section class="charts-grid">

            <div class="chart-card">
                <div class="card-heading">
                    <div>
                        <h2 class="card-title">Penjualan Bulanan</h2>
                        <p class="card-description">
                            Perkembangan penjualan toko selama tahun 2026
                        </p>
                    </div>
                </div>

                <div class="chart-area">
                    <svg viewBox="0 0 560 205"
                         role="img"
                         aria-label="Grafik penjualan bulanan">

                        <g stroke="#edf1f7" stroke-width="1">
                            <line x1="24" y1="20" x2="540" y2="20"/>
                            <line x1="24" y1="58" x2="540" y2="58"/>
                            <line x1="24" y1="96" x2="540" y2="96"/>
                            <line x1="24" y1="134" x2="540" y2="134"/>
                            <line x1="24" y1="172" x2="540" y2="172"/>
                        </g>

                        <path d="M24 143 L70 127 L116 137 L162 93 L208 108 L254 72 L300 83 L346 36 L392 52 L438 25 L484 44 L530 15"
                              fill="none"
                              stroke="#2867ff"
                              stroke-width="2.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>

                        <g fill="#2867ff">
                            <circle cx="24" cy="143" r="3"/>
                            <circle cx="70" cy="127" r="3"/>
                            <circle cx="116" cy="137" r="3"/>
                            <circle cx="162" cy="93" r="3"/>
                            <circle cx="208" cy="108" r="3"/>
                            <circle cx="254" cy="72" r="3"/>
                            <circle cx="300" cy="83" r="3"/>
                            <circle cx="346" cy="36" r="3"/>
                            <circle cx="392" cy="52" r="3"/>
                            <circle cx="438" cy="25" r="3"/>
                            <circle cx="484" cy="44" r="3"/>
                            <circle cx="530" cy="15" r="3"/>
                        </g>

                        <g fill="#93a0b3" font-size="8" text-anchor="middle">
                            <text x="24" y="192">Jan</text>
                            <text x="70" y="192">Feb</text>
                            <text x="116" y="192">Mar</text>
                            <text x="162" y="192">Apr</text>
                            <text x="208" y="192">Mei</text>
                            <text x="254" y="192">Jun</text>
                            <text x="300" y="192">Jul</text>
                            <text x="346" y="192">Agu</text>
                            <text x="392" y="192">Sep</text>
                            <text x="438" y="192">Okt</text>
                            <text x="484" y="192">Nov</text>
                            <text x="530" y="192">Des</text>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="chart-card">
                <div class="card-heading">
                    <div>
                        <h2 class="card-title">Status Pesanan</h2>
                        <p class="card-description">Ringkasan pesanan saat ini</p>
                    </div>
                </div>

                <div class="donut-wrap">
                    <svg class="donut"
                         viewBox="0 0 160 160"
                         role="img"
                         aria-label="Diagram status pesanan">

                        <circle cx="80" cy="80" r="56"
                                fill="none"
                                stroke="#edf2fa"
                                stroke-width="20"/>

                        <circle cx="80" cy="80" r="56"
                                fill="none"
                                stroke="#2867ff"
                                stroke-width="20"
                                stroke-dasharray="180 172"
                                transform="rotate(-90 80 80)"/>

                        <circle cx="80" cy="80" r="56"
                                fill="none"
                                stroke="#78a9ff"
                                stroke-width="20"
                                stroke-dasharray="72 280"
                                stroke-dashoffset="-187"
                                transform="rotate(-90 80 80)"/>

                        <circle cx="80" cy="80" r="56"
                                fill="none"
                                stroke="#b8d4ff"
                                stroke-width="20"
                                stroke-dasharray="30 322"
                                stroke-dashoffset="-265"
                                transform="rotate(-90 80 80)"/>

                        <text x="80" y="78"
                              text-anchor="middle"
                              fill="#26364e"
                              font-size="19"
                              font-weight="700">126</text>

                        <text x="80" y="92"
                              text-anchor="middle"
                              fill="#8b99ad"
                              font-size="8">pesanan</text>
                    </svg>
                </div>

                <div class="status-legend">
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#2867ff;"></span>
                        Selesai 64%
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot" style="background:#78a9ff;"></span>
                        Diproses 22%
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot" style="background:#b8d4ff;"></span>
                        Lainnya 14%
                    </div>
                </div>
            </div>

        </section>

        <!-- CATEGORY AND RECENT ORDERS -->
        <section class="bottom-grid">

            <div class="chart-card">
                <div class="card-heading">
                    <div>
                        <h2 class="card-title">Kategori Produk</h2>
                        <p class="card-description">
                            Jumlah produk berdasarkan kategori
                        </p>
                    </div>
                </div>

                <div class="chart-area">
                    <svg viewBox="0 0 340 150"
                         role="img"
                         aria-label="Grafik batang kategori produk">

                        <g stroke="#edf1f7" stroke-width="1">
                            <line x1="15" y1="118" x2="325" y2="118"/>
                            <line x1="15" y1="80" x2="325" y2="80"/>
                            <line x1="15" y1="42" x2="325" y2="42"/>
                        </g>

                        <g>
                            <rect x="35" y="70" width="25" height="48" rx="4" fill="#8fc0ff"/>
                            <rect x="90" y="48" width="25" height="70" rx="4" fill="#5c9cff"/>
                            <rect x="145" y="82" width="25" height="36" rx="4" fill="#bdd9ff"/>
                            <rect x="200" y="15" width="25" height="103" rx="4" fill="#2867ff"/>
                            <rect x="255" y="62" width="25" height="56" rx="4" fill="#8fc0ff"/>
                        </g>

                        <g fill="#8997ab" font-size="8" text-anchor="middle">
                            <text x="47" y="132">Atasan</text>
                            <text x="102" y="132">Celana</text>
                            <text x="157" y="132">Jaket</text>
                            <text x="212" y="132">Dress</text>
                            <text x="267" y="132">Aksesori</text>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="table-card">
                <div class="card-heading">
                    <div>
                        <h2 class="card-title">Pesanan Terbaru</h2>
                        <p class="card-description">Transaksi terbaru dari pelanggan</p>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>PESANAN</th>
                                <th>PELANGGAN</th>
                                <th>TOTAL</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>#PT001</td>
                                <td>Nadia</td>
                                <td>Rp125.000</td>
                                <td><span class="status-badge status-success">Selesai</span></td>
                            </tr>

                            <tr>
                                <td>#PT002</td>
                                <td>Bima</td>
                                <td>Rp75.000</td>
                                <td><span class="status-badge status-process">Diproses</span></td>
                            </tr>

                            <tr>
                                <td>#PT003</td>
                                <td>Dimas</td>
                                <td>Rp200.000</td>
                                <td><span class="status-badge status-cancel">Dibatalkan</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="text-align:right;margin-top:10px;">
                    <a href="#" class="view-all">Lihat semua →</a>
                </div>
            </div>

        </section>

        <!-- FOOTER -->
        <footer class="dashboard-footer">
            © 2026 <span>POLYTHRIFT</span> · All rights reserved.
        </footer>

    </main>
</div>
</body>
</html>
