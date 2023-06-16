<?php
session_start();

// Koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_user";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses pengiriman formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan kata sandi
    if ($username == 'admin1' && $password == '12345') {
        $_SESSION['login_admin'] = $username;
        header("location: dashboard.php");
        exit();
    } else {
        echo '<script>Swal.fire("Kesalahan", "Username atau kata sandi salah", "error");</script>';
    }
}

mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
<head>
  <title>UAS PRAKTIKUM WEB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="logadmin.css">
</head>
<body>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In Admin !!! </span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In"</h4>
                      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                          <input type="username" class="form-style" placeholder="username" name="username">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4">Login</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    // Fungsi untuk menampilkan SweetAlert saat terjadi kesalahan
    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: message
        });
    }

    // Fungsi untuk menampilkan SweetAlert setelah halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo 'showError("Username atau kata sandi salah");';
        }
        ?>
    });
  </script>
</body>
</html>
