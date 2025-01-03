﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="txt_username" class="form-control" placeholder="Your Username " />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="txt_password" class="form-control"  placeholder="Your Password" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="login_forgotpss.php" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <input type="submit" name="btn_submit" class="btn btn-primary " value="Login Now">
                                    <hr />
                                    Not register ? <a href="register.php" >click here </a> or go to <a href="#">Home</a> 
                                </form>

                                <?php 
                                    include('controls.php');
                                    $tbl_user = new tbl_user();

                                    if(isset($_POST["btn_submit"])) {
                                        
                                        $user_info = $tbl_user->select_user($_POST["txt_username"]);

                                        if(mysqli_num_rows($user_info) == 1) {
                                            $user_row = mysqli_fetch_assoc($user_info);
                                            if($user_row['username'] == 'admin'){
                                            echo "<script> alert('Đăng nhập thành công'); window.location='category_select.php' </script>";
                                            exit;
                                            }else{
                                                echo "<script> window.location='../../USER/login.php' </script>";
                                                exit;
                                            }
                                        } else {
                                            echo "<script> alert('Tài khoản này không tồn tại') </script>";
                                        }
                                    }
                                
                                ?>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
