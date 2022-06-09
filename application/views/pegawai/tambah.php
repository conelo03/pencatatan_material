<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Pegawai</a></div>
        <div class="breadcrumb-item">Tambah Pegawai</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-pegawai'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Pegawai</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" required="">
                  <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="nip" class="form-control" value="<?= set_value('nip'); ?>" required="">
                  <?= form_error('nip', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>" required="">
                  <?= form_error('jabatan', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>" required="">
                  <?= form_error('tempat_lahir', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>" required="">
                  <?= form_error('tanggal_lahir', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label class="d-block">Jenis Kelamin</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="exampleRadios3" <?= set_value('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="exampleRadios4" <?= set_value('jenis_kelamin') == 'Perempuan' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Perempuan
                    </label>
                  </div>
                </div>
                <?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" class="form-control" value="<?= set_value('foto'); ?>" required="">
                  <?= form_error('foto', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" required="">
                  <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" required="">
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" required="">
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label class="d-block">Akses</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akses" value="admin" id="exampleRadios3" <?= set_value('akses') == 'admin' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Pengawas / Administrator
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akses" value="manager" id="exampleRadios4" <?= set_value('akses') == 'manager' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Manager
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akses" value="teknisi" id="exampleRadios4" <?= set_value('akses') == 'pegawai' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Teknisi
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akses" value="outsourcing" id="exampleRadios4" <?= set_value('akses') == 'outsourcing' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Pegawai Outsourcing
                    </label>
                  </div>
                </div>
                <?= form_error('akses', '<span class="text-danger small">', '</span>'); ?>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pegawai');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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