<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

    $id=$_POST['id'];
    $g1=$_POST['g1'];

    if(!$id || !$g1){
        echo "<script>alert('Null Value Not Allowed');location.href='category.php'</script>";
    }
    else{
        $sql = "UPDATE nstock SET g1='$g1' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Stock Updated');location.href='category.php'</script>";
        } else {
            echo "<script>alert('Stock Updation Failed');location.href='category.php'</script>";
        }
    }
} else {
    echo "<script>location.href='../';</script>";
}
?>