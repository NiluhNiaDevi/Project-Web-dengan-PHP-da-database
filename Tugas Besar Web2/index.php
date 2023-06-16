<!-- <?php
session_start();

// cek apakah user sudah login
if( !isset($_SESSION['email']) ){
    header("Location: login.php");
    exit();
}

?> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="stylei.css">
</head>
<body>
    <!-- <h3>Halo . . . .</h3>
    <h1>Selamat Datang Di Website Kami</h1>

    <br><br><br> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CleanTime</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <link rel="stylesheet" href="stylei.css">
    <link rel="shortcut icon" href="assets/yunclean.png">
</head>
<body>
<header>
    <nav>
        <div class="wrapper">
            <h1 class="logo"><a href="">It's Cleaning Time</a></h1>
            <div class="bar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#service">Service</a></li>
                    <li><a href="pemesanan.html">Order</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#staff">Staff</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>  
        </div>
    </nav>
</header>
<main>
    <div class="wrapper">
        <!--menu Home-->
        <article id="home">
            <section>
                <img src="assets/mascot.png" alt="clean">
                <div class="profile">
                <h2>Clean With Passion For Now</h2>
                <p class="teks">Jasa Cleaning Service Terbaik</p>
                <p class="deskripsi">Bersih-bersih hanya semudah satu Klik!</p>
                </div>
            </section>
        </article>

         <!--menu service-->
         <article id="service">
    <section>
        <div class="middle">
            <div class="profile">
                <h2>OUR SERVICE</h2>
                <p class="teks">Pilih layanan sesuai kebutuhan anda</p>
            </div>

            <div class="daftar-fitur">
                <div class="tag-fitur">
                    <div class="fitur">
                        <img src="assets/gc.jpg">
                        <h3>General Cleaning</h3>
                        <p>Layanan pembersihan rumah secara menyeluruh hingga bersih, rapi dan nyaman</p>
                        <P>Harga mulai dari Rp100k</P>
                    </div>

                    <div class="fitur">
                        <img src="assets/hc.jpg">
                        <h3>Hydro Cleaning</h3>
                        <p>layanan pembersihan khusus pada matras/kasur, karpet, sofa dan gorden dengan menggunakan vaccum khusus yang dapat menghilangkan tungau dan debu secara maksimal.</p>
                        <p>Harga mulai dari Rp50k</p>
                    </div>

                    <div class="fitur">
                        <img src="assets/ac.jpg">
                        <h3>AC</h3>
                        <p>Layanan pembersihan AC</p>
                        <p>Harga mulai dari Rp75k</p>
                    </div>

                    <div class="fitur">
                        <img src="assets/dc.jpg">
                        <h3>Deep Cleaning</h3>
                        <p>Layanan pembersihan tingkat dalam secara lengkap pada seluruh bagian rumah</p>
                        <p>Harga mulai dari Rp150K</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

        <!--menu about-->
        <article id="about">
            <section>
                <div class="profile">
                    <h2>Layanan Kebersihanan CleanTime</h2>
                    <h3>CleanTime memiliki tenaga pembersih yang terpercaya yang dipilih secara selektif dan telah diberikan pelatihan khusus.
                        CleanTime menyediakan tenaga pembersih profesional yang telah melalui proses seleksi dan pelatihan secara bertahap.
                        Layanan kami merupakan layanan pembersihan yang berkualitas, terjangkau, dapat dipercaya, serta ramah terhadap pelanggan.
                    </h3>
                </div>
                <img src="assets/it.webp">
            </section>
        </article>

        <!--menu staff-->
        <article id="staff">
            <div class="middle card">
                <div class="tag-about profile">
                    <h2>OUR STAFF</h2>
                    <img src="assets/7.png" alt="profile" width="10" height="200">
                    <h3>Tim 1<br><br>
                    Males bersih-bersih? pengen healing liat cogan? nah Staff Tim 1 layanan kebersihan kami dapat membersihkan rumah dan mata anda:)</h3>
                </div>
                <div class="tag-about profile">
                    <img src="assets/Drop'n'Go (10).png" alt="profile" width="10" height="200">
                    <h3>Tim 2<br><br>
                    Tim 2 juga gak kalah jago nih. Udah ganteng jago bersih-bersih lagi. Yuk order siapa tau ketemu jodoh yekan.</h3>
                </div>
            </div>
        </article>
    </div>
</main>

<footer>
    <!--menu contact-->
    <aside id="contact">
        <div class="wrapper">
            <div class="footer-profile">
                    <div class="footer-list">
                        <h3>Contact CleanTime</h3>
                            <img src="assets/instagram.png"><a href="https://www.instagram.com/yunitaanggeraini_/"></a>
                            <p><a href="https://www.instagram.com/yunitaanggeraini_/">@itscleantime_</a></p>
                            <img src="assets/facebook.png">
                            <p><a href="https://web.facebook.com/wulan.muach.56">@clean_time</a></p>
                            <img src="assets/wa.png">
                            <p><a href="https://api.whatsapp.com/send?phone=082136619175&text=CleanTime">clean_time</a></p>
                    </div>

                    <div class="footer-list">
                        <h3>Alamat</h3>
                        <p>Jl. Dewi Sartika</p>
                        <p>Indonesia</p>

                    </div>

                    <div class="footer-list">
                        <h3>Layanan Kami</h3>
                        <p>General Cleaning</p>
                        <p>Hydro Cleaning</p>
                        <p>Pembersihan AC</p>
                        <p>Deep Cleaning</p>
                    </div>
            </div>
        </div>
    </aside>
    <div class="wrapper">
        <div class="copyright">
            <p>Bersih-bersih jadi lebih mudah bersama CleanTime &copy; 2022 <b>Yunita Anggeraini</b> F55121070</p>
        </div>
    </div>
    
</footer>
</body>
</html>