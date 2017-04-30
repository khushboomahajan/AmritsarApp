<?php
    require_once "helpers.php";
?>
<!DOCTYPE html>
<html>
    <!-- Mirrored from materialist-html.wearecodevision.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:48:00 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
        <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
        <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">
        <link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
        <title>Materialist - Login</title>
    </head>
    <body class="layout-empty">
        <a href="index.php" class="return-back">
        <i class="fa fa-long-arrow-left"></i> Return Back</a>
        </a>
        <div class="container login-form">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-4">
                    <h2>Log In Into Account</h2>
                    <?php
                        session_start();
                        if(isset($_SESSION['message'])) :
                    ?>
                        <span style="color: white;"><?=$_SESSION['message']?></span>

                    <?php
                        endif;
                        $_SESSION['message']=" ";
                    ?>
                    <form method="post" action="classes/action.php">
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="error" style="color: #df2f2f;"><?=displayerror('email'); ?></span>
                           
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="error" style="color: #df2f2f;"><?=displayerror('password'); ?></span>
                        </div>
                        <!-- /.form-group -->
                        <input type="hidden" value="<?=basename($_SERVER['PHP_SELF'])?>" name="current_url">
                        <?php
                            if(isset($_SESSION['err'])){
                        ?>
                        <span style="color: #df2f2f;"><?= $_SESSION['err']?></span>
                        <?php
                            $_SESSION['err']=" ";
                            }
                        ?>
                        <div class="form-group-btn">
                            <button type="submit" class="btn btn-primary pull-right" name="signin">Sign In</button>
                        </div>
                        <!-- /.form-group-btn -->
                        <div class="form-group-bottom-link">
                            <a href="reset.php">I forgot my password <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <!-- /.form-group-bottom-link -->
                    </form>
                    <div class="form-group-bottom-link">
                        <a>Dont't have an Account?</a>
                        <button type="submit" class="btn btn-primary pull-right" onclick="window.location.href='register.php'">Create Account</button>
                    </div>
                </div>
                <!-- /.col-* -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/leaflet.js"></script>
        <script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
        <script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets/js/materialist.js"></script>
    </body>
    <!-- Mirrored from materialist-html.wearecodevision.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:48:01 GMT -->
</html>