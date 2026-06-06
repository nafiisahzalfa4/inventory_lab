<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory Lab</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.alat.index') }}" class="nav-link">
                  <i class="fas fa-tools nav-icon"></i>
                  <p>Alat</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.peminjaman.index') }}" class="nav-link">
                  <i class="fas fa-handshake nav-icon"></i>
                  <p>Peminjaman</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.petugas.index') }}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Petugas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.ruangan.index') }}" class="nav-link">
                  <i class="fas fa-door-open nav-icon"></i>
                  <p>Ruangan</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>