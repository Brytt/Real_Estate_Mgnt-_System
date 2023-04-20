
<!doctype html>
<html class="no-js" lang="">

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <head>
                <meta charset="utf-8">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <title>ROYAL KINGDOM ESTATE</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Favicon -->
                <link rel="shortcut icon" type="media/image/x-icon" href="media/img/rke_logo.png">
                <!-- Normalize CSS -->
                <link rel="stylesheet" href="media/css/normalize.css">
                <!-- Main CSS -->
                <link rel="stylesheet" href="media/css/main.css">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="media/css/bootstrap.min.css">
                <!-- Select 2 CSS -->
                <link rel="stylesheet" href="media/css/select2.min.css">
                <!-- datepicker CSS -->
                <link rel="stylesheet" href="media/css/datepicker.min.css">
                <!-- Fontawesome CSS -->
                <link rel="stylesheet" href="media/css/all.min.css">
                <!-- Flaticon CSS -->
                <link rel="stylesheet" href="media/fonts/flaticon.css">
                <!-- Full Calender CSS -->
                <link rel="stylesheet" href="media/css/fullcalendar.min.css">
                <!-- Animate CSS -->
                <link rel="stylesheet" href="media/css/animate.min.css">
                <!-- Custom CSS -->
                <link rel="stylesheet" href="media/style.css">
                <link type="text/css" rel="stylesheet" href="media/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="media/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="media/images/fev.png">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="media/css/login-nine.css">

        </head>

        <body class="" style="z-index:6 ;">
                <!-- Preloader Start Here -->
                <!-- <div id="preloader"></div> -->
                <!-- Preloader End Here -->

                <?php if(isset($attempt_in)){?>

<div class="alert-danger">
        <?php
                if($attempt_in < 3){
                $msg =  'Invalid user name or password.';
                }else if($attempt_in =='11'){
                $msg = 'Invalid Code entered.';
                }else if($attempt_in =='120'){
                $msg = 'Suspended account.';
                }else if($attempt_in =='140'){
                $msg = 'Locked. Wait for 5min and try again.';
                }else if($attempt_in =='110'){
                $msg = 'User account locked.';
                }
        ?>   
</div>

<?php }  $token= generateFormToken(); ?>

                <div class="login_wrapper">
        <div class="row  no-gutters">
                
        <div class="col-xl-6 col-lg-6 col-12  mobile-hidden">
                <div class="login_left">
                    <div class="login_left_img"><img src="media/images/login-bg3.jpg" alt="login background"></div>
                </div>
            </div>
            
                <div class="col-xl-6 col-lg-6 col-12  bg-white">
                <div class="login_box">

                <div class="login_form">
                        <div class="login_form_inner">

<div class="mb-5"><img style="max-width: 1050px; height: 130px;"
                                                                src="media/img/rke_logo.png" alt="logo">
                                                </div>

                <div class="text-dark h3 mb-5">Create Password</div>
                <div><?php echo (($msg))?'<div class="errormsg">'.$msg.'</div>':''; ?></div>
                
                <form action="index.php?action=index&action=defaultpassword" method="post" enctype="application/x-www-form-urlencoded" name="loginForm" id="loginForm" autocomplete="off">

                        <div class="illustration">
<i class="icon ion-ios-locked-outline"></i>
                        </div>
                        
                        <div class="form-group">
                        <input class="form-control" type="password" name="npass" id="npass" placeholder="New Password">
                        </div>

                        <div class="form-group">
                                <input class="form-control" type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                                <button class="btn btn bg-primary btn-block text-white" type="submit">Update</button>
                        </div>

                        </div>

                        <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" /><br />
                        <?php $session->set('1_token', $token);?>
                                                </form>
                                                </div> </div>
                                </div>
                </div>
                </div> </div>
                </div></div></div>
                </body>
        <footer class="footer-wrap-layout1 text-center">
              <div class="copyright">© Copyrights 
                                <a href="#">API Technologies</a> 2021. All rights reserved. 
                        </div>
                </footer>

                <!-- jquery-->
                <script src="media/js/jquery-3.3.1.min.js"></script>

                <!-- Modernize js -->
                <script src="media/js/modernizr-3.6.0.min.js"></script>
                <!-- Plugins js -->
                <script src="media/js/plugins.js"></script>
                <!-- Popper js -->
                <script src="media/js/popper.min.js"></script>
                <!-- Bootstrap js -->
                <script src="media/js/bootstrap.min.js"></script>
                <!-- Counterup Js -->
                <script src="media/js/jquery.counterup.min.js"></script>
                <!-- Moment Js -->
                <script src="media/js/moment.min.js"></script>
                <!-- Select 2 Js -->
                <script src="media/js/select2.min.js"></script>
                <!-- Date Picker Js -->
                <script src="media/js/datepicker.min.js"></script>
                <!-- Waypoints Js -->
                <script src="media/js/jquery.waypoints.min.js"></script>
                <!-- Scroll Up Js -->
                <script src="media/js/jquery.scrollUp.min.js"></script>
                <!-- Full Calender Js -->
                <script src="media/js/fullcalendar.min.js"></script>
                <!-- Chart Js -->
                <script src="media/js/Chart.min.js"></script>
                <!-- Custom Js -->
                <script src="media/js/main.js"></script>

                <!-- Sweet Alert Js -->
                <script src="media/js/sweetalert.js"></script>
</html>