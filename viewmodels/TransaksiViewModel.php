<?php
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/Transaksi.php';
class TransaksiViewModel {
    public function fetchAll() {
        $database = new Database();
        $db = $database->getConnection();
        $transaksi = new Transaksi($db);
        return $transaksi->read();
    }

    // Mengambil data untuk Dropdown di Form
    public function getOptions($table) {
        $database = new Database();
        $db = $database->getConnection();
        return $db->query("SELECT * FROM $table");
    }

    public function handleRequest() {
        $database = new Database();
        $db = $database->getConnection();
        $transaksi = new Transaksi($db);

        // CREATE
        if (isset($_POST['submit_transaksi'])) {
            $transaksi->id_member = $_POST['id_member'];
            $transaksi->id_jenis = $_POST['id_jenis'];
            $transaksi->id_pelatih = $_POST['id_pelatih'];
            $transaksi->tanggal_daftar = date('Y-m-d'); // Otomatis hari ini
            
            if($transaksi->create()){ header("Location: index.php?page=transaksi"); }
        }

        // DELETE
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $transaksi->id = $_GET['id'];
            if($transaksi->delete()){ header("Location: index.php?page=transaksi"); }
        }
    }
}
?>