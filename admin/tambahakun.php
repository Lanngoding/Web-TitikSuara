
<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h3>Tambah Akun</h3>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap Pengguna" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label for="">Kata Sandi</label>
                            <input type="text" name="kata_sandi" placeholder="Kata Sandi Pengguna" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan" placeholder="Jabatan Pengguna" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat Pengguna" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label for="">No Telpon</label>
                            <input type="text" name="no_telp" placeholder="Nomor Telpon Pengguna" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">Peran:</label>
                                <select name="peran" class="form-control" required>
                                    <option value="karyawan">Karyawan</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                            <label for="">Foto Profil</label>
                            <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="tambah_akun_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
