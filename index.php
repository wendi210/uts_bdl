<?php
      include "koneksi.php";
   ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendaftaran Online - HOME </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>


 <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
          <div class="container">
            <div class="navbar-header">
              <a href="" class="navbar-brand">PENDAFTARAN ONLINE</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar</h3>
              </div>
              <div class="box-body">
              <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="nama" name="nama" required>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>
                      <div class="col-sm-3">
                      <select class="form-control" name="jurusan">
                        <option>IPA</option>
                        <option>IPS</option>
                        <option>Bahasa</option>
                      </select>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="alamat" name="nilai" required>
                      </div>          
                    </div> 
                    </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" name="save">SIMPAN</button>
                  </div>
              </form>
              <?php 
              //jika tombol save ditekan
                if (isset($_POST['save'])) {
                  //ambil data dari form
                  $nama = $_POST['nama'];
                  $jurusan  = $_POST['jurusan'];
                  $nilai= $_POST['nilai'];

                  //masukkan data ke database
                  $query=mysqli_query($koneksi,"INSERT INTO uas (nama, jurusan, nilai) VALUES ('$nama', '$jurusan', '$nilai')");
                  //jika benar maka muncul popup data tersimpan
                                    if($query)
                                    {
                                      ?>
                                      <script type="text/javascript">
                                        alert("Data Tersimpan!");
                                        document.location.href="index.php";
                                      </script>
                                      <?php

                                        }
                  //jika salah maka muncul popup data tidak tersimpan
                                else {
                                    ?>
                                    <script type="text/javascript">
                                        alert("Data Tidak Tersimpan!");
                                        document.location.href="index.php";
                                      </script>
                                      <?php

                                    }

                }

               ?>
            </div><!-- /.box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Siswa</h3>
              </div>
              <div class="box-body">
               <table class="table table-hover">
                    <tbody>
                      <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Alamat</th>
                      <th>Opsi</th>
                    </tr>

                    <?php 

                      include 'koneksi.php';
                      $no = 1;
                      //tampilkan data uas dari database
                      $data = mysqli_query($koneksi,"select * from uas");
                      //perulangan
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $d['nama']; ?></td>
                          <td><?php echo $d['jurusan']; ?></td>
                          <td><?php echo $d['nilai']; ?></td>
                          <td>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-warning"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                        </tr>
                        <?php 
                      }
                      ?>
                    </tbody>
                  </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.1.0
          </div>
          <strong>Copyright &copy; 2020</strong>
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

  </body>
</html>