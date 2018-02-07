<?php
/**
 * Created by PhpStorm.
 * User: khairulimam
 * Date: 25/01/18
 * Time: 11:11
 */

include_once 'koneksi.php';

if ('POST' == $_SERVER['REQUEST_METHOD']) {
  $id = $_POST['id'];
  $noPlat = $_POST['nomorPlat'];
  $noMesin = $_POST['nomorMesin'];
  $noRangka = $_POST['nomorRangka'];
  $kodeDaerah = $_POST['kodeDaerah'];
  $namaPemilik = $_POST['namaPemilik'];
  $tahunPerakitan = $_POST['tahunPerakitan'];
  $query = "UPDATE `tbl_1310520075` SET `nomor_plat` = '${noPlat}', `nomor_mesin` = '${noMesin}', `nomor_rangka` = '${noRangka}', `kode_daerah` = '${kodeDaerah}', `nama_pemilik` = '${namaPemilik}', `tahun_perakitan` = '${tahunPerakitan}' WHERE `tbl_1310520075`.`id` = ${id}";
  $result = mysqli_query($link, $query);
  echo $result;
}