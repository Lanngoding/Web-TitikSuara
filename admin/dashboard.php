
<?php include('includes/header.php'); ?>
<?php include('code.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Hello, Admin !</h2>

            <!-- Daftar Terbaru -->
        <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                  <h4 class="mb-0">$53k</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">weekend</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                  <h4 class="mb-0">2300</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">person</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Ads Views</p>
                  <h4 class="mb-0">3,462</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">leaderboard</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <p class="mb-0 text-sm"><span class="text-danger font-weight-bolder">-2% </span>than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6"> 
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Sales</p>
                  <h4 class="mb-0">$103,430</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">weekend</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
 
 
        </div>

        </div>

        <div class="my-4"></div>

        <!-- Akun Terbaru -->
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h5>Akun Terbaru</h5>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto Profil</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peran
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($row['id_pengguna']); ?></h6>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex align-items-center justify-content-center">
                              <img src="uploads/<?php echo htmlspecialchars($row['foto_profil']); ?>" class="avatar avatar-sm me-3" alt="Profile">
                              </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs font-weight-bold"><?php echo htmlspecialchars($row['jabatan']); ?></span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs font-weight-bold"><?php echo htmlspecialchars($row['peran']); ?></span>
                            </td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                      <?php endif; ?>
                </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Pengaduan Terbaru</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <?php
                if ($hasil->num_rows > 0) {
                    while ($row = $hasil->fetch_assoc()) {
                        // Fetch complaint details (e.g., complaint text, date)
                        $deskripsi = htmlspecialchars($row['deskripsi']);
                        $dibuat_pada = htmlspecialchars($row['dibuat_pada']);
                        // Format date if needed
                        $formattedDate = date("d M Y H:i A", strtotime($dibuat_pada));
                ?>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-symbols-rounded text-success text-gradient">notifications</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $deskripsi; ?></h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo $formattedDate; ?></p>
                  </div>
                </div>
        <?php
        }
    } else {
        echo '<p>No complaints found.</p>';
    }
    ?>
  </div>
</div>

          </div>
        </div>
      </div>
     </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

