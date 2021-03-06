<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="#" class="site_title"><i class="fa fa-book"></i> <span>Smaknis Perpus!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- Menu Profile Start -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{asset('gentelella/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome</span>
        <h2>Operator</h2>
      </div>
    </div>
    <!-- Menu Profile End -->

    <br />

    <!--Sidebar Menu Start -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li><a><i class="fa fa-recycle"></i> Sirkulasi <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('operator.sirkulasi.peminjaman')}}">Peminjaman</a></li>
              <li><a href="{{route('operator.sirkulasi.pengembalian')}}">Pengembalian</a></li>
              <li><a href="{{route('operator.lihat.konfirmasi')}}">Komfirmasi Pemesanan</a></li>
              <li><a href="{{route('operator.lihat.peminjaman')}}">Riwayat</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-book"></i> Biblio <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('operator.biblio.tambah') }}">Tambah Biblio</a></li>
              <li><a href="{{ route('operator.biblio') }}">Data Biblio</a></li>
              <li><a href="{{ route('operator.pendukung.biblio') }}">Daftar Pendukung</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-group"></i> Keanggotaan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('operator.anggota.tambah') }}">Tambah Anggota</a></li>
              <li><a href="{{ route('operator.anggota') }}">Daftar Anggota</a></li>
              <li><a href="{{ route('anggota.pendukung') }}">Daftar Pendukung</a></li>
            </ul>
          </li>

          <li><a href="#"><i class="fa fa-pie-chart"></i> Laporan</a></li>
        </ul>
      </div>

      <div class="menu_section"></div>
    </div>
     <!-- Sidebar Menu End -->

      <!-- Menu Footer Start -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon" aria-hidden="true"></span>
        </a>
      </div>
      <!-- Menu Footer Start -->
  </div>    
</div>