<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../login/login.php");
  exit;
}
?>

<?php 
 require 'fungsi/fungsi.php';

 $conn = mysqli_connect("localhost","root","","project");

 $kode = $_GET['kode'];
 $nama = $_GET['nama'];

 $booking = query("SELECT * FROM booking WHERE kode_booking = $kode AND nama = '$nama' ");

 // jika tombol pencarian ditekan
 if ( isset($_POST["cari"]) ) {
   $booking = cari($_POST["kode"],$_POST["nama"]);
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

    <title>Detail Booking</title>
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
      <?php foreach($booking as $row):?>
      <section>
          <div class="container border">
          <div class="row">
            <div class="col-md-12 col-lg-6">
            <img src="../../database/table_mobil/img/<?php echo $row['gambar_mobil'] ?>" style="width: 100%; max-width: 600px; height: auto;" >
            <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3"><h4><b><?php echo $row["merk"]; ?></b></h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p>Tipe</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $row["tipe"]; ?></p></td>
            </tr>
            <tr>
              <td><p>Transmisi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $row["transmisi"]; ?></p></td>
            </tr>
            <tr>
              <td><p>Kursi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $row["kursi"]; ?></p></td>
            </tr>
            <tr>
              <td><p>Lokasi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $row["lokasi"]; ?></p></td>
            </tr>
            <tr>
              <td><p>Harga</p></td>
              <td><p>:</p></td>
              <td><p>RP.<?php echo $row["harga"]; ?> / hari</p> </td>
            </tr>
          </tbody>
          </table>
            </div>
            <div class="col-md-12 col-lg-6">
            <table cellpadding="15" cellspacing="5">
                <tr>
                    <th colspan="3"><h1>Detail Pengemudi</h1></th>
                </tr>
                <tr>
                    <td><p>Nama</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["nama"]; ?></p></td>
                </tr>
                <tr>
                    <td><p>Umur</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["umur"]; ?></p></td>
                </tr>
                <tr>
                    <td><p>Email</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["email"]; ?></p></td>
                </tr>
                <tr>
                    <td><p>Nomor Kontak</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["hp"]; ?></p></td>
                </tr>
                <tr>
                    <th colspan="3"><h1>Detail Sewa</h1></th>
                </tr>
                <tr>
                    <td><p>Lama Sewa</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["lama"]; ?> Hari</p></td>
                </tr>
                <tr>
                    <td><p>Tanggal Pengambilan</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["tgl_ambil"]; ?></p></td>
                </tr>
                <tr>
                    <td><p>Tanggal Pengembalian</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $row["tgl_pengembalian"]; ?></p></td>
                </tr>
                <tr>
                    <td><p>Total Harga</p></td>
                    <td><p>:</p></td>
                    <td><p>RP.<?php echo $row["total"]; ?></p></td>
                </tr>
            </table>
            </div>
          </div>
          </div>
      </section>
      <?php endforeach ; ?>

    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>