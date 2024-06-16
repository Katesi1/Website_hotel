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
                <a class="navbar-brand" href="">THE PIER HOTEL</a>
            </div>

            <div class="header-right">
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
                        <a href="../../USER/login.php"><i class="fa fa-sign-in "></i>Login</a>
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
                        <h1 class="page-head-line">Register Forms</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-24">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           REGISTER FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Enter Username</label>
                                            <input class="form-control" type="text" name="txt_username" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="password" name="txt_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Retype Password</label>
                                            <input class="form-control" type="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Gender</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="txt_gender" id="gender_male" value="male" checked=""> Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="txt_gender" id="gender_female" value="female"> Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Address</label>
                                            <select class=" form-control form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" name="txt_address">
                                            <?php    $countries = array("Tỉnh Hà Giang",'Tỉnh Cao Bằng','Tỉnh Bắc Kạn','Tỉnh Tuyên Quang','Tỉnh Lào Cai','Tỉnh Điện Biên','Tỉnh Lai Châu','Tỉnh Sơn La','Tỉnh Yên Bái','Tỉnh Hoà Bình','Tỉnh Thái Nguyên','Tỉnh Lạng Sơn','Tỉnh Quảng Ninh','Tỉnh Bắc Giang','Tỉnh Phú Thọ','Tỉnh Vĩnh Phúc','Tỉnh Bắc Ninh','Tỉnh Hải Dương','Thành phố Hải Phòng','Tỉnh Hưng Yên','Tỉnh Thái Bình','Tỉnh Hà Nam','Tỉnh Nam Định','Tỉnh Ninh Bình','Tỉnh Thanh Hóa','Tỉnh Nghệ An','Tỉnh Hà Tĩnh','Tỉnh Quảng Bình','Tỉnh Quảng Trị','Tỉnh Thừa Thiên Huế','Thành phố Đà Nẵng','Tỉnh Quảng Nam','Tỉnh Quảng Ngãi','Tỉnh Bình Định','Tỉnh Phú Yên','Tỉnh Khánh Hòa','Tỉnh Ninh Thuận','Tỉnh Bình Thuận','Tỉnh Kon Tum','Tỉnh Gia Lai','Tỉnh Đắk Lắk','Tỉnh Đắk Nông','Tỉnh Lâm Đồng','Tỉnh Bình Phước','Tỉnh Tây Ninh','Tỉnh Bình Dương','Tỉnh Đồng Nai','Tỉnh Bà Rịa - Vũng Tàu','Thành phố Hồ Chí Minh','Tỉnh Long An','Tỉnh Tiền Giang','Tỉnh Bến Tre','Tỉnh Trà Vinh','Tỉnh Vĩnh Long','Tỉnh Đồng Tháp','Tỉnh An Giang','Tỉnh Kiên Giang','Thành phố Cần Thơ','Tỉnh Hậu Giang','Tỉnh Sóc Trăng','Tỉnh Bạc Liêu','Tỉnh Cà Mau');
                                            ?>
                                                <option value="" selected>Chọn tỉnh thành</option>
                                                <?php
												foreach($countries as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>';
												endforeach;
												?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="Phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Avatar</label>
                                            <input class="form-control" type="file" name="txt_avatar">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text" name="txt_email" required>
                                            </div>
                                        </div>    
                                        <div class="panel-body">                   
                                        <button type="submit" class="btn btn-info" name="btn_submit">Đăng Kí</button>
                                    </form>

                                    <?php 
                                        include("controls.php");

                                        if(isset($_POST["btn_submit"])) {
                                            move_uploaded_file($_FILES["txt_avatar"]["tmp_name"], "../../UPLOAD/" . $_FILES["txt_avatar"]["name"]);

                                            $username = $_POST["txt_username"];
                                            $password = $_POST["txt_password"];
                                            $gender = $_POST["txt_gender"];
                                            $address = $_POST["txt_address"];
                                            $phone = $_POST["Phone"];
                                            $avatar_path = $_FILES["txt_avatar"]["name"];
                                            $email = $_POST["txt_email"];

                                            $tbl_user = new tbl_user();
                                            if($tbl_user->insert($username, $password, $email, $gender, $phone, $avatar_path, $address)) {
                                                echo "<script> alert('đăng ký thành công') </script>";
                                            } else {
                                                echo "<script> alert('đăng ký thất bại') </script>";
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                            </div>
                        </div>
                            </div>

        </div>

            </div>
            <!-- /. PAGE INNER -->
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
