<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: login.php");
  exit;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



    <link rel="stylesheet" href="../../css/style.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Main menu</title>
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
              <a class="nav-link" href="../login/login.php">Logout</a>
            </form>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->

      <!-- Jumbotron -->
      <section class="jumbotron text-center text-light shadow-lg" style="height:750px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../css/hero.jpg');
      background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"> 
            <br><br><br><br><br><br><br>
            <h1 class="display-4 fw-bold">Selamat datang di ReadyToRide</h1>
            <p class="lead fw-bold">Website rental mobil yang aman dan terpercaya oleh ribuan pengguna</p>
      </section>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,128L30,112C60,96,120,64,180,74.7C240,85,300,139,360,170.7C420,203,480,213,540,224C600,235,660,245,720,234.7C780,224,840,192,900,165.3C960,139,1020,117,1080,144C1140,171,1200,245,1260,234.7C1320,224,1380,128,1410,80L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
      <!-- Jumbotron -->

      <!-- about -->
      <section id="about" class="text-center" style="background-color: #f3f4f5;">
        <h2><b>About us</b></h2>
        <p>ReadyToRide merupakan website rental mobil berasal dari Indonesia yang aman dan terpecaya oleh banyak pengguna <br>
            lebih dari 100 lokasi dan ratusan macam mobil yang aman,bersih dan nyaman untuk dikendarai</p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,192C384,192,480,160,576,138.7C672,117,768,107,864,101.3C960,96,1056,96,1152,112C1248,128,1344,160,1392,176L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      </section>

      <!-- akhir about -->

      <!-- info -->
      <section id="info" class="text-center">
        <div class="container">
        <h2><b>Info</b></h2>
        <br>
        <h2 id="diskon"><i class="bi bi-percent"></i> Diskon</h2>
        <p id="diskon">Diskon 5% untuk penyewaan mobil lebih dari 3 hari</p>

        <h2 id="bebas">Bebas biaya tambahan <i class="bi bi-cash-coin"></i> </h2>
        <p id="bebas">Bebas biaya tambahan pajak maupun pengiriman</p>

        <h2 id="flexibel"><i class="bi bi-pencil-square"></i> Flexibel</h2>
        <p id="flexibel">Batalkan atau ubah pemesanan secara gratis hingga 48 jam <br>
           sebelum pengambilan</p>

        <h2 id="bersih">Bersih <i class="bi bi-stars"></i></h2>
        <p id="bersih">Mobil akan selalu dijaga dan dibersihkan sebelum pengambilan <br>
           agar pengemudi lebih nyaman</p>

        </div>
      </section>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,64L40,90.7C80,117,160,171,240,192C320,213,400,203,480,176C560,149,640,107,720,128C800,149,880,235,960,250.7C1040,267,1120,213,1200,170.7C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
      <!-- akhir info -->

      <!-- contact -->
      <section id="contact" style="background-color: #f3f4f5;" class="justify-content-center">
          <div class="container col-md-6 justify-content-center">
              <div class="row justify-content-center">
                <h2 align="center"><b>Contact</b></h2>
                <form>
                    <div class="mb-3 ">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">          
                      </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea  class="form-control" id="pesan" aria-describedby="pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
          </div>
        </section>
      <!-- akhir contact -->

      <!-- footer -->
      <footer class="text-center bg-light">
        <p>Created by Maulana Irfan & Ade Surya</p>
        <p>Photo by <a href="https://unsplash.com/@katiemoum?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Katie Moum</a> on <a href="https://unsplash.com/s/photos/road?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></p>
        <a href="#" id="fb" class="icon"><h2><b><i class="bi bi-facebook"></i></b></h2></a>
        <a href="#" id="ig" class="icon"><h2><b><i class="bi bi-instagram"></i></b></h2></a>
        <a href="#" id="tw" class="icon"><h2><b><i class="bi bi-twitter"></i></b></h2></a>
        <a href="#" id="wa" class="icon"><h2><b><i class="bi bi-whatsapp"></i></b></h2></a>
      </footer>
      <!-- akhir footer -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>