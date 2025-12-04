<?php
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/JenisMember.php';

class JenisMemberViewModel {
    public function fetchAll() {
        $database = new Database();
        $db = $database->getConnection();
        $jenis = new JenisMember($db);
        return $jenis->read();
    }

    public function fetchOne($id) {
        $database = new Database();
        $db = $database->getConnection();
        $jenis = new JenisMember($db);
        $jenis->id = $id;
        $jenis->readOne();
        return $jenis;
    }

    public function handleRequest() {
        $database = new Database();
        $db = $database->getConnection();
        $jenis = new JenisMember($db);

        // CREATE
        if (isset($_POST['submit_jenis'])) {
            $jenis->nama_jenis = $_POST['nama'];
            $jenis->harga = $_POST['harga'];
            if($jenis->create()){ header("Location: index.php?page=jenismember"); exit; }
        }

        // UPDATE
        if (isset($_POST['update_jenis'])) {
            $jenis->id = $_POST['id'];
            $jenis->nama_jenis = $_POST['nama'];
            $jenis->harga = $_POST['harga'];
            if($jenis->update()){ header("Location: index.php?page=jenismember"); exit; }
        }

        // DELETE
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $jenis->id = $_GET['id'];
            if($jenis->delete()){ header("Location: index.php?page=jenismember"); exit; }
        }
    }
}
?>