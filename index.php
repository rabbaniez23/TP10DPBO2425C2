<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Membership System</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Override font default dengan Poppins agar lebih modern */
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body>

    <nav>
        <h2>💪 GYM PRO</h2>
        <a href="index.php?page=member">👥 Data Member</a>
        <a href="index.php?page=pelatih">🏋️ Data Pelatih</a>
        <a href="index.php?page=jenismember">🏷️ Jenis Paket</a>
        <a href="index.php?page=transaksi">💸 Transaksi</a>
    </nav>

    <main>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        switch ($page) {
            case 'member':
                include 'views/member_list.php';
                break;
            case 'member_form':
                include 'views/member_form.php';
                break;
            case 'pelatih':
                include 'views/pelatih_list.php';
                break;
            case 'pelatih_form':
                include 'views/pelatih_form.php';
                break;
            case 'jenismember':
                include 'views/jenismember_list.php';
                break;
            case 'jenismember_form':
                include 'views/jenismember_form.php';
                break;
            case 'transaksi':
                include 'views/transaksi_list.php';
                break;
            case 'transaksi_form':
                include 'views/transaksi_form.php';
                break;
            default:
                echo "<div style='text-align:center; margin-top:50px;'>";
                echo "<h1>Selamat Datang di Dashboard Admin Gym! 🏋️‍♂️</h1>";
                echo "<p>Silakan pilih menu di sebelah kiri untuk mengelola data.</p>";
                echo "</div>";
                break;
        }
        ?>
    </main>

</body>
</html>