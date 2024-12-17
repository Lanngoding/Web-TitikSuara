<?php include('includes/header.php'); ?>
<?php include('myfunctions.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Check if there's a session message to display
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);  // Remove the message after displaying it
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $pengguna = getByID("pengguna", $id);

                if (mysqli_num_rows($pengguna) > 0) {
                    $row = mysqli_fetch_assoc($pengguna); // Get user data
            ?>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Edit Akun</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_pengguna" value="<?= $row['id_pengguna'] ?>">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kata Sandi</label>
                                    <input type="text" name="kata_sandi" value="<?= $row['kata_sandi'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jabatan</label>
                                    <input type="text" name="jabatan" value="<?= $row['jabatan'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">No Telpon</label>
                                    <input type="text" name="no_telp" value="<?= $row['no_telp'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Peran:</label>
                                    <select name="peran" class="form-control" required>
                                        <option value="admin" <?= $row['peran'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="karyawan" <?= $row['peran'] == 'karyawan' ? 'selected' : '' ?>>Karyawan</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Foto Profil</label>
                                    <input type="file" name="image" class="form-control">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?= $row['foto_profil'] ?>">
                                    <img src="uploads/<?= $row['foto_profil'] ?>" height="150px" width="150px" alt="">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary" name="update_akun_btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
                } else {
                    echo "<div class='alert alert-danger'>Akun tidak ditemukan</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>ID tidak valid</div>";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
