<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="/catatan" class="nav-link">Arsip</a>
          </li>
          <li class="nav-item">
            <a href="/kategori" class="nav-link">Kategori</a>
          </li>
          <li class="nav-item">
            <a href="/departement" class="nav-link">Departement</a>
          </li>
          <li class="nav-item">
            <a href="/user" class="nav-link">User</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i> <?= session()->get('nama'); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Selamat Datang <?= session()->get('nama'); ?></span>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="/auth/logout" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">
            Login :
            <?php if(session()->get('role') == 1) : ?>
            Administrator
            <?php endif; ?>
            </a>
          </div>
        </li>
        
      </ul>
    </div>
  </nav>