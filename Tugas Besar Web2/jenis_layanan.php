<?php
    session_start(); // Memulai session

    //koneksi database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "fotografi";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //Jika simpan diklik
    if(isset($_POST['bsimpan']))
    {

        //pengujian data diedit atau simpan baru
        if($_GET['hal'] == "edit")
        {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE layanan SET 
                                    layanan = '$_POST[tlayanan]',
                                    keterangan = '$_POST[tketerangan]',
                                    harga = '$_POST[tharga]'
                                    WHERE id = '$_GET[id]'
                                ");
            if($edit) //jika edit berhasil
            {
                echo "<script>
                    alert('Berhasil mengedit data');
                    document.location='jenis_layanan.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Gagal mengedit data');
                document.location='jenis_layanan.php';
                </script>";
            }
        } else
        {
            //data disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO layanan (layanan, keterangan, harga) 
                                              VALUES ('$_POST[tlayanan]',  
                                                    '$_POST[tketerangan]',  
                                                    '$_POST[tharga]')
                                            ");
            if($simpan) //jika simpan berhasil
            {
                echo "<script>
                    alert('Berhasil menyimpan data');
                    document.location='jenis_layanan.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Gagal menyimpan data');
                document.location='jenis_layanan.php';
                </script>";
            }
        }
    }
    //pengujian jika edit/hapus diklik
    if(isset($_GET['hal']))
    {
        //pengujian edit data
        if($_GET['hal'] == "edit")
        {
            //tampilkan data yang akan diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM layanan WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung dalam variabel
                $vlayanan = $data['layanan'];
                $vketerangan = $data['keterangan'];
                $vharga = $data['harga'];
            }
        }
        elseif ($_GET['hal'] == "hapus")
        {
            //hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM layanan where id = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                alert('Berhasil menghapus data');
                document.location='jenis_layanan.php';
                </script>";
            } 
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tubes Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-warning">Selamat Datang </span>Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
    <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="jenis_layanan.php">Daftar layanan</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="tim_layanan.php">Daftar tim layanan</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="loginn.php">Keluar</a><hr class="bg-secondary">
                  </li>
              </ul>
          </div>
      <div class="col-md-10 p-5 pt-4">
            <h3>DAFTAR LAYANAN</h3><hr>
<div class="container">
    <!-- awal card form -->
    <div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Input Layanan
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group mb-2">
                <label>Jenis layanan</label>
                <input type="text" name="tlayanan" value="<?=@$vlayanan?>" class="form-control" placeholder="input jenis layanan" required>
            </div>
            <div class="form-group mb-2">
                <label>Keterangan layanan</label>
                <!-- <input type="textarea" name="tketerangan" class="form-control" placeholder="input keterangan layanan" required> -->
                <textarea name="tketerangan" class="form-control" placeholder="input keterangan layanan" required><?=@$vketerangan?></textarea>
            </div>
            <div class="form-group mb-3">
                <label>Harga jasa layanan</label>
                <input type="text" name="tharga" value="<?=@$vharga?>" class="form-control" placeholder="input harga jasa layanan" required>
            </div>
            <!-- <div class="form-group">
                <label>Tim</label>
                <select name="ttim" class="form-control">
                    <option>#<?=$vketerangan?></option>
                    <option value="Tim 1">Tim 1</option>
                    <option value="Tim 2">Tim 2</option>
                </select>
            </div> -->

            <!-- <div class="row">
              <div class="col">
                <table>
                  <tr>
                    <td> <label for=""><b>Upload Image : </b></label> </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="">
                          <input type="hidden" name="size" value="100000">
                          <input type="file" name="image" value="">
                        </div>
                    </td>
                  </tr>
                </table>
              </div> -->

            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

        </form>
    </div>
    </div>
    <!-- penutup card form -->

    <!-- awal card tabel -->
    <div class="card mt-3">
    <div class="card-header bg-success text-white">
        Daftar Layanan
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>Jenis layanan</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
                $id = 1;
                $tampil = mysqli_query($koneksi, "SELECT * from layanan ORDER BY id DESC");
                while($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr>
                <td><?=$id++;?></td>
                <td><?=$data['layanan']?></td>
                <td><?=$data['keterangan']?></td>
                <td><?=$data['harga']?></td>
                <td>
                    <a href="jenis_layanan.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
                    <a href="jenis_layanan.php?hal=hapus&id=<?=$data['id']?>" 
                    onclick="return confirm('Yakin ingin menghapus data?') " class="btn btn-danger"> Hapus </a>
                </td>
            </tr>
            <?php endwhile; //penutup perulangan while ?>
        </table>
    </div>
    </div>
    <!-- penutup card tabel -->

</div>
          </div>
      </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>