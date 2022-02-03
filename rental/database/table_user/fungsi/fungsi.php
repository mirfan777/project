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
        $username   = htmlspecialchars($data["username"]);
        $pass       = htmlspecialchars($data["pass"]);

        // query insert data
        $query = "INSERT INTO users VALUES 
                ('$username','$pass')";

        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }

    // membuat fungsi hapus
    function hapus ($username) {
        global $conn;
        mysqli_query($conn, "DELETE FROM users WHERE username = $username");

        return mysqli_affected_rows($conn);
    }


    // membuat fungsi edit
    function ubah($data){
        global $conn;

        // ambil data dari tiap elemen pada form
        $username   = htmlspecialchars($data["username"]);
        $pass       = htmlspecialchars($data["pass"]);

        // query insert data
        $query = "UPDATE users SET
                  username          = '$username',
                  passwords         = '$passwords',
                  WHERE username = $username";


        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }


    // function cari
    function cari($keyword) {

        $query = "SELECT * FROM users
                  WHERE 
                  username      LIKE '%$keyword%' OR
                  pass     LIKE '%$keyword%' OR
                  ";

        return query($query);
    }
?>