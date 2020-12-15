<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

    $id=$_POST['id'];

    $sql = "DELETE FROM nsold WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Delete Record');location.href='client.php'</script>";
    } else {
        echo "<script>alert('Delete Recording Failed!');location.href='client.php'</script>";
    }

} else {
    echo "<script>location.href='../';</script>";
}
    ?>