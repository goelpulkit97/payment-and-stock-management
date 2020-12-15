<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

    $name=addslashes($_POST['item']);

    if(!$name){
        echo "<script>alert('Null Value Not Allowed');location.href='category.php'</script>";
    }
    else{
        $sql = "INSERT INTO ncategory (name)
VALUES ('$name')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Record Added!');location.href='category.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

} else {
    echo "<script>location.href='../';</script>";
}
?>