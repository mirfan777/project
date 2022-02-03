<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../../main/login/login.php");
  exit;
}
?>

<?php 
require "fungsi/fungsi.php";

// mengecek apakah submit sudah dipencet atau belum
$conn = mysqli_connect("localhost","root","","project");

if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'table-mobil.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'table-mobil.php';
        </script>
        ";
    }
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

    <title>Tambah Mobil</title>
  </head>
  <body id="home">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="../main/main_menu.php">ReadyToRide</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="table-mobil.php">Mobil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../table_user/table-user.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../table_booking/table-booking.php">Booking</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Cari lokasi" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->
    <br>
    <br>
    <br>
    <!-- Form tambah data -->
    <h1>Tambah data mobil</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0" cellpadding="5" cellspacing="10">
            <tr>
                <td><label for="merk">merk</label></td>
                <td>:</td>
                <td><input type="text" name="merk" id="merk" required></td>
            </tr>
            <tr>
                <td><label for="tipe">tipe</label></td>
                <td>:</td>
                <td><select id="tipe" name="tipe">
                        <option value="SUV">SUV</option>
                        <option value="MPV">MPV</option>
                        <option value="Convertible ">Convertible </option>
                        <option value="Coupe">Coupe</option>
                        <option value="Hatchback ">Hatchback </option>
                        <option value="Station Wagon">Station Wagon</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Off Road ">Off Road </option>
                        <option value="Sport">Sport</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="transmisi">transmisi</label></td>
                <td>:</td>
                <td><input type="radio" id="manual" name="transmisi" value="Manual">
                    <label for="manual">Manual</label><br>
                    <input type="radio" id="automatic" name="transmisi" value="Automatic">
                    <label for="automatic">Automatic</label><br>
                </td>
            </tr>
            <tr>
                <td><label for="kursi">jumlah kursi penumpang</label></td>
                <td>:</td>
                <td><input type="text" name="kursi" id="kursi" required></td>
            </tr>
            <tr>
                <td><label for="lokasi">lokasi</label></td>
                <td>:</td>
                <td><input type="text" name="lokasi" id="lokasi" required></td>
            </tr>
            <tr>
                <td><label for="harga">harga</label></td>
                <td>:</td>
                <td><input type="text" name="harga" id="harga" required></td>
            </tr>
            <tr>
                <td><label for="gambar-mobil">gambar mobil</label></td>
                <td>:</td>
                <td><input type="file" name="gambar_mobil" id="gambar_mobil" required></td>
            </tr>
            <tr>
                <td align="center"><button name="kembali"><a href="table-mobil.php">kembali</a></button></td>
                <td> </td>
                <td align="center"><button type="submit" name="submit">submit</button></td>
            </tr>
        </table>
    </form>
    <!-- akhir form tambah data -->
</body>
</html>