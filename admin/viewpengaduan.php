<?php include('includes/header.php'); ?>
<?php include('myfunctions.php'); ?>
<?php $query = mysqli_query($con,"select * from pengaduan"); ?>

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
                $pengaduan = getPengaduanByID("pengaduan", $id);

                if (mysqli_num_rows($pengaduan) > 0) {
                    $row = mysqli_fetch_assoc($pengaduan); // Get pengaduan data
            ?>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>View Pengaduan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_pengaduan" value="<?= $row['id_pengaduan'] ?>">
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="<?= $row['deskripsi'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori" value="<?= $row['kategori'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="id_status" class="form-control" required>
                                        <option value="1" <?= $row['id_status'] == 1 ? 'selected' : '' ?>>Diproses</option>
                                        <option value="2" <?= $row['id_status'] == 2 ? 'selected' : '' ?>>Ditinjau</option>
                                        <option value="3" <?= $row['id_status'] == 3 ? 'selected' : '' ?>>Selesai </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">ID Karyawan</label>
                                    <input type="text" name="id_karyawan" value="<?= $row['id_karyawan'] ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="">Bukti Pengaduan</label>
                                    <img src="display_image.php?id_pengaduan=<?= $row['id_pengaduan'] ?>" height="150px" width="150px" alt="Bukti Pengaduan">

                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary" name="update_pengaduan_btn">Update</button>
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
