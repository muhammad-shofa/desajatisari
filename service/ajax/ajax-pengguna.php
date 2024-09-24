<?php
include "../connection.php";
include "../select.php";
include "../insert.php";
include "../update.php";
include "../delete.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // users
    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
        $stmt = $connected->prepare($select->selectTable($table_name = "users", $fields = "*", $condition = "WHERE user_id = ?"));
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $result = $connected->query($select->selectTable($table_name = "users", $fields = "*", $condition = ""));

        $data = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['no'] = $i;
            $row['action'] = '<button type="button" class="edit btn btn-primary" data-user_id="' . $row['user_id'] . '" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="delete btn btn-danger" data-user_id="' . $row['user_id'] . '" data-toggle="modal"><i class="fa-solid fa-trash"></i></button>';

            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // tambah pengguna
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $role = $_POST["role"];

    $hash_password = hash("sha256", $password);

    $stmt = $connected->prepare($insert->selectTable($table_name = "users", $condition = "(username, password, nama_lengkap, email, tanggal_lahir, jenis_kelamin, role) VALUES (?, ?, ?, ?, ?, ?, ?)"));
    $stmt->bind_param("sssssss", $username, $hash_password, $nama_lengkap, $email, $tanggal_lahir, $jenis_kelamin, $role);

    if ($stmt->execute()) {
        echo "Berhasil menambahkan pengguna";
    } else {
        echo "Gagal menambahkan pengguna: " . $stmt->error;
    }
    $stmt->close();
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Edit user
    parse_str(file_get_contents("php://input"), $data);
    $user_id = $data["user_id"];
    $username = $data["username"];
    $nama_lengkap = $data["nama_lengkap"];
    $email = $data["email"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $role = $data["role"];

    // Check password
    if (empty($data["password"])) {
        $stmt = $connected->prepare("SELECT password FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $password = $row["password"];
        $stmt->close();
    } else {
        $password = hash("sha256", $data["password"]);
    }

    $stmt = $connected->prepare($update->selectTable($table_name = "users", $condition = "username = ?, password = ?, nama_lengkap = ?, email = ?, tanggal_lahir = ?, jenis_kelamin = ?, role = ? WHERE user_id = ?"));
    $stmt->bind_param("sssssssi", $username, $password, $nama_lengkap, $email, $tanggal_lahir, $jenis_kelamin, $role, $user_id);

    if ($stmt->execute()) {
        echo "Berhasil mengedit pengguna";
    } else {
        echo "Gagal mengedit pengguna " . $stmt->error;
    }

    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Delete user
    parse_str(file_get_contents("php://input"), $data);
    $user_id = $data["user_id"];

    // $stmt = $connected->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt = $connected->prepare($delete->select_table($table_name = "users", $condition = "WHERE user_id = ?"));
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "Berhasil menghapus";
    } else {
        echo "Gagal menghapus: " . $stmt->error;
    }

    $stmt->close();
}
