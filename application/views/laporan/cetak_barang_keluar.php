<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container-fluid">
      <h2 class="text-center">Laporan Barang Keluar</h2>
      <br>
      <table class="table table-bordered" id="datatables-user">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Tanggal Keluar</th>
            <th>Penerima</th>
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
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      window.print();
    </script>
  </body>
</html>