<?php
    
    require_once "classes/home.php";
    $obj=new home();
    $featuedlist= $obj->featuredbusiness();
    $categories=$obj->categories();
    $listing=$obj->totallisting();
    $totallisting=count($listing);
    $totalcategories=count($categories);
    $registereduser=$obj->totalusers();
    $recentlisting=$obj->recentlisting();

?>

<div class="main-wrapper">
<div class="main">
    <div class="main-inner">
        <div class="content">
            <?php
            	include_once "include/slider.php"
            ?>
            <div class="container">
            
                <div class="page-title">

                    <h2>Featured Businesses</h2>
                    <p>
                        <!-- Maecenas augue magna, mollis a dictum id, ornare ac turpis. Morbi vel faucibus ligula. -->
                    </p>
                </div>
                <!-- /.page-title -->
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <div class="cards-wrapper">
                            <div class="row">
                                <?php
                                    foreach ($featuedlist as $key => $value) :                                        
                                        $images=explode(',', $value['images']);                                       
                                        $displayimg=$images[0];
                                ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-image" style="background-image: url('images/<?=$displayimg?>');">
                                            <a href="index.php?page=listing-detail&id=<?=$value['listing_id']?>"></a> 
                                            <div class="card-image-rating">
                                                <i class="md-icon">star</i>
                                                <i class="md-icon">star</i>
                                                <i class="md-icon">star</i>
                                                <i class="md-icon">star</i>
                                                <i class="md-icon">star</i>
                                            </div>
                                            <!-- /.card-image-rating -->
                                        </div>
                                        <!-- /.card-image -->
                                        <div class="card-content">
                                            <h3><a href="index.php?page=listing-detail&id=<?=$value['listing_id']?>"><?=$value['category']?></a></h3>
                                            <h2><a href="index.php?page=listing-detail&id=<?=$value['listing_id']?>"><?=$value['title']?></a></h2>
                                        </div>
                                        <!-- /.card-content -->
                                        <div class="card-actions">
                                            <a href="#" class="card-action-icon">
                                            <!-- <i class="md-icon">favorite</i> -->
                                            </a>
                                           <!--  <a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a> -->
                                            <a href="index.php?page=listing-detail&id=<?=$value['listing_id']?>" class="card-action-btn btn btn-transparent">Show More</a>
                                        </div>
                                        <!-- /.card-actions -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <?php
                                    endforeach;
                                ?>
                                <!-- /.col-* -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-wrapper -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-2 hidden-lg-down">
                        <div class="your-space">
                            <p>
                                Do you want to be here?
                            </p>
                            <a href="#" class="btn btn-primary btn-block">98974-46469</a>
                            <a id="contact" class="btn btn-secondary btn-block">Contact</a>
                        </div>
                        <!-- /.your-space -->
                    </div>
                    <!-- /.col-* -->		
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
            <!-- /.push-bottom -->
            <!-- /.boxes -->
            <div class="container">
                <div class="page-title">
                    <h2>Directory Categories</h2>
                    <p>
                   <!--    Categories list that you can search for in Amritsar.
                      Search for the listing in amritsar by using the categories. -->
                      Refine your search for the famous places by using the category name. Famous categories are displayed below.
                    </p>
                </div>
                <!-- /.page-title -->
                <div class="cards-wrapper">
                    <div class="row">
                        <?php
                            foreach ($categories as $key => $value) :
                        ?>
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="card">
                                <!-- <div class="card-image small no-line" style="background-image: url('assets/img/tmp/category-1.jpg');"> -->
                                <?php
                                            if($value['name'] == 'News') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/news.jpg');"> 
                                        <?php
                                            endif;
                                             if($value['name'] == 'Education') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/education.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Hotels') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/hotels.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Hospitals') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/hospital.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Travel') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/travel.JPG');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Food & Drink') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/food.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Beauty') :
                                        ?>
                                         <div class="card-image small no-line" style="background-image: url('images/beauty.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Shopping') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/shopping.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Property') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('assets/img/tmp/category-1.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Jobs') :
                                        ?>
                                         <div class="card-image small no-line" style="background-image: url('images/jobs.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Book Store') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/bookstore.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Fitness') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/fitness.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Jewellers') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/jewellers.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Repairing Shops') :
                                        ?>
                                       <div class="card-image small no-line" style="background-image: url('images/repairing shop.JPG');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Industries') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/industries.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Marble House') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/marblehouse.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Color Lab') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/colorlabs.jpeg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Dealers') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/dealers.jpg');"> 
                                        <?php
                                            endif;
                                            if($value['name'] == 'Computer') :
                                        ?>
                                        <div class="card-image small no-line" style="background-image: url('images/compuers.jpg');"> 
                                        <?php
                                            endif;
                                        ?>
                                    <a href="index.php?page=listings&category=<?=$value['name']?>"></a>
                                    <div class="card-image-icon">
                                        <?php
                                            if($value['name'] == 'News') :
                                        ?>
                                        <i class="md-icon">assignment</i>
                                        <?php
                                            endif;
                                             if($value['name'] == 'Education') :
                                        ?>
                                        <i class="md-icon">books</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Hotels') :
                                        ?>
                                         <i class="md-icon">hotel</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Hospitals') :
                                        ?>
                                        <i class="md-icon">add_circle</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Travel') :
                                        ?>
                                        <i class="md-icon">train</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Food & Drink') :
                                        ?>
                                        <i class="md-icon">restaurant_menu</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Beauty') :
                                        ?>
                                         <i class="md-icon">business</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Shopping') :
                                        ?>
                                        <i class="md-icon">shopping_basket</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Property') :
                                        ?>
                                         <i class="md-icon">home</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Jobs') :
                                        ?>
                                         <i class="md-icon">bookmark</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Book Store') :
                                        ?>
                                        <i class="md-icon">library_books</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Fitness') :
                                        ?>
                                        <i class="md-icon">style</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Jewellers') :
                                        ?>
                                        <i class="md-icon">shopping_basket</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Repairing Shops') :
                                        ?>
                                        <i class="md-icon">store</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Industries') :
                                        ?>
                                        <i class="md-icon">business_center</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Marble House') :
                                        ?>
                                        <i class="md-icon">store</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Color Lab') :
                                        ?>
                                        <i class="md-icon">building</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Dealers') :
                                        ?>
                                        <i class="md-icon">home</i>
                                        <?php
                                            endif;
                                            if($value['name'] == 'Computer') :
                                        ?>
                                        <i class="md-icon">laptop_windows</i>
                                        <?php
                                            endif;
                                        ?>

                                    </div>
                                    <!-- /.card-image-icon -->
                                    <div class="card-image-count">
                                       <!--  <strong>12</strong>
                                        <span>items</span> -->
                                    </div>
                                    <!-- /.card-image-count -->
                                </div>
                                <!-- /.card-image -->
                                <div class="card-content">
                                    <h2>
                                        <a href="index.php?page=listings&category=<?=$value['name']?>"><?= $value['name']?></a>
                                        <a href="index.php?page=listings&category=<?=$value['name']?>" class="btn btn-transparent">Show All</a>
                                    </h2>
                                </div>
                                <!-- /.card-content -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <?php
                            endforeach;
                        ?>
                        <!-- /.col-* -->                        
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.cards-wrapper -->
            </div>
            <!-- /.container -->
            <div class="counter">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <h2>Best Results Till Date</h2>
                        </div>
                        <!-- /.col-* -->
                        <div class="col-sm-12 col-md-9">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="md-icon">layers</i> 
                                    <h3><?=$totallisting?></h3>
                                    <p>Listings added</p>
                                </div>
                                <!-- /.col-* -->
                                <div class="col-sm-4">
                                    <i class="md-icon">location_city</i> 
                                    <h3><?=$totalcategories?></h3>
                                    <p>categories</p>
                                </div>
                                <!-- /.col-* -->					
                                <div class="col-sm-4">
                                    <i class="md-icon">people</i> 
                                    <h3><?=$registereduser?></h3>
                                    <p>Registered Users</p>
                                </div>
                                <!-- /.col-* -->		
                                <!-- <div class="col-sm-3">
                                    <i class="md-icon">public</i> 
                                    <h3>408</h3>
                                    <p>Companies</p>
                                </div> -->
                                <!-- /.col-* -->														
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col-* -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.container -->
            <div class="push-bottom">
                <div class="container">
                    <div class="page-title background-white">
                        <h2>Recent Listings Added</h2>
                        <!-- <p>Best spots and events in your city hand picked by Materialist stuff</p> -->
                    </div>
                    <!-- /.page-title -->
                    <div class="row">
                        <?php
                           foreach ($recentlisting as $key => $value) :
                        ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <?php
                                    $image=explode(',', $value['images']);
                                    $images=$image[0];
                                ?>
                                <div class="card-image" style="background-image: url('images/<?=$images?>');">
                                    <a href="index.php?page=listing-detail&id=<?=$value['id']?>"></a>
                                </div>
                                <?php
                                ?>
                                <!-- /.card-image -->
                                <div class="card-content">
                                    <h3><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value['category']?></a></h3>
                                    <h2><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value['title']?></a></h2>
                                </div>
                                <!-- /.card-content -->
                                <div class="card-actions">
                                 <!--    <a href="index.php?page=listing-detail&id=<?=$value['id']?>" class="card-action-icon"><i class="md-icon">insert_comment</i><span> 12</span></a> -->
                                    <a href="index.php?page=listing-detail&id=<?=$value['id']?>" class="card-action-icon"><i class="md-icon">access_time</i><span><?php
                                          $timestamp= strtotime($value['created_at']);
                                          echo $date = date('d-m-Y', $timestamp);

                                    ?></span></a>
                                    <a href="index.php?page=listing-detail&id=<?=$value['id']?>" class="card-action-btn btn btn-transparent">Read More</a>
                                </div>
                                <!-- /.card-actions -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <?php
                            endforeach;
                        ?>
                        <!-- /.col-* -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.push-bottom -->
            <div class="cta">
                <div class="container">
                    <h2>Join our listing community</h2>
                    <p> 
                        
                    </p>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.cta -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.main-inner -->
</div>
<!-- /.main -->
</div>

