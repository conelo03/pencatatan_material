<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Laporan Barang Masuk</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Laporan Barang Masuk</h4>
              <div class="card-header-action">
                <?php if(is_pegawai() || is_manager()):?>
                <a href="<?= base_url('cetak-barang-masuk');?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                <?php endif;?>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Tanggal Masuk</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang_masuk as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['tgl_masuk'];?></td>
                      <td><?= $u['jumlah'];?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>