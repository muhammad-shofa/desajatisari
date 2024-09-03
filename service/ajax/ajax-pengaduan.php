<?php
include "../connection.php";
include "../select.php";
include "../insert.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // users
    if (isset($_GET["user_id"])) {
        $id = $_GET["user_id"];
        $stmt = $connected->prepare($select->selectTable($tableName = "pengaduan", $fields = "*", $condition = "WHERE user_id = ?"));
        $stmt->bind_param("i", $id);
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
            $row['action'] = '<button type="button" class="detail btn btn-secondary" data-user_id="' . $row['user_id'] . '" data-toggle="modal">Detail</button>';
            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

}