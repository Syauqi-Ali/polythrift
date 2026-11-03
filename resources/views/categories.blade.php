<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori - POLYTHRIFT</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: #e8f2ff;
            font-family: Arial, sans-serif;
            color: #29364b;
            font-size: 12px
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 180px;
            background: #fff;
            padding: 20px 15px;
            border-right: 1px solid #e5eaf2
        }

        .logo {
            font-size: 18px;
            font-weight: 800;
            color: #2459a9;
            margin-bottom: 30px
        }

        .section {
            font-size: 9px;
            color: #a0aabc;
            margin: 22px 8px 10px
        }

        .nav {
            display: block;
            text-decoration: none;
            color: #66748a;
            padding: 10px 9px;
            border-radius: 5px;
            margin: 3px 0
        }

        .nav.active {
            color: #2459a9;
            background: #e9f1ff;
            font-weight: bold
        }

        .profile {
            position: absolute;
            bottom: 20px;
            left: 15px;
            display: flex;
            gap: 8px;
            align-items: center;
            font-size: 10px
        }

        .avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #dbe9ff
        }

        main {
            margin-left: 180px;
            padding: 23px 27px;
            min-height: 100vh
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 19px;
            gap: 12px
        }

        .breadcrumb {
            color: #8793a6
        }

        .topright {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .topright input {
            width: 175px
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #e4e9f1;
            border-radius: 5px;
            background: #fff;
            font: inherit
        }

        .circle {
            width: 29px;
            height: 29px;
            border-radius: 50%;
            background: #fff;
            display: grid;
            place-items: center
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px
        }

        h1 {
            font-size: 21px;
            margin: 0
        }

        button {
            cursor: pointer;
            font: inherit
        }

        .primary {
            background: #2862c8;
            color: #fff;
            border: 0;
            border-radius: 5px;
            padding: 10px 13px;
            font-weight: bold
        }

        .primary:hover {
            background: #174da9
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 11px;
            margin-bottom: 17px
        }

        .stat {
            background: #fff;
            border-radius: 7px;
            padding: 14px;
            border: 1px solid #edf0f5
        }

        .stat-label {
            color: #8490a2;
            margin-bottom: 8px
        }

        .stat-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 4px
        }

        .number {
            font-size: 23px;
            font-weight: bold
        }

        .green {
            color: #17a36b;
            font-size: 10px
        }

        .filters {
            background: #fff;
            padding: 12px;
            border-radius: 7px;
            display: flex;
            gap: 9px;
            margin-bottom: 16px
        }

        .filters input {
            flex: 1;
            min-width: 80px
        }

        .filters select {
            width: 145px
        }

        .table-card {
            background: #fff;
            border-radius: 7px;
            padding: 17px;
            overflow-x: auto
        }

        .table-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px
        }

        h2 {
            font-size: 15px;
            margin: 0
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 620px;
            text-align: left
        }

        th {
            background: #f8faff;
            color: #8490a2;
            font-size: 10px;
            font-weight: 600
        }

        th,
        td {
            padding: 12px 9px;
            border-bottom: 1px solid #edf0f5
        }

        td {
            font-size: 11px
        }

        .category-icon {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            background: #f0f4fa;
            display: inline-grid;
            place-items: center;
            font-size: 17px
        }

        .status {
            color: #17a36b;
            background: #e8f8f0;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 10px
        }

        .inactive {
            color: #dc5a65;
            background: #fff0f0
        }

        .action {
            border: 0;
            background: none;
            color: #3977df;
            padding: 4px;
            cursor: pointer
        }

        .action.delete {
            color: #e05c65
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #8490a2;
            margin-top: 16px;
            gap: 10px
        }

        .page {
            border: 1px solid #e5eaf2;
            background: white;
            border-radius: 4px;
            padding: 7px 10px;
            margin-left: 3px
        }

        .page.active {
            background: #2862c8;
            color: white
        }

        @media(max-width:950px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column
            }
        }

        @media(max-width:650px) {
            .sidebar {
                width: 140px;
                padding: 14px 9px
            }

            main {
                margin-left: 140px;
                padding: 14px
            }

            .filters {
                flex-direction: column
            }

            .filters select {
                width: 100%
            }

            .topright input {
                width: 100px
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="logo">POLYTHRIFT</div>
        <div class="section">MAIN MENU</div>
        <a class="nav" href="/dashboard">Dashboard</a>
        <a class="nav" href="/products">Products</a>
        <a class="nav" href="/orders">Orders</a>
        <a class="nav active" href="/categories">Kategori</a>
        <a class="nav" href="/add-product">Tambah Produk</a>
        <a class="nav" href="#">Laporan</a>
        <div class="section">PREFERENCES</div>
        <a class="nav" href="#">Pengaturan</a>
        <div class="profile">
            <div class="avatar"></div>
            <div><b>Admin Thrift</b><br>Administrator</div>
        </div>
    </aside>
    <main>
        <div class="topbar">
            <div class="breadcrumb">Produk &nbsp; / &nbsp; Kategori</div>
            <div class="topright">
                <input id="topSearch" placeholder="Cari sesuatu...">
                <div class="circle">♧</div>
                <div class="circle">A</div><span>Admin</span>
            </div>
        </div>
        <div class="heading">
            <h1>Kategori</h1>
            <button class="primary" id="addCategory">+ Tambah Produk</button>
        </div>
        <div class="stats">
            <div class="stat">
                <div class="stat-label">Total Kategori</div>
                <div class="stat-bottom"><span class="number" id="total">124</span><span class="green">+12% bulan
                        ini</span></div>
            </div>
            <div class="stat">
                <div class="stat-label">Produk Aktif</div>
                <div class="stat-bottom"><span class="number">86</span><span class="green">+8.5%</span></div>
            </div>
            <div class="stat">
                <div class="stat-label">Total Penjualan</div>
                <div class="stat-bottom"><span class="number">342</span><span class="green">+14%</span></div>
            </div>
            <div class="stat">
                <div class="stat-label">Stok Habis</div>
                <div class="stat-bottom"><span class="number">12</span><span style="color:#dc5a65;font-size:10px">Perlu
                        diperiksa</span></div>
            </div>
        </div>
        <div class="filters">
            <input id="search" placeholder="Cari nama kategori, produk, atau deskripsi...">
            <select id="statusFilter">
                <option value="">Semua Kategori</option>
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
            <button class="primary" id="searchButton">Search</button>
        </div>
        <div class="table-card">
            <div class="table-head">
                <h2>Kategori</h2><span style="color:#8490a2">Daftar kategori produk</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ikon</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Produk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="rows">
                    <tr data-status="Aktif">
                        <td>1</td>
                        <td><span class="category-icon">👕</span></td>
                        <td>Kaos</td>
                        <td>Kaos thrift berbagai model</td>
                        <td>28</td>
                        <td><span class="status">Aktif</span></td>
                        <td><button class="action edit">Edit</button><button class="action delete">Hapus</button></td>
                    </tr>
                    <tr data-status="Aktif">
                        <td>2</td>
                        <td><span class="category-icon">👔</span></td>
                        <td>Kemeja</td>
                        <td>Kemeja kasual dan formal</td>
                        <td>20</td>
                        <td><span class="status">Aktif</span></td>
                        <td><button class="action edit">Edit</button><button class="action delete">Hapus</button></td>
                    </tr>
                    <tr data-status="Aktif">
                        <td>3</td>
                        <td><span class="category-icon">👖</span></td>
                        <td>Celana</td>
                        <td>Celana jeans dan bahan</td>
                        <td>18</td>
                        <td><span class="status">Aktif</span></td>
                        <td><button class="action edit">Edit</button><button class="action delete">Hapus</button></td>
                    </tr>
                    <tr data-status="Nonaktif">
                        <td>4</td>
                        <td><span class="category-icon">🧥</span></td>
                        <td>Jaket</td>
                        <td>Jaket vintage dan outer</td>
                        <td>12</td>
                        <td><span class="status inactive">Nonaktif</span></td>
                        <td><button class="action edit">Edit</button><button class="action delete">Hapus</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination"><span id="count">Menampilkan 4 data contoh dari 124 kategori</span>
                <div><button class="page">‹</button><button class="page active">1</button><button
                        class="page">2</button><button class="page">3</button><button class="page">›</button></div>
            </div>
        </div>
    </main>
    <script>
        const search = document.getElementById('search');
        const statusFilter = document.getElementById('statusFilter');
        function filterRows() {
            const keyword = search.value.toLowerCase();
            let visible = 0;
            document.querySelectorAll('#rows tr').forEach(row => {
                const matchText = row.textContent.toLowerCase().includes(keyword);
                const matchStatus = !statusFilter.value || row.dataset.status === statusFilter.value;
                row.style.display = matchText && matchStatus ? '' : 'none';
                if (matchText && matchStatus) visible++;
            });
            document.getElementById('count').textContent = 'Menampilkan ' + visible + ' data contoh';
        }
        search.addEventListener('input', filterRows);
        statusFilter.addEventListener('change', filterRows);
        document.getElementById('searchButton').addEventListener('click', filterRows);
        document.getElementById('topSearch').addEventListener('input', function () { search.value = this.value; filterRows() });
        document.getElementById('addCategory').addEventListener('click', () => location.href = '/add-product');
        document.querySelectorAll('.delete').forEach(button => button.addEventListener('click', function () {
            if (confirm('Hapus kategori ' + this.closest('tr').cells[2].textContent + '?')) {
                this.closest('tr').remove(); filterRows();
            }
        }));
        document.querySelectorAll('.edit').forEach(button => button.addEventListener('click', () => alert('Fitur edit belum terhubung ke database.')));
    </script>
</body>

</html>
'@ | Set-Content -Path resources/views/categories.blade.php -Encoding UTF8