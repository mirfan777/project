<?php 
session_start();

if( !isset($_SESSION["login"])){
  header("location: ../login/login.php");
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
              lokasi  LIKE '%$keyword%' 
              ";

    return query($query);
}


?>