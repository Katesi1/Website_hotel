<?php 
    include("controls.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">THE PIER HOTEL</a>
            </div>

            <div class="header-right">
            <a href="#" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="#" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="#" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

             </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <div class="user-img-div">
                        <img src="../../UPLOAD/Home/meomeo.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                Katesi
                            <br />
                                <small>Xin chào</small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Category <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="category_select.php"><i class="fa fa-eye"></i>Category list</a>
                            </li>
                            <li>
                                <a href="category_register.php"><i class="fa fa-plus "></i>Add new category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Room <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="room_select.php"><i class="fa fa-eye"></i>Room list</a>
                            </li>
                            <li>
                                <a href="room_register.php"><i class="fa fa-plus "></i>Add new Room</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="booking_select.php"><i class="fa fa-yelp "></i>Booking</a>
                    </li>
                    <li>
                        <a href="contact_select.php"><i class="fa fa-yelp "></i>Contacts</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp "></i> Report <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="report.php"><i class="fa fa-eye"></i>Report</a>
                            </li>
                            <li>
                                <a href="Payment.php"><i class="fa fa-eye"></i>Payment</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-sign-in "></i>Login</a>
                    </li>
                    <li>
                        <a href="register.php"><i class="fa fa-sign-in "></i>Register</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Booking</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
               
                <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Booking
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th style="width:110px;">Check_In</th>
                                            <th style="width:110px;">Check_Out</th>
                                            <th >Adult</th>
                                            <th >Child</th>
                                            <th>room</th>
                                            <th>nodays</th>
                                            <th style="width:300px;">status</th>
                                            <th>option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $tbl_booking = new tbl_booking();
                                            $bookings = $tbl_booking->select_all();
                                            
                                            foreach($bookings as $booking) {                                                                                       
                                        ?>

                                        <tr> 
                                            <td> <?php echo $booking["ID_booking"] ?> </td>
                                            <td> <?php echo $booking["Name"] ?> </td>
                                            <td> <?php echo $booking["email"] ?> </td>
                                            <td> <?php echo $booking["Check_in"] ?> </td>
                                            <td> <?php echo $booking["Check_out"] ?> </td>
                                            <td> <?php echo $booking["adult"] ?> </td>
                                            <td> <?php echo $booking["children"] ?> </td>
                                            <td> <?php echo $booking["name_room"] ?> </td>
                                            <td> <?php echo $booking["nodays"] ?> </td>
                                            <td> 
                                                <select id="status_opt_<?php echo $booking['ID_booking'] ?>"> 
                                                    <option> <?php echo $booking['star'] ?> </option>
                                                    <option value="Đã xác nhận"> Đã xác nhận </option>
                                                    <option value="Đã hủy"> Đã hủy phòng </option>
                                                    <option value="Đã thanh toán"> Đã thanh toán </option>
                                                </select>    
                                                <button id="update_btn_<?php echo $booking['ID_booking'] ?>" onclick="updateStatus(<?php echo $booking['ID_booking'] ?>)">
                                                Cập nhật trạng thái
                                                </button>
                                            </td>
                                            <td> <a href="booking_details.php?id=<?php echo $booking['ID_booking'] ?>">Xem chi tiết</a> </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>
            
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script>
    function updateStatus(bookingId) {
        let status = document.getElementById('status_opt_' + bookingId).value;
        window.location = 'booking_update.php?id=' + bookingId + '&stt=' + status;
    }

    // Ẩn nút "Cập nhật trạng thái" khi status là "Đã thanh toán"
    <?php
    foreach($bookings as $booking) {
        if ($booking["star"] === "Đã thanh toán") {
            echo "document.getElementById('update_btn_" . $booking['ID_booking'] . "').style.display = 'none';\n";
        }
    }
    ?>
    </script>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
