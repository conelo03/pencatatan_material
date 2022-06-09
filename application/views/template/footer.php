      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> <a href="#">Stisla</a>
        </div>
        <div class="footer-right">
          Version 1.1
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/vendor/izitoast/js/iziToast.min.js'?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/index-0.js"></script>
  <?php if(is_admin() || is_pegawai()):?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    var ctx = document.getElementById("stockChart").getContext('2d');
    const mChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= $nama ?>,
        datasets: [{
          label: 'Stock Gudang',
          data: <?= $stok ?>,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <?php endif;?>
  <script type="text/javascript"> 
    function searchKode(){

      $.ajax({
        url: '<?= base_url('Item/search_item_by_kode')  ?>',
        type: 'post',
        dataType: 'json',
        data: {
          'kode' : $('#search-input-kode-item').val()
        },
        success: function(res) {
          console.log(res);
          if(res.response === true){
            document.getElementById("id_item").setAttribute('value',res.data.id_item);
            document.getElementById("nama_item").setAttribute('value',res.data.nama_item);
            document.getElementById("kategori").setAttribute('value',res.data.kategori);
            document.getElementById("stok").setAttribute('value',res.data.stok);
            $('#item-error').html('');
          } else {
            $('#item-error').html('Item tidak ditemukan!');
            document.getElementById("id_item").setAttribute('value', '');
            document.getElementById("nama_item").setAttribute('value', '');
            document.getElementById("kategori").setAttribute('value', '');
            document.getElementById("stok").setAttribute('value', '');
          }
        },  

      });
    }

    $('#search-button-kode-item').on('click', function(){
      searchKode();
    });

    $('#search-input-kode-item').on('keyup', function(e){
      if(e.keyCode === 13){
        searchKode();
      }
    });
    
  </script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#datatables-user').DataTable({
        "ordering": false,
      });
      $('#datatables-pegawai').DataTable({
        "ordering": false,
      });
      $('#datatables-jabatan').DataTable({
        "ordering": false,
      });
      $('#datatables-bidang').DataTable({
        "ordering": false,
      });
      $('#datatables-golongan').DataTable({
        "ordering": false,
      });
      $('#datatables-cuti').DataTable({
        "ordering": false,
      });
      $('#datatables-izin').DataTable({
        "ordering": false,
      });
      $('#select-pegawai').selectpicker({
        search : true,
      });
      $('#select-golruang').selectpicker({
        search : true,
      });
      $('#select-bidang').selectpicker({
        search : true,
      });
      $('#select-jabatan').selectpicker({
        search : true,
      });
      $('#select-atasan').selectpicker({
        search : true,
      });
      $('#select-pejabat').selectpicker({
        search : true,
      });
    });

  </script>
  <?php if($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil disimpan!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='lunas'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Barang telah Lunas!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='error'):?>
    <script type="text/javascript">
      iziToast.error({
          title: 'Gagal!',
          message: 'Data gagal disimpan!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='edit'):?>
    <script type="text/javascript">
      iziToast.info({
          title: 'Sukses!',
          message: 'Data berhasil diedit!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='hapus'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil dihapus!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='password-salah'):?>
    <script type="text/javascript">
      iziToast.error({
          title: 'Gagal!',
          message: 'Password Lama Salah!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='verifikasi'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil diverifikasi!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='error-stock'):?>
    <script type="text/javascript">
      iziToast.error({
          title: 'Gagal!',
          message: 'Stock tidak cukup!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='berhasil-bayar'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Pembayaran berhasil!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='approve'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Approval berhasil!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php endif; ?>
</body>
</html>
