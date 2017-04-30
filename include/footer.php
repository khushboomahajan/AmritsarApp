 <?php
    require_once "helpers.php";
?>
 <div class="footer-wrapper">
    <div class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="widget">
                            <h2 class="widgettitle"><img src="assets/img/logo-light.png" alt="Materialist"></h2>
                            <p>
                                ABD provides detailed information about the businesses in Amritsar. This can help you to search for the famous places in Amritsar and many more. 
                            </p>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
                        <div class="widget ">
                            <h2 class="widgettitle">Categories</h2>
                            <ul class="nav nav-stacked">
                                <li class="nav-item"><a href="index.php?page=listings&category=Shopping" class="nav-link">Shopping</a></li>
                                <li class="nav-item"><a href="index.php?page=listings&category=Hotels" class="nav-link">Hotels</a></li>
                                <li class="nav-item"><a href="index.php?page=listings&category=Education" class="nav-link">Education</a></li>
                                <li class="nav-item"><a href="index.php?page=listings&category=Travel" class="nav-link">Travel</a></li>
                            </ul>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-1">
                        <div class="widget ">
                            <h2 class="widgettitle">Contact Us</h2>
                            <?php
                               // session_start();
                                if(isset($_SESSION['contact'])) :
                            ?>
                           <span style="color: white;"><?= $_SESSION['contact']?></span>
                            <?php
                                endif;
                                $_SESSION['contact']= " ";
                            ?>
                           <!--  <ul class="nav nav-stacked">
                                <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Submit Listing</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Filters</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Invoice</a></li>
                            </ul> -->
                            <form action="classes/contact.php" method="POST" id="contactForm">                               
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group" style="margin-left: -15px;">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" style="color: white;" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" style="color: white;" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" style="color: white;" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea type="text" class="form-control" name="message" style="color: white;" required></textarea> 
                                    </div>
                                </div>
                                <div class="center">
                                    <button class="btn btn-primary btn-large" type="submit" name="submit">Send</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /.col-* -->						
                    <!-- <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1"> -->
                      <!--   <div class="widget">
                            <h2 class="widgettitle">Admin</h2>
                            <ul class="nav nav-stacked">
                                <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Reviews</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Listings</a></li>
                            </ul>
                        </div> -->
                        <!-- /.widget -->
                    <!-- </div> -->
                    <!-- /.col-* -->				
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.footer-widgets -->
        <div class="footer-top">
            <div class="container">
                <!-- <div class="footer-top-left">
                    <strong class="hidden-xs-down">Supported credit cards:</strong>
                    <i class="fa fa-cc-stripe"></i>
                    <i class="fa fa-cc-visa"></i>
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                </div> -->
                <!-- /.footer-top-left -->
                <div class="footer-top-right">
                    <a class="footer-top-action">
                    <i class="md-icon">vertical_align_top</i>
                    </a><!-- /.footer-top-action -->
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    </ul>
                </div>
                <!-- /.footer-top-right -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.footer-top -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-left">
                    Amritsar Directory - Created by <a href="#">...</a>
                </div>
                <!-- /.footer-bottom-left -->
                <div class="footer-bottom-right">
                    Copyright &copy; 2017 - All Rights Reserved
                </div>
                <!-- /.footer-bottom-right -->			
            </div>
            <!-- /.container -->
        </div>
        <!-- /.footer-bottom -->
    </div>
<!-- /.footer -->
</div>