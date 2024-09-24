<?php
include "../connection.php";
include "../select.php";
include "../insert.php";
include "../update.php";
include "../delete.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["d"])) {
        $berita_uuid = $_GET["d"];
        $stmt = $connected->prepare("
            SELECT komentar.*, berita.uuid 
            FROM komentar 
            JOIN berita ON komentar.berita_id = berita.berita_id 
            WHERE berita.uuid = ?
        ");
        $stmt->bind_param("s", $berita_uuid);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // tambah komentar
    $user_id = $_POST["user_id"];
    $berita_id = $_POST["berita_id"];
    $isi_komentar = $_POST["isi_komentar"];

    $stmt = $connected->prepare($insert->selectTable($table_name = "komentar", $condition = "(user_id, berita_id, isi_komentar) VALUES (?, ?, ?)"));
    $stmt->bind_param("iis", $user_id, $berita_id, $isi_komentar);

    if ($stmt->execute()) {
        echo "Berhasil menambahkan komentar";
    } else {
        echo "Gagal menambahkan komentar: " . $stmt->error;
    }
    $stmt->close();
}