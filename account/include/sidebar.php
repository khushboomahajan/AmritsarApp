<?php
     require_once "../helpers.php";
     require_once "../classes/mylistings.php";
     $user=loggedInuser();
     if($_SESSION['role']=='admin'){
        $obj=new mylistings();
        $unapprovedlisting=$obj->getunapprovedlisting();
        $countunapproved=count($unapprovedlisting);
     }

?>


 <div class="admin-sidebar">
    <a href="../index.php" class="hidden-md-down">
    <img src="../assets/img/logo-light.png" alt="" class="admin-sidebar-logo">
    </a>
    <a href="../index.php?page=createlisting" class="btn btn-primary btn-block hidden-md-down">Add Listing</a>
    <div class="dashboard-nav-primary collapse navbar-toggleable-md">
        <?php
            if($_SESSION['role']=='admin'):
        ?>
        <ul class="nav nav-pills nav-stacked">
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="<?=($_GET['page'] == 'dashboard')?'nav-link active':'nav-link'?>"><i class="md-icon">dashboard</i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=mylistings&p=1" class="<?=($_GET['page'] == 'mylistings')?'nav-link active':'nav-link'?>"><i class="md-icon">view_list</i> Listings <span><?=$countunapproved?></span></a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=category" class="<?=($_GET['page'] == 'category')?'nav-link active':'nav-link'?>"><i class="md-icon">note_add</i> Add Category </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=categories" class="<?=($_GET['page'] == 'categories')?'nav-link active':'nav-link'?>"><i class="md-icon">view_list</i> Categories </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=reviews" class="<?=($_GET['page'] == 'reviews')?'nav-link active':'nav-link'?>"><i class="md-icon">rate_review</i> Reviews</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=replies" class="<?=($_GET['page'] == 'replies')?'nav-link active':'nav-link'?>"><i class="md-icon">view_list</i>View Replies</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=users" class="<?=($_GET['page'] == 'users')?'nav-link active':'nav-link'?>"><i class="md-icon">people</i> Users</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=settings" class="<?=($_GET['page'] == 'settings')?'nav-link active':'nav-link'?>"><i class="md-icon">settings</i> Settings</a>
            </li>
            <li class="nav-item">
                <a href="../classes/logout.php" class="nav-link"><i class="md-icon">power_settings_new</i> Logout</a>
            </li>
        </ul>
        <?php
            endif;
            if($_SESSION['role']=='listner' || $_SESSION['role']=='organisation' || $_SESSION['role']=='recruiter' ):
        ?>
        <ul class="nav nav-pills nav-stacked">
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="<?=($_GET['page'] == 'dashboard')?'nav-link active':'nav-link'?>"><i class="md-icon">dashboard</i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=mylistings&p=1" class="<?=($_GET['page'] == 'mylistings')?'nav-link active':'nav-link'?>"><i class="md-icon">view_list</i> Listings </a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=reviews" class="<?=($_GET['page'] == 'reviews')?'nav-link active':'nav-link'?>"><i class="md-icon">rate_review</i> Reviews</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=settings" class="<?=($_GET['page'] == 'settings')?'nav-link active':'nav-link'?>"><i class="md-icon">settings</i> Settings</a>
            </li>
            <li class="nav-item">
                <a href="../classes/logout.php" class="nav-link"><i class="md-icon">power_settings_new</i> Logout</a>
            </li>
        </ul>
        <?php
            endif;
        ?>

    </div>
    <hr class="hidden-md-down">
  <!--   <div class="hidden-md-down">
        <h2>Recent Activity</h2>
        <ul class="recent">
            <li><img src="../assets/img/tmp/profile-1.jpg" alt=""> <a href="#">Adam Smith</a> has added new listing into <a href="#">properties</a> category.</li>
            <li><img src="../assets/img/tmp/profile-2.jpg" alt=""> <a href="#">Kim Makin</a> is asking for the agent role with review provilege.</li>
            <li><img src="../assets/img/tmp/profile-3.jpg" alt=""> <a href="#">Kilee Baker</a> has created new account</a> category.</li>
        </ul>
    </div> -->
</div>