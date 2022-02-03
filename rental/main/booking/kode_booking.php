<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../login/login.php");
  exit;
}
?>

<?php 
    // menghubungkan file function dengan file utama
    require 'fungsi/fungsi.php';

    $kode = query("SELECT kode_booking FROM booking ORDER BY kode_booking DESC LIMIT 1");

    // SELECT kode_booking FROM booking ORDER BY kode_booking DESC LIMIT 1

   

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

    <title>Kode Booking</title>
  </head>
  <body id="home">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="../main_menu/main_menu.php">ReadyToRide</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../main_menu/main_menu.php#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../main_menu/main_menu.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../main_menu/main_menu.php#info">Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../main_menu/main_menu.php#contact">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../main_menu/menu_booking.php">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../database/table_mobil/table-mobil.php">Database</a>
              </li>
            </ul>
            <form class="d-flex">
            <a href="detail_booking.php"><button class="btn btn-outline-primary" type="button">Mengatur pesanan</button></a>
            <a class="nav-link" href="../login/logout.php">Logout</a>
            </form>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->

     <!-- main -->
      <section>
          <div class="container w-50">
            <div class="text-center">
            <h1><b>Terima kasih telah memesan di website kami</b></h1>
           <?php foreach ($kode as $p) : ?> 
            <h2><b>Kode booking anda <?php echo $p["kode_booking"];?></b></h2>
              <?php endforeach;?>
            <br><br><br>
            <a href="../main_menu/main_menu.php"><button class="btn btn-primary">Kembali ke Menu</button></a>
          </section>
            </div>
          </div>
      </section>
      <!-- akhir main -->

    
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>