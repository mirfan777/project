<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../../../main/login/login.php");
  exit;
}
?>

<?php 
require 'fungsi.php';

    $id = $_GET["id_mobil"];

    if (hapus($id) > 0 ) {
        echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = '../table-mobil.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = '../table-mobil.php';
        </script>
        ";
    }
?>