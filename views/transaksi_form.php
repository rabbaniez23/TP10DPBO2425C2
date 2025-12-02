<?php
include_once 'viewmodels/TransaksiViewModel.php';
$viewModel = new TransaksiViewModel();

// Ambil data untuk dropdown
$members = $viewModel->getOptions('member');
$types = $viewModel->getOptions('jenis_member');
$trainers = $viewModel->getOptions('pelatih');
?>

<h3>Tambah Transaksi Membership</h3>
<form method="POST" action="index.php?page=transaksi">
    <label>Pilih Member:</label><br>
    <select name="id_member" required>
        <option value="">-- Pilih Member --</option>
        <?php while($m = $members->fetch_assoc()) { 
            echo "<option value='".$m['id']."'>".$m['nama_member']."</option>"; 
        } ?>
    </select><br><br>

    <label>Pilih Paket Membership:</label><br>
    <select name="id_jenis" required>
        <option value="">-- Pilih Paket --</option>
        <?php while($j = $types->fetch_assoc()) { 
            echo "<option value='".$j['id']."'>".$j['nama_jenis']." - Rp ".number_format($j['harga'])."</option>"; 
        } ?>
    </select><br><br>

    <label>Pilih Pelatih:</label><br>
    <select name="id_pelatih" required>
        <option value="">-- Pilih Pelatih --</option>
        <?php while($p = $trainers->fetch_assoc()) { 
            echo "<option value='".$p['id']."'>".$p['nama_pelatih']." (".$p['keahlian'].")</option>"; 
        } ?>
    </select><br><br>

    <button type="submit" name="submit_transaksi">Simpan Transaksi</button>
    <a href="index.php?page=transaksi">Batal</a>
</form>