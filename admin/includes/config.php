<?php
$host="localhost";
$user="minevers_root";
$password="user@mineversal.c0m";
$db="minevers_mineversal";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>