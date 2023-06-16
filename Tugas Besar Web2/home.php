<?php
session_start();

//koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "fotografi";

$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

//Jika simpan diklik
if(isset($_POST['bsimpan']))
{
        //simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO pemesanan (no_hp, nama, tim, layanan, alamat) VALUES ('$_POST[tno]', '$_POST[tnama]', '$_POST[ttim]', '$_POST[tlayanan]', '$_POST[talamat]')");
        if($simpan) //jika simpan berhasil
        {
            echo "<script>
                alert('Berhasil melakukan pemesanan, silahkan menunggu admin akan mengkonfirmasi pesanan anda melalui whatsapp!!');
                document.location='home.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Gagal melakukan pemesanan');
            document.location='home.php';
            </script>";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUBES WEB</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-warning">Lens</span>Art</a>
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
                <a class="nav-link" href="#galery">Galery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#order">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#staff">STAFF</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="newlog.php">Log Out</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>

      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <article id="Home">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Welcome to LensArt</h5>
              <h5>Menangkap Keindahan dalam Setiap Klik</h5>
              <p><a href="#about" class="btn btn-warning mt-3">Get Started</a></p>            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/3.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src=assets/4.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </article>

      <article id="about">
        <section>
            <div class="profile mb-4 pt-5">
                <!-- <div class="col-md-12"> -->
                    <div class="section-header text-center pb-5">
                        <h4>About Us LensArt</h4>
                        <p>Selamat datang di LensArt! Kami adalah tim fotografer profesional yang berdedikasi untuk menangkap keindahan dalam setiap momen dengan setiap klik kamera kami. Kami percaya bahwa setiap orang memiliki cerita unik yang layak diabadikan dalam gambar, dan kami berkomitmen untuk mengabadikan momen berharga Anda dalam hasil fotografi yang memukau.</p>
                        <p>Kami berkomitmen untuk memberikan pengalaman fotografi yang menyenangkan dan santai bagi semua klien kami. Dalam setiap sesi foto, kami akan menciptakan suasana yang nyaman dan mengarahkan Anda dengan lembut untuk mendapatkan hasil terbaik. Kami menggunakan peralatan fotografi terkini dan teknik yang inovatif untuk menghasilkan gambar yang berkualitas tinggi dengan detail yang tajam dan warna yang hidup.</p>
                        </p>
                    </div>
                </div>
            <!-- <imG src="assets/music3.png"> -->
        </section>
    </article>

      <style>
        body {
          overflow-x: hidden;
        }
      </style>
      <!-- Order -->
      <article id="#galery">
      <section id="galery" class="order section-padding">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h4>GALERY PHOTO</h4>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-light pb-2 flip-card">
                  <div class="flip-card-inner">
                    <div class="card flip-card-front">
                      <div class="card-body text-dark">
                        <div class="img-area mb-4">
                          <img src="assets/birthday.jpg" alt="" class="img-fluid mt-5" width="30" height="30">
                        </div>
                      </div>
                    </div>
                    <div class="card flip-card-back bg-secondary">
                      <div class="card-body">
                        <p class="lead mt-3">Jadikan ulang tahun Anda berkilau dengan layanan fotografi yang mengesankan dari kami, Paket birthday dimulai 300k aja sampai acara selesai.</p>
                        <!-- <button class="btn bg-warning text-dark">Learn More</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="card-title-gc">Paket Birthday Party</h3>
              </div>         
              
                <div class="col-12 col-md-6 col-lg-3">
                  <div class="card text-light pb-2 flip-card">
                    <div class="flip-card-inner">
                      <div class="card flip-card-front">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                            <img src="assets/nikah.jpg" alt="" class="img-fluid mt-5">
                          </div>
                          
                        </div>
                      </div>
                      <div class="card flip-card-back bg-secondary">
                        <div class="card-body">
                          <p class="lead mt-3">Tidak ada detil kecil yang terlewatkan, setiap momen penting dan emosi akan tertangkap dengan sempurna dalam foto pernikahan, dimulai harga 1 juta aja sampai pernikahan selesai</p>
                          <!-- <button class="btn bg-warning text-dark">Learn More</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <h3 class="card-title-hc">Paket Wedding Day</h3>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                  <div class="card text-light pb-2 flip-card">
                    <div class="flip-card-inner">
                      <div class="card flip-card-front">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                            <img src="assets/family.jpg" alt="" class="img-fluid mt-5">
                          </div>
                        </div>
                      </div>
                      <div class="card flip-card-back bg-secondary">
                        <div class="card-body">
                          <p class="lead">paket lengkap untuk photoshot bersama dengan keluarga kamu, kami yang akan mendatangi rumah kalian, dimulai dengan tarif 150k aja</p>
                          <!-- <button class="btn bg-warning text-dark">Learn More</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <h3 class="card-title-ac">Paket Family</h3>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                  <div class="card text-light pb-2 flip-card">
                    <div class="flip-card-inner">
                      <div class="card flip-card-front">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                            <img src="assets/wisuda.jpg" alt="" class="img-fluid mt-5">
                          </div>
                        </div>
                      </div>
                      <div class="card flip-card-back bg-secondary">
                        <div class="card-body">
                          <p class="lead">Paket lengkap untuk acara wisudaa kamu, mulai dari tarif 250k aja per-jamnya</p>
                          <!-- <button class="btn bg-warning text-dark">Learn More</button> -->
                        </div>
                        </div>
                        <h3 class="card-title-dc">Paket Wisuda</h3>
                      </div>  
                      </div>
                    </div>
                  </div>
                </div>            
              </div>
            </section>
          </article>

      <article id="order">
      <section id="order" class="order section-padding">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h4>PEMESANAN JASA</h4>
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
                    <label>Nama Lengkap</label>
                    <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda" required>
                  </div>
                  <div class="form-group mb-3">
                  <label>No. Hp</label>
                  <input type="tel" name="tno" value="<?=@$tno?>" class="form-control" placeholder="input nomor telepon" pattern="[0-9]{10,11,12}" required>
                  </div>
                  <div>
                    <label>Pilih Tim </label>
                    <select name="ttim" class="form-control">
                        <option><?=@$vnama_tim?></option>
                        <option value="Tim 1">Tim 1</option>
                        <option value="Tim 2">Tim 2</option>
                    </select>
                  </div>   
                  <div>

                    <label>Jenis Layanan</label>
                    <select name="tlayanan" class="form-control">
                        <option><?=@$vlayanan?></option>
                        <option value="Wedding Day">Paket Wedding Day</option>
                        <option value="Birthday Party">Paket Birthday Party</option>
                        <option value="Wisuda">Wisuda</option>
                        <option value="Foto Keluarga">Foto Keluarga</option>
                        <option value="Dan lainnya">dan Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <label>Alamat Pemesan</label>
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

      <!-- Staff  -->
      <article id="staff">
      <section id="staff" class="staff section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h4>STAFF</h4>
                    </div>
                </div>
            </div>
            <!-- tim 1 -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jrm.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Rap Monster</h3>
                            <p class="card-text">TIM 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jk.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Jeon Jungkook</h3>
                            <p class="card-text">TIM 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jsuga.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">SUGA</h3>
                            <p class="card-text">TIM 1</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jimin.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Jimin</h3>
                            <p class="card-text">TIM 1</p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- tim 2 -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jhope.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">J-Hope</h3>
                            <p class="card-text">TIM 2</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/jtae.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Kim Taehyung</h3>
                            <p class="card-text">TIM 2</p>

                            <!-- <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkdeln text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/nia.jpeg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Nia Devi</h3>
                            <p class="card-text">TIM 2</p>
                            <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quod a placeat ex, asperiores molestias, earum non eius nostrum, ad distinctio? Dolores repudiandae obcaecati, quibusdam aperiam consequuntur cumque voluptatem architecto.</p> -->

                            <!-- <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkdeln text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/dohyun.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Kim Do Hyun</h3>
                            <p class="card-text">TIM 2</p>
                        </div>
                    </div>
                </div>
            </div>
      </section>
      </article>

      </section>
      <footer>
      <aside id="kontak">
        <div class="wrapper">
            <div class="footer-profile">
            <div class="footer-list">
    <h3>Contact CleanTime</h3>
    <img src="assets/instagram.png" style="max-width: 50px;"><a href="https://instagram.com/nia_devi20?igshid=MzNlNGNkZWQ4Mg=="></a>
    <p><a href="https://instagram.com/nia_devi20?igshid=MzNlNGNkZWQ4Mg==">@LensArt_</a></p>
    <img src="assets/facebook.png" style="max-width: 50px;">
    <p><a href="https://www.facebook.com/nia.devi.52?mibextid=ZbWKwL">@LensArt20</a></p>
    <img src="assets/wa.png" style="max-width: 50px;">
    <p><a href="https://api.whatsapp.com/send?phone=082136619175&text=CleanTime">LensArt</a></p>
</div>
                <div class="footer-list">
                    <h3>Alamat</h3>
                    <p>Jl.Padat Karya</p>
                    <p>Kota Palu, Sulawesi Tengah</p>
                </div>
                <div class="footer-list">
                    <h3>Layanan Kami</h3>
                    <p>wedding day</p>
                    <p>Birthday Party</p>
                    <p>Wisuda</p>
                    <p>Foto Keluarga</p>
                    <p>dan lainnya</p>
                </div>
            </div>
        </div>
    </aside>
      </footer>
      <style>
    #contact {
  background: #EFEFEF ;
  padding: 40px 0px 40px 0px;
}

.footer-profile {
  width: 100%;
  position: relative;
  display: flex;
  flex-wrap: wrap;
  margin: 0 auto;
}

.footer-list {
  width: 30%;
  margin: 0 auto;
}

.footer-list h3 {
  font-family: 'Fira Sans', sans-serif;
  font-size: 30px;
  color: #000000;
  margin-bottom: 20px;
  width: 100%;
  line-height: 50px;
}

.footer-list p {
  font-family: 'Fira Sans', sans-serif;
  font-size: 20px;
  color: #334257;
}

.footer-list img {
  width: 20%;
  border-radius: 70px;
}
</style>

      <!-- footer -->
      <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">All Right Reseverved ~Niluh Nia Devi_F55121058~ IG= nia_devi20~</p>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>