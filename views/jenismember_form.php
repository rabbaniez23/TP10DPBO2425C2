<?php
// Gunakan __DIR__ agar tidak error "No such file"
include_once __DIR__ . '/../viewmodels/JenisMemberViewModel.php';

$viewModel = new JenisMemberViewModel();
$data = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $data = $viewModel->fetchOne($id);
}
?>

<h3><?= $id ? "Edit Jenis Membership" : "Tambah Jenis Membership" ?></h3>

<form action="index.php?page=jenismember" method="POST">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $data->id ?>">
    <?php endif; ?>

    <label>Nama Jenis (misal: Gold):</label><br>
    <input type="text" name="nama" value="<?= $id ? $data->nama_jenis : '' ?>" required placeholder="Masukkan nama paket..."><br><br>

    <label>Harga (Rp):</label><br>
    <input type="number" name="harga" value="<?= $id ? $data->harga : '' ?>" required placeholder="Masukkan harga..."><br><br>

    <button type="submit" name="<?= $id ? 'update_jenis' : 'submit_jenis' ?>">
        <?= $id ? "Update Data" : "Simpan Data" ?>
    </button>
    
    <a href="index.php?page=jenismember">Batal</a>
</form>