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
        if(isset($_GET['hal']) && $_GET['hal'] == "edit")
        {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE tim SET 
                                    nama_tim = '$_POST[ttim]',
                                    nama_karyawan = '$_POST[tkaryawan]'
                                    WHERE id = '$_GET[id]'
                                ");
            if($edit) //jika edit berhasil
            {
                echo "<script>
                    alert('Berhasil mengedit data');
                    document.location='tim_layanan.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Gagal mengedit data');
                document.location='tim_layanan.php';
                </script>";
            }
        }
        else
        {
            //simpan data baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tim_layanan (nama_tim, nama_karyawan) VALUES ('$_POST[ttim]', '$_POST[tkaryawan]')");
            if($simpan) //jika simpan berhasil
            {
                echo "<script>
                    alert('Berhasil menyimpan data');
                    document.location='tim_layanan.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Gagal menyimpan data');
                document.location='tim_layanan.php';
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
            $tampil = mysqli_query($koneksi, "SELECT * FROM tim_layanan WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung dalam variabel
                $vnama_tim = $data['nama_tim'];
                $vkaryawan = $data['nama_karyawan'];
            }
        }
        elseif ($_GET['hal'] == "hapus")
        {
            //hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tim_layanan where id = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                alert('Berhasil menghapus data');
                document.location='tim_layanan.php';
                </script>";
            } 
        }
    }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tubesweb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
            <h3>DAFTAR TIM</h3><hr>
<div class="container">
    <!-- awal card form -->
    <div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Input Tim
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>Tim</label>
                <select name="ttim" class="form-control">
                    <option><?=@$vnama_tim?></option>
                    <option value="Tim 1">Tim 1</option>
                    <option value="Tim 2">Tim 2</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Nama karyawan</label>
                <input type="text" name="tkaryawan" value="<?=@$vkaryawan?>" class="form-control" placeholder="input nama karyawan" required>
            </div>

            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

        </form>
    </div>
    </div>
    <!-- penutup card form -->

    <!-- awal card tabel -->
    <!-- awal card tabel -->
    <div class="card mt-3">
    <div class="card-header bg-success text-white">
  Daftar Tim
</div>
<form method="GET" action="tim_layanan.php">
    <div class="form-group search-button">
      <input type="text" class="form-control" name="search" placeholder="Cari Nama Tim atau Nama Karyawan">
      <button type="submit" class="btn btn-dark btn-sm">Cari</button>
    </div>
  </form>
  <div class="card-body">
    <br>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Tim</th>
          <th>Nama karyawan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $limit = 5; // number of records to display per page
          $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page number
          $start = ($page - 1) * $limit; // starting record index for the current page
          $id = $start + 1;

          // check if a search query is present
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM tim_layanan WHERE nama_tim LIKE '%$search%' OR nama_karyawan LIKE '%$search%' ORDER BY id DESC LIMIT $start, $limit";
          } else {
            $query = "SELECT * FROM tim_layanan ORDER BY id DESC LIMIT $start, $limit";
          }

          $result = mysqli_query($koneksi, $query);
          while($data = mysqli_fetch_array($result)) :
        ?>
        <tr>
          <td><?=$id++;?></td>
          <td><?=$data['nama_tim']?></td>
          <td><?=$data['nama_karyawan']?></td>
          <td>
            <a href="tim_layanan.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
            <a href="tim_layanan.php?hal=hapus&id=<?=$data['id']?>" class="btn btn-danger"> Hapus </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php
      // calculate the number of pages
      $total_records = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tim_layanan"));
      $total_pages = ceil($total_records / $limit);
    ?>
    <!-- pagination links -->
    <nav>
      <ul class="pagination">
        <?php if ($page > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php endif; ?>
        <?php for ($i=1; $i<=$total_pages; $i++) : ?>
        <li class="page-item<?=($page==$i) ? ' active' : ''?>">
          <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</div>
<!-- penutup card tabel -->

    <!-- penutup card tabel -->

</div>
          </div>
      </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>