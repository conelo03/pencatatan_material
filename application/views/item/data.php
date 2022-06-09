<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang</h4>
              <?php if (is_admin()) { ?>
                <div class="card-header-action">
                  <a href="<?= base_url('tambah-item');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
              <?php } ?>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Lokasi</th>
                      <th>Stock</th>
                      <th class="text-center" style="width: 250px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($item as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['lokasi'];?></td>
                      <td><?= $u['stok'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('barcode/'.$u['kode_item']);?>" class="btn btn-light"><i class="fa fa-barcode"></i></a>
                        <?php if (is_admin()) { ?>
                          <a href="<?= base_url('edit-item/'.$u['id_item']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-item/'.$u['id_item']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php } ?>
                        <?php if (is_outsourcing()) { ?>
                          <a href="<?= base_url('tambah-permintaan-barang/'.$u['id_item']);?>" class="btn btn-info"><i class="fa fa-plus"></i> Minta Barang</a>
                        <?php } ?>
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