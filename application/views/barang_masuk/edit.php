<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang Masuk</a></div>
        <div class="breadcrumb-item">Edit Barang Masuk</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-barang-masuk/'.$bm['id_barang_masuk']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Barang Masuk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" class="form-control" value="<?= date('Y-m-d', strtotime($bm['tgl_masuk'])); ?>" required="" disabled>
                    <?= form_error('tgl_masuk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group col-6">
                    <label>&nbsp;</label>
                    <input type="time" name="jam" class="form-control" value="<?= date('H:i:s', strtotime($bm['tgl_masuk'])); ?>" required="" disabled>
                    <?= form_error('jam', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Barcode</label>
                    <input type="hidden" name="kode_item" class="form-control" id="" value="<?= $bm['kode_item']; ?>">
                    <input type="text" name="kode_item_dum" class="form-control" id="search-input-kode-item" value="<?= $bm['kode_item']; ?>" required="" disabled>
                    <span class="text-danger" id='item-error'></span>
                    <?= form_error('kode_item', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-6">
                    <label>&nbsp;</label><br/>
                    <button type="button" class="btn btn-primary" id="search-button-kode-item"><i class="fa fa-search"></i> Cari</button>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="hidden" name="id_item" class="form-control disabled" id="id_item" value="<?= $bm['id_item'] ?>">
                  <input type="text" name="nama_item" class="form-control disabled" id="nama_item" value="<?= set_value('nama_item', $item['nama_item']); ?>" required="" disabled>
                  <?= form_error('nama_item', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" value="<?= set_value('kategori', $kat['nama_kategori']); ?>" required="" disabled>
                    <?= form_error('kategori', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Stock</label>
                    <input type="text" name="stok" class="form-control" id="stok" value="<?= set_value('stok', $item['stok']); ?>" required="" disabled>
                    <?= form_error('stok', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="hidden" name="jumlah_old" value="<?= $bm['jumlah'] ?>">
                  <input type="number" name="jumlah" class="form-control" value="<?= set_value('jumlah', $bm['jumlah']); ?>" required="">
                  <?= form_error('jumlah', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan', $bm['keterangan']); ?>" required="">
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('barang-masuk');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>