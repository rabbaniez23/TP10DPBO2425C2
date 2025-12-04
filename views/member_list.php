<?php
include_once 'viewmodels/MemberViewModel.php';
$viewModel = new MemberViewModel();
$viewModel->handleRequest();
$members = $viewModel->fetchAll();
?>

<h3>Daftar Member Gym</h3>
<a href="index.php?page=member_form">Tambah Member</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th> <th>Nama</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; // Buat variabel nomor mulai dari 1
        while($row = $members->fetch_assoc()): 
        ?>
        <tr>
            <td><?= $no++ ?></td> <td><?= $row['nama_member'] ?></td>
            <td><?= $row['no_telp'] ?></td>
            <td>
                <a href="index.php?page=member_form&id=<?= $row['id'] ?>">Edit</a> |
                <a href="index.php?page=member&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>