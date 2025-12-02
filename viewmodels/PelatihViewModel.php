<?php
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/Pelatih.php';

class PelatihViewModel {
    public function fetchAll() {
        $database = new Database();
        $db = $database->getConnection();
        $pelatih = new Pelatih($db);
        return $pelatih->read();
    }

    public function fetchOne($id) {
        $database = new Database();
        $db = $database->getConnection();
        $pelatih = new Pelatih($db);
        $pelatih->id = $id;
        $pelatih->readOne();
        return $pelatih;
    }

    public function handleRequest() {
        $database = new Database();
        $db = $database->getConnection();
        $pelatih = new Pelatih($db);

        // CREATE
        if (isset($_POST['submit_pelatih'])) {
            $pelatih->nama_pelatih = $_POST['nama'];
            $pelatih->keahlian = $_POST['keahlian'];
            if($pelatih->create()){ header("Location: index.php?page=pelatih"); }
        }

        // UPDATE
        if (isset($_POST['update_pelatih'])) {
            $pelatih->id = $_POST['id'];
            $pelatih->nama_pelatih = $_POST['nama'];
            $pelatih->keahlian = $_POST['keahlian'];
            if($pelatih->update()){ header("Location: index.php?page=pelatih"); }
        }

        // DELETE
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $pelatih->id = $_GET['id'];
            if($pelatih->delete()){ header("Location: index.php?page=pelatih"); }
        }
    }
}
?>