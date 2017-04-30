 
<?php
    require_once "classes/alllistings.php";
    
    $obj=new alllistings();
    if(isset($_GET['category'])){
         $listingsArray = $obj->listingsbycategory($_GET['category']); 
        
    }else{
         $listingsArray = $obj->listings(); 
    }

    $alllistings=$obj->recentlistings();  
      
?>

 <div class="main-wrapper">
    <div class="main">
        <div class="main-inner">
            <div class="content-title">
                <div class="container">
                    <h1>Listings</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                        <li class="active">Listings</li>
                    </ul>
                    <!-- /.breadcrumb -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-title -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                        <div class="content">
                            <div class="push-top-bottom">
                                <!-- <div class="filter filter-white">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>New York</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div> -->
                                            <!-- /.form-group -->
                                        <!-- </div> -->
                                        <!-- /.col-* -->
                                       <!--  <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Keyword">
                                            </div> -->
                                            <!-- /.form-group -->
                                        <!-- </div> -->
                                        <!-- /.col-* -->
                                      <!--   <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Price from">
                                            </div> -->
                                            <!-- /.form-group -->
                                        <!-- </div> -->
                                        <!-- /.col-* -->
                                     <!--    <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Price to">
                                            </div> -->
                                            <!-- /.form-group -->		
                                        <!-- </div> -->
                                        <!-- /.col-* -->
                                       <!--  <div class="col-md-2">
                                            <div class="form-group-btn form-group-btn-placeholder-gap">
                                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                            </div> -->
                                            <!-- /.form-group -->		
                                        <!-- </div> -->
                                        <!-- /.col-* -->			
                                    <!-- </div> -->
                                    <!-- /.row --> 
                                <!-- </div> -->
                                <!-- /.filter -->
                                <div class="row">
                                <?php
                                    if(empty($listingsArray)){
                                ?>
                                    <h4 style="text-align: center;color: #df2f2f;font-weight: bold;">No Listings Added Yet</h4>
                                <?php
                                    }else{
                                        foreach ($listingsArray as $key => $value) : 
                                        $images=explode(",", $value['images']);                                 
                                        foreach ($images as $key => $v) {
                                            if(is_array($v)){
                                                $image=$v;
                                            }else{
                                                 $image=$v;
                                            }
                                        }
                                    
                                ?>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-image" style="background-image: url('images/<?=$image?>');">
                                                <a href="index.php?page=listing-detail&id=<?=$value['id']?>"></a> 
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
                                                <h3><a href="listing-detail.html"><?= $value['category']?></a></h3>
                                                <h2><a href="listing-detail.html"><?= $value['title']?></a></h2>
                                            </div>
                                            <!-- /.card-content -->
                                            <div class="card-actions">
                                                <a href="listing-detail.html" class="card-action-icon">
                                                <!-- <i class="md-icon">favorite</i> -->
                                                </a>
                                                <a href="listing-detail.html" class="card-action-icon">
                                               <!--  <i class="md-icon">flag</i> -->
                                                </a>
                                                <a href="index.php?page=listing-detail&id=<?=$value['id']?>" class="card-action-btn btn btn-transparent">Show More</a>
                                            </div>
                                            <!-- /.card-actions -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <?php
                                        
                                        endforeach;
                                    }
                                    ?>
                                    <!-- /.col-* -->
                                </div>
                                <!-- /.row -->
                               <!--  <nav class="pagination-wrapper">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav> -->
                            </div>
                            <!-- /.push-top-bottom -->
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-md-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widgettitle">Recent Listings</h2>
                                <div class="cards-small-wrapper">
                                    <?php
                                       
                                        foreach ($alllistings as $key => $value) :
                                            $images=explode(",", $value['images']);
                                            foreach ($images as $k => $v) {
                                                if(is_array($v)){
                                                    $image=$v[0];
                                                }else{
                                                     $image=$v;
                                                }
                                            }
                                    ?>
                                    <div class="card-small">
                                        <div class="card-small-image">
                                            <a href="index.php?page=listing-detail&id=<?=$value['id']?>" style="background-image: url('images/<?=$image?>');"></a>
                                        </div>
                                        <!-- /.card-small-image -->
                                        <div class="card-small-content">
                                            <h3><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value['title']?></a></h3>
                                            <h4><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value['category']?></a></h4>
                                        </div>
                                        <!-- /.card-small-content -->
                                    </div>
                                    <?php
                                        endforeach;
                                    ?>
                                    <!-- /.card-small -->
                                </div>
                                <!-- /.cards-small-wrapper -->
                            </div>
                            <!-- /.widget -->
                           <!--  <div class="widget">
                                <h2 class="widgettitle">Reviews</h2>
                                <div class="reviews"> -->
                            
                                   <!--  <div class="review">
                                        <a href="#" class="review-user" style="background-image: url('assets/img/tmp/profile-1.jpg');"></a> -->
                                    <!--     <div class="review-content">
                                            <h3><a href="listing-detail.html">See H. Oceguera</a></h3>
                                            <div class="review-rating"><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i></div> -->
                                            <!-- /.review-rating -->
                                       <!--  </div> -->
                                        <!-- /.review-content -->
                                    <!-- </div> -->
                                    <!-- /.review -->
                               <!--  </div> -->
                                <!-- /.reviews -->
                           <!--  </div> -->
                            <!-- /.widget -->
                            <div class="widget">
                                <h2 class="widgettitle">Navigation</h2>
                                <ul class="menu nav nav-stacked">
                                    <li class="nav-item">
                                        <a href="account/index.php?page=mylistings&p=1" class="nav-link">Listings</a>			
                                    </li>
                                   <!--  <li class="nav-item">
                                        <a href="blog.html" class="nav-link">Blog</a>		
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="account/index.php?page=dashboard" class="nav-link">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?page=createlisting" class="nav-link">Upoad Listing</a>					
                                    </li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!-- /.sidebar -->
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.main-inner -->
    </div>
    <!-- /.main -->
</div>