<?php
include_once 'viewmodels/PelatihViewModel.php';
$viewModel = new PelatihViewModel();
$data = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $pelatih = $viewModel->fetchOne($id);
    $data = $pelatih;
}
?>

<h3><?= $id ? "Edit Data Pelatih" : "Tambah Pelatih Baru" ?></h3>

<form action="index.php?page=pelatih" method="POST">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $data->id ?>">
    <?php endif; ?>

    <label>Nama Pelatih:</label><br>
    <input type="text" name="nama" value="<?= $id ? $data->nama_pelatih : '' ?>" required><br><br>

    <label>Keahlian:</label><br>
    <input type="text" name="keahlian" value="<?= $id ? $data->keahlian : '' ?>" required><br><br>

    <button type="submit" name="<?= $id ? 'update_pelatih' : 'submit_pelatih' ?>">
        <?= $id ? "Update" : "Simpan" ?>
    </button>
    <a href="index.php?page=pelatih">Batal</a>
</form>