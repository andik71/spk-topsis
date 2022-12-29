<?php 

$conn = mysqli_connect('localhost','root','','spk-topsis');


if ($conn->connect_error) {
   die("koneksi gagal :" . $conn->connect_error);
}
