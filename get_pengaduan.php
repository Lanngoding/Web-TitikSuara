<?php
header('Content-Type: application/json');
require 'db.php';

// Query untuk mendapatkan data pengaduan
$sql = "SELECT 
            p.id_pengaduan, 
            p.deskripsi, 
            p.kategori, 
            p.id_status, 
            s.nama_status AS status,
            p.dibuat_pada, 
            p.diperbarui_pada,
            p.tipe_gambar,
            CASE 
                WHEN p.gambar_data IS NOT NULL THEN CONCAT('data:', p.tipe_gambar, ';base64,', TO_BASE64(p.gambar_data))
                ELSE NULL 
            END AS gambar_base64
        FROM pengaduan p
        LEFT JOIN status_pengaduan s ON p.id_status = s.id_status";
$result = $conn->query($sql);

$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $response]);
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak ditemukan"]);
}

$conn->close();
?>
