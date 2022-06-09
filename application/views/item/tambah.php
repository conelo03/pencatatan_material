<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang</a></div>
        <div class="breadcrumb-item">Tambah Barang</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-item'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Barang</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_item" class="form-control" value="<?= set_value('kode_item'); ?>" required="">
                  <?= form_error('kode_item', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_item" class="form-control" value="<?= set_value('nama_item'); ?>" required="">
                  <?= form_error('nama_item', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control">
                    <option disabled="" selected="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k) { ?>
                      <option value="<?= $k['id_kategori'] ?>" <?= set_value('id_kategori') == $k['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                    <?php } ?>
                  </select>
                  <?= form_error('id_kategori', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <input type="text" name="lokasi" class="form-control" value="<?= set_value('lokasi'); ?>" required="">
                  <?= form_error('lokasi', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" name="stok" class="form-control" value="<?= set_value('stok'); ?>" required>
                  <?= form_error('stok', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('item');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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