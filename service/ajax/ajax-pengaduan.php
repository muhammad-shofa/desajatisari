<?php
include "../connection.php";
include "../select.php";
include "../insert.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // users
    if (isset($_GET["pengaduan_id"])) {
        $pengaduan_id = $_GET["pengaduan_id"];
        $stmt = $connected->prepare($select->selectTable($tableName = "pengaduan", $fields = "*", $condition = "WHERE pengaduan_id = ?"));
        $stmt->bind_param("i", $pengaduan_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $result = $connected->query($select->selectTable($tableName = "pengaduan", $fields = "*", $condition = ""));

        $data = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['no'] = $i;
            // $row['action'] = '<button type="button" class="detail btn btn-secondary" data-user_id="' . $row['user_id'] . '" data-toggle="modal">Detail</button>';
            $row['action'] = "";
            if ($row["status_dibaca"] == "Belum") {
                $row['action'] = '
                <button type="button" class="baca btn btn-primary" data-pengaduan_id="' . $row['pengaduan_id'] . '" data-user_id="' . $row['user_id'] . '"  data-toggle="modal">
                    Baca
                </button>';
            } else {
                $row['action'] = '
                <button type="button" class="detail btn btn-secondary" data-pengaduan_id="' . $row['pengaduan_id'] . '" data-user_id="' . $row['user_id'] . '" data-toggle="modal">
                    Detail
                </button>';
            }

            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents("php://input"), $data);

    $status_dibaca = $data["status_dibaca"];
    // var_dump('Sebelum diupdate : ' . $status_dibaca);
    // unread & read
    if ($status_dibaca == "Sudah") {
        $pengaduan_id = $data["pengaduan_id"];
        var_dump($pengaduan_id);

        $status_dibaca_new = "Belum";

        $stmt = $connected->prepare("UPDATE pengaduan SET status_dibaca = ? WHERE pengaduan_id = ?");
        $stmt->bind_param("si", $status_dibaca_new, $pengaduan_id);

        if ($stmt->execute()) {
            echo "Berhasil Menghapus Penanda";
        } else {
            echo "Gagal Menghapus Penanda" . $stmt->error;
        }

        $stmt->close();
    } else {
        $pengaduan_id = $data["pengaduan_id"];
        var_dump($pengaduan_id);

        $status_dibaca_new = "Sudah";

        $stmt = $connected->prepare("UPDATE pengaduan SET status_dibaca = ? WHERE pengaduan_id = ?");
        $stmt->bind_param("si", $status_dibaca_new, $pengaduan_id);

        if ($stmt->execute()) {
            echo "Berhasil Menandai";
        } else {
            echo "Gagal Menandai " . $stmt->error;
        }

        $stmt->close();
    }


}
