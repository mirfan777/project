<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../login/login.php");
  exit;
}
?>

<?php 
require "fungsi/fungsi.php";

// mengecek apakah submit sudah dipencet atau belum
$conn = mysqli_connect("localhost","root","","project");

// ambil data di URL
$id_mobil = $_GET["id_mobil"];

// query data mobil berdasarkan id
$mobil = query("SELECT * FROM mobil WHERE id_mobil = $id_mobil")[0];


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

    <title>Booking</title>
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
      <div class="container ">
      <h1>Booking</h1>
      <div class="row mb-5 "> 
          <div class="col-md-12 col-lg-6">
          <div class="card mb-3">
          <img src="../../database/table_mobil/img/<?php echo $mobil["gambar_mobil"];?>" width="100%" height="100%" id="image">
          <div class="card-body">
          <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3"><h4 class="card-title"><b><?php echo $mobil["merk"]; ?></b></h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p class="card-text">Tipe</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $mobil["tipe"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Transmisi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $mobil["transmisi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Kursi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $mobil["kursi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Lokasi</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text"> <?php echo $mobil["lokasi"]; ?></p></td>
            </tr>
            <tr>
              <td><p class="card-text">Harga</p></td>
              <td><p class="card-text">:</p></td>
              <td><p class="card-text">RP.<?php echo $mobil["harga"]; ?> / hari</p> </td>
            </tr>
          </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-md-12 col-lg-6">
        <form action="proses.php" method="post" autocomplete="off">
        <table border="0" cellpadding="10" cellspacing="5" >
            
            <tr>
              <td><h1>Detail Pengemudi</h1></td>
            </tr>
            <tr>
              <td><label for="nama">Nama Pengemudi :</label></td>
            </tr>
            <tr>
              <td><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
              <td><label for="umur">Umur :</label></td>
            </tr>
            <tr>
              <td><input type="number" name="umur" id="umur" placeholder="Umur" required></td>
            </tr>
            <tr>
              <td><label for="email">Email :</label></td>
            </tr>
            <tr>
              <td><input type="email" name="email" id="email" placeholder="Email" required></td>
            </tr>
            <tr>
              <td><label for="hp">Nomor Kontak :</label></td>
            </tr>
            <tr>
              <td><input type="text" name="hp" id="hp" placeholder="Nomor Kontak" required></td>
            </tr>
            <tr>
              <td><h1>Detail sewa</h1></td>
            </tr>
            <tr>
              <td><label for="lama">Lama Sewa :</label></td>
            </tr>
            <tr>
              <td><input type="number" name="lama" id="lama" placeholder="hari" min="1" max="10" required></td>
            </tr>
            <tr>
              <td><label for="tgl_ambil">Tanggal Pengambilan :</label></td>
            </tr>
            <tr>
              <td><input type="date" name="tgl_ambil" id="tgl_ambil" required></td>
            </tr>
            <tr>
                <td align="center"><button class="btn btn-outline-primary" type="submit" name="lanjut">lanjutkan</button></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_mobil" id="id_mobil"   
                value="<?php echo $mobil["id_mobil"]; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="gambar_mobil" id="gambar_mobil"  
                value="<?php echo $mobil["gambar_mobil"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="merk" id="merk" 
                value="<?php echo $mobil["merk"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="tipe" id="tipe" 
                value="<?php echo $mobil["tipe"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="transmisi" id="transmisi" 
                value="<?php echo $mobil["transmisi"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="kursi" id="kursi" 
                value="<?php echo $mobil["kursi"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="lokasi" id="lokasi" 
                value="<?php echo $mobil["lokasi"];?>">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="harga" id="harga" 
                value=" <?php echo $mobil["harga"];?>">
                </td>
            </tr>
        </table>
</form>
</div>
    </div>
    </div>
    </section>
      <!-- akhir main -->

      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>