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
  $query = "DELETE FROM tbl_1310520075 WHERE id='${id}'";
  $result = mysqli_query($link, $query);
  echo $result;
}