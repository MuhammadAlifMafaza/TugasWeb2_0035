<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon Belanja</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #56CCF2, #2F80ED);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #2F80ED;
            font-size: 24px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: left;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #2F80ED;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #56CCF2;
        }
        .result {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Program Hitung Diskon Belanja</h2>

        <form method="POST" action="">
            <label for="totalBelanja">Total Belanja (Rp):</label>
            <input type="number" name="totalBelanja" id="totalBelanja" required>

            <label for="member">Apakah Anda Memiliki Member?</label>
            <select name="isMember" id="member" required>
                <option value="true">Ya</option>
                <option value="false">Tidak</option>
            </select>

            <input type="submit" value="Hitung Diskon">
        </form>

        <?php
        // Jika form disubmit, menjalankan perhitungan
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mendapatkan input dari form
            $isMember = $_POST['isMember'] == 'true' ? true : false; 
            $totalBelanja = (int) $_POST['totalBelanja'];

            // Fungsi untuk menghitung diskon
            function hitungDiskon($isMember, $totalBelanja) {
                $diskon = 0;

                // Logika diskon untuk member
                if ($isMember) {
                    $diskon = 10; // Diskon dasar 10% untuk member
                    if ($totalBelanja > 1000000) {
                        $diskon += 15; // Tambahan diskon 15% jika belanja lebih dari 1 juta
                    } elseif ($totalBelanja >= 500000) {
                        $diskon += 10; // Tambahan diskon 10% jika belanja lebih dari 500 ribu
                    }
                } else {
                    // Logika diskon untuk non-member
                    if ($totalBelanja > 1000000) {
                        $diskon = 10; // Diskon 10% jika belanja lebih dari 1 juta
                    } elseif ($totalBelanja >= 500000) {
                        $diskon = 5;  // Diskon 5% jika belanja lebih dari 500 ribu
                    }
                }

                // Menghitung jumlah diskon dan total setelah diskon
                $jumlahDiskon = ($diskon / 100) * $totalBelanja;
                $totalSetelahDiskon = $totalBelanja - $jumlahDiskon;

                // Menampilkan hasil
                echo "<div class='result'>";
                echo "<h3>Hasil Perhitungan:</h3>";
                echo "<p>Total Belanja: Rp " . number_format($totalBelanja, 0, ',', '.') . "</p>";
                echo "<p>Diskon: $diskon%</p>";
                echo "<p>Jumlah Diskon: Rp " . number_format($jumlahDiskon, 0, ',', '.') . "</p>";
                echo "<p>Total Setelah Diskon: Rp " . number_format($totalSetelahDiskon, 0, ',', '.') . "</p>";
                echo "</div>";
            }

            // Memanggil fungsi hitungDiskon
            hitungDiskon($isMember, $totalBelanja);
        }
        ?>
    </div>

</body>
</html>
