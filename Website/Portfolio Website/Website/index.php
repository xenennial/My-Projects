<?php

$koneksi = mysqli_connect("localhost:3307","root@localhost","","register");

if(!$koneksi){//cek koneksi
    die("Connection Failed" . mysqli_connect_error());
}
