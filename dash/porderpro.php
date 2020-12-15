<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

$name=$_POST['name'];
$item=$_POST['quan'];
$taker=$_POST['taker'];
$cname=$_POST['cnum'];
for($i=0;$i < $item; $i++){

    $cat=$_POST['c'.$i];
    $sub=$_POST['c'.$i.'s'];
    $quan=$_POST['qcc'.$i];
    if(!$cat || !$sub){
            echo "<script>alert('Null Value Not Allowed');location.href='client.php'</script>";
    }
    else{
            $sql = "INSERT INTO nsold (client, quantity, taker, carnumber, category, scategory)
VALUES ('$name', '$quan', '$taker','$cname','$cat', '$sub')";
            mysqli_query($conn, $sql);
    }

}
    echo "<script>alert('Order Placed');location.href='client.php'</script>";
} else {
    echo "<script>location.href='../';</script>";
}
?>