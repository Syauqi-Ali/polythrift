<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan | POLYTHRIFT</title>
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
            justify-content: flex-end;
            align-items: center;
            gap: 11px;
            margin-bottom: 27px
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

        .filters {
            display: flex;
            gap: 10px;
            align-items: center;
            background: #fff;
            border: 1px solid #edf1f7;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 18px;
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
            width: 155px
        }

        .reset {
            border: 1px solid #e3eaf4;
            background: #fff;
            border-radius: 7px;
            padding: 11px 13px;
            color: #df6680;
            font-size: 11px;
            cursor: pointer
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
            margin-bottom: 16px
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
            width: 100%;
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
            padding: 16px 12px;
            border-bottom: 1px solid #edf1f7
        }

        tbody tr:last-child td {
            border-bottom: 0
        }

        .badge {
            display: inline-block;
            border-radius: 20px;
            padding: 7px 11px;
            font-size: 10px;
            font-weight: 600
        }

        .processing {
            color: #2867e8;
            background: #eaf1ff
        }

        .completed {
            color: #22a06c;
            background: #e4f8ed
        }

        .pending {
            color: #d68a25;
            background: #fff2df
        }

        .cancelled {
            color: #d95f78;
            background: #ffeaf0
        }

        .action {
            border: 0;
            background: none;
            color: #2867e8;
            font-size: 11px;
            cursor: pointer
        }

        .empty {
            display: none;
            text-align: center;
            padding: 25px;
            color: #8a98aa
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-top: 17px;
            color: #8795aa;
            font-size: 10px
        }

        .pages {
            display: flex;
            gap: 5px
        }

        .pages button {
            width: 30px;
            height: 30px;
            border: 1px solid #e5ebf5;
            background: #fff;
            color: #64748b;
            border-radius: 6px;
            font-size: 11px;
            cursor: pointer
        }

        .pages button.current {
            background: #2867e8;
            color: #fff;
            border-color: #2867e8
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

            .filters select {
                width: 130px
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

            .topbar {
                justify-content: flex-start;
                flex-wrap: wrap;
                margin-bottom: 20px
            }

            .search-top {
                width: 150px
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
                <a href="{{ route('products') }}"><span class="menu-icon">▣</span>Produk</a>
                <a href="#"><span class="menu-icon">▤</span>Kategori</a>
                <a href="{{ route('orders') }}" class="active"><span class="menu-icon">▱</span>Pesanan</a>
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
                <input class="search-top" id="topSearch" type="search" placeholder="Cari pesanan..."
                    oninput="filterOrders()">
                <button class="round" type="button" aria-label="Notifikasi">♧</button>
                <button class="round" type="button" aria-label="Profil">♙</button>
                <span class="user-label">Admin</span>
            </header>

            <div class="page-head">
                <h1>Order Lists</h1>
                <p class="subtitle">Pantau dan kelola semua pesanan pelanggan POLYTHRIFT.</p>
            </div>

            <section class="filters">
                <input id="orderSearch" type="search" placeholder="Cari ID pesanan atau nama pelanggan..."
                    oninput="filterOrders()">
                <select id="statusFilter" onchange="filterOrders()">
                    <option value="">Semua Status</option>
                    <option value="Processing">Processing</option>
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                <select id="dateFilter" onchange="filterOrders()">
                    <option value="">Semua Tanggal</option>
                    <option value="2026-09-21">21 Sep 2026</option>
                    <option value="2026-09-20">20 Sep 2026</option>
                    <option value="2026-09-19">19 Sep 2026</option>
                </select>
                <button class="reset" type="button" onclick="resetFilters()">✕ Reset Filter</button>
            </section>

            <section class="table-card">
                <div class="table-heading">
                    <div>
                        <div class="table-title">Daftar Pesanan</div>
                        <div class="table-subtitle">Informasi pesanan dan status transaksi pelanggan.</div>
                    </div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>NAMA PELANGGAN</th>
                                <th>ALAMAT</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="orderRows">
                            <tr data-status="Processing" data-date="2026-09-21">
                                <td>#1001</td>
                                <td>Nadia</td>
                                <td>Jl. Mawar No. 12</td>
                                <td>21 Sep 2026</td>
                                <td>Atasan</td>
                                <td><span class="badge processing">Processing</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                            <tr data-status="Completed" data-date="2026-09-21">
                                <td>#1002</td>
                                <td>Galih Gama</td>
                                <td>Jl. Veteran No. 45</td>
                                <td>21 Sep 2026</td>
                                <td>Jaket</td>
                                <td><span class="badge completed">Completed</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                            <tr data-status="Pending" data-date="2026-09-20">
                                <td>#1003</td>
                                <td>Rizky</td>
                                <td>Jl. Ahmad Yani No. 20</td>
                                <td>20 Sep 2026</td>
                                <td>Celana</td>
                                <td><span class="badge pending">Pending</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                            <tr data-status="Cancelled" data-date="2026-09-20">
                                <td>#1004</td>
                                <td>Siti Rahma</td>
                                <td>Jl. Diponegoro No. 8</td>
                                <td>20 Sep 2026</td>
                                <td>Aksesori</td>
                                <td><span class="badge cancelled">Cancelled</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                            <tr data-status="Processing" data-date="2026-09-19">
                                <td>#1005</td>
                                <td>Bima</td>
                                <td>Jl. Gajah Mada No. 17</td>
                                <td>19 Sep 2026</td>
                                <td>Atasan</td>
                                <td><span class="badge processing">Processing</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                            <tr data-status="Completed" data-date="2026-09-19">
                                <td>#1006</td>
                                <td>Dewi</td>
                                <td>Jl. Basuki Rahmat No. 5</td>
                                <td>19 Sep 2026</td>
                                <td>Jaket</td>
                                <td><span class="badge completed">Completed</span></td>
                                <td><button class="action" onclick="showDetails(this)">Lihat Detail ↗</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="empty" id="emptyMessage">Pesanan tidak ditemukan.</div>
                </div>
                <div class="pagination"><span id="resultCount">Menampilkan 6 pesanan</span>
                    <div class="pages"><button type="button">‹</button><button type="button"
                            class="current">1</button><button type="button">›</button></div>
                </div>
            </section>
            <footer class="footer">© 2026 <span>POLYTHRIFT</span> · All rights reserved.</footer>
        </main>
    </div>
    <script>
        function filterOrders() {
            const query = (document.getElementById('orderSearch').value + ' ' + document.getElementById('topSearch').value).toLowerCase();
            const status = document.getElementById('statusFilter').value;
            const date = document.getElementById('dateFilter').value;
            let visible = 0;
            document.querySelectorAll('#orderRows tr').forEach(row => {
                const show = row.innerText.toLowerCase().includes(query) && (!status || row.dataset.status === status) && (!date || row.dataset.date === date);
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            document.getElementById('emptyMessage').style.display = visible === 0 ? 'block' : 'none';
            document.getElementById('resultCount').textContent = 'Menampilkan ' + visible + ' pesanan';
        }
        function resetFilters() {
            document.getElementById('orderSearch').value = '';
            document.getElementById('topSearch').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('dateFilter').value = '';
            filterOrders();
        }
        function showDetails(button) {
            const row = button.closest('tr');
            alert('Detail pesanan ' + row.cells[0].innerText + '\nNama: ' + row.cells[1].innerText + '\nAlamat: ' + row.cells[2].innerText + '\nTanggal: ' + row.cells[3].innerText + '\nKategori: ' + row.cells[4].innerText + '\nStatus: ' + row.dataset.status);
        }
    </script>
</body>

</html>