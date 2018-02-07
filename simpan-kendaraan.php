<?php
/**
 * Created by PhpStorm.
 * User: khairulimam
 * Date: 25/01/18
 * Time: 11:11
 */

include_once 'koneksi.php';

if ('POST' == $_SERVER['REQUEST_METHOD']) {
  $noPlat = $_POST['nomorPlat'];
  $noMesin = $_POST['nomorMesin'];
  $noRangka = $_POST['nomorRangka'];
  $kodeDaerah = $_POST['kodeDaerah'];
  $namaPemilik = $_POST['namaPemilik'];
  $tahunPerakitan = $_POST['tahunPerakitan'];
  $query = "INSERT INTO tbl_1310520075 (`nomor_plat`, `nomor_mesin`, `nomor_rangka`, `kode_daerah`, `nama_pemilik`, `tahun_perakitan`) VALUES ('${noPlat}', '${noMesin}', '${noRangka}', '${kodeDaerah}', '${namaPemilik}', '${tahunPerakitan}')";
  $result = pg_query($link, $query);
  echo $result;
}