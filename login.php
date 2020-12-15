<?php
session_start();
include("include/conn.php");

$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM nlogin where id='$user'";
$result = mysqli_query($conn, $sql);
if (!$user || !$pass) {
    echo "null";
} elseif (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['id'] == $user && $row['password'] == md5($pass)) {
        $_SESSION['user'] = "stoadmin";
        $_SESSION['id'] = $row['id'];
        echo "<script>location.href='dash';</script>";
    } else {
        // echo $email==$row['email'];
        echo "Wrong Password";
    }
} else {
    echo "no user";
}

