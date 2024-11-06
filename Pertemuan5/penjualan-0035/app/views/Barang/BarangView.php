<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <table>
        <tr><th>Kode Barang</th><th>Nama Barang</th><th>Harga</th><th>Stok</th></tr>
        <?php foreach ($produkList as $product): ?>
            <tr>
                <td><?php echo $product['nama_produk']; ?></td>
                <td><?php echo $product['harga']; ?></td>
                <td><?php echo $product['stok']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
