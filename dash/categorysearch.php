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
                        <form action="categorysearch.php" method="post">
                            <tr>
                                <td> <input type="text" name="key" class="form-control" placeholder="Enter Category Name to Search" required></td>
                                <td><input type="submit" value="Search" class="btn btn-info"> </td>
                            </tr>
                        </form>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Actions</th>
                            <th>Button</th>
                        </tr>
                        <?php
                        $i = 1;
                        $sql = "SELECT * FROM ncategory where name LIKE '%$key%'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <form action="cated.php" method="post">
                                <tr>
                                    <td><?php echo $i;
                                        $i++; ?></td>
                                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>" id="" required readonly>
                                    <td> <?php echo $row['name']; ?> </td>
                                    <td> <select name="act" id="" class="form-control">
                                            <option value="0">Delete</option>
                                            <option value="1">Add Category</option>
                                            <option value="2">View Category</option>
                                        </select> </td>
                                    <td><input type="submit" value="Take Action" class="btn btn-danger"></td>

                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                        <form action="addcategory.php" method="post">
                            <tr>
                                <td><input type="text" name="item" id="" placeholder="Enter Name" class="form-control"></td>
                                <td><input type="submit" value="Add Item" class="btn btn-success"></td>

                            </tr>
                        </form>
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