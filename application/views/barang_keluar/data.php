<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang Keluar</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang Keluar</h4>
              <div class="card-header-action">
                <?php if(is_pegawai()):?> 
                <a href="<?= base_url('tambah-barang-keluar');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
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
                      <th>Tanggal Keluar</th>
                      <th>Penerima</th>
                      <th class="text-center" style="width: 250px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang_keluar as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['tgl_keluar'];?></td>
                      <td><?= $u['penerima'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-barang-keluar/'.$u['id_barang_keluar']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <?php if(is_pegawai()):?> 
                        <a href="<?= base_url('edit-barang-keluar/'.$u['id_barang_keluar']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-barang-keluar/'.$u['id_barang_keluar'].'/'.$u['id_item']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php endif;?>
                      </td>
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