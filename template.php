<!DOCTYPE html>
<html>


<?php
	include_once "include/head.php";
?>

<body class="">
    <div class="page-wrapper">
        <div class="header-wrapper">
            <?php
            	include_once "include/header.php";
            ?>
        </div>
        <!-- /.header-wrapper -->
       		<?php
       			include_once "pages/".$content.".php";
       		?>
        <!-- /.main-wrapper -->
       <?php
       		include_once "include/footer.php";
       ?>
        <!-- /.footer-wrapper -->
    </div>
    <!-- /.page-wrapper -->
    <div class="customizer">
        <div class="customizer-content">
            <h2>Color Variant</h2>
            <ul>
                <li><a href="assets/css/materialist-red.css" class="background-red"></a></li>
                <li><a href="assets/css/materialist-pink.css" class="background-pink"></a></li>
                <li><a href="assets/css/materialist-purple.css" class="background-purple"></a></li>
                <li><a href="assets/css/materialist-deep-purple.css" class="background-deep-purple"></a></li>
                <li><a href="assets/css/materialist-indigo.css" class="background-indigo"></a></li>
                <li><a href="assets/css/materialist-blue.css" class="background-blue"></a></li>
                <li><a href="assets/css/materialist-light-blue.css" class="background-light-blue"></a></li>
                <li><a href="assets/css/materialist-cyan.css" class="background-cyan"></a></li>
                <li><a href="assets/css/materialist-teal.css" class="background-teal"></a></li>
                <li><a href="assets/css/materialist-green.css" class="background-green"></a></li>
                <li><a href="assets/css/materialist-light-green.css" class="background-light-green"></a></li>
                <li><a href="assets/css/materialist-lime.css" class="background-lime"></a></li>
                <li><a href="assets/css/materialist-yellow.css" class="background-yellow"></a></li>
                <li><a href="assets/css/materialist-amber.css" class="background-amber"></a></li>
                <li><a href="assets/css/materialist-orange.css" class="background-orange"></a></li>
                <li><a href="assets/css/materialist-deep-orange.css" class="background-deep-orange"></a></li>
                <li><a href="assets/css/materialist-brown.css" class="background-brown"></a></li>
                <li><a href="assets/css/materialist-blue-grey.css" class="background-blue-grey"></a></li>
            </ul>
        </div>
        <!-- /.customizer-content -->
        <div class="customizer-title">
            <span><i class="fa fa-cog"></i> Customizer</span>
        </div>
        <!-- /.customizer-title -->
    </div>
    <!-- /.customizer -->
    <?php
        include_once "include/script.php";
    ?>
</body>
</html>