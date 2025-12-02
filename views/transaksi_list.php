<?php
include_once 'viewmodels/TransaksiViewModel.php';
$viewModel = new TransaksiViewModel();
$viewModel->handleRequest();
$transaksi_list = $viewModel->fetchAll();
?>

<h3>Data Transaksi Membership</h3>
<a href="index.php?page=transaksi_form">Tambah Transaksi Baru</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Member</th>
            <th>Paket</th>
            <th>Pelatih</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $transaksi_list->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_member'] ?></td>
            <td><?= $row['nama_jenis'] ?> (Rp <?= number_format($row['harga']) ?>)</td>
            <td><?= $row['nama_pelatih'] ?></td>
            <td><?= $row['tanggal_daftar'] ?></td>
            <td>
                <a href="index.php?page=transaksi&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus Data Transaksi?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>