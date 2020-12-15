<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>DashBoard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- font CSS -->
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons -->
        <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <!--webfonts-->
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
        <!--animate-->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!--//end-animate-->
        <!-- chart -->
        <script src="js/Chart.js"></script>
        <!-- //chart -->
        <!--Calender-->
        <link rel="stylesheet" href="css/clndr.css" type="text/css" />
        <script src="js/underscore-min.js" type="text/javascript"></script>
        <script src="js/moment-2.2.1.js" type="text/javascript"></script>
        <!-- <script src="js/clndr.js" type="text/javascript"></script>
        <script src="js/site.js" type="text/javascript"></script> -->
        <!--End Calender-->
        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->
    </head>

    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <?php
            include("include/side.php");
            ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
<?php
                        $name = $_POST['name'];
                        $act = $_POST['act'];

                        if (!$name) {
                            echo "<script>alert('Null Value Not Allowed');location.href='category.php'</script>";
                        } else {
                            if ($act == 0) {
                                $sql = "DELETE FROM ncategory WHERE name='$name'";

                                if (mysqli_query($conn, $sql)) {
                                    echo "<script>alert('Item Delted Sucessfully');location.href='category.php'</script>";
                                } else {
                                    echo "<script>alert('Item Deletion failed!');location.href='category.php'</script>";
                                }
                            } elseif ($act == 1) {
                    ?>

                              <form action="subadd.php" method="post">
                                  <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name" id="" readonly required> <br>
                                  <input type="text" name="sname" class="form-control" placeholder="Sub Category Name" id="" required> <br>
                                  <input type="number" name="g1" id="" placeholder="Quantity in Godown1" class="form-control" required> <br>
                                  <input type="submit" class="btn btn-success" value="Add" id="">
                              </form>
                          <?php
                            } elseif ($act == 2) {
                            ?>
                              <table class="table table-bordered table-hover">
                                  <tr>
                                      <th>id</th>
                                      <th>Category</th>
                                      <th>Sub Category</th>
                                      <th>Stock</th>
                                      <th>Update</th>
                                  </tr>
                                  <?php
                                    $sql = "SELECT * FROM nstock where category='$name'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                      <form action="stock.php" method="post">
                                          <tr>
                                              <td><input type="text" name="id" id="" value="<?php echo $row['id']; ?>" style="border:none" readonly required></td>
                                              <td> <input type="text" name="name" value="<?php echo $row['category']; ?>" class="form-control" id="" readonly required> </td>
                                              <td> <input type="text" name="sname" id="" class="form-control" value="<?php echo $row['subcategory']; ?>" readonly required> </td>
                                              <td> <input type="number" name="g1" class="form-control" id="" value="<?php echo $row['g1']; ?>" required> </td>
                                              <td><input type="submit" value="Update" class="btn btn-primary"></td>
                                          </tr>
                                      </form> <?php
                                            }
                                                ?>
                              </table>
                          <?php
                            }}
                            ?>

                </div>

            </div>
            <!--footer-->
            <?php
            include("include/footer.php");
            ?>
            <!--//footer-->
        </div>
        <!-- Classie -->
        <script src="js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                showLeftPush = document.getElementById('showLeftPush'),
                body = document.body;

            showLeftPush.onclick = function() {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };


            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
        </script>
        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"> </script>
    </body>

    </html>
<?php
} else {
    echo "<script>location.href='../';</script>";
}
?>