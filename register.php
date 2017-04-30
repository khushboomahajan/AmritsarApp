<?php
    require_once "helpers.php";
    
?>
<!DOCTYPE html>
<html>
    <!-- Mirrored from materialist-html.wearecodevision.com/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:48:01 GMT -->
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
        <title>Materialist - Registration</title>
    </head>
    <body class="layout-empty">
        <a href="login.php" class="return-back">
        <i class="fa fa-long-arrow-left"></i> Return Back</a>
        </a>
        <div class="container registration-form">
            <form method="post" action="classes/action.php">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            <span class="error" style="color: #df2f2f;"><?=displayerror('name'); ?></span>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="">E-mail</label>
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
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="number" name="mobile" class="form-control">
                            <span class="error" style="color: #df2f2f;"><?=displayerror('mobile'); ?></span>
                        </div>
                        <!-- /.form-group --> 
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" style="padding: 0 0 0 13px !important;">
                                <option value="organisation">Organisation</option>
                                <option value="listner">Listener</option>
                                <option value="recruiter">Recruiter</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <!-- /.form-group -->                                          
                       
                        <div class="center">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="agreetoterms" value="true"> By signing up, you agree with the <a href="index.php?page=terms">terms and conditions</a>.
                                </label>
                                <?php
                                    if(isset($_SESSION['err'])){
                                ?>
                                <p style="color: #df2f2f; "><?=$_SESSION['err']?></p>
                                <?php
                                 $_SESSION['err']=" ";
                                }
                            ?>
                            </div>
                            <!-- /.form-group -->
                            <input type="hidden" value="<?=basename($_SERVER['PHP_SELF'])?>" name="current_url">
                            <div class="form-group-btn">
                                <button type="submit" name="register" class="btn btn-primary">Create Account</button>
                            </div>
                            <!-- /.form-group-btn -->					
                        </div>
                        <!-- /.center -->
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->
            </form>
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
    <!-- Mirrored from materialist-html.wearecodevision.com/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:48:01 GMT -->
</html>