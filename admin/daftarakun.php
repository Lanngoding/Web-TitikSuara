
<?php include('includes/header.php'); ?>
<?php include('myfunctions.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Akun</h3>
                </div>
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                    <div class="container-fluid py-1 px-3">
                        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama Lengkap</th>
                                <th>Foto Profil</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Peran</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $pengguna = getAll("pengguna");

                                if(mysqli_num_rows($pengguna) > 0)
                                {
                                    foreach($pengguna as $item)
                                    {
                                       ?>
                                       <tr>
                                            <td> <?= $item['id_pengguna']; ?> </td>
                                            <td> <?= $item['nama_lengkap']; ?> </td>
                                            <td> 
                                                <img src="uploads/<?= $item['foto_profil']; ?> "width="50px" height="50px" alt="<?= $item['nama_lengkap']; ?> ">
                                            </td>
                                            <td> <?= $item['jabatan']; ?> </td>
                                            <td> <?= $item['alamat']; ?> </td>
                                            <td> <?= $item['peran']; ?> </td>
                                            <td> <?= $item['no_telp']; ?> </td>

                                            <td>
                                                <a href="editakun.php?id=<?= $item['id_pengguna']; ?>" class="btn btn-primary">Edit</a>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="id_pengguna" value="<?= $item['id_pengguna']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_akun_btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                       <?php
                                    }
                                }
                                else
                                {
                                    echo "Tidak ada data yang ditemukan";
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

