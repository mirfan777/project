<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
error_reporting(E_ALL);
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,'project');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name=($_POST['uname']);
$pass=($_POST['pw']);
$pass1=($_POST['pw2']);
if ($pass==$pass1) {
    $s="SELECT * FROM users WHERE username ='$name' ";
    $result=mysqli_query($conn,$s);
    $num= mysqli_num_rows($result);
    if ($num == 0){
         $reg="INSERT INTO `users`(`username`, `pass`) VALUES ('$name','$pass')";
    mysqli_query($conn, $reg);
    echo"
    <script> 
        alert('Registrasi berhasil');
        document.location.href = 'login.php';
    </script>
    ";


    }else{
        echo"<script>alert('Username already taken')</script>";
        header('Refresh: 0.1; URL=registrasi.php');

    }
   
}else{
    echo"<script>alert('Password Confirmation failed')</script>";
    header('Refresh: 0.5; URL=registrasi.php');
}
?>

