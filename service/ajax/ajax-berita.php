<?php
include "../connection.php";
include "../select.php";
include "../insert.php";
include "../update.php";
include "../delete.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // berita
    if (isset($_GET["berita_id"])) {
        $user_id = $_GET["berita_id"];
        $stmt = $connected->prepare($select->selectTable($table_name = "berita", $fields = "*", $condition = "WHERE berita_id = ?"));
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $result = $connected->query($select->selectTable($table_name = "berita", $fields = "*", $condition = ""));

        $data = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['no'] = $i;
            $row['action'] = '<button type="button" class="edit btn btn-primary" data-berita_id="' . $row['berita_id'] . '" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="delete btn btn-danger" data-berita_id="' . $row['berita_id'] . '" data-toggle="modal"><i class="fa-solid fa-trash"></i></button>';

            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // tambah berita
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $isi = $_POST["isi"];
    $tanggal_publish = $_POST["tanggal_publish"];

    // $hash_password = hash("sha256", $password);

    $stmt = $connected->prepare($insert->selectTable($table_name = "berita", $condition = "(judul, penulis, isi, tanggal_publish) VALUES (?, ?, ?, ?)"));
    $stmt->bind_param("ssss", $judul, $penulis, $isi, $tanggal_publish);

    if ($stmt->execute()) {
        echo "Berhasil menambahkan berita";
    } else {
        echo "Gagal menambahkan berita: " . $stmt->error;
    }
    $stmt->close();
}