<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Laporan Barang Keluar</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Laporan Barang Keluar</h4>
              <div class="card-header-action">
                
                <a href="<?= base_url('cetak-barang-keluar');?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal Keluar</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Penerima</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang_keluar as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tanggal'];?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['jumlah'];?></td>
                      <td><?= $u['nama'];?></td>
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