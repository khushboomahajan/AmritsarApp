<?php
    
    require_once "classes/categories.php";
    require_once "classes/settings.php";
    $obj=new categories();
    $categorydata=$obj->allcategories();
    $obj=new settings();
    $user=$obj->profile();
    if(!empty($user[0]["profile_img"])){
        $image=$user[0]["profile_img"];
    }else{
        $image="profile-1.jpg";
    }

?>
<div class="header">
    <div class="header-inner">
        <div class="header-top">
            <div class="container">
                <a href="index.php">
                <img src="images/logo.png" alt="" class="header-top-logo" style="    max-height: 69px !important;">
                </a>
                <div class="nav-primary-wrapper collapse navbar-toggleable-sm">
                </div>
                <!-- /.nav-primary-wrapper -->
                <ul class="nav nav-pills secondary">
                    <!--
                        <li class="nav-item">
                        	<a href="#" class="nav-link circle"><i class="md-icon">search</i></a>
                        </li>
                        -->
                        <?php
                            //session_start();
                            if(isset($_SESSION['user']) && $_SESSION['user'] != ''){  
                                ?>
                                 <li class="nav-item"><a href="index.php?page=createlisting" class="nav-link circle"><i class="md-icon">add</i></a></li>
                                  <li class="nav-item user-avatar-wrapper">
			                        <a href="#" class="nav-link circle user-avatar-image" style="background-image: url('images/<?=$image?>')"></a>
			                        <span class="user-avatar-status"></span>
			                        <ul class="header-more-menu">
			                            <li><a href="account/index.php?page=settings">Profile</a></li>
			                            <li><a href="account/index.php?page=dashboard">Dashboard</a></li>
			                            <!-- <li><a href="#">Submissions</a></li> -->
			                            <li><a href="classes/logout.php">Logout</a></li>
			                        </ul>
			                    </li>
                                
                                <?php
                            }else{
                        ?>
                                <li class="nav-item"><a href="login.php" class="nav-link circle"><i class="md-icon">add</i></a></li>
                        <?php
                            } 
                        ?> 
                   
                </ul>
                <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target=".nav-primary-wrapper">
                <i class="md-icon">menu</i>
                </button>						
            </div>
            <!-- /.container -->
        </div>  
        <!-- /.header-top -->
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom-label hidden-md-down">
                    I'm looking for
                </div>
                <!-- /.header-bottom-label -->
                <ul class="nav nav-pills">
                <?php
                     foreach ($categorydata as $key => $value) :                       
                        if($key<8) :
                ?>

                    <li class="nav-item"><a href="index.php?page=listings&category=<?=$value['name']?>" class="nav-link"><?=$value['name']?></a></li>
                  
                <?php
                    endif;
                    endforeach;
                ?>
                </ul>
                <!-- /.nav -->
                <div class="header-bottom-more">
                    <i class="md-icon">more_horiz</i>
                    <ul class="header-more-menu">
                    <?php
                        foreach ($categorydata as $key => $value) :                       
                        if($key>=8) :
                    ?>
                        <li><a href="index.php?page=listings&category=<?=$value['name']?>"><?=$value['name']?></a></li>
                    <?php
                        endif;
                        endforeach;
                    ?>
                        <li><a href="index.php?page=listings">All Categories</a></li>
                    </ul>
                </div>
                <!-- /.header-bottom-more -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.header-bottom -->		
    </div>
    <!-- /.header-inner -->
</div>
<!-- /.header -->