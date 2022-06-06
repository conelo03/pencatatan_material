<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Permintaan Barang</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Permintaan Barang</h4>
              <?php if (is_outsourcing()) { ?>
                <div class="card-header-action">
                  <a href="<?= base_url('tambah-permintaan-barang');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
              <?php } ?>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal</th>
                      <th>User</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th class="text-center" style="width: 250px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($permintaan_barang as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tanggal'];?></td>
                      <td><?= $u['nama'];?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['jumlah'];?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td>
                        <?php
                          if ($u['status'] == 0) {
                            echo '<button class="btn btn-danger">Belum Tersedia</button>';
                          } else {
                            echo '<button class="btn btn-success">Sudah Tersedia</button>';
                          }
                        ?>
                      </td>
                      <td class="text-center">
                      <?php if (is_outsourcing() && $u['status'] == 0) { ?>
                        <a href="<?= base_url('edit-permintaan-barang/'.$u['id_permintaan_barang']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-permintaan-barang/'.$u['id_permintaan_barang']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                      <?php } ?>
                      <?php if (is_pegawai() && $u['status'] == 0) { ?>
                        <button class="btn btn-info" data-confirm="Anda yakin ingin memverifikasi permintaan barang ini?|Data yang sudah diverifikasi tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('verifikasi-permintaan-barang/'.$u['id_permintaan_barang']); ?>';"><i class="fa fa-check"></i> Verifikasi</button>
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