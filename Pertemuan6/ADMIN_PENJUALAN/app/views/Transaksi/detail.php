<?php
require_once 'app/views/Layouts/header.php';
?>

<style>
    .main {
        padding: 20px;
    }

    .form-container {
        max-width: 100%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }

    .btn-back:hover {
        text-decoration: underline;
    }
</style>

<main class="main">
    <h2>Detail Transaksi</h2>
    <br>
    <div class="form-container">
        <div class="form-group">
            <label>ID Transaksi:</label>
            <div><?= htmlspecialchars($transaksi['id_transaksi']) ?></div>
        </div>
        <div class="form-group">
            <label>ID Pelanggan:</label>
            <div><?= htmlspecialchars($transaksi['id_pelanggan']) ?></div>
        </div>
        <div class="form-group">
            <label>Total Harga:</label>
            <div>Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></div>
        </div>
        <div class="form-group">
            <label>Tanggal:</label>
            <div><?= htmlspecialchars($transaksi['tanggal']) ?></div>
        </div>

        <h3>Detail Barang</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksiDetails as $detail): ?>
                    <tr>
                        <td><?= htmlspecialchars($detail['kode_barang']) ?></td>
                        <td><?= htmlspecialchars($detail['jumlah']) ?></td>
                        <td>Rp <?= number_format($detail['harga'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($detail['jumlah'] * $detail['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <td style="font-weight:bold;color:red">Grand Total</td>
                <td></td>
                <td></td>
                <td style="font-weight:bold;color:red">Rp <?= number_format($detail['total_harga'], 0, ',', '.') ?></td>
        </table>

        <a href="index.php?action=transaksi" class="btn-back">Kembali ke Daftar Transaksi</a>
    </div>
</main>

<?php
require_once 'app/views/Layouts/footer.php';
?>
