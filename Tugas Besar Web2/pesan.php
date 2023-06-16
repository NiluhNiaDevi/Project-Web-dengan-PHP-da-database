<?php
session_start();

// koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "pemesanan";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

// Jika simpan diklik
if (isset($_POST['bsimpan'])) {
    // simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO pesan (no_hp, nama, tim, layanan, alamat) VALUES ('$_POST[tno]', '$_POST[tnama]', '$_POST[ttim]', '$_POST[tlayanan]', '$_POST[talamat]')");
    if ($simpan) // jika simpan berhasil
    {
        $_SESSION['pesan'] ='Berhasil melakukan pemesanan, silahkan menunggu admin akan mengkonfirmasi pesanan anda melalui whatsapp!!';
        header("Location: home.php");
        exit;
    } else {
        $_SESSION['pesan'] ='Gagal melakukan pemesanan';
        header("Location: home.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tubesweb</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-warning">It's </span>Cleanning Time</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#Home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#service">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pesan.php">Pemesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#staff">Karyawan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#kontak">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Keluar</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>

      <article id="pemesanan">
      <section id="pemesanan" class="order section-padding">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h4>Pemesanan</h4>
                    </div>
                </div>
            </div>
        <!-- awal card form -->
        <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Input Pemesanan
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                  <div class="form-group mb-2">
                    <label>Nama</label>
                    <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda" required>
                  </div>
                  <div class="form-group mb-3">
                  <label>No. Hp</label>
                  <input type="tel" name="tno" value="<?=@$tno?>" class="form-control" placeholder="input nomor telepon" pattern="[0-9]{10,11,12}" required>
                  </div>
                  <div>
                    <label>Tim</label>
                    <select name="ttim" class="form-control">
                        <option><?=@$vnama_tim?></option>
                        <option value="Tim 1">Tim 1</option>
                        <option value="Tim 2">Tim 2</option>
                    </select>
                  </div>   
                  <div>

                    <label>Layanan</label>
                    <select name="tlayanan" class="form-control">
                        <option><?=@$vlayanan?></option>
                        <option value="General Cleaning">General Cleaning</option>
                        <option value="Hydro Cleaning">Hydro Cleaning</option>
                        <option value="Pembersihan AC">Pembersihan AC</option>
                        <option value="Deep Cleaning">Deep Cleaning</option>
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea name="talamat" class="form-control" placeholder="input alamat anda" required><?=@$valamat?></textarea>
                </div> 
                </div>
    
                <button type="submit" class="btn btn-primary" name="bsimpan">Pesan</button>
                <button type="reset" class="btn btn-danger" name="breset">Batal</button>
                
    
            </form>
        </div>
        </div>
      </div>
      </section>
    </article>
    <script>
  // Periksa apakah variabel pesan ada dalam session
  if (isset($_SESSION['pesan'])) {
    // Tampilkan pesan SweetAlert sesuai dengan variabel pesan
    echo $_SESSION['pesan'];
    // Hapus variabel pesan dari session
    unset($_SESSION['pesan']);
  }
</script>
</body>
    <script>
    Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script>
</html>