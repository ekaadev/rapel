<?php
session_start();
$koneksi = null;
include '../koneksi.php';

if (!isset($_SESSION['email'])) {
    header("Location:/masuk.php");
    exit;
}

if (isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['name']) &&
    isset($_POST['alamat']) &&
    isset($_POST['instansi'])){

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $instansi = $_POST['instansi'];
    $address = $_POST['alamat'];
    $id = $_SESSION['user']['id'];

    $hasil = $koneksi->query("UPDATE users SET phone='$phone', fullname='$name', institution='$instansi', address='$address' WHERE id=$id");
    if (!$hasil) {
        echo "Gagal mengubah data";
        exit;
    } else {
        $_SESSION['nama_lengkap'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['institution'] = $instansi;
        $_SESSION['address'] = $address;
    }
    /*while ($row = mysqli_fetch_assoc($hasil)) {*/
    /*    $_SESSION['nama_lengkap'] = $row['fullname'];*/
    /*    $_SESSION['email'] = $row['email'];*/
    /*    $_SESSION['phone'] = $row['phone'];*/
    /*}*/
}
header("Location:/webinar-app/profile/index.php");
exit;
?>
