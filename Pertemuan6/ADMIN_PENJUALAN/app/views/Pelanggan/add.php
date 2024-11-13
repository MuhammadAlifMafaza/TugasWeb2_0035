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

    .form-group input,
    .form-group textarea {
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
        <h2 class="main-title">Tambah Pelanggan</h2>
        <div class="form">
            <form id="PelangganForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id_pelanggan">Kode Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" placeholder="Masukan ID Pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat" required></textarea>
                </div>
                <button type="button" class="btn-primary" onclick="submitForm()">Simpan Pelanggan</button>
            </form>
            <a href="index.php?action=pelanggan" class="btn-back">Kembali ke Daftar Pelanggan</a>
        </div>
    </div>
</main>

<script>
    function submitForm() {
        const kodePelanggan = document.getElementById('id_pelanggan').value.trim();
        const namaPelanggan = document.getElementById('nama_pelanggan').value.trim();
        const alamat = document.getElementById('alamat').value.trim();

        if (!kodePelanggan || !namaPelanggan || !alamat) {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                text: 'Harap isi semua kolom yang diperlukan!',
                timeout: 3000,
                progressBar: true
            }).show();
            return;
        }

        const form = document.getElementById('PelangganForm');
        const formData = new FormData(form);

        fetch('index.php?action=storePelanggan', {
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
                        window.location.href = 'index.php?action=pelanggan';
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