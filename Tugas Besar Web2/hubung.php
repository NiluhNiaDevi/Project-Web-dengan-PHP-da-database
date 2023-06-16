<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "layanan";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Gagal terkoneksi dengan database");
}else{
    echo "koneksi berhasil";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      .max-auto { width: 800px }
      .card { margin-top: 10px;}
    </style>
  </head>
  <body>
      <div class="max-auto" ml->
        <!-- Untuk memasukkan data -->
        <div class="card">
        <div class="card-header">
        Create/edit data
        </div>
        <div class="card-body">
          <form action="" method="POST">
          <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label">Id</label>
          <div class="col-sm-10">
          <input type="text" class="form-control-plaintext" id="id" placeholder="<?php echo $id ?>">
          </div>
          </div>
          <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Layanan</label>
          <div class="col-sm-10">
          <input type="text" class="form-control-plaintext" id="nama" placeholder="<?php echo $nama ?>">
          </div>
          </div>
          </form>
        </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
        <div class="card-header text-white bg-secondary">
        Data Layanan
        </div>
        <div class="card-body">
          
        </div>
        </div>

      </div>        
  </body>
</html>