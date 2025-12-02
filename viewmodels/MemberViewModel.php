<?php
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/Member.php';

class MemberViewModel {
    public function fetchAll() {
        $database = new Database();
        $db = $database->getConnection();
        $member = new Member($db);
        return $member->read();
    }

    public function handleRequest() {
        $database = new Database();
        $db = $database->getConnection();
        $member = new Member($db);

        // CREATE
        if (isset($_POST['submit_member'])) {
            $member->nama_member = $_POST['nama'];
            $member->no_telp = $_POST['telp'];
            if($member->create()){ header("Location: index.php?page=member"); }
        }

        // UPDATE
        if (isset($_POST['update_member'])) {
            $member->id = $_POST['id'];
            $member->nama_member = $_POST['nama'];
            $member->no_telp = $_POST['telp'];
            if($member->update()){ header("Location: index.php?page=member"); }
        }

        // DELETE
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $member->id = $_GET['id'];
            if($member->delete()){ header("Location: index.php?page=member"); }
        }
    }

    public function fetchOne($id) {
        $database = new Database();
        $db = $database->getConnection();
        $member = new Member($db);
        $member->id = $id;
        $member->readOne();
        return $member;
    }
}
?>