<?php 
    include("controls.php");
    session_start();
    $tbl_user = new tbl_user();
    $id_user = $_GET["user_id"];
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
                        <h1 class="page-head-line">Account</h1>
                    </div>
                </div>
                <!-- /. ROW  -->              
            <div class="row">              
                <div class="col-md-12 col-sm-12 col-xs-24">
                     <!--   Basic Table  -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Account
                        </div>
                        <div class="panel-body">
                            <form id="updateForm" role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="txt_password" value = "<?php echo $user["password"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="txt_email" value = "<?php echo $user["email"] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="tel" name="txt_tel" value = "<?php echo $user["Phone"] ?>">
                                </div>  
                                <div class="form-group">
                                    <label>Gender</label>  
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="txt_gender" id="gender_male" value="male" checked=""> Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="txt_gender" id="gender_female" value="female" checked=""> Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <img src="../../UPLOAD/Admin/<?php echo $user['avatar_path']; ?>" style="width: 150px;">
                                    <input class="form-control" type="file" name="txt_picture" value="<?php echo $user['avatar_path']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="txt_address" value="<?php echo $user['address']; ?>">
                                </div>    
                                <button type="submit" class="btn btn-info" name="btn_update">Update</button>                  
                            </form>
                        <?php
                        if(isset($_POST['btn_update'])) {
                            move_uploaded_file($_FILES["txt_picture"]["tmp_name"], "../../UPLOAD/Admin/" . $_FILES["txt_picture"]["name"]);
                            if($tbl_user->update(
                                $id_user,
                                $_POST["txt_password"],                             
                                $_POST["txt_email"],
                                $_POST["txt_tel"],
                                $_POST["txt_gender"],
                                $_FILES["txt_picture"]["name"],
                                $_POST["txt_address"]
                            )) {
                                echo "<script> alert('Sửa account thành công');</script>";
                            }
                        }
                        ?>
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
     <!-- Các thẻ script -->
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
