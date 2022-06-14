<?php

// Ubah Disini


$datanya = array(
    "host" => "localhost", // host database
    "user" => "fhuhbaoe_users", // username database
    "pass" => "@Komputer7", // password database
    "name" => "fhuhbaoe_proschool" // database name
);

// End Ubah Disini

$host = $datanya['host'];
$user = $datanya['user'];
$pass = $datanya['pass'];
$name = $datanya['name'];

$db = mysqli_connect($host, $user, $pass, $name);

if (!$db) {
    echo "Gagal menghubungkan database di file /system/database.php</br>";
}
?>