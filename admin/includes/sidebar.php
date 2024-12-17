<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php">
        <span class="ms-1 font-weight-bold text-white">Titik Suara</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active bg-gradient-primary' : ''; ?>" href="../admin/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'daftarakun.php') ? 'active bg-gradient-primary' : ''; ?>" href="../admin/daftarakun.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Daftar Akun</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'tambahakun.php') ? 'active bg-gradient-primary' : ''; ?>" href="../admin/tambahakun.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tambah Akun</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'daftarpengaduan.php') ? 'active bg-gradient-primary' : ''; ?>" href="../admin/daftarpengaduan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Daftar Pengaduan</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>