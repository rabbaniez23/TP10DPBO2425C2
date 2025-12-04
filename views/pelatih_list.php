<?php
include_once 'viewmodels/PelatihViewModel.php';
$viewModel = new PelatihViewModel();
$viewModel->handleRequest(); 
$pelatih_list = $viewModel->fetchAll();
?>

<h3>Daftar Pelatih Gym</h3>
<a href="index.php?page=pelatih_form">Tambah Pelatih</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelatih</th>
            <th>Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; 
        while($row = $pelatih_list->fetch_assoc()): 
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_pelatih'] ?></td>
            <td><?= $row['keahlian'] ?></td>
            <td>
                <a href="index.php?page=pelatih_form&id=<?= $row['id'] ?>">Edit</a> |
                <a href="index.php?page=pelatih&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>