<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Monaco</title>

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
    <?php
        include("controls.php");
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">THE PIER HOTEL</a>
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
                        <h1 class="page-head-line">ROOM FORM</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-24">
               <div class="panel panel-info">
                    <div class="panel-heading">
                       ROOM
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="txt_name">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="txt_type">
                                    <option value="SGL">Single Bedroom(SGL)</option>
                                    <option value="TWN">Twin Bedroom(TWN)</option>
                                    <option value="DBL">Double Bedroom(DBL)</option>
                                    <option value="TRPL">Triple Bedroom (TRPL)</option>
                                    <option value="QAD">Quad Bedroom(QAD)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="txt_Price">
                            </div>                                
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="txt_Category">
                                   <?php 
                                   $tbl_category = new tbl_category();
                                   $category = $tbl_category->select_all();
                                   foreach($category as $category){
                                       echo "<option value='". $category["name_category"]."'>" . $category["name_category"]."</option>";
                                   }
                                   ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Picture Room</label>
                                <input class="form-control" type="file" name="txt_picture">
                            </div>
                    <button type="submit" name="btn_submit" class="btn btn-info">Insert</button>
                </form>
                <?php 
                    if(isset($_POST["btn_submit"])) {
                        move_uploaded_file($_FILES["txt_picture"]["tmp_name"], "../../UPLOAD/Admin/" . $_FILES["txt_picture"]["name"]);
                        $name = $_POST["txt_name"];
                        $type = $_POST["txt_type"];   
                        $price = $_POST["txt_Price"];
                        $category = $_POST["txt_Category"];
                        $picture_path = $_FILES["txt_picture"]["name"];
                        
                        $tbl_room = new tbl_room();
                        if($tbl_room->insert_room($name, $type, $price, $category,$picture_path)) {
                            echo "<script> alert('Thêm thành công') </script>";
                        } else {
                            echo "<script> alert('Thêm thất bại') </script>";
                        }
                    }
                ?>
            </div>
        </div>
            </div>
        </div>
        </div>

        </div>

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2024 K.A.T.E.S.I | Design By : Trung</a>
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
