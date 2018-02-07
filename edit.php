<?php
require_once './koneksi.php';
$id = $_GET['id'];
$query = pg_query($link, "SELECT * FROM tbl_1310520075 WHERE id='${id}'");
$result = pg_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Data Kendaraan</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <a class="navbar-brand" href="index.php">Data Kendaraan</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Halaman Depan <span class="sr-only">(current)</span></a></li>
        <li><a href="tambah.php">Tambah Data Kendaraan</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>Ubah Data Kendaraan</h1>
        <small>
          <a href="index.php" class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Semua Data Kendaraan</a>
        </small>
      </div>
      <ol class="breadcrumb">
        <li><a href="index.php">Halaman Depan</a></li>
        <li class="active">Ubah Data Kendaraan</li>
      </ol>
      <div class="row">

        <div class="col-sm-offset-3 col-sm-6">
          <div class="panel-warning panel">
            <div class="panel-heading">
              <h3 class="panel-title">
                Form Ubah Data Kendaraan
              </h3>
            </div>
            <div class="panel-body">
              <form id="formTambahKendaraan">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group">
                  <label for="nomorPlat">Nomor Plat</label>
                  <input type="text" value="<?= ($result) ? $result->nomor_plat : '' ?>" class="form-control"
                         name="nomorPlat" required id="nomorPlat" placeholder="Nomor Plat">
                </div>
                <div class="form-group">
                  <label for="nomorMesin">Nomor Mesin</label>
                  <input type="text" value="<?= ($result) ? $result->nomor_mesin : '' ?>" class="form-control"
                         name="nomorMesin" required id="nomorMesin" placeholder="Nomor Mesin">
                </div>
                <div class="form-group">
                  <label for="nomorRangka">Nomor Rangka</label>
                  <input type="text" value="<?= ($result) ? $result->nomor_rangka : '' ?>" class="form-control"
                         name="nomorRangka" required id="nomorRangka" placeholder="Nomor Rangka">
                </div>
                <div class="form-group">
                  <label>Kode Daerah</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="kodeDaerah" id="optionsRadios2" value="Dr"
                          <?= ((($result) ? $result->kode_daerah : '') == 'Dr') ? 'checked' : '' ?>>
                      Dr
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="kodeDaerah" id="optionsRadios1"
                             value="Ea" <?= ((($result) ? $result->kode_daerah : '') == 'Ea') ? 'checked' : '' ?>>
                      Ea
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namaPemilik">Nama Pemilik</label>
                  <input type="text" value="<?= ($result) ? $result->nama_pemilik : '' ?>" class="form-control"
                         name="namaPemilik" required id="namaPemilik"
                         placeholder="Nama Pemilik">
                </div>
                <div class="form-group">
                  <label for="tahunPerakitan">Tahun Perakitan</label>
                  <input type="number" value="<?= ($result) ? $result->tahun_perakitan : '' ?>" maxlength="4" min="1950"
                         name="tahunPerakitan" required class="form-control"
                         id="tahunPerakitan" placeholder="Tahun Perakitan">
                </div>
                <button type="submit" id="simpanKendaraan" class="btn btn-warning">Ubah</button>
                <br>
                <br>
                <div id="info"></div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
  $("#formTambahKendaraan").submit(function (e) {
    e.preventDefault();
    console.log($(this).serializeArray());
    $.ajax({
      type: 'POST',
      url: 'update.php',
      data: $(this).serializeArray(),
      success: function (r) {
        message = "<div class='alert alert-info'>Berhasil mengubah data kendaraan. <a href='index.php' class='alert-link'>Kembali kehalaman semua kendaraan</a></div>"
        if (r)
          $("#info").html(message)
      },
      error: function (r) {
        console.log(r)
      }
    })
  })
</script>
</html>