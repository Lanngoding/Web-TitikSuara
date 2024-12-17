
<?php include('includes/header.php'); ?>
<?php include('myfunctions.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Pengaduan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id Pengaduan</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Bukti Pengaduan</th>
                                <th>Status</th>
                                <th>Id Karyawan</th>
                                <th>Id Admin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php 
                                    $pengaduan = getAll("pengaduan");

                                    if(mysqli_num_rows($pengaduan) > 0)
                                    {
                                        foreach($pengaduan as $item)
                                        {
                                        ?>
                                    <tr>
                                        <td> <?= $item['id_pengaduan']; ?> </td>
                                        <td>
                                            <?php 
                                            $deskripsi = $item['deskripsi'];
                                            echo strlen($deskripsi) > 10 ? substr($deskripsi, 0, 10) . "..." : $deskripsi;
                                            ?>
                                        </td>
                                        <td> <?= $item['kategori']; ?> </td>
                                        <td>
                                        <a href="display_image.php?id_pengaduan=<?= $item['id_pengaduan']; ?>" target="_blank">
                                            <img src="display_image.php?id_pengaduan=<?= $item['id_pengaduan']; ?>" height="100px" width="100px" alt="Bukti Pengaduan">
                                        </a> 
                                        </td>
                                        <td> <?= $item['id_status']; ?> </td>
                                        <td> <?= $item['id_karyawan']; ?> </td>
                                        <td> <?= $item['id_admin']; ?> </td>
                                        <td>
                                            <a href="viewpengaduan.php?id=<?= $item['id_pengaduan']; ?>" class="btn btn-primary">View</a>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="id_pengaduan" value="<?= $item['id_pengaduan']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_akun_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                        <?php
                                        }
                                    }
                                        ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

