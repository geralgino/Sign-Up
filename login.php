<?php

$conn = mysqli_connect("localhost", "root", "", "signup");

if ($conn) echo "<h3> SIGN UP </h3><hr>
";
else echo "Koneksi Gagal 
";

$nama = 'Geral';
$email = 'Geral385@gmail.com';
$pass = '1234567';
$repass = '1234567';

$cekEmail = mysqli_num_rows(mysqli_query($conn, "SELECT * from login where email = '$email'"));

if ($cekEmail > 0) {
    echo $email . " Email ini sudah digunakan";
} else {
    $sql = "INSERT INTO login (nama, email, pass) VALUES ('$nama', '$email', '$pass')";

    if ($pass !== $repass) {
        echo 'Password tidak sama';
    } else if (mysqli_query($conn, $sql)) {
        echo $email . " Berhasil SignUp";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
