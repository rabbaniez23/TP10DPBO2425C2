<?php
include_once 'viewmodels/JenisMemberViewModel.php';
$viewModel = new JenisMemberViewModel();
$viewModel->handleRequest();
$jenis_list = $viewModel->fetchAll();
?>

<h3>Daftar Jenis Membership</h3>
<a href="index.php?page=jenismember_form">Tambah Jenis</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jenis</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $jenis_list->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_jenis'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td>
                <a href="index.php?page=jenismember_form&id=<?= $row['id'] ?>">Edit</a> |
                <a href="index.php?page=jenismember&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>