<?php

session_start();

 include('config/dbcon.php');
 include('myfunctions.php');

if(isset($_POST['tambah_akun_btn']))
{
    $nama_lengkap = $_POST['nama_lengkap'];
    $kata_sandi = $_POST['kata_sandi'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $peran = $_POST['peran'];

    $image = $_FILES['image']['name'];

    $path = "uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename  = time().'.'.$image_ext;

    $akun_query = "INSERT INTO pengguna
    (nama_lengkap,kata_sandi,jabatan,alamat,no_telp,peran,foto_profil)
    VALUES ('$nama_lengkap','$kata_sandi','$jabatan','$alamat','$no_telp','$peran','$filename')";

    $akun_query_run = mysqli_query($con, $akun_query);

    if($akun_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("daftarakun.php", "Akun Berhasil Ditambahakan");
    }
    else
    {
        redirect("tambahakun.php", "Something went wrong");
    }
}
else if(isset($_POST['update_akun_btn']))
{
    $id_pengguna = $_POST['id_pengguna'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $kata_sandi = $_POST['kata_sandi'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $peran = $_POST['peran'];

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_file_name = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_file_name  = time().'.'.$image_ext;
    }
    else
    {
        $update_file_name = $old_image;
    }

    $path = "uploads";

    $update_query = "UPDATE pengguna SET nama_lengkap='$nama_lengkap',kata_sandi='$kata_sandi',
    jabatan='$jabatan',alamat='$alamat',no_telp='$no_telp',peran='$peran',
    foto_profil='$update_file_name' WHERE id_pengguna='$id_pengguna'";

     $update_query_run = mysqli_query($con, $update_query);
     if($update_query_run)
     {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_file_name);

            if(file_exists($path.'/'.$old_image))
            {
                 unlink($path.'/'.$old_image);
                 echo "Error deleting old image.";
            }
        }
        redirect("daftarakun.php?id=$id_pengguna", "Akun Telah di Update");
     }
     else
     {
        echo "Gagal Update";
     }



}
else if(isset($_POST['delete_akun_btn']))
{
    $id_pengguna = mysqli_real_escape_string($con, $_POST['id_pengguna']);

    $akun_query = "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'";
    $akun_query_run = mysqli_query($con, $akun_query);
    $akun_data = mysqli_fetch_array($akun_query_run);
    $image = $akun_data['foto_profil'];

    $path = "uploads";

    $delete_query = "DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists($path.'/'.$image))
            {
                 unlink($path.'/'.$image);
                 echo "Error deleting old image.";
            }

        redirect("daftarakun.php", "Akun Berhasil Dihapus");

    }
    else
    {
        redirect("daftarakun.php", "Something went wrong");

    }

}
else if(isset($_GET['id_pengaduan'])) {
    // Establish database connection (make sure $con is defined)
    $con = mysqli_connect($host, $username, $password, $database); // Your connection details

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT bukti_pengaduan FROM pengaduan WHERE id_pengaduan = ?");
    mysqli_stmt_bind_param($stmt, "i", $_GET['id_pengaduan']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_array($result)) {
        // Set the correct content type based on the actual image type
        header("Content-type: image/png"); // or image/png, image/gif depending on your stored image
        
        // Output the image directly
        echo $row['bukti_pengaduan'];
    } else {
        echo "";
    }
   
}

if (isset($_POST['update_pengaduan_btn'])) {
    // Ambil data dari form
    $id_pengaduan = $_POST['id_pengaduan'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $id_status = $_POST['id_status'];  // Pastikan ini sesuai dengan yang ada di tabel status_pengaduan
    

    // Escape input untuk keamanan
    $id_pengaduan = mysqli_real_escape_string($con, $id_pengaduan);
    $deskripsi = mysqli_real_escape_string($con, $deskripsi);
    $kategori = mysqli_real_escape_string($con, $kategori);
    $id_status = mysqli_real_escape_string($con, $id_status);
    

    // Query update
    $update_query = "UPDATE pengaduan SET deskripsi='$deskripsi', kategori='$kategori', id_status='$id_status' WHERE id_pengaduan='$id_pengaduan'";

    if (mysqli_query($con, $update_query)) {
        $_SESSION['message'] = "Data pengaduan berhasil diupdate!";
        header('Location: daftarpengaduan.php'); // Redirect setelah berhasil
    } else {
        $_SESSION['message'] = "Terjadi kesalahan: " . mysqli_error($con);
        header('Location: index.php'); // Redirect setelah error
    }
}






$sql = "SELECT id_pengguna, foto_profil, jabatan, peran FROM pengguna ORDER BY id_pengguna DESC LIMIT 5";
$result = $con->query($sql);
?>

<?php
$query = "SELECT * FROM pengaduan ORDER BY dibuat_pada DESC LIMIT 5";
$hasil = $con->query($query);
?>

<?php
// Query untuk menghitung total pengaduan
$query_total_pengaduan = "SELECT COUNT(*) as total_pengaduan FROM pengaduan";
$total_pengaduan = $con->query($query_total_pengaduan);
$row_pengaduan = $total_pengaduan->fetch_assoc();

// Query untuk menghitung total akun
$query_total_akun = "SELECT COUNT(*) as total_akun FROM pengguna";
$total_akun = $con->query($query_total_akun);
$row_akun = $total_akun->fetch_assoc();
?>

