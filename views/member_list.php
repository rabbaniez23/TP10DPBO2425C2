<?php
// Memanggil ViewModel
include_once 'viewmodels/MemberViewModel.php';
$viewModel = new MemberViewModel();
$viewModel->handleRequest(); // Cek jika ada request delete
$members = $viewModel->fetchAll();
?>

<h3>Daftar Member Gym</h3>
<a href="index.php?page=member_form">Tambah Member</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $members->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_member'] ?></td>
            <td><?= $row['no_telp'] ?></td>
            <td>
                <a href="index.php?page=member_form&id=<?= $row['id'] ?>">Edit</a> |
                <a href="index.php?page=member&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>