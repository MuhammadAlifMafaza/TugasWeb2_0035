<?php
require_once 'app/views/Layouts/header.php';
?>

<style>
    .main {
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-8 {
        width: 66.66%;
        padding-right: 15px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .col-4 {
        width: 33.33%;
        padding-left: 15px;
    }

    /* Styling untuk card barang */
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-between;
    }

    .card-title {
        font-weight: bold;
        font-size: 1.1em;
        color: #333;
        margin-bottom: 8px;
    }

    .card p {
        font-size: 0.9em;
        color: #666;
        margin: 5px 0;
    }

    .btn-add-cart {
        background-color: #5cb85c;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9em;
        width: 100%;
        text-align: center;
    }

    .btn-add-cart:hover {
        background-color: #4cae4c;
    }

    /* Styling untuk keranjang transaksi */
    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .btn-primary {
        background-color: #5cb85c;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #4cae4c;
    }

    #cartItems ul {
        list-style-type: none;
        padding: 0;
    }

    #cartItems ul li {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 5px;
        background-color: #f8f9fa;
        font-size: 0.95em;
        display: flex;
        justify-content: space-between;
        color: #333;
    }

    .search-bar {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
     .form-control {
        width: 100%;
        padding: 10px;
        font-size: 1em;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<main class="main">
    <h2>Tambah Transaksi Baru</h2>
    <div class="row">
        <!-- Kolom Barang (Kiri) -->
        <div class="col-8">
            <input type="text" id="searchBar" class="search-bar" onkeyup="searchProduct()" placeholder="Cari Barang...">
            <div id="productList" class="card-container">
                <?php foreach ($transaksi as $barang): ?>
                    <div class="card" data-name="<?= strtolower(htmlspecialchars($barang['nama_barang'])) ?>">
                        <div class="card-title"><?= htmlspecialchars($barang['nama_barang']) ?></div>
                        <p>Harga: Rp <?= number_format($barang['harga'], 0, ',', '.') ?></p>
                        <p>Stok: <?= htmlspecialchars($barang['stok']) ?></p>
                        <button class="btn-add-cart" onclick="addToCart('<?= $barang['kode_barang'] ?>', '<?= $barang['nama_barang'] ?>', <?= $barang['harga'] ?>)">Tambah ke Keranjang</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Kolom Transaksi (Kanan) -->
        <div class="col-4">
            <h3>Keranjang Transaksi</h3>
            <br>
            <div class="form-container">
                <form id="transaksiForm">
                    <div class="form-group">
                        <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                            <option value="">Pilih Pelanggan</option>
                            <?php foreach ($pelanggan as $p): ?>
                                <option value="<?= htmlspecialchars($p['id_pelanggan']) ?>"><?= htmlspecialchars($p['nama_pelanggan']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div id="cartItems">
                        <ul></ul>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text" id="total_harga" name="total_harga" readonly>
                    </div>
                    <br>
                    <button type="button" class="btn-primary" onclick="submitTransaksi()">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    let cart = [];
    let totalHarga = 0;

    function addToCart(kode_barang, nama_barang, harga) {
        const itemIndex = cart.findIndex(item => item.kode_barang === kode_barang);
        if (itemIndex > -1) {
            cart[itemIndex].jumlah++;
            cart[itemIndex].subtotal += harga;
        } else {
            cart.push({
                kode_barang,
                nama_barang,
                harga,
                jumlah: 1,
                subtotal: harga
            });
        }
        updateCart();
    }

    function updateCart() {
        const cartItemsContainer = document.getElementById('cartItems').querySelector('ul');
        cartItemsContainer.innerHTML = '';
        totalHarga = 0;

        cart.forEach(item => {
            const itemElement = document.createElement('li');
            itemElement.innerHTML = `
                <span>${item.nama_barang} - Rp ${item.harga.toLocaleString()} - ${item.jumlah}x</span>
            `;
            cartItemsContainer.appendChild(itemElement);

            totalHarga += item.subtotal;
        });

        document.getElementById('total_harga').value = 'Rp ' + totalHarga.toLocaleString();
    }

    function searchProduct() {
        const searchValue = document.getElementById('searchBar').value.toLowerCase();
        const products = document.querySelectorAll('#productList .card');

        products.forEach(product => {
            const productName = product.getAttribute('data-name');
            if (productName.includes(searchValue)) {
                product.style.display = 'flex';
            } else {
                product.style.display = 'none';
            }
        });
    }

    function submitTransaksi() {
        const idPelanggan = document.getElementById('id_pelanggan').value;

        if (!idPelanggan) {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                text: 'Silakan pilih pelanggan terlebih dahulu!',
                timeout: 3000,
                progressBar: true
            }).show();
            return;
        }

        if (cart.length === 0) {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                text: 'Silakan tambahkan barang ke keranjang terlebih dahulu!',
                timeout: 3000,
                progressBar: true
            }).show();
            return;
        }

        const formData = new FormData(document.getElementById('transaksiForm'));

        cart.forEach(item => {
            formData.append(`kode_barang[]`, item.kode_barang);
            formData.append(`jumlah[${item.kode_barang}]`, item.jumlah);
            formData.append(`harga[]`, item.harga);
        });


        // Menambahkan total_harga di luar loop
        formData.append('total_harga', totalHarga);

        fetch('index.php?action=storeTransaksi', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: data.message,
                    timeout: 3000,
                    progressBar: true
                }).show();

                setTimeout(() => {
                    window.location.href = 'index.php?action=transaksi';
                }, 1500);
            } else {
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: data.message,
                    timeout: 3000,
                    progressBar: true
                }).show();
            }
        })
        .catch(error => {
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: 'Terjadi kesalahan. Silakan coba lagi.',
                timeout: 3000,
                progressBar: true
            }).show();
            console.error(error);
        });
    }
</script>

<?php
require_once 'app/views/Layouts/footer.php';
?>
