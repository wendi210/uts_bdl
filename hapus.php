<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$query = mysqli_query($koneksi,"delete from uas where id='$id'");
  if($query){
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Dihapus!");
        document.location.href="index.php";
      </script>
      <?php
  } else {
      ?>
      <script type="text/javascript">
        alert("Data Tidak Berhasil Dihapus!");
          document.location.href="index.php";
      </script>
      <?php
  }
?>