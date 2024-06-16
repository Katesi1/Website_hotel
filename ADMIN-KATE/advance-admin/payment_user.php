<?php 
    include("controls.php");
    session_start();
    $tbl_booking = new tbl_booking();
    $id_user = $_GET["user_id"];
    $user_booking = $tbl_booking->select_booking_user($id_user);
    $tbl_user = new tbl_user();
    $user = ($tbl_user->select_user_id($id_user))->fetch_assoc();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    td div {
        margin-bottom: 5px; /* Adjust this value as needed */
    }
</style>
    
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
                        <img src="../../UPLOAD/<?php echo $user['avatar_path']; ?>" class="img-thumbnail" />
                            <div class="inner-text">
                                <?php 
                                    if(!empty($user)) {
                                        echo $user['username'];
                                    } else {
                                        echo '<p>Không thấy tên người dùng</p>';
                                    }
                                ?>
                            </div>
                    </div>
                    </li>
                    <li>
                        <a href="../../USER/index.php"><i class="fa fa-yelp"></i>Home Page<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];
                                echo '<a href="payment_user.php?user_id='.$user_id.'" class="dropdown-item"><i class="fa fa-yelp"></i>Booked<span class="fa arrow"></span></a>';
                            } else {
                                echo '<p>Lỗi</p>';
                            }
                        ?>
                    </li>
                    <li>
                        <?php
                        if(!empty($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];
                                echo '<a href="account.php?user_id='.$user_id.'" class="dropdown-item"><i class="fa fa-yelp"></i>Account<span class="fa arrow"></span></a>';
                            } else {
                                echo '<p>Lỗi</p>';
                            }
                        ?>
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
                            My room
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th style="width:100px;">Check_In</th>
                                            <th style="width:100px;">Check_Out</th>
                                            <th style="width:100px;">room</th>
                                            <th>nodays</th>
                                            <th>Price/Day</th>
                                            <th>Gr.Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $total_sum = 0;
                                         // Kiểm tra xem có bản ghi nào không
                                         if ($user_booking->num_rows > 0) {
                                            while ($row = $user_booking->fetch_assoc()) {
                                                $room_id = $row["room_id"];
                                                $nodays = $row["nodays"];
                                                $star = $row["star"];
                                                if($star <> 'Đã thanh toán'){
                                                // Lấy thông tin phòng từ bảng tbl_room
                                                $tbl_room = new tbl_room();  
                                                $room = $tbl_room->select_room($room_id);
                                                $room_info = $room->fetch_assoc();
                                                $room_price = $room_info["price"];

                                                // Tính tổng giá của đặt phòng
                                                $total_price = $room_price * $nodays;
                                                $total_sum += $total_price;
                                        ?>
                                        <tr> 
                                            <td> <?php echo $row["Name"] ?> </td>
                                            <td> <?php echo $row["email"] ?> </td>
                                            <td> <?php echo $row["Check_in"] ?> </td>
                                            <td> <?php echo $row["Check_out"] ?> </td>
                                            <td> <?php echo $row["name_room"] ?> </td>
                                            <td> <?php echo $nodays; ?></td>
                                            <td> <?php echo $room_price; ?>$</td>
                                            <td> <?php echo $total_price; ?>$</td>
                                        </tr>
                                        
                                        <?php
                                                }}
                                            } else {
                                                echo "<tr><td colspan='8'>No booking information available.</td></tr>";
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="7" align="right"><strong>Total:</strong></td>
                                            <td><?php echo $total_sum; ?>$</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="container-xxl py-5">
           
                                <div class="col-md-6" >
                                    <img src="../../UPLOAD/Admin/payment_banking.jpg" alt="" style="width:350px;height:350px;">
                                </div> 
                                <div class="col-md-6" >
                                    <table class="table" style="border: #2c3e50 solid 2px;">
                                    <tr>
                                        <td><h1>Thông tin khách hàng</h1></td>
                                    </tr>
                                    <tr>
                                        <td>Mã khách hàng: <?php echo $id_user?></td>
                                    </tr>
                                    <tr>
                                        <td>Tên khách hàng: <?php echo $user['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: <?php echo $user['Phone']?></td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền: <?php echo $total_sum ."$"?></td>
                                    </tr>
                                    <tr>
                                        <td>Phương thức thanh toán</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            +<i class="bi bi-shop"></i> Thanh toán trực tiếp
                                            <br><br>    
                                            +<i class="bi bi-cash-coin"></i> Banking
                                        </td>
                                    </tr>
                                    
                                    </table>
                            
                                </div>

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
