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

// ambil data di URL
$id_mobil = $_GET["id_mobil"];

// query data mobil berdasarkan id
$mobil = query("SELECT * FROM mobil WHERE id_mobil = $id_mobil")[0];




if (isset($_POST["submit"])){
    
    if (ubah($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'table-mobil.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('data gagal diubah');
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

    <title>Edit Mobil</title>
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
                <a class="nav-link" href="table-mobil.php">Mobil</a>
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
    <br>
    <br>
    <br>
    <!-- Form tambah data -->
    <h1>Ubah data mobil</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0" cellpadding="5" cellspacing="10">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_mobil" id="id_mobil" value="<?php echo $mobil["id_mobil"]; ?>"></td>
                <td><input type="hidden" name="gambarlama" id="gambarlama" value="<?php echo $mobil["gambar_mobil"]; ?>"></td>
            </tr>
            <tr align="center">
              <td colspan="3"><img src="img/<?php echo $mobil["gambar_mobil"];?>" alt="gambar-mobil" width="200" height="200"></td>
            </tr>
            <tr>
                <td><label for="merk">merk</label></td>
                <td>:</td>
                <td><input type="text" name="merk" id="merk" required
                value=" <?php echo $mobil["merk"];?>">
                </td>
            </tr>
            
            <tr>
                <td><label for="tipe">tipe</label></td>
                <td>:</td>
                <td><select id="tipe" name="tipe">
                        <option value="SUV" <?php if ($mobil['tipe'] == 'SUV') {echo 'selected';}?>>SUV</option>
                        <option value="MPV" <?php if ($mobil['tipe'] == 'MPV') {echo 'selected';}?>>MPV</option>
                        <option value="Convertible" <?php if ($mobil['tipe'] == 'Convertible') {echo 'selected';}?>>Convertible </option>
                        <option value="Coupe" <?php if ($mobil['tipe'] == 'Coupe') {echo 'selected';}?>>Coupe</option>
                        <option value="Hatchback" <?php if ($mobil['tipe'] == 'Hatchback') {echo 'selected';}?>>Hatchback </option>
                        <option value="Station Wagon" <?php if ($mobil['tipe'] == 'Station Wagon') {echo 'selected';}?>>Station Wagon</option>
                        <option value="Sedan" <?php if ($mobil['tipe'] == 'Sedan') {echo 'selected';}?>>Sedan</option>
                        <option value="Off Road" <?php if ($mobil['tipe'] == 'Off Road') {echo 'selected';}?>>Off Road </option>
                        <option value="Sport" <?php if ($mobil['tipe'] == 'Sport') {echo 'selected';}?>>Sport</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="transmisi">transmisi</label></td>
                <td>:</td>
                <td>
                <input type="radio" name="transmisi" id="transmisiM"  value="Manual"
                <?php if ($mobil['transmisi'] == 'Manual') {echo 'checked';}?>><label for="transmisiM">Manual</label>
                <input type="radio" name="transmisi" id="transmisiA" value="Automatic" 
                <?php if ($mobil['transmisi'] == 'Automatic') {echo 'checked';}?>><label for="transmisiA">Automatic</label>
                </td>
            </tr>
            <tr>
                <td><label for="kursi">jumlah kursi penumpang</label></td>
                <td>:</td>
                <td><input type="text" name="kursi" id="kursi" required
                value=" <?php echo $mobil["kursi"];?>">
                </td>
            </tr>
            <tr>
                <td><label for="lokasi">lokasi</label></td>
                <td>:</td>
                <td><input type="text" name="lokasi" id="lokasi" required
                value=" <?php echo $mobil["lokasi"];?>">
                </td>
            </tr>
            <tr>
                <td><label for="harga">harga</label></td>
                <td>:</td>
                <td><input type="text" name="harga" id="harga" required
                value=" <?php echo $mobil["harga"];?>">
                </td>
            </tr>
            <tr>
                <td><label for="gambar-mobil">gambar mobil</label></td>
                <td>:</td>
                <td><input type="file" name="gambar_mobil" id="gambar_mobil" ></td>
            </tr>
            <tr>
                <td align="center"><button name="kembali"><a href="table-mobil.php">kembali</a></button></td>
                <td> </td>
                <td align="center"><button type="submit" name="submit">ubah</button></td>
            </tr>
        </table>
    </form>
    <!-- akhir form tambah data -->
</body>
</html>