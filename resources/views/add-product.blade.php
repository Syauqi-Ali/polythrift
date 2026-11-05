<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product - POLYTHRIFT</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: #e8f2ff;
            font-family: Arial, sans-serif;
            color: #28364b;
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
            padding: 25px;
            min-height: 100vh
        }

        .breadcrumb {
            color: #8793a6;
            margin-bottom: 15px
        }

        h1 {
            font-size: 21px;
            margin: 0 0 20px
        }

        .card {
            background: #fff;
            border-radius: 7px;
            padding: 28px 35px;
            min-height: 450px
        }

        .upload {
            text-align: center;
            margin-bottom: 25px
        }

        .camera {
            margin: auto auto 8px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #f0f2f6;
            display: grid;
            place-items: center;
            font-size: 19px
        }

        .upload label {
            color: #4f7fe1;
            cursor: pointer
        }

        #image {
            display: none
        }

        #filename {
            color: #7d899b;
            margin-top: 6px
        }

        .form {
            max-width: 760px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px 25px
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px
        }

        .field.full {
            grid-column: 1/-1
        }

        .field label {
            font-weight: 600;
            color: #45536a
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e8ebf1;
            border-radius: 4px;
            background: #f6f7fa;
            font: inherit
        }

        textarea {
            height: 75px;
            resize: vertical
        }

        .actions {
            text-align: center;
            margin-top: 22px
        }

        button {
            border: 0;
            background: #5c89ff;
            color: #fff;
            border-radius: 5px;
            padding: 10px 42px;
            cursor: pointer;
            font-weight: bold
        }

        button:hover {
            background: #4274ed
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

            .card {
                padding: 20px 14px
            }

            .form {
                grid-template-columns: 1fr
            }

            .field.full {
                grid-column: auto
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
        <a class="nav" href="/categories">Kategori</a>
        <a class="nav active" href="/add-product">Tambah Produk</a>
        <a class="nav" href="#">Laporan</a>
        <div class="section">PREFERENCES</div>
        <a class="nav" href="#">Pengaturan</a>
        <div class="profile">
            <div class="avatar"></div>
            <div><b>Admin Thrift</b><br>Administrator</div>
        </div>
    </aside>
    <main>
        <div class="breadcrumb">Produk &nbsp; / &nbsp; Tambah Produk</div>
        <h1>Tambah Produk</h1>
        <div class="card">
            <form id="productForm">
                <div class="upload">
                    <div class="camera">📷</div>
                    <label for="image">Upload Image</label>
                    <input id="image" type="file" accept="image/*">
                    <div id="filename"></div>
                </div>
                <div class="form">
                    <div class="field">
                        <label for="name">Nama Produk</label>
                        <input id="name" name="name" placeholder="Masukkan nama produk" required>
                    </div>
                    <div class="field">
                        <label for="category">Kategori</label>
                        <select id="category" name="category" required>
                            <option value="">Pilih kategori</option>
                            <option>Kaos</option>
                            <option>Kemeja</option>
                            <option>Celana</option>
                            <option>Jaket</option>
                            <option>Aksesoris</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="sku">SKU Produk</label>
                        <input id="sku" name="sku" placeholder="Masukkan kode SKU">
                    </div>
                    <div class="field">
                        <label for="price">Harga (Rp)</label>
                        <input id="price" name="price" type="number" min="0" placeholder="Contoh: 75000" required>
                    </div>
                    <div class="field full">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description"
                            placeholder="Masukkan deskripsi produk"></textarea>
                    </div>
                </div>
                <div class="actions"><button type="submit">Save</button></div>
            </form>
        </div>
    </main>
    <script>
        document.getElementById('image').addEventListener('change', function () {
            document.getElementById('filename').textContent = this.files.length ? this.files[0].name : '';
        });
        document.getElementById('productForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Form sudah diisi. Penyimpanan database belum diaktifkan.');
        });
    </script>
</body>

</html>
'@ | Set-Content -Path resources/views/add-product.blade.php -Encoding UTF8