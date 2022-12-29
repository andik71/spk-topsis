<?php

include 'koneksi.php';

$id = $_GET['id'];

$query = $conn->query("DELETE FROM alternative WHERE id='$id'");

if (!$query) {
      echo
      "<script>
      alert('Data Gagal Dihapus');
      window.location.href = 'alternative.php';
      </script>";
} else {
      echo "<script>
      alert('Data Berhasil Dihapus');
      window.location.href = 'alternative.php';
      </script>";
}
