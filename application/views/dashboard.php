<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-header">
      <h6>Selamat Datang di Sistem Informasi Monitoring Barang<br/><br/>
      </h6>

    </div>
    <?php if(is_admin() || is_pegawai()):?>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Grafik Barang Masuk tahun 2022</h4>
          </div>
          <div class="card-body">
            <canvas id="barChart" height="158"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Grafik Barang Keluar tahun 2022</h4>
          </div>
          <div class="card-body">
            <canvas id="keluarChart" height="158"></canvas>
          </div>
        </div>
      </div>
    </div>
    <?php endif;?>
  </section>
  
</div>
<?php $this->load->view('template/footer');?>