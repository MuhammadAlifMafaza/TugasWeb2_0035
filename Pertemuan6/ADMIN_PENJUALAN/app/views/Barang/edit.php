<?php
require_once 'app/views/Layouts/header.php';
?>

<style>
    /* Style untuk main container */
    main.main {
        padding: 20px;
        border-radius: 8px;
    }

    .main-title {
        font-size: 2em;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        text-align: left;
    }

    /* Style untuk form */
    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-top: 5px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #5cb85c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        width: 100%;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }

    .btn-primary:hover {
        background-color: #4cae4c;
    }

    .btn-back {
        display: inline-block;
        margin-top: 10px;
        color: #007bff;
        text-decoration: none;
    }

    .btn-back:hover {
        text-decoration: underline;
    }
</style>

<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Edit Barang</h2>
        <div class="form">
            <form id="barangForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" id="kode_barang" name="kode_barang" placeholder="Masukan Kode Barang" value="<?= htmlspecialchars($barang['kode_barang']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="<?= htmlspecialchars($barang['nama_barang']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" name="harga" placeholder="Masukan Harga Barang" value="<?= htmlspecialchars($barang['harga']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" placeholder="Masukan Stok Barang" value="<?= htmlspecialchars($barang['stok']) ?>" required>
                </div>
                <button type="button" class="btn-primary" onclick="submitForm()">Simpan Perubahan</button>
            </form>
            <a href="index.php?action=barang" class="btn-back">Kembali ke Daftar Barang</a>
        </div>
    </div>
</main>

<script>
    function submitForm() {
        const kodeBarang = document.getElementById('kode_barang').value.trim();
        const namaBarang = document.getElementById('nama_barang').value.trim();
        const harga = document.getElementById('harga').value.trim();
        const stok = document.getElementById('stok').value.trim();

        if (!kodeBarang || !namaBarang || !harga || !stok) {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                text: 'Harap isi semua kolom yang diperlukan!',
                timeout: 3000,
                progressBar: true
            }).show();
            return;  
        }

        const form = document.getElementById('barangForm');
        const formData = new FormData(form);

        fetch(`index.php?action=updateBarang&kode_barang=<?= $barang['kode_barang'] ?>`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(res => {
                new Noty({
                    type: res.status === 'success' ? 'success' : 'warning',
                    layout: 'topRight',
                    text: res.message,
                    timeout: 3000,
                    progressBar: true
                }).show();

                if (res.status === 'success') {
                    setTimeout(() => {
                        window.location.href = 'index.php?action=barang';
                    }, 1500);
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
            });
    }
</script>

<?php
require_once 'app/views/Layouts/footer.php';
?>