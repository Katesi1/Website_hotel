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
                <a class="navbar-brand" href="index.html">K.A.T.E.S.I</a>
            </div>

            <div class="header-right">

              <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


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
                        <h1 class="page-head-line">BOOKING DETAILS</h1>
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
                            <?php 
                                $tbl_user = new tbl_user();
                                $tbl_booking = new tbl_booking();

                                $booking = $tbl_booking->select_booking($_GET["id"])->fetch_assoc();
                                $user = $tbl_user->select_user_id($booking["user_id"])->fetch_assoc(); 
                            ?>
                            <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                  <tr> 
                                    <td> Tên khách hàng </td>
                                    <td> <?php echo $user["username"] ?> </td>
                                  </tr>

                                  <tr> 
                                    <td> Địa chỉ </td>
                                    <td> <?php echo $user["address"] ?> </td>
                                  </tr>

                                  <tr> 
                                    <td> Ngày đặt </td>
                                    <td> <?php echo $booking["Check_in"] ?> </td>
                                  </tr>

                                  <tr> 
                                    <td> Ngày kết thúc </td>
                                    <td> <?php echo $booking["Check_out"] ?> </td>
                                  </tr>

                                  <tr> 
                                    <td> Ngày sử dụng </td>
                                    <td> <?php echo $booking["nodays"] ?> </td>
                                  </tr>

                                  <tr> 
                                    <td> Trạng thái </td>
                                    <td> <?php echo $booking["star"] ?> </td>
                                  </tr>

                                  <tr>
                                    <td colspan="2" style="text-align: left; font-weight: bold;"> Phòng </td>
                                  </tr>

                                  <tr>
                                    <table class="table">
                                        <tr>
                                        <th>Tên Phòng</th>
                                        <th>Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số ngày </th>
                                        </tr>

                                        <?php 
                                        $booking_room = $tbl_booking->select_booking_room($booking["ID_booking"]);

                                        foreach($booking_room as $room) {
                                        ?>

                                        <tr> 
                                        <td style="width: 200px;"> <?php echo $room["name_room"] ?> </td>
                                        <td style="width: 500px;"> 
                                            <img src="../../UPLOAD/Admin/<?php echo $room["Hinh_Anh"] ?>" alt="" style="width: 400px;">
                                        </td>
                                        <td style="width: 100px;"> <?php echo $room["price"].'$' ?> </td>
                                        <td style="width: 100px;"> <?php echo $booking["nodays"] ?></td>
                                        </tr>                     
                                        <?php 
                                        }
                                        ?>

                                        <tr>
                                            <td>
                                                <td colspan="4" style="text-align: right;"> 
                                                <?php 
                                                    $total_sum = 0;
                                                    $nodays = $booking['nodays'];
                                                    $price = $room["price"];
                                                    $total_price = $price * $nodays;
                                                    $total_sum += $total_price;
                                                    echo "Thành tiền : ". $total_price.'$'; ?>
                                                </td>
                                            </td>
                                        </tr>
                                    </table>
                                  <tr>
                                </tbody>

                                <tr> 
                                    <h3> <a href="booking_select.php"> << Quay lại </a> </h3>
                                </tr>
                            <table>
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
    <!-- <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div> -->
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
