<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Maintenance Hardware</a></div>
        <div class="breadcrumb-item">Tambah Maintenance Hardware</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-maintenance-hardware'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Maintenance Hardware</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" required="" disabled>
                    <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group col-6">
                    <label>&nbsp;</label>
                    <input type="time" name="jam" class="form-control" value="<?= set_value('jam', date('H:i:s')); ?>" required="" disabled>
                    <?= form_error('jam', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Barcode</label>
                    <input type="text" name="kode_item" class="form-control" id="search-input-kode-item" value="<?= set_value('kode_item'); ?>" required="">
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
                  <input type="hidden" name="id_item" class="form-control disabled" id="id_item">
                  <input type="text" name="nama_item" class="form-control disabled" id="nama_item" value="<?= set_value('nama_item'); ?>" required="" disabled>
                  <?= form_error('nama_item', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>" required="">
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('maintenance-hardware');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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