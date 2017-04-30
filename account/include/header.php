<?php
    require_once "../classes/settings.php";
    $obj=new settings();
    $user=$obj->profile();
    if(!empty($user[0]["profile_img"])){
        $image=$user[0]["profile_img"];
    }else{
        $image="profile-1.jpg";
    }
?>

<div class="admin-header">
    <div class="admin-header-navigation">
        <div class="container-fluid">
            <ul class="nav nav-pills">
               <!--  <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
                <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li> -->
            </ul>
            <ul class="nav nav-pills secondary">
                <li class="nav-item user-avatar-wrapper hidden-sm-down">

                    <a href="#" class="nav-link circle user-avatar-image" style="background-image: url('../images/<?=$image?>')"></a>
                    <span class="user-avatar-status"></span>
                    <ul class="header-more-menu">
                        <li><a href="index.php?page=settings">Profile</a></li>
                        <!-- <li><a href="#">Password</a></li>
                        <li><a href="#">Submissions</a></li> -->
                        <li><a href="../classes/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button class="navbar-toggler pull-xs-right hidden-lg-up" type="button" data-toggle="collapse" data-target=".dashboard-nav-primary">
            <i class="md-icon">menu</i>
            </button>									
        </div>
        <!-- /.container -->
    </div>
    <!-- /.admin-header-navigation -->
    <div class="admin-header-search">
        <form method="get" action="http://materialist-html.wearecodevision.com/admin-dashboard.html?">
            <!-- <div class="input-group"> -->
               <!--  <div class="input-group-addon">
                    <i class="md-icon">search</i>
                </div> -->
                <!-- /.input-group-addon -->
              <!--   <input type="text" class="form-control" placeholder="Enter your search keyword ...">
            </div> -->
            <!-- /.form-group -->
        </form>
    </div>
    <!-- /.admin-header-search -->
</div>