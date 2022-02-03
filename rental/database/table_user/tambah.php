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
            document.location.href = 'table-user.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'table-user.php';
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

    <title>Tambah User</title>
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
                <a class="nav-link" href="../table_mobil/table-mobil.php">Mobil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="table-user.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../table_booking/table-booking.php">Booking</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- akhir navbar -->
    <br>
    <br>
    <br>
    <!-- Form tambah data -->
    <h1>Tambah data user</h1>
    <form action="" method="post">
        <table border="0" cellpadding="5" cellspacing="10">
            <tr>
                <td><label for="username">username</label></td>
                <td>:</td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="pass">password</label></td>
                <td>:</td>
                <td><input type="password" name="pass" id="pass" required></td>
            </tr>
            <tr>
                <td align="center"><button name="kembali"><a href="table-user.php">kembali</a></button></td>
                <td> </td>
                <td align="center"><button type="submit" name="submit">submit</button></td>
            </tr>
        </table>
    </form>
    <!-- akhir form tambah data -->
</body>
</html>