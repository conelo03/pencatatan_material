<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Item</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Detail Barang Masuk</h4>
            </div>
            <div class="card-body text-center">
              <img src="<?= base_url('Item/barcode_generator/'.$bm['kode_item']) ?>" style="width: 200px;"><br><br>
              <hr>
              <div class="row">
                <div class="col-4"></div>
                <div class="col-2 text-left">
                  <h6>Nama Barang</h6>
                  <h6>Kategori</h6>
                  <h6>Stock</h6>
                  <h6>Keterangan</h6>
                  <h6>Jumlah</h6>
                  <h6>Tanggal Masuk</h6>
                  <h6>Diinput oleh</h6>
                </div>
                <div class="col-4 text-left">
                  <h6>: <?= $item['nama_item'] ?></h6>
                  <h6>: <?= $kat['nama_kategori'] ?></h6>
                  <h6>: <?= $item['stok'] ?></h6>
                  <h6>: <?= $bm['keterangan'] ?></h6>
                  <h6>: <?= $bm['jumlah'] ?></h6>
                  <h6>: <?= $bm['tgl_masuk'] ?></h6>
                  <h6>: <?= $pegawai['nama'] ?></h6>
                </div>
                <div class="col-2"></div>
              </div>
            </div>
            <div class="card-footer text-center">
              <a href="<?= base_url('barang-masuk');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>