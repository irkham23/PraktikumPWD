<?php
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'batualam');

$mysqli = new mysqli(dbhost,dbuser,dbpass,dbname);

$connect = mysqli_connect('localhost', 'root', '', 'batualam');

// cek koneksi yang kita lakukan berhasil atau tidak
if( $mysqli->connect_error )
{
 // jika terjadi error, matikan proses dengan die() atau exit();
 die('Maaf koneksi gagal: '. $mysqli->connect_error);
}

$gaSql['user']     = dbuser;
$gaSql['password'] = dbpass;
$gaSql['db']       = dbname;  //Database
$gaSql['server']   = dbhost;
$gaSql['port']     = 3306; // 3306 is the default MySQL port