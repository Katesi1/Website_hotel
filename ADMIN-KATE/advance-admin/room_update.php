<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div id="wrapper">
    <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Update room</h1>
                    </div>
                </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-24">
            <div class="panel panel-info">
                <div class="panel-heading">
                    UPDATE ROOM
                </div>
            <div class="panel-body">
                <?php 
                    $tbl_room = new tbl_room();
                    $room_id = $_GET["id"];
                    $room = ($tbl_room->select_room($room_id))->fetch_assoc();
                ?>
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="txt_name"value="<?php echo $room['name_room'];?>">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="txt_type">
                        <option value="<?php echo $room['type_room']; ?>"> <?php echo $room['type_room']; ?></option>
                        <option value="SGL">Single Bedroom(SGL)</option>
                        <option value="TWN">Twin Bedroom(TWN)</option>
                        <option value="DBL">Double Bedroom(DBL)</option>
                        <option value="TRPL">Triple Bedroom (TRPL)</option>
                        <option value="QAD">Quad Bedroom(QAD)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" name="txt_Price" value="<?php echo $room['price']; ?>">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="txt_Category">
                    <option value="<?php echo $room['category']; ?>"> <?php echo $room['category']; ?> </option>
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
                    <label>Picture</label><br>
                    <img src="../../UPLOAD/Admin/<?php echo $room['Hinh_Anh']; ?>" style="width:150px"> 
                    <input class="form-control" type="file" name="txt_picture" value="<?php echo $room['Hinh_Anh']; ?>">
                </div>    
                    <input type="submit" name="btnSave" id="btnSave" value="Lưu dữ liệu" />
                </form>
            <?php
            if(isset($_POST['btnSave'])) {
                $new_picture_name = $_FILES["txt_picture"]["tmp_name"];
                if(empty($new_picture_name)){
                    $new_picture_name = $room["Hinh_Anh"];
                }else{
                move_uploaded_file($_FILES["txt_picture"]["tmp_name"], "../../UPLOAD/" . $new_picture_name);
                }
                    if($tbl_room->update_room(
                        $room_id,
                        $_POST["txt_name"],
                        $_POST["txt_type"],
                        $_POST["txt_Price"],
                        $_POST["txt_Category"],
                        $new_picture_name,
                        
                    )) {
                        echo "<script> alert('Sửa Phòng thành công');
                        window.location = 'room_select.php'</script>";
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