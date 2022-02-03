<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../../main/login/login.php");
  exit;
}
?>

<?php 
    // menghubungkan file function dengan file utama
    require 'fungsi/fungsi.php';

    $booking = query("SELECT * FROM booking");

    // jika tombol pencarian ditekan
    if ( isset($_POST["cari"]) ) {
      
      $booking = cari($_POST["keyword"]);
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

    <title>Table Booking</title>
  </head>
  <body id="home">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="../../main/main_menu/main_menu.php">ReadyToRide</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="../table_mobil/table-mobil.php">Mobil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../table_user/table-user.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../table_booking/table-booking.php">Booking</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->

      <!-- seluruh table -->
      <section>
      <div class="container-fluid">
      <h1>Table Booking</h1> <br>
      </div>

      <!-- pencarian -->
      <div class="container-fluid">
      <form action="" method="POST" class="d-flex">
      <input class="form-control me-2" type="text" name="keyword" placeholder="Masukan keyword pencarian" autocomplete="off" size="25%" autofocus>
      <button class="btn btn-outline-primary" type="submit" name="cari">Search</button> <br> <br>
      </form>
      </div>
      <!-- akhir pencarian -->


      <!-- table -->
      <div class="container-md-12-fluid table-responsive">
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Booking</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Email</th>
                <th scope="col">No HP</th>
                <th scope="col">Id_mobil</th>
                <th scope="col">Gambar</th>
                <th scope="col">Merk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Transmisi</th>
                <th scope="col">Kursi</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Harga</th>
                <th scope="col">Lama Sewa</th>
                <th scope="col">Tanggal Pengambilan</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Total</th>

              </tr>
            </thead>
            <tbody>
            </tr>
            <?php $i = 1; ?> <!--untuk urutan nomor-->
            <?php foreach($booking as $row): ?>
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $row["kode_booking"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["umur"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["hp"]; ?></td>
                <td><?php echo $row["id_mobil"]; ?></td>
                <td><?php echo $row["gambar_mobil"]; ?></td>
                <td><?php echo $row["merk"]; ?></td>
                <td><?php echo $row["tipe"]; ?></td>
                <td><?php echo $row["transmisi"]; ?></td>
                <td><?php echo $row["kursi"]; ?></td>
                <td><?php echo $row["lokasi"]; ?></td>
                <td><?php echo $row["harga"]; ?></td>
                <td><?php echo $row["lama"]; ?></td>
                <td><?php echo $row["tgl_ambil"]; ?></td>
                <td><?php echo $row["tgl_pengembalian"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tr>
            </tbody>
          </table>
      </div>
      <!-- akhir table -->
      </section>
      <!-- akhir seluruh table -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>