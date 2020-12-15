<?php
session_start();
if ($_SESSION['user'] == 'stoadmin') {
    include("../include/conn.php");
    $key = $_POST['key'];
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

                    <table class="table">
                        <form action="ordersearch.php" method="post">
                            <tr>
                                <td colspan="3"> <input type="date" name="from" class="form-control" required></td>
                                <td colspan="3"> <input type="date" name="to" class="form-control" required></td>
                                <td><input type="submit" value="Search" class="btn btn-info"> </td>
                            </tr>
                        </form>
                        <form action="orderkeysearch.php" method="post">
                            <tr>
                                <td colspan="3"> <input type="text" name="key" class="form-control" placeholder="Enter Keyword to search" required></td>
                                <td><input type="submit" value="Search" class="btn btn-info"> </td>
                            </tr>
                        </form>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Date</th>

                            <th>Delete</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM npayment_paid";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <form action="deleteorder.php" method="post" id="form<?php echo $row['id']; ?>">
                                <tr>
                                    <input type="hidden" name="id" id="" value="<?php echo $row['id']; ?>">
                                    <td><?php echo $row['id'];
                                        $id = $row['client_id']; ?></td>
                                    <?php
                                    $sql = "SELECT * FROM nclient where id='$id'";
                                    $result1 = mysqli_query($conn, $sql);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    ?>
                                    <td> <?php echo $row1['name']; ?> </td>
                                    <td> <?php echo $row['date']; ?> </td>
                                   
                                    <td> <?php echo $row3['name'];

                                            ?> </td>
                                    <td><input type="button" onclick="dlt<?php echo $row['id'] . "()"; ?>" value="Delete" class="btn btn-danger"></td>


                                </tr>
                                <script>
                                    function dlt<?php echo $row['id'] . "()"; ?> {
                                        var r = confirm("Do You want to Delete")
                                        if (r == true) {
                                            document.getElementById("form<?php echo $row['id']; ?>").submit();
                                        } else {

                                        }
                                    }
                                </script>
                            </form>
                        <?php
                        }
                        ?>

                    </table>

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