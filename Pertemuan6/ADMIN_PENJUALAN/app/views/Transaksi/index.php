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

    /* Style untuk tombol Tambah Transaksi */
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
</style>

<main class="main users chart-page" id="skip-target">
    <div class="container">
        <div class="header-flex">
            <h2 class="main-title">Daftar Transaksi</h2>
            <a href="index.php?action=addTransaksi" class="btn btn-primary">Tambah Transaksi</a>
        </div>

        <div class="row stat-cards">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $data): ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo htmlspecialchars($data['id_transaksi']); ?></td>
                            <td><?php echo htmlspecialchars($data['id_pelanggan']); ?></td>
                            <td><?php echo htmlspecialchars(number_format($data['total_harga'], 0, ',', '.')); ?></td>
                            <td><?php echo htmlspecialchars($data['tanggal']); ?></td>
                            <td>
                                <a href="index.php?action=detailTransaksi&id_transaksi=<?php echo htmlspecialchars($data['id_transaksi']); ?>" class="btn btn-warning btn-sm">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
require_once 'app/views/Layouts/footer.php';
?>
