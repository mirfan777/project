<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../../../main/login/login.php");
  exit;
}
?>
<?php 
    $conn = mysqli_connect("localhost","root","","project");

    // membuat fungsi query
    function query($query){
        global $conn;
        $result = mysqli_query($conn , $query);
        $rows = [] ;
        while( $row = mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }

    // membuat fungsi insert
    function tambah($data){
        global $conn;

        // ambil data dari tiap elemen pada form
        
        $merk       = htmlspecialchars($data["merk"]);
        $tipe       = htmlspecialchars($data["tipe"]);
        $transmisi  = htmlspecialchars($data["transmisi"]);
        $kursi      = htmlspecialchars($data["kursi"]);
        $lokasi     = htmlspecialchars($data["lokasi"]);
        $harga      = htmlspecialchars($data["harga"]);

        //upload gambar 
        $gambar = upload();
        if (!$gambar){
            return false;
        }


        // query insert data
        $query = "INSERT INTO mobil VALUES 
                ('','$gambar','$merk','$tipe','$transmisi','$kursi','$lokasi','$harga')";

        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }

    // Fungsi Upload
    function upload(){
        
        $namafile = $_FILES['gambar_mobil']['name'];
        $ukuranfile = $_FILES['gambar_mobil']['size'];
        $error = $_FILES['gambar_mobil']['error'];
        $tmpname = $_FILES['gambar_mobil']['tmp_name'];

        // cek apa tidak ada gambar yang di upload
        if ($error === 4 ){
            return false;
        }

        // cek apakah yang diupload adalah eksistensi gambar
        $eksgambarvalid = ['jpg','jpeg','png'];
        $eksgambar = explode('.',$namafile);
        $eksgambar = strtolower(end($eksgambar));

        if(!in_array($eksgambar,$eksgambarvalid)){
            echo "<script>
            alert('yang di upload bukan gambar');
            </script>";
            return false;
        }

        // cek ukuran gambar
        if($ukuranfile > 1000000){
            echo "<script>
            alert('ukuran terlalu besar');
            </script>";

            return false;
        }

        // lolos validasi
        // generate nama baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksgambar;
        move_uploaded_file($tmpname, 'img/'.$namafilebaru);

        return $namafilebaru;

    }

    // membuat fungsi hapus
    function hapus ($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM mobil WHERE id_mobil = $id");

        return mysqli_affected_rows($conn);
    }


    // membuat fungsi edit
    function ubah($data){
        global $conn;

        // ambil data dari tiap elemen pada form
        $id_mobil   = $data["id_mobil"];
        $merk       = htmlspecialchars($data["merk"]);
        $tipe       = htmlspecialchars($data["tipe"]);
        $transmisi  = htmlspecialchars($data["transmisi"]);
        $kursi      = htmlspecialchars($data["kursi"]);
        $lokasi     = htmlspecialchars($data["lokasi"]);
        $harga      = htmlspecialchars($data["harga"]);
        $gambarlama = htmlspecialchars($data["gambarlama"]);

        // cek apakah user memilih gambar baru
        if ($_FILES['gambar_mobil']['error'] === 4 ){
            $gambar = $gambarlama;
        }else {
            $gambar = upload();
        }

        // query insert data
        $query = "UPDATE mobil SET
                  gambar_mobil   = '$gambar',
                  merk           = '$merk',
                  tipe           = '$tipe',
                  transmisi      = '$transmisi',
                  kursi          = '$kursi',
                  lokasi         = '$lokasi',
                  harga          = '$harga'
                  WHERE id_mobil = $id_mobil";


        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }


    // function cari
    function cari($keyword) {

        $query = "SELECT * FROM mobil
                  WHERE 
                  merk      LIKE '%$keyword%' OR
                  tipe      LIKE '%$keyword%' OR
                  transmisi LIKE '%$keyword%' OR
                  kursi     LIKE '%$keyword%' OR
                  lokasi    LIKE '%$keyword%' OR
                  harga     LIKE '%$keyword%'
                  ";

        return query($query);
    }
?>