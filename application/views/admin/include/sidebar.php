<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" target="_blank">
      <img src="<?= base_url() ?>public/assets/img/nxgmarketlogo.webp" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white"></span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/dashboard') ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">DASHBOARD</span>
        </a>
      </li>

      <?php if ($this->session->userdata('role')) : ?>
        <?php if ($this->session->userdata('role') === '1') : ?>
          <!-- Navigation items for admin role -->
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/users') ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person_add</i>
              </div>
              <span class="nav-link-text ms-1">USERS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/technical_analysis') ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">bar_chart</i>
              </div>
              <span class="nav-link-text ms-1">TECHNICAL ANALYSIS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/market_report'); ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">trending_up</i>
              </div>
              <span class="nav-link-text ms-1">MARKET REPORT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/perform_stats'); ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">stacked_bar_chart</i>
              </div>
              <span class="nav-link-text ms-1">PERFORMANCE STATS</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/newsletter'); ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">unsubscribe</i>
              </div>
              <span class="nav-link-text ms-1">SUBSCRIBE NEWSLETTER</span>
            </a>
          </li>
        <?php elseif ($this->session->userdata('role') === '2') : ?>

          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/technical_analysis') ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">bar_chart</i>
              </div>
              <span class="nav-link-text ms-1">TECHNICAL ANALYSIS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/market_report'); ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">trending_up</i>
              </div>
              <span class="nav-link-text ms-1">MARKET REPORT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('admin/perform_stats'); ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">stacked_bar_chart</i>
              </div>
              <span class="nav-link-text ms-1">PERFORMANCE STATS</span>
            </a>
          </li>


        <?php endif; ?>
      <?php endif; ?>
    </ul>
  </div>
</aside>
