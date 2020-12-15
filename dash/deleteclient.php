<?php

session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");

    $name = $_POST['id'];
    $act = $_POST['act'];
    if ($act == 0) {
        if (!$name) {
            echo "<script>alert('Null Value Not Allowed');location.href='client.php'</script>";
        } else {
            $sql = "DELETE FROM nclient WHERE id='$name'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record Deleted');location.href='client.php'</script>";
            } else {
                echo "<script>alert('Record Deletion Failed!');location.href='client.php'</script>";
            }
        }
    } elseif ($act == 1) {

        $sql = "SELECT * FROM nclient where id='$name'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

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
            <!-- <script src="js/clndr.js" type="text/javascript"></script> -->
            <!-- <script src="js/site.js" type="text/javascript"></script> -->
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

                        <form action="updateamount.php" method="post">

                            <input type="hidden" name="id" value="<?php echo $name; ?>" class="form-control" id="" readonly required>
                            <br>
                            <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="" readonly required>
                            <br>
                            <input type="number" name="amount" value="<?php echo $row['pending_amount']; ?>" class="form-control" placeholder="amount to be added">
                            <br>
                            <input type="submit" value="Update" class="btn btn-success">

                        </form>

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
    } elseif ($act == 2) {
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
            <!-- <script src="js/clndr.js" type="text/javascript"></script> -->
            <!-- <script src="js/site.js" type="text/javascript"></script> -->
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

                        <form action="rpayment.php" method="post">

                            <input type="hidden" name="id" value="<?php echo $name; ?>" class="form-control" id="" readonly required>
                            <br>
                            <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="" readonly required>
                            <br>
                            <input type="number" name="amount" value="<?php echo $row['pending_amount']; ?>" class="form-control" placeholder="amount to be taken">
                            <br>
                            <select name="method" id="" class="form-control">
                                <?php

                                $sql = "SELECT * FROM npayment_method";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <input type="submit" value="Update" class="btn btn-success">

                        </form>

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
    }
} else {
    echo "<script>location.href='../';</script>";
}
?>