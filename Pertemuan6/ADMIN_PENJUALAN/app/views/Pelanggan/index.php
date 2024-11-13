<?php
require_once 'app/views/Layouts/header.php';

?>
<style>
    /* Style untuk main container */
    main.main {
        padding: 20px;
        border-radius: 8px;
    }

    /* Flexbox untuk judul dan tombol agar sejajar */
    .header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .main-title {
        font-size: 2em;
        font-weight: bold;
        color: #333;
    }

    /* Style untuk tombol Tambah Pelanggan */
    .btn-primary {
        background-color: #5cb85c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #4cae4c;
    }

    /* Style tabel */
    .table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        margin-top: 15px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: center;
        color: #333;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table tbody tr {
        transition: background-color 0.2s;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Style untuk tombol aksi */
    .btn-info {
        background-color: #5bc0de;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-info:hover {
        background-color: #31b0d5;
    }

    .btn-warning {
        background-color: #f0ad4e;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-warning:hover {
        background-color: #ec971f;
    }

    .btn-danger {
        background-color: #d9534f;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-danger:hover {
        background-color: #c9302c;
    }


    /* Styling Noty alert */
    .noty_layout__center {
        text-align: center;
        max-width: 400px;
        padding: 20px;
        border-radius: 8px;
        background-color: #fff3cd;
        border: 1px solid #ffeeba;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Animasi muncul dan hilang */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: scale(1);
        }

        to {
            opacity: 0;
            transform: scale(0.8);
        }
    }

    /* Tambahkan animasi ke Noty */
    .noty_layout__center .noty_bar {
        animation: fadeIn 0.4s ease forwards;
    }

    /* Styling tombol */
    .noty_button_custom {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .noty_button_confirm {
        background-color: #28a745;
    }

    .noty_button_confirm:hover {
        background-color: #218838;
    }

    .noty_button_cancel {
        background-color: #dc3545;
    }

    .noty_button_cancel:hover {
        background-color: #c82333;
    }

    /* Style untuk Modal Konfirmasi */
    .modal-background {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-box {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        max-width: 90%;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-text {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: #333;
    }

    .modal-button {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
    }

    .modal-button.confirm {
        background-color: #28a745;
    }

    .modal-button.confirm:hover {
        background-color: #218838;
    }

    .modal-button.cancel {
        background-color: #dc3545;
    }

    .modal-button.cancel:hover {
        background-color: #c82333;
    }
</style>

<div id="modal-confirm" class="modal-background">
    <div class="modal-box">
        <div class="modal-text">Apakah Anda yakin ingin menghapus Pelanggan ini?</div>
        <button class="modal-button confirm" onclick="confirmDelete()">Ya</button>
        <button class="modal-button cancel" onclick="closeModal()">Tidak</button>
    </div>
</div>

<main class="main users chart-page" id="skip-target">
    <div class="container">
        <div class="header-flex">
            <h2 class="main-title">Daftar Pelanggan</h2>
            <a href="index.php?action=addPelanggan" class="btn btn-primary">Tambah Pelanggan</a>
        </div>

        <div class="row stat-cards">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th> 
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pelanggan as $data): ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo htmlspecialchars($data['id_pelanggan']); ?></td>
                            <td><?php echo htmlspecialchars($data['nama_pelanggan']); ?></td> 
                            <td><?php echo htmlspecialchars($data['alamat']); ?></td> 
                            <td>
                                <a href="index.php?action=editPelanggan&id_pelanggan=<?php echo htmlspecialchars($data['id_pelanggan']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deletePelanggan('<?php echo $data['id_pelanggan']; ?>')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    let kodePelangganToDelete = null;

    function deletePelanggan(id_pelanggan) {
        kodePelangganToDelete = id_pelanggan;

        document.getElementById('modal-confirm').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal-confirm').style.display = 'none';
        kodePelangganToDelete = null;
    }

    function confirmDelete() {
        if (!kodePelangganToDelete) return;

        fetch(`index.php?action=deletePelanggan&id_pelanggan=${kodePelangganToDelete}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(res => {
                new Noty({
                    type: res.status === 'success' ? 'success' : 'error',
                    layout: 'topRight',
                    text: res.message,
                    timeout: 3000,
                    progressBar: true
                }).show();

                if (res.status === 'success') {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    closeModal();
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
                closeModal();
            });
    }
</script>

<?php
require_once 'app/views/Layouts/footer.php';
?>