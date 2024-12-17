<?php
header('Content-Type: application/json');
require 'db.php';


// Mendapatkan data dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (isset($data['deskripsi'], $data['kategori'], $data['id_status'])) {
    $deskripsi = $conn->real_escape_string($data['deskripsi']);
    $kategori = $conn->real_escape_string($data['kategori']);
    $id_status = intval($data['id_status']); // Pastikan id_status berupa integer
    $id_admin = isset($data['id_admin']) ? intval($data['id_admin']) : NULL; // Opsional

    // Menangani gambar (jika ada)
    $gambar_data = NULL;
    $tipe_gambar = NULL;

    if (isset($data['gambar_data']) && isset($data['tipe_gambar'])) {
        $gambar_data = base64_decode($data['gambar_data']);
        $tipe_gambar = $conn->real_escape_string($data['tipe_gambar']);
    }

    // Query untuk memasukkan data
    $sql = "INSERT INTO pengaduan (deskripsi, kategori, id_status, id_admin, gambar_data, tipe_gambar) 
            VALUES ('$deskripsi', '$kategori', $id_status, $id_admin, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("bs", $gambar_data, $tipe_gambar);

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success", 
            "message" => "Pengaduan berhasil ditambahkan", 
            "id_pengaduan" => $conn->insert_id
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
}

$conn->close();
?>
