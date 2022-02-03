<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../login/login.php");
  exit;
}
?>

<?php 
  // menghubungkan file function dengan file utama
  require 'fungsi.php';

  // pagination
  // konfigurasi
  $jumlahdataperhalaman = 8;
  $jumlahdata = count(query("SELECT * FROM mobil"));
  $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
  $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
  $awaldata = ($jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;


  $mobil = query("SELECT * FROM mobil LIMIT $awaldata, $jumlahdataperhalaman");

   // jika tombol pencarian ditekan
   if ( isset($_POST["cari"]) ) {
      
    $mobil = cari($_POST["keyword"]);
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Menu Booking</title>
  </head>
  <body id="home">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="main_menu.php">ReadyToRide</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="main_menu.php#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main_menu.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main_menu.php#info">Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main_menu.php#contact">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu_booking.php">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../database/table_mobil/table-mobil.php">Database</a>
              </li>
            </ul>
            <form class="d-flex">
              <a href="../booking/detail_booking.php"><button class="btn btn-outline-primary" type="button">Mengatur pesanan</button></a>
              <a class="nav-link" href="../login/logout.php">Logout</a>
            </form>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->

      <!-- search -->
      <section id="header-main">
      <div class="container">
      <form action="" method="POST" class="d-flex">
      <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Lokasi" autocomplete="off" size="70%" autofocus>
      <button class="btn btn-outline-primary" type="submit" name="cari">Search</button>
      </form>
      </div> <br>
      <!-- akhir search -->

      <!-- navigasi -->
      <div class="container" align="center">
      <?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
        <?php if ( $i == $halamanaktif ) : ?>
          <a href="?halaman=<?= $i; ?>" style="font-size : 25px ; font-weight : bold ; color : #0275d8  ; text-decoration: none;">
          <?= $i; ?></a>
        <?php else : ?>
          <a href="?halaman=<?= $i; ?>" style="font-size : 25px ; color : black  ; text-decoration: none;"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>
      </div>
      </section>
      <!-- akhir navigasi -->

      <!-- main -->
      <section id="main">
      <div class="container">
          <div class="row"> 
          <?php foreach($mobil as $row): ?>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
          <div class="card mb-3 ">
          <img src="../../database/table_mobil/img/<?php echo $row["gambar_mobil"];?>" width="mb-3" height="172px" id="image">
          <div class="card-body">
          <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3"><h4 class="card-title"><b><?php echo $row["merk"]; ?></b></h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p class="card-text">Tipe</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $row["tipe"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Transmisi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $row["transmisi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Kursi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $row["kursi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Lokasi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $row["lokasi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Harga</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text">RP.<?php echo $row["harga"]; ?> / hari</p> </td>
            </tr>
            <tr align="right"> 
              <td colspan="3"><a href="../booking/booking.php?id_mobil=<?php echo $row["id_mobil"]; ?>" id="booking"><button type="button" class="btn btn-primary">Booking</button></a></td>
            </tr>
          </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
          <?php endforeach; ?>
      </div>
      </section>
      <!-- main -->

    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>