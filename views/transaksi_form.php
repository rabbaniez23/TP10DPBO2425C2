<?php
include_once __DIR__ . '/../viewmodels/TransaksiViewModel.php'; // Pakai __DIR__ biar aman
$viewModel = new TransaksiViewModel();

$data = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Ambil data dropdown
$members = $viewModel->getOptions('member');
$types = $viewModel->getOptions('jenis_member');
$trainers = $viewModel->getOptions('pelatih');

// Jika ada ID, ambil data transaksi lama untuk diedit
if ($id) {
    $data = $viewModel->fetchOne($id);
}
?>

<h3><?= $id ? "Edit Transaksi" : "Tambah Transaksi Baru" ?></h3>

<form method="POST" action="index.php?page=transaksi">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $data->id ?>">
    <?php endif; ?>

    <label>Pilih Member:</label><br>
    <select name="id_member" required>
        <option value="">-- Pilih Member --</option>
        <?php while($m = $members->fetch_assoc()) { 
            // Cek apakah ini data yang dipilih sebelumnya (Untuk Edit)
            $selected = ($id && $data->id_member == $m['id']) ? 'selected' : '';
            echo "<option value='".$m['id']."' $selected>".$m['nama_member']."</option>"; 
        } ?>
    </select><br><br>

    <label>Pilih Paket Membership:</label><br>
    <select name="id_jenis" required>
        <option value="">-- Pilih Paket --</option>
        <?php while($j = $types->fetch_assoc()) { 
            $selected = ($id && $data->id_jenis == $j['id']) ? 'selected' : '';
            echo "<option value='".$j['id']."' $selected>".$j['nama_jenis']." - Rp ".number_format($j['harga'])."</option>"; 
        } ?>
    </select><br><br>

    <label>Pilih Pelatih:</label><br>
    <select name="id_pelatih" required>
        <option value="">-- Pilih Pelatih --</option>
        <?php while($p = $trainers->fetch_assoc()) { 
            $selected = ($id && $data->id_pelatih == $p['id']) ? 'selected' : '';
            echo "<option value='".$p['id']."' $selected>".$p['nama_pelatih']." (".$p['keahlian'].")</option>"; 
        } ?>
    </select><br><br>

    <button type="submit" name="<?= $id ? 'update_transaksi' : 'submit_transaksi' ?>">
        <?= $id ? "Update Transaksi" : "Simpan Transaksi" ?>
    </button>
    <a href="index.php?page=transaksi">Batal</a>
</form>