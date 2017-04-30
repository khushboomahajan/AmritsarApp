<!DOCTYPE html>
<html>
    <!-- Mirrored from materialist-html.wearecodevision.com/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:47:47 GMT -->
    <?php
        include_once "include/head.php";
    ?>
    <body class="">
        <div class="admin-wrapper">
           <?php
                include_once "include/sidebar.php";
           ?>
            <!-- /.admin-sidebar -->
            <div class="admin-main">
                <?php
                    include_once "include/header.php";
                ?>
                <!-- /admin-header -->
               <?php
                    include_once "pages/".$content.".php";
               ?>
                <!-- /.admin-content -->		
            </div>
            <!-- /.admin-main -->
        </div>
        <!-- /.admin-wrapper -->
        <div class="customizer">
           <!--  <div class="customizer-content">
                <h2>Color Variant</h2>
                <ul>
                    <li><a href="../assets/css/materialist-red.css" class="background-red"></a></li>
                    <li><a href="../assets/css/materialist-pink.css" class="background-pink"></a></li>
                    <li><a href="../assets/css/materialist-purple.css" class="background-purple"></a></li>
                    <li><a href="../assets/css/materialist-deep-purple.css" class="background-deep-purple"></a></li>
                    <li><a href="../assets/css/materialist-indigo.css" class="background-indigo"></a></li>
                    <li><a href="../assets/css/materialist-blue.css" class="background-blue"></a></li>
                    <li><a href="../assets/css/materialist-light-blue.css" class="background-light-blue"></a></li>
                    <li><a href="../assets/css/materialist-cyan.css" class="background-cyan"></a></li>
                    <li><a href="../assets/css/materialist-teal.css" class="background-teal"></a></li>
                    <li><a href="../assets/css/materialist-green.css" class="background-green"></a></li>
                    <li><a href="../assets/css/materialist-light-green.css" class="background-light-green"></a></li>
                    <li><a href="../assets/css/materialist-lime.css" class="background-lime"></a></li>
                    <li><a href="../assets/css/materialist-yellow.css" class="background-yellow"></a></li>
                    <li><a href="../assets/css/materialist-amber.css" class="background-amber"></a></li>
                    <li><a href="../assets/css/materialist-orange.css" class="background-orange"></a></li>
                    <li><a href="../assets/css/materialist-deep-orange.css" class="background-deep-orange"></a></li>
                    <li><a href="../assets/css/materialist-brown.css" class="background-brown"></a></li>
                    <li><a href="../assets/css/materialist-blue-grey.css" class="background-blue-grey"></a></li>
                </ul>
            </div> -->
            <!-- /.customizer-content -->
           <!--  <div class="customizer-title">
                <span><i class="fa fa-cog"></i> Customizer</span>
            </div> -->
            <!-- /.customizer-title -->
        </div>
        <!-- /.customizer -->
        <script type="text/javascript" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../assets/js/tether.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/leaflet.js"></script>
        <script type="text/javascript" src="../assets/js/leaflet.markercluster.js"></script>
        <script type="text/javascript" src="../assets/libraries/owl-carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="../assets/js/materialist.js"></script>
    </body>
    <!-- Mirrored from materialist-html.wearecodevision.com/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 02:47:50 GMT -->
</html>