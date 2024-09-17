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

    $stmt = $connected->prepare($insert->selectTable($table_name = "berita", $condition = "(judul, penulis, isi, tanggal_publish) VALUES (?, ?, ?, ?)"));
    $stmt->bind_param("ssss", $judul, $penulis, $isi, $tanggal_publish);

    if ($stmt->execute()) {
        echo "Berhasil menambahkan berita";
    } else {
        echo "Gagal menambahkan berita: " . $stmt->error;
    }
    $stmt->close();
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Edit berita
    parse_str(file_get_contents("php://input"), $data);
    $berita_id = $data["berita_id"];
    $judul = $data["judul"];
    $penulis = $data["penulis"];
    $isi = $data["isi"];
    $tanggal_publish = $data["tanggal_publish"];

    $stmt = $connected->prepare($update->selectTable($table_name = "berita", $condition = "judul = ?, penulis = ?, isi = ?, tanggal_publish = ? WHERE berita_id = ?"));
    $stmt->bind_param("ssssi", $judul, $penulis, $isi, $tanggal_publish, $berita_id);

    if ($stmt->execute()) {
        echo "Berhasil mengedit berita";
    } else {
        echo "Gagal mengedit berita " . $stmt->error;
    }

    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Delete berita
    parse_str(file_get_contents("php://input"), $data);
    $berita_id = $data["berita_id"];

    $stmt = $connected->prepare($delete->select_table($table_name = "berita", $condition = "WHERE berita_id = ?"));
    $stmt->bind_param("i", $berita_id);

    if ($stmt->execute()) {
        echo "Berhasil menghapus berita";
    } else {
        echo "Gagal menghapus berita: " . $stmt->error;
    }

    $stmt->close();
}
