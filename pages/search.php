<div class="main-wrapper">
<div class="main">
    <div class="main-inner">
        <div class="content">
            <?php
            	include_once "include/slider.php"
            ?>
            <div class="container">
             <?php
                    if(isset($_SESSION['searchResult'])) :
                    //print_r($_SESSION['searchResult']);
                    $array=$_SESSION['searchResult'];
                ?>
               <div class="page-title">
                    <h2>Search Results</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <div class="cards-wrapper">
                            <div class="row">
                                <?php
                                    foreach ($array as $key => $value) :                                       
                                        $images=explode(',', $value['images']);                                       
                                        $displayimg=$images[0];
                                ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-image" style="background-image: url('images/<?=$displayimg?>');">
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
                                            <h3><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value

['category']?></a></h3>
                                            <h2><a href="index.php?page=listing-detail&id=<?=$value['id']?>"><?=$value

['title']?></a></h2>
                                        </div>
                                        <!-- /.card-content -->
                                        <div class="card-actions">
                                            <a href="#" class="card-action-icon"><i class="md-icon">favorite</i></a>
                                           <!--  <a href="listing-detail.html" class="card-action-icon"><i class="md-

icon">flag</i></a> -->
                                            <a href="index.php?page=listing-detail&id=<?=$value['id']?>" class="card-

action-btn btn btn-transparent">Show More</a>
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
                </div>
                <?php
                 endif;
                 $_SESSION['searchResult']=' ';
                ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.main-inner -->
</div>
<!-- /.main -->
</div>

