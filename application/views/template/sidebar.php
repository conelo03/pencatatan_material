<?php
$id_pegawai = $this->session->userdata('id_pegawai');
$get_user = $this->db->get_where('tb_pegawai', ['id_pegawai' => $id_pegawai])->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['nama'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('setting');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar bg-primary">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#" class="text-white">SI MONITORING BARANG</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#" class="text-white">SIMB</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header text-white">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>  

            <li class="<?= $title == 'Profil Pribadi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('profile');?>"><i class="fas fa-user"></i> <span>Profil Pribadi</span></a></li> 
            
            <?php if(is_admin()):?>
              <li class="<?= $title == 'Data Pegawai' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pegawai');?>"><i class="fas fa-users"></i> <span>Data Pegawai</span></a></li> 
              <li class="menu-header">Data Gudang</li>
              <li class="<?= $title == 'Stock Gudang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('stock-item');?>"><i class="fas fa-th-large"></i> <span>Stock Gudang</span></a></li> 
            
              <li class="menu-header">Transaksi</li>
              
              <li class="<?= $title == 'Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-masuk');?>"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-keluar');?>"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
            
              <li class="menu-header">Pelaporan</li>
              <li class="<?= $title == 'Laporan Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-masuk');?>"><i class="fas fa-file"></i> <span>Laporan Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Laporan Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-keluar');?>"><i class="fas fa-file"></i> <span>Laporan Barang Keluar</span></a></li>
              <li class="<?= $title == 'Laporan Maintenance Hardware' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-maintenance-hardware');?>"><i class="fas fa-file"></i> <span>Laporan Maintenance Hardware</span></a></li>
            <?php endif;?>


            <?php if(is_pegawai()):?>
              <li class="<?= $title == 'Data Kategori' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('kategori');?>"><i class="fas fa-list"></i> <span>Data Kategori</span></a></li> 
              <li class="<?= $title == 'Data Barang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('item');?>"><i class="fas fa-th-large"></i> <span>Data Barang</span></a></li> 

              <li class="menu-header">Data Gudang</li>
              <li class="<?= $title == 'Stock Gudang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('stock-item');?>"><i class="fas fa-th-large"></i> <span>Stock Gudang</span></a></li> 
              <li class="<?= $title == 'Permintaan Barang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('permintaan-barang');?>"><i class="fas fa-clipboard-list"></i> <span>Permintaan Barang</span></a></li>

              <li class="menu-header">Transaksi</li>
              
              <li class="<?= $title == 'Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-masuk');?>"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-keluar');?>"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>

              <li class="menu-header">Maintenance Barang</li>
              <li class="<?= $title == 'Maintenance Hardware' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('maintenance-hardware');?>"><i class="fas fa-wrench"></i> <span>Maintenance Hardware</span></a></li> 
            
              <li class="menu-header">Pelaporan</li>
              <li class="<?= $title == 'Laporan Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-masuk');?>"><i class="fas fa-file"></i> <span>Laporan Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Laporan Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-keluar');?>"><i class="fas fa-file"></i> <span>Laporan Barang Keluar</span></a></li>
              <li class="<?= $title == 'Laporan Maintenance Hardware' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-maintenance-hardware');?>"><i class="fas fa-file"></i> <span>Laporan Maintenance Hardware</span></a></li>
            <?php endif;?>
            
            <?php if(is_outsourcing()):?> 
              <li class="menu-header">Data Gudang</li>
              <li class="<?= $title == 'Stock Gudang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('stock-item');?>"><i class="fas fa-th-large"></i> <span>Stock Gudang</span></a></li> 
              <li class="<?= $title == 'Permintaan Barang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('permintaan-barang');?>"><i class="fas fa-clipboard-list"></i> <span>Permintaan Barang</span></a></li>

              <li class="menu-header">Pelaporan</li>
              <li class="<?= $title == 'Laporan Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-masuk');?>"><i class="fas fa-file"></i> <span>Laporan Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Laporan Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-keluar');?>"><i class="fas fa-file"></i> <span>Laporan Barang Keluar</span></a></li>
            <?php endif;?>

            <?php if(is_teknisi()):?>
              <li class="menu-header">Maintenance Barang</li>
              <li class="<?= $title == 'Maintenance Hardware' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('maintenance-hardware');?>"><i class="fas fa-wrench"></i> <span>Maintenance Hardware</span></a></li> 
            
            <?php endif;?>

            <?php if(is_manager()):?> 
              <li class="menu-header">Pelaporan</li>
              <li class="<?= $title == 'Laporan Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-masuk');?>"><i class="fas fa-file"></i> <span>Laporan Barang Masuk</span></a></li> 
              <li class="<?= $title == 'Laporan Barang Keluar' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-keluar');?>"><i class="fas fa-file"></i> <span>Laporan Barang Keluar</span></a></li>
            <?php endif;?>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      