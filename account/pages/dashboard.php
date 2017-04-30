<?php
    require_once "../helpers.php";
    require_once "../classes/mylistings.php";
    require_once "../classes/reviews.php";
    $user=loggedInuser();
    //print_r($user);
    $obj=new mylistings();    
    if($user[0]['role']=='admin'){
        $listings=$obj->getlistingsforadmin();
        $unapprovedlisting=$obj->getunapprovedlisting();
    }else{
        $listings=$obj->getalllistings($user[0]['id']);        
        $unapprovedlisting=$obj->getunapprovedlistingforuser($user[0]['id']);
    }
    $listing_count=count($listings);
    $obj2=new reviews;
    $reviews=$obj2->getreviewsforcurrentUser($user[0]['id']);
    $reviews_count=count($reviews);
    $allrecords=count($obj->Getalllistforuser($user[0]['id']));
?>

 <div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>Welcome <?=$user[0]['name']?></h1>
            <ul class="breadcrumb">
               <!--  <li><a href="index.html">Materialist</a> <i class="md-icon">keyboard_arrow_right</i></li> -->
              <!--   <li class="active">Dashboard</li> -->
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
        <div class="admin-stats">
            <div class="row">
                <div class="col-xs-12 col-lg-6 col-xl-3">
                    <div class="admin-stat lime">
                        <div class="admin-stat-icon">
                            <i class="md-icon">people</i>
                        </div>
                        <!-- /.admin-stat-icon -->
                        <div class="admin-stat-content">
                            <h2>Total Listings</h2>
                            <h3><?=$allrecords?></h3>
                        </div>
                        <!-- /.admin-stat-content -->
                    </div>
                    <!-- /.admin-stat -->
                </div>
                <!-- /.col-* -->
                <div class="col-xs-12 col-lg-6 col-xl-3">
                    <div class="admin-stat blue">
                        <div class="admin-stat-icon">
                            <i class="md-icon">search</i>
                        </div>
                        <!-- /.admin-stat-icon -->
                        <div class="admin-stat-content">
                            <h2>Total Searches</h2>
                            <h3>1,203</h3>
                        </div>
                        <!-- /.admin-stat-content -->
                    </div>
                    <!-- /.admin-stat -->
                </div>
                <!-- /.col-* -->
                <div class="col-xs-12 col-lg-6 col-xl-3">
                    <div class="admin-stat purple">
                        <div class="admin-stat-icon">
                            <i class="md-icon">storage</i>
                        </div>
                        <!-- /.admin-stat-icon -->
                        <div class="admin-stat-content">
                            <h2>Approved Listings</h2>
                            <h3><?=$listing_count?></h3>
                        </div>
                        <!-- /.admin-stat-content -->
                    </div>
                    <!-- /.admin-stat -->
                </div>
                <!-- /.col-* -->
                <div class="col-xs-12 col-lg-6 col-xl-3">
                    <div class="admin-stat brown">
                        <div class="admin-stat-icon">
                            <i class="md-icon">message</i>
                        </div>
                        <!-- /.admin-stat-icon -->
                        <div class="admin-stat-content">
                            <h2>Total Reviews</h2>
                            <h3><?=$reviews_count?></h3>
                        </div>
                        <!-- /.admin-stat-content -->
                    </div>
                    <!-- /.admin-stat -->
                </div>
                <!-- /.col-* -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.admin-stats -->
        <div class="row">
            <div class="col-lg-12 col-xl-7">
               <!--  <div class="admin-box background-primary">
                    <h2><strong>Top</strong> Explore Materialist Admin</h2>
                    <p>
                        Maecenas et porta nulla. Sed feugiat ac felis ut iaculis. Nunc luctus consectetur accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras congue tristique ligula, vitae tristique metus luctus eu.
                    </p>
                    <a href="#" class="btn btn-transparent">Read More</a>
                </div> -->
                <!-- /.admin-box -->
                <div class="admin-box no-padding">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3">Listings Waiting For Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($unapprovedlisting as $key => $value) :
                            ?>
                            <tr>
                                <td><a href="#"><img src="../assets/img/tmp/card-1.jpg" alt=""> <?=$value['title']?></a></td>
                               <!--  <td><a href="#"><img src="../assets/img/tmp/profile-1.jpg" alt=""> Linda A. Libby</a></td> -->
                                <td><a href="#"><?php  $timestamp= strtotime($value['created_at']);
                                                 echo $date = date('d-m-Y', $timestamp);
                                                 ?></a></td>
                                <?php
                                    if($_SESSION['role']=="admin") :
                                ?>
                                <td class="action"><a href="index.php?page=mylistings">View <i class="md-icon">keyboard_arrow_right</i></a></td>
                            <?php 
                                endif;
                            ?>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </tbody>
                       <!--  <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">
                                    <a href="#">Show Queue<i class="md-icon">keyboard_arrow_right</i></a>
                                </td>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
                <!-- /.admin-box -->
            </div>
            <!-- /.col-* -->
            <div class="col-lg-12 col-xl-5">
                <div class="admin-box">
                    <div class="admin-posts">
                        <?php

                            foreach ($listings as $key => $value) :
                            $images=explode(",", $value['images']);
                            foreach ($images as $k => $v) {
                                if(is_array($v)){
                                    $image=$v[0];
                                }else{
                                     $image=$v;
                                }
                            }
                        ?>
                        <div class="admin-post">
                            <div class="admin-post-image">
                                <a href="index.php?page=listingview&viewid=<?=$value['id']?>" style="background-image: url('../images/<?=$image?>');"></a>
                            </div>
                            <!-- /.admin-post-image -->
                            <div class="admin-post-title">
                                <h2><a href="index.php?page=listingview&viewid=<?=$value['id']?>"><?=$value['title']?></a></h2>
                                <h3><?php
                                    $timestamp=strtotime($value['created_at']);
                                    echo $date=date('d-m-Y',$timestamp);
                                ?></h3>
                            </div>
                            <!-- /.admin-post-title -->
                            <!-- <div class="admin-post-action">
                                <a href="#">Edit Post <i class="md-icon">keyboard_arrow_right</i></a>
                            </div> -->
                            <!-- /.admin-post-action -->
                        </div>
                        <!-- /.admin-post -->
                        <?php
                            endforeach;
                        ?>
                    </div>
                    <!-- /.admin-posts -->
                </div>
                <!-- /.admin-box -->
            </div>
            <!-- /.col-* -->
        </div>
        <!-- /.row -->
        <div class="admin-box no-padding">
            <div class="row">
               <!--  <div class="col-lg-12 col-xl-4">
                    <table class="table small-header">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Country</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="../assets/img/flags/czech-republic.png" alt=""> Czech Republic</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="../assets/img/flags/france.png" alt=""> France</td>
                                <td>97%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="../assets/img/flags/spain.png" alt=""> Spain</td>
                                <td>86%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="../assets/img/flags/poland.png" alt=""> Poland</td>
                                <td>76%</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><img src="../assets/img/flags/hungary.png" alt=""> Hungary</td>
                                <td>70%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
 -->                <!-- /.col-* -->
                <!-- <div class="col-lg-12 col-xl-4">
                    <table class="table small-header">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Country</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="../assets/img/flags/czech-republic.png" alt=""> Czech Republic</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="../assets/img/flags/france.png" alt=""> France</td>
                                <td>97%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="../assets/img/flags/spain.png" alt=""> Spain</td>
                                <td>86%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="../assets/img/flags/poland.png" alt=""> Poland</td>
                                <td>76%</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><img src="../assets/img/flags/hungary.png" alt=""> Hungary</td>
                                <td>70%</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><img src="../assets/img/flags/austria.png" alt=""> Austria</td>
                                <td>64%</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- /.col-* -->
              <!--   <div class="col-lg-12 col-xl-4">
                    <table class="table small-header">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Country</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="../assets/img/flags/czech-republic.png" alt=""> Czech Republic</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="../assets/img/flags/france.png" alt=""> France</td>
                                <td>97%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="../assets/img/flags/spain.png" alt=""> Spain</td>
                                <td>86%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="../assets/img/flags/poland.png" alt=""> Poland</td>
                                <td>76%</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- /.col-* -->				
            </div>
            <!-- /.row -->
        </div>
        <!-- /.admin-box -->
    </div>
    <!-- /.container-fluid -->
</div>