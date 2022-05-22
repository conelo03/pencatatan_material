<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Kategori</a></div>
        <div class="breadcrumb-item">Edit Kategori</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-kategori/'.$kategori['id_kategori']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Kategori</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" value="<?= set_value('nama_kategori', $kategori['nama_kategori']); ?>" required="">
                  <?= form_error('nama_kategori', '<span class="text-danger small">', '</span>'); ?>
                </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('kategori');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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