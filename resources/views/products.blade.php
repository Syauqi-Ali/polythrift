<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk | POLYTHRIFT</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #edf4ff;
            color: #27364b;
            font-size: 13px
        }

        .app {
            display: flex;
            min-height: 100vh
        }

        .sidebar {
            width: 230px;
            min-width: 230px;
            background: #fff;
            padding: 30px 19px 20px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e7edf6
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 42px 5px;
            color: #2058c7;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .5px
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background: #eaf1ff;
            border-radius: 9px;
            display: grid;
            place-items: center;
            font-size: 17px
        }

        .menu-label {
            font-size: 10px;
            color: #94a2b6;
            font-weight: 700;
            letter-spacing: .7px;
            margin: 0 9px 13px
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            border-radius: 8px;
            color: #66758b;
            text-decoration: none;
            font-size: 12px;
            transition: .2s
        }

        .menu a.active,
        .menu a:hover {
            background: #eaf1ff;
            color: #2867e8;
            font-weight: 700
        }

        .menu-icon {
            width: 18px;
            text-align: center;
            font-size: 15px
        }

        .settings-label {
            margin-top: 34px
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 4px 3px;
            border-top: 1px solid #edf1f7
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .avatar {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #dceaff;
            color: #3471e8;
            display: grid;
            place-items: center;
            font-weight: bold;
            font-size: 13px
        }

        .admin strong {
            display: block;
            font-size: 11px;
            margin-bottom: 4px
        }

        .admin small {
            font-size: 10px;
            color: #93a0b3
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 27px 32px 0;
            display: flex;
            flex-direction: column
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 27px
        }

        .breadcrumb {
            font-size: 11px;
            color: #8997ab
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 11px
        }

        .search-top {
            width: 220px;
            border: 1px solid #e3eaf4;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 11px;
            background: #fff;
            outline: none
        }

        .search-top:focus,
        .filters input:focus,
        .filters select:focus {
            border-color: #8eb1ff
        }

        .round {
            border: 1px solid #edf1f7;
            background: #fff;
            border-radius: 9px;
            width: 36px;
            height: 36px;
            font-size: 15px;
            color: #65748a;
            cursor: pointer
        }

        .user-label {
            font-size: 11px;
            color: #64748b
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px
        }

        h1 {
            font-size: 25px;
            font-weight: 750;
            margin-bottom: 7px;
            color: #26364e
        }

        .subtitle {
            font-size: 12px;
            color: #8997ab
        }

        .primary-btn {
            background: #2867e8;
            color: white;
            border: 0;
            border-radius: 7px;
            padding: 12px 17px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer
        }

        .primary-btn:hover {
            background: #1f55c9
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px
        }

        .stat {
            background: #fff;
            border: 1px solid #edf1f7;
            border-radius: 11px;
            padding: 19px 20px;
            box-shadow: 0 2px 8px #254a7a05
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px
        }

        .stat-label {
            font-size: 11px;
            color: #8190a5
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #edf3ff;
            display: grid;
            place-items: center;
            font-size: 16px;
            color: #2867e8
        }

        .stat-number {
            font-size: 25px;
            font-weight: 750;
            margin-bottom: 8px;
            color: #27364b
        }

        .stat-note {
            font-size: 10px;
            color: #2eaf7e
        }

        .stat-note.warning {
            color: #e69a3b
        }

        .filters {
            display: flex;
            gap: 10px;
            align-items: center;
            background: #fff;
            border: 1px solid #edf1f7;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 17px;
            flex-wrap: wrap
        }

        .filters input,
        .filters select {
            border: 1px solid #e3eaf4;
            border-radius: 7px;
            padding: 11px 12px;
            font-size: 11px;
            background: #fff;
            color: #65748a;
            min-width: 0
        }

        .filters input {
            flex: 1;
            min-width: 180px
        }

        .filters select {
            width: 150px
        }

        .table-card {
            background: #fff;
            border: 1px solid #edf1f7;
            border-radius: 11px;
            padding: 18px;
            flex: 1;
            box-shadow: 0 2px 8px #254a7a05
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px
        }

        .table-title {
            font-size: 14px;
            font-weight: 700
        }

        .table-subtitle {
            font-size: 10px;
            color: #8b99ad;
            margin-top: 5px
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap
        }

        th {
            font-size: 10px;
            color: #8190a5;
            background: #f7f9fd;
            padding: 14px 12px;
            font-weight: 700
        }

        td {
            font-size: 11px;
            padding: 14px 12px;
            border-bottom: 1px solid #edf1f7
        }

        tbody tr:last-child td {
            border-bottom: 0
        }

        .product {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .product-img {
            width: 43px;
            height: 45px;
            flex-shrink: 0;
            border-radius: 7px;
            background: #f0f4fb;
            display: grid;
            place-items: center;
            font-size: 23px
        }

        .product-name {
            font-weight: 700;
            color: #35445a
        }

        .product-code {
            display: block;
            color: #96a2b4;
            font-size: 10px;
            margin-top: 5px
        }

        .badge {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 10px;
            font-weight: 600
        }

        .active-badge {
            background: #e4f8ed;
            color: #23a16d
        }

        .low-badge {
            background: #fff1df;
            color: #df902d
        }

        .action {
            border: 0;
            background: none;
            color: #2867e8;
            margin-right: 9px;
            font-size: 11px;
            cursor: pointer
        }

        .action.delete {
            color: #e16d79
        }

        .empty {
            display: none;
            text-align: center;
            padding: 25px;
            color: #8a98aa
        }

        .footer {
            margin-top: 23px;
            padding: 17px 0;
            border-top: 1px solid #dce7f5;
            text-align: center;
            font-size: 10px;
            color: #8a98aa
        }

        .footer span {
            color: #2459c7;
            font-weight: bold
        }

        @media(max-width:1050px) {
            .sidebar {
                width: 195px;
                min-width: 195px;
                padding: 24px 13px
            }

            .main {
                padding: 22px 20px 0
            }

            .stats {
                gap: 10px
            }

            .stat {
                padding: 14px
            }

            .stat-number {
                font-size: 21px
            }

            .filters select {
                width: 125px
            }
        }

        @media(max-width:760px) {
            .sidebar {
                width: 165px;
                min-width: 165px;
                padding: 20px 10px
            }

            .brand {
                font-size: 15px
            }

            .menu a {
                padding: 10px 8px
            }

            .main {
                padding: 18px 12px 0
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .page-head {
                align-items: flex-start
            }

            .topbar {
                align-items: flex-start;
                flex-wrap: wrap
            }

            .search-top {
                width: 150px
            }

            .filters input {
                min-width: 130px
            }

            .filters select {
                flex: 1;
                width: auto
            }
        }

        @media(max-width:520px) {
            .app {
                display: block
            }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 15px
            }

            .brand {
                margin-bottom: 17px
            }

            .menu-label,
            .settings-label,
            .sidebar-bottom {
                display: none
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap
            }

            .menu a {
                padding: 9px;
                font-size: 10px;
                gap: 5px
            }

            .menu-icon {
                width: auto
            }

            .main {
                padding: 17px 10px 0
            }

            .page-head {
                gap: 8px
            }

            .stats {
                gap: 8px
            }

            .stat {
                padding: 12px
            }

            .stat-number {
                font-size: 21px
            }

            .stat-icon {
                width: 29px;
                height: 29px
            }

            .primary-btn {
                padding: 10px;
                font-size: 10px
            }

            .topbar {
                margin-bottom: 18px
            }
        }
    </style>
</head>

<body>
    <div class="app">
        <aside class="sidebar">
            <div class="brand"><span class="brand-icon">♧</span> POLYTHRIFT</div>
            <div class="menu-label">MENU UTAMA</div>
            <nav class="menu">
                <a href="{{ route('dashboard') }}"><span class="menu-icon">▦</span>Dashboard</a>
                <a href="{{ route('products') }}" class="active"><span class="menu-icon">▣</span>Produk</a>
                <a href="#"><span class="menu-icon">▤</span>Kategori</a>
                <a href="{{ route('orders') }}"><span class="menu-icon">▱</span>Pesanan</a>
                <a href="#"><span class="menu-icon">▥</span>Laporan</a>
            </nav>
            <div class="menu-label settings-label">PENGATURAN</div>
            <nav class="menu">
                <a href="#"><span class="menu-icon">♙</span>Profil Toko</a>
                <a href="#"><span class="menu-icon">⚙</span>Pengaturan</a>
            </nav>
            <div class="sidebar-bottom">
                <div class="admin">
                    <div class="avatar">A</div>
                    <div><strong>Admin Thrifty</strong><small>Administrator</small></div>
                </div>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="breadcrumb">Menu Utama &nbsp;›&nbsp; Produk</div>
                <div class="top-actions">
                    <input class="search-top" id="topSearch" type="search" placeholder="Cari produk..."
                        oninput="filterProducts()">
                    <button class="round" type="button" aria-label="Notifikasi">♧</button>
                    <button class="round" type="button" aria-label="Profil">♙</button>
                    <span class="user-label">Admin</span>
                </div>
            </header>

            <div class="page-head">
                <div>
                    <h1>Produk</h1>
                    <p class="subtitle">Kelola semua produk thrift yang tersedia di toko Anda.</p>
                </div>
                <button class="primary-btn" type="button"
                    onclick="alert('Form tambah produk akan dibuat selanjutnya.')">＋ Tambah Produk</button>
            </div>

            <section class="stats">
                <div class="stat">
                    <div class="stat-top"><span class="stat-label">Total Produk</span><span class="stat-icon">▣</span>
                    </div>
                    <div class="stat-number">124</div>
                    <div class="stat-note">↗ 12 produk baru</div>
                </div>
                <div class="stat">
                    <div class="stat-top"><span class="stat-label">Produk Aktif</span><span class="stat-icon">✓</span>
                    </div>
                    <div class="stat-number">86</div>
                    <div class="stat-note">69% dari total produk</div>
                </div>
                <div class="stat">
                    <div class="stat-top"><span class="stat-label">Produk Terjual</span><span class="stat-icon">▤</span>
                    </div>
                    <div class="stat-number">342</div>
                    <div class="stat-note">Penjualan bulan ini</div>
                </div>
                <div class="stat">
                    <div class="stat-top"><span class="stat-label">Stok Menipis</span><span class="stat-icon">!</span>
                    </div>
                    <div class="stat-number">12</div>
                    <div class="stat-note warning">Perlu diperiksa</div>
                </div>
            </section>

            <section class="filters">
                <input id="productSearch" type="search" placeholder="Cari nama produk, SKU, atau kategori..."
                    oninput="filterProducts()">
                <select id="categoryFilter" onchange="filterProducts()">
                    <option value="">Semua Kategori</option>
                    <option>Atasan</option>
                    <option>Celana</option>
                    <option>Jaket</option>
                    <option>Aksesori</option>
                </select>
                <select id="statusFilter" onchange="filterProducts()">
                    <option value="">Semua Status</option>
                    <option>Aktif</option>
                    <option>Stok Menipis</option>
                </select>
            </section>

            <section class="table-card">
                <div class="table-heading">
                    <div>
                        <div class="table-title">Daftar Produk</div>
                        <div class="table-subtitle">Kelola informasi dan persediaan produk toko.</div>
                    </div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>PRODUK</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="productRows">
                            <tr data-category="Atasan" data-status="Aktif">
                                <td>01</td>
                                <td>
                                    <div class="product">
                                        <div class="product-img">👕</div>
                                        <div><span class="product-name">Vintage T-Shirt</span><span
                                                class="product-code">SKU: VT-001</span></div>
                                    </div>
                                </td>
                                <td>Atasan</td>
                                <td>Rp85.000</td>
                                <td>24 pcs</td>
                                <td><span class="badge active-badge">Aktif</span></td>
                                <td><button class="action"
                                        onclick="alert('Fitur edit akan dibuat berikutnya.')">Edit</button><button
                                        class="action delete" onclick="removeProduct(this)">Hapus</button></td>
                            </tr>
                            <tr data-category="Jaket" data-status="Aktif">
                                <td>02</td>
                                <td>
                                    <div class="product">
                                        <div class="product-img">🧥</div>
                                        <div><span class="product-name">Jaket Denim Retro</span><span
                                                class="product-code">SKU: JD-002</span></div>
                                    </div>
                                </td>
                                <td>Jaket</td>
                                <td>Rp175.000</td>
                                <td>16 pcs</td>
                                <td><span class="badge active-badge">Aktif</span></td>
                                <td><button class="action"
                                        onclick="alert('Fitur edit akan dibuat berikutnya.')">Edit</button><button
                                        class="action delete" onclick="removeProduct(this)">Hapus</button></td>
                            </tr>
                            <tr data-category="Atasan" data-status="Stok Menipis">
                                <td>03</td>
                                <td>
                                    <div class="product">
                                        <div class="product-img">👔</div>
                                        <div><span class="product-name">Kemeja Vintage</span><span
                                                class="product-code">SKU: KV-003</span></div>
                                    </div>
                                </td>
                                <td>Atasan</td>
                                <td>Rp95.000</td>
                                <td>3 pcs</td>
                                <td><span class="badge low-badge">Stok Menipis</span></td>
                                <td><button class="action"
                                        onclick="alert('Fitur edit akan dibuat berikutnya.')">Edit</button><button
                                        class="action delete" onclick="removeProduct(this)">Hapus</button></td>
                            </tr>
                            <tr data-category="Celana" data-status="Aktif">
                                <td>04</td>
                                <td>
                                    <div class="product">
                                        <div class="product-img">👖</div>
                                        <div><span class="product-name">Vintage Jeans</span><span
                                                class="product-code">SKU: VJ-004</span></div>
                                    </div>
                                </td>
                                <td>Celana</td>
                                <td>Rp125.000</td>
                                <td>18 pcs</td>
                                <td><span class="badge active-badge">Aktif</span></td>
                                <td><button class="action"
                                        onclick="alert('Fitur edit akan dibuat berikutnya.')">Edit</button><button
                                        class="action delete" onclick="removeProduct(this)">Hapus</button></td>
                            </tr>
                            <tr data-category="Aksesori" data-status="Stok Menipis">
                                <td>05</td>
                                <td>
                                    <div class="product">
                                        <div class="product-img">👜</div>
                                        <div><span class="product-name">Retro Shoulder Bag</span><span
                                                class="product-code">SKU: RB-005</span></div>
                                    </div>
                                </td>
                                <td>Aksesori</td>
                                <td>Rp110.000</td>
                                <td>2 pcs</td>
                                <td><span class="badge low-badge">Stok Menipis</span></td>
                                <td><button class="action"
                                        onclick="alert('Fitur edit akan dibuat berikutnya.')">Edit</button><button
                                        class="action delete" onclick="removeProduct(this)">Hapus</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="emptyMessage" class="empty">Produk tidak ditemukan.</div>
                </div>
            </section>
            <footer class="footer">© 2026 <span>POLYTHRIFT</span> · All rights reserved.</footer>
        </main>
    </div>
    <script>
        function filterProducts() {
            const query = (document.getElementById('productSearch').value + ' ' + document.getElementById('topSearch').value).toLowerCase();
            const category = document.getElementById('categoryFilter').value;
            const status = document.getElementById('statusFilter').value;
            let visible = 0;
            document.querySelectorAll('#productRows tr').forEach(row => {
                const show = row.innerText.toLowerCase().includes(query) && (!category || row.dataset.category === category) && (!status || row.dataset.status === status);
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            document.getElementById('emptyMessage').style.display = visible === 0 ? 'block' : 'none';
        }
        function removeProduct(button) { if (confirm('Hapus baris produk contoh ini dari tampilan?')) button.closest('tr').remove(); }
    </script>
</body>

</html>