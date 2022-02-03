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

if (isset($_POST["submit"])){
    
  if (tambah($_POST) > 0){
      echo "
      <script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'kode_booking.php';
      </script>
      ";
  }
  else {
      echo "
      <script>
          alert('data gagal ditambahkan!');
          document.location.href = '../../main_menu/menu_booking.php';
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

      <!-- variabel -->
      <?php $id = $_POST["id_mobil"] ?>
      <?php $gambar = $_POST["gambar_mobil"] ?>
      <?php $merk = $_POST["merk"];?>
      <?php $tipe = $_POST["tipe"];?>
      <?php $transmisi = $_POST["transmisi"];?> 
      <?php $kursi = $_POST["kursi"];?>
      <?php $lokasi = $_POST["lokasi"];?>
      <?php $harga = $_POST["harga"];?>
      <?php $nama = $_POST["nama"];?>
      <?php $umur = $_POST["umur"];?>
      <?php $email = $_POST["email"];?>
      <?php $hp = $_POST["hp"];?>
      <?php $lama = $_POST["lama"];?>
      <?php $tgl_ambil = $_POST["tgl_ambil"];?>

      <?php 
        if($lama > 3){

        $diskon = $harga * 5 / 100;
        $total1 = $harga * $lama;
        $total = $total1 - $diskon;

      } else {

        $total = $harga * $lama;
        
      }

        $tgl_pengembalian = date("Y-m-d" ,strtotime("+$lama Days",strtotime("$tgl_ambil")));
      
      ?>
      
      <!-- akhir variabel -->

      <!-- main -->
      <section>      
      <div class="container border">
          <div class="row">
            <div class="col-md-12 col-lg-6">
            <img src="../../database/table_mobil/img/<?php echo $gambar ?>" style="width: 100%; max-width: 600px; height: auto;" >
            <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="3"><h4><b><?php echo $merk; ?></b></h4></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p>Tipe</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $tipe; ?></p></td>
            </tr>
            <tr>
              <td><p>Transmisi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $transmisi; ?></p></td>
            </tr>
            <tr>
              <td><p>Kursi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $kursi; ?></p></td>
            </tr>
            <tr>
              <td><p>Lokasi</p></td>
              <td><p>:</p></td>
              <td><p><?php echo $lokasi; ?></p></td>
            </tr>
            <tr>
              <td><p>Harga</p></td>
              <td><p>:</p></td>
              <td><p>RP.<?php echo $harga; ?> / hari</p> </td>
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
                    <td><p><?php echo $nama; ?></p></td>
                </tr>
                <tr>
                    <td><p>Umur</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $umur; ?></p></td>
                </tr>
                <tr>
                    <td><p>Email</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $email; ?></p></td>
                </tr>
                <tr>
                    <td><p>Nomor Kontak</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $hp; ?></p></td>
                </tr>
                <tr>
                    <th colspan="3"><h1>Detail Sewa</h1></th>
                </tr>
                <tr>
                    <td><p>Lama Sewa</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $lama; ?> Hari</p></td>
                </tr>
                <tr>
                    <td><p>Tanggal Pengambilan</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $tgl_ambil; ?></p></td>
                </tr>
                <tr>
                    <td><p>Tanggal Pengembalian</p></td>
                    <td><p>:</p></td>
                    <td><p><?php echo $tgl_pengembalian; ?></p></td>
                </tr>
                <tr>
                    <td><p>Total Harga</p></td>
                    <td><p>:</p></td>
                    <td><p>RP.<?php echo $total; ?></p></td>
                </tr>
            </table>
            </div>
          </div>
          </div>
      </section>
      
      <!-- submit data -->
      <div class="container"> 
      <form action="" method="post">
        <button class="btn btn-outline-primary mt-3 mb-3" type="submit" name="submit" id="submit" onclick="return confirm('Apakah anda yakin?');">Pesan</button>
        <input type="hidden" id="nama" name="nama" value="<?php echo $nama; ?>">
        <input type="hidden" id="umur" name="umur" value="<?php echo $umur; ?>">
        <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
        <input type="hidden" id="hp" name="hp" value="<?php echo $hp; ?>">
        <input type="hidden" id="id" name="id_mobil" value="<?php echo $id; ?>">
        <input type="hidden" id="gambar" name="gambar_mobil" value="<?php echo $gambar; ?>">
        <input type="hidden" id="merk" name="merk" value="<?php echo $merk; ?>">
        <input type="hidden" id="tipe" name="tipe" value="<?php echo $tipe; ?>">
        <input type="hidden" id="transmisi" name="transmisi" value="<?php echo $transmisi; ?>">
        <input type="hidden" id="kursi" name="kursi" value="<?php echo $kursi; ?>">
        <input type="hidden" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>">
        <input type="hidden" id="harga" name="harga" value="<?php echo $harga; ?>">
        <input type="hidden" id="lama" name="lama" value="<?php echo $lama; ?>">
        <input type="hidden" id="tgl_ambil" name="tgl_ambil" value="<?php echo $tgl_ambil; ?>">
        <input type="hidden" id="tgl_pengembalian" name="tgl_pengembalian" value="<?php echo $tgl_pengembalian; ?>">
        <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
      </form>
      </div>
      <!-- akhir submit data -->

      
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