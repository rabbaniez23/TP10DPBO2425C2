<?php
include_once 'viewmodels/MemberViewModel.php';
$viewModel = new MemberViewModel();
$data = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Mode Edit: Ambil data lama
    $member = $viewModel->fetchOne($id);
    $data = $member;
}
?>

<h3><?= $id ? "Edit Data Member" : "Tambah Member Baru" ?></h3>

<form action="index.php?page=member" method="POST">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $data->id ?>">
    <?php endif; ?>

    <label>Nama Member:</label><br>
    <input type="text" name="nama" value="<?= $id ? $data->nama_member : '' ?>" required><br><br>

    <label>No Telepon:</label><br>
    <input type="text" name="telp" value="<?= $id ? $data->no_telp : '' ?>" required><br><br>

    <button type="submit" name="<?= $id ? 'update_member' : 'submit_member' ?>">
        <?= $id ? "Update" : "Simpan" ?>
    </button>
    <a href="index.php?page=member">Batal</a>
</form>