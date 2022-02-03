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

    // function cari
    function cari($keyword) {

        $query = "SELECT * FROM mobil
                WHERE
                kode_mobil        LIKE '%$keyword%' OR
                nama              LIKE '%$keyword%' OR
                email             LIKE '%$keyword%' OR
                hp                LIKE '%$keyword%' OR
                id_mobil          LIKE '%$keyword%' OR
                gambar_mobil      LIKE '%$keyword%' OR
                merk              LIKE '%$keyword%' OR
                tipe              LIKE '%$keyword%' OR
                transmisi         LIKE '%$keyword%' OR
                lokasi            LIKE '%$keyword%' OR
                harga             LIKE '%$keyword%' OR
                lama              LIKE '%$keyword%' OR
                tgl_ambil         LIKE '%$keyword%' OR
                tgl_pengembalian  LIKE '%$keyword%' OR
                total             LIKE '%$keyword%' 
                ";

        return query($query);
    }




?>