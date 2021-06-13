<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
      <span class="brand-text font-weight-light"> BookStore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a disabled="disabled" class="d-block">{{ auth()->user()->nama }}</a>
        </div>
      </div>

      <div class="user-panel ">
        <div class="info">
        <a href="{{ route('change-password') }}" class="nav-link d-block">
            <p>
            Ubah Password
            </p>
        </a>
        </div>
      </div>

      @if (auth()->user()->akses==="manager")
      <div class="user-panel">
        <div class="info">
        <a href="{{ route('indexaddaccount') }}" class="nav-link d-block">
            <p>
            Tambah Akun
            </p>
        </a>
        </div>
      </div>
      @endif


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p>
                @if (auth()->user()->akses==="kasir")
                Transaksi
                <i class="right fas fa-angle-left"></i>
                @endif
                @if (auth()->user()->akses==="admin")
                Inputan
                <i class="right fas fa-angle-left"></i>
                @endif
                @if (auth()->user()->akses==="manager")
                Laporan
                <i class="right fas fa-angle-left"></i>
                @endif
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (auth()->user()->akses==="kasir")
              <li class="nav-item">
                <a href="{{ route('indexformshop') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              @endif
              @if (auth()->user()->akses==="admin")
              <li class="nav-item">
                <a href="{{ route('indexinputdistributor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Distributor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexinputbuku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Buku</p>
                </a>
              </li>
              @endif
              @if (auth()->user()->akses==="manager")
              <li class="nav-item">
                <a href="{{ route('indexfilterformbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Faktur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexallformshop') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfilterdateformbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Pertanggal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexalldatabook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfilterauthorbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filter Penulis Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexbookoftensold') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku yang Sering Terjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexbooknotsold') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku yang Tidak Pernah Terjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexsupplierbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasok Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfiltersupplierbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filter Pasok Buku</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p>
                @if (auth()->user()->akses==="kasir")
                Laporan
                <i class="right fas fa-angle-left"></i>
                @endif
                @if (auth()->user()->akses==="admin")
                Tambah
                <i class="right fas fa-angle-left"></i>
                @endif
                @if (auth()->user()->akses==="manager")
                Pengaturan
                <i class="right fas fa-angle-left"></i>
                @endif
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (auth()->user()->akses==="kasir")
              <li class="nav-item">
                <a href="{{ route('indexfilterformbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Faktur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexallformshop') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfilterdateformbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Pertanggal</p>
                </a>
              </li>
              @endif
              @if (auth()->user()->akses==="admin")
              <li class="nav-item">
                <a href="{{ route('indextambahpasok') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Pasok Buku</p>
                </a>
              </li>
              @endif
              @if (auth()->user()->akses==="manager")
              <li class="nav-item">
                <a href="{{ route('editprofile') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @if (auth()->user()->akses==="admin")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('indexalldatabook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfilterauthorbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filter Penulis Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexbookoftensold') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku yang Sering Terjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexbooknotsold') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku yang Tidak Pernah Terjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexsupplierbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasok Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('indexfiltersupplierbook') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filter Pasok Buku</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <div class="user-panel"></div>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>

      </nav>
      <div class="mb-5"></div>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
