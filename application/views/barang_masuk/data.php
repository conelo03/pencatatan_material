<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang Masuk</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang Masuk</h4>
              <div class="card-header-action">
                <?php if(is_pegawai()):?> 
                <a href="<?= base_url('tambah-barang-masuk');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
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
                      <th>Approval</th>
                      <th class="text-center" style="width: 250px;">Aksi</th>
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
                      <td>
                        <?php
                          if ($u['approval'] == 0) {
                            echo '<button class="btn btn-danger">Belum Approve</button>';
                          } else {
                            echo '<button class="btn btn-success">Approve</button>';
                          }
                        ?>
                        
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-barang-masuk/'.$u['id_barang_masuk']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <?php if(is_admin() && $u['approval'] == 0):?> 
                        <button class="btn btn-success" data-confirm="Anda yakin ingin menyetujui data ini?|Data yang sudah disetujui tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('approve-barang-masuk/'.$u['id_barang_masuk'].'/'.$u['id_item']); ?>';"><i class="fa fa-check"></i> Approve</button>
                        <?php endif;?>
                        <?php if(is_pegawai() && $u['approval'] == 0):?> 
                        <a href="<?= base_url('edit-barang-masuk/'.$u['id_barang_masuk']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-barang-masuk/'.$u['id_barang_masuk'].'/'.$u['id_item']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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