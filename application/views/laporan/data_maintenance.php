<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Laporan Maintenance Hardware</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Laporan Maintenance Hardware</h4>
              <div class="card-header-action">
                <?php if(is_pegawai()):?>
                <a href="<?= base_url('cetak-maintenance-hardware');?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                <?php endif;?>
              </div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal</th>
                      <th>User</th>
                      <th>Kode Item</th>
                      <th>Nama Item</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($maintenance_hardware as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tanggal'];?></td>
                      <td><?= $u['nama'];?></td>
                      <td><?= $u['kode_item'];?></td>
                      <td><?= $u['nama_item'];?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td>
                        <?php
                          if ($u['status'] == 0) {
                            echo '<button class="btn btn-danger">Belum Dikerjakan</button>';
                          } else {
                            echo '<button class="btn btn-success">Sudah Dikerjakan</button>';
                          }
                        ?>
                        
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