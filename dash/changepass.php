<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");
$user=$_SESSION['id'];
    $opass=md5($_POST['opass']);
    $cnpass=$_POST['cnpass'];
    $npass=$_POST['npass'];

    if($cnpass != $npass){
        echo "<script>alert('Password Do Not Match');location.href='cpass.php';</script>";        
    }
    else{
        
        $sql = "SELECT * FROM nlogin where id='$user'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['password'] != $opass){
            echo "<script>alert('Old password is wrong');location.href='cpass.php';</script>";         
        }
        else{
            $pass=md5($npass);
            $sql = "UPDATE nlogin SET password='$pass' WHERE id='$user'";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Password Changed Successully');location.href='index.php';</script>";      
            }
            else{
                echo "<script>alert('Password Change Failed');location.href='index.php';</script>";      
                
            }
        }
    }

} else {
    echo "<script>location.href='../';</script>";
}
    ?>