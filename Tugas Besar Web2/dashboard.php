<?php
    //koneksi database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "fotografi";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    // Mulai session
    session_start();

    //Jika simpan diklik
    if(isset($_POST['bsimpan']))
    {
        //pengujian data diedit atau simpan baru
        if($_GET['hal'] == "edit")
        {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE pesan SET 
                                    no_hp = '$_POST[tno]',
                                    nama = '$_POST[tnama]',
                                    tim = '$_POST[ttim]',
                                    layanan = '$_POST[tlayanan]',
                                    alamat = '$_POST[talamat]'
                                    WHERE id = '$_GET[id]'
                                ");
            if($edit) //jika edit berhasil
            {
                $_SESSION['pemesanan'] = "Berhasil mengedit data";
                header('location: transaksi.php');
                exit();
            }
            else
            {
                $_SESSION['pemesanan'] = "Gagal mengedit data";
                header('location: transaksi.php');
                exit();
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
            $tampil = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung dalam variabel
                $vnama = $data['nama'];
                $vno_hp = $data['no_hp'];
                $vtim = $data['tim'];
                $vlayanan = $data['layanan'];
                $valamat = $data['alamat'];
            }
        }
        elseif ($_GET['hal'] == "hapus")
        {
            //hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM pemesanan where id = '$_GET[id]' ");
            if($hapus){
                $_SESSION['pemesanan'] = "Berhasil menghapus data";
                header('location: transaksi.php');
                exit();
            } 
        }
    }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUBES WEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
                    <a class="nav-link text-white" href="cetak.php">Print Data</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="loginn.php">Keluar</a><hr class="bg-secondary">
                  </li>

              </ul>
          </div>
          <div class="col-md-10 p-5 pt-4">
            <h2>DAFTAR TRANSAKSI</h2><hr>
<div class="container">
          <!-- awal card tabel -->
          <div class="card mt-3">
    <div class="card-header bg-success text-white">
        Daftar Transaksi
    </div>
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>No. hp</th>
            <th>Tim</th>
            <th>Layanan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <tr>
        <tbody>
        <?php
          $limit = 5; // number of records to display per page
          $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page number
          $start = ($page - 1) * $limit; // starting record index for the current page
          $id = $start + 1;
          $query = "SELECT * FROM pemesanan ORDER BY id DESC LIMIT $start, $limit"; // update query to fetch only the records for the current page
          $result = mysqli_query($koneksi, $query);
          while($data = mysqli_fetch_array($result)) :
        ?>
        <tr>
          <td><?=$id++;?></td>
          <td><?=$data['nama']?></td> 
          <td><?=$data['no_hp']?></td>
          <td><?=$data['tim']?></td>
          <td><?=$data['layanan']?></td>
          <td><?=$data['alamat']?></td>
          <!-- <td><img src="../gambar/<?= $data['gambar'] ?>" width="100"></td> -->
          <td>
            <a href="transaksi.php?hal=hapus&id=<?=$data['id']?>" class="btn btn-danger"> Hapus </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php
      // calculate the number of pages
      $total_records = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pemesanan"));
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
    </table>
</div>
    </div> 
    </div>
</div>
    <!-- penutup card tabel -->
</div>
      </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>