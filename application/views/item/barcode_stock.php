<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Item</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Barcode Generator</h4>
            </div>
            <div class="card-body text-center">
              <img src="<?= base_url('Item/barcode_generator/'.$kode_item) ?>" style="width: 200px;"><br><br>
              <h6>Barcode dapat anda scan</h6>
            </div>
            <div class="card-footer text-center">
              <a href="<?= base_url('stock-item');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>