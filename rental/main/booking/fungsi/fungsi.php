<?php
session_start(); 
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
        $nama               = htmlspecialchars($data["nama"]);
        $umur               = htmlspecialchars($data["umur"]);
        $email              = htmlspecialchars($data["email"]);
        $hp                 = htmlspecialchars($data["hp"]);
        $id                 = htmlspecialchars($data["id_mobil"]);
        $gambar             = htmlspecialchars($data["gambar_mobil"]);
        $merk               = htmlspecialchars($data["merk"]);
        $tipe               = htmlspecialchars($data["tipe"]);
        $transmisi          = htmlspecialchars($data["transmisi"]);
        $kursi              = htmlspecialchars($data["kursi"]);
        $lokasi             = htmlspecialchars($data["lokasi"]);
        $harga              = htmlspecialchars($data["harga"]);
        $lama               = htmlspecialchars($data["lama"]);
        $tgl_ambil          = htmlspecialchars($data["tgl_ambil"]);
        $tgl_pengembalian   = htmlspecialchars($data["tgl_pengembalian"]);
        $total              = htmlspecialchars($data["total"]);

        

        // query insert data
        $query = "INSERT INTO booking VALUES 
                ('','$nama','$umur','$email','$hp','$id','$gambar','$merk','$tipe','$transmisi','$kursi','$lokasi','$harga','$lama','$tgl_ambil','$tgl_pengembalian','$total')";
        $_SESSION["tgl_ambil"] = $data["tgl_ambil"];

        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }

    function cari($kode,$nama) {

        $query = "SELECT * FROM booking
                  WHERE 
                  kode_booking == '$kode' AND
                  nama         == '$nama'
                  ";

        return query($query);
    }

?>