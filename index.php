<?php
require_once './koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Data Kendaraan</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Data Kendaraan <?= getenv('DB_NAME') ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Halaman Depan <span class="sr-only">(current)</span></a></li>
        <li><a href="tambah.php">Tambah Data Kendaraan</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>Semua Data Kendaraan</h1>
        <small>
          <a href="tambah.php" class="btn btn-success"><span class="glyphicon-plus glyphicon"></span> Tambah Data</a>
        </small>
      </div>
      <ol class="breadcrumb">
        <li class="active">Halaman Depan</li>
      </ol>
      <div id="info"></div>
      <?php
      $sql = "SELECT * FROM tbl_1310520075";
      $query = mysqli_query($link, $sql);
      $rowCount = $query->num_rows;
      if ($rowCount <= 0):?>
        <div class="alert alert-warning">
          Tidak ada data kendaraan. <a class="alert-link" href="tambah.php">Tambahkan data kendaraan baru?</a>
        </div>
      <?php
      else:
      ?>
      <div class="table-responsive">
        <table class="table table-hover table-condensed">
          <thead>
          <tr>
            <th>Nomor Plat</th>
            <th>Nomor Mesin</th>
            <th>Nomor Rangka</th>
            <th>Kode Daerah</th>
            <th>Nama Pemilik</th>
            <th>Tahun Perakitan</th>
            <th>Manipulasi</th>
          </tr>
          </thead>
          <tbody>
          <?php
          while ($row = mysqli_fetch_object($query)):?>
            <tr>
              <td><?= $row->nomor_plat ?></td>
              <td><?= $row->nomor_mesin ?></td>
              <td><?= $row->nomor_rangka ?></td>
              <td><?= $row->kode_daerah ?></td>
              <td><?= $row->nama_pemilik ?></td>
              <td><?= $row->tahun_perakitan ?></td>
              <td>
                <div class="btn-group btn-group-sm" role="group">
                  <button onclick="deleteThis(<?= $row->id ?>, $(this))" class="btn btn-danger"><span
                        class="glyphicon glyphicon-trash"></span></button>
                  <a href="edit.php?id=<?= $row->id ?>" class="btn btn-warning"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                </div>
              </td>
            </tr>
          <?php
          endwhile;
          endif;
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  function deleteThis(id, element) {
    swal({
      title: "Yakin ingin menghapus data?",
      text: "Setelah terhapus anda tidak akan bisa mengembalikan data ini lagi!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {'id': id},
            success: function (r) {
              message = "<div class='alert alert-info alert-dismissable' role='alert'>" +
                  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> " +
                  "Data telah dihapus</div>";
              if (r) {
                $("#info").html(message);
                element.closest('tr').remove();
              }
            },
            error: function (r) {
              alert(r);
            }
          }
        )
      } else {
        swal("Data anda aman tersimpan!");
      }
    });
  }
</script>
</html>