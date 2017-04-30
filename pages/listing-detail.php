<?php
    
   require_once "classes/listingdetail.php";
   require_once "classes/reviews.php";
   require_once "classes/replies.php";
    if(isset($_GET['id'])){
        $listingid=$_GET['id'];
        $obj = new listingdetail();
        $detailArray=$obj->listdetail($listingid);
        // echo "<pre/>";
        // print_r($detailArray);
        $obj=new reviews();
        $reviews=$obj->getreviews($listingid);
        $replyobj=new replies();
        $replies=$replyobj->readreply($listingid);
    }else{
        echo "Invalid request";
    } 

?> 

 <div class="main-wrapper">
    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="content-title">
                    <div class="container">
                        <h1><?=$detailArray[0]['title']?></h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                            <li class="active"><?=$detailArray[0]['title']?></li>
                        </ul>
                        <!-- /.breadcrumb -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.content-title -->
                <div class="listing-navigation">
                    <a href="#">
                    <i class="md-icon">keyboard_arrow_right</i>
                    </a>
                    <a href="#">
                    <i class="md-icon">favorite_border</i>
                    </a>
                    <a href="#">
                    <i class="md-icon">compare</i>
                    </a>
                    <a href="#">
                    <i class="md-icon">keyboard_arrow_left</i>
                    </a>	
                </div>
                <!-- /.listing-navigation -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-9">
                            <div class="push-top-bottom">
                                <div class="listing-detail">
                                    <div class="gallery">
                                        <?php
                                            $images = explode(',',$detailArray[0]['images']);
                                            foreach($images as $key => $value):
                                        ?>
                                        <div class="gallery-item" style="background-image: url('images/<?= $value ?>');">
                                            <div class="gallery-item-description">
                                              <!-- description if any -->
                                            </div>
                                            <!-- /.gallery-item-description -->
                                        </div>
                                        <?php
                                            endforeach;
                                        ?>              
                                    </div>
                                    <!-- /.gallery -->
                                    <h2>Description</h2>
                                    <p>
                                        <?=$detailArray[0]['description']?>
                                    </p>
                                   <!--  <p>
                                        Integer condimentum sodales metus, quis pellentesque nisi tempor at. Quisque ornare efficitur risus eu bibendum. Donec feugiat consequat magna in interdum. Donec malesuada orci et mi fermentum, ac tincidunt arcu tincidunt. Ut fringilla tellus sem, quis rhoncus dolor condimentum id. Vivamus ut commodo felis. Fusce in lacus egestas, mattis ex et, molestie est.
                                    </p> -->
                                    <h2>Facilities</h2>
                                   
                                    <ul class="amenities">
                                     <?php
                                        $facilities=explode(',', $detailArray[0]['facilities']);
                                        //print_r($facilities);
                                        foreach ($facilities as $key => $value) {
                                                                                  
                                    ?>

                                        <li class="yes"><?=ucwords($value)?></li>
                                       
                                        <?php
                                         }
                                        ?>
                                    </ul>
                                   <?php
                                    if($detailArray[0]['day'] != NULL):
                                        
                                   ?>
                                    <h2>Opening Hours</h2>
                                    <div class="opening-hours-wrapper">
                                        <table class="opening-hours">
                                            <thead>
                                                <tr>
                                                <?php
                                                    foreach ($detailArray as $key => $value) :
                                                      
                                                ?>
                                                    <th><?= ucwords($value['day']);?></th>
                                                    
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php
                                                    foreach ($detailArray as $key => $value) :
                                                ?>
                                                    <td class="open">
                                                        <span class="from"><?=$value['from_time']?></span> <span class="separator">-</span> <span class="to"><?=$value['to_time']?></span>                        
                                                    </td>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                        endif;
                                    ?>
                                    <!-- /.opening-hours-wrapper -->	
                                    <h2>Social Connections</h2>
                                    <ul class="social">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li class="tripadvisor"><a href="#"><i class="fa fa-tripadvisor"></i></a></li>
                                    </ul>
                                    <h2>Listing Position</h2>
                                    <div id="map" style="height: 300px;width: 100%;"></div>
                                    <!-- /.listing-position -->				
                                  <!--   <div class="call-to-action-small">
                                        <h1>Looking for more comfortable experience?</h1>
                                        <h2>Check out our mobile application and browse the properties as no other.</h2> -->
                                       <!--  <div class="call-to-action-small-buttons">
                                            <a href="#" class="btn btn-secondary"><i class="fa fa-apple"></i> Download iOS</a>
                                            <a href="#" class="btn btn-secondary"><i class="fa fa-android"></i> Download Android</a>
                                        </div> -->
                                        <!-- /.call-to-action-small-buttons -->
                                    <!-- </div> -->
                                    <!-- /.call-to-action-small --> 				
                                    <h2><?=count($reviews)?> comments in this topic</h2>
                                    <ul class="comments">
                                        <?php 
                                            foreach ($reviews as $key => $value) :
                                                // if($value['status']=='1') :
                                        ?>
                                        <li>
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <a href="#" style="background-image: url('images/<?=$value['profile_img']?>');"></a>
                                                </div>
                                                <!-- /.comment-author -->
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <div class="comment-meta-author">
                                                            Posted by <a href="#"><?=$value['username']?></a>
                                                        </div>
                                                        <!-- /.comment-meta-author -->
                                                        <div class="comment-meta-reply">
                                                            <a href="javascript:;" class="replyComment" data-id="<?=$value['id']?>">Reply</a>
                                                        </div>
                                                        <div class="comment-meta-date">
                                                            <span>
                                                            <?php
                                                            $timestamp= strtotime($value['created_at']);
                                                            $date = date('d-m-Y', $timestamp);
                                                            $time = date('h:i A ', $timestamp);
                                                            echo $time." ".$date;
                                                            ?>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <!-- /.comment -->
                                                    <div class="comment-body">
                                                    <?php
                                                        if($value['rating']=='5') :
                                                    ?>
                                                        <div class="comment-rating">
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                        </div>
                                                        <?php
                                                            endif;
                                                             if($value['rating']=='4') :
                                                        ?>
                                                        <div class="comment-rating">
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star_border</i>
                                                        </div>
                                                        <?php
                                                            endif;
                                                            if($value['rating']=='3') :
                                                        ?>
                                                        <div class="comment-rating">
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                        </div>
                                                        <?php
                                                            endif;
                                                            if($value['rating']=='2') :
                                                        ?>
                                                        <div class="comment-rating">
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                        </div>
                                                        <?php
                                                            endif;
                                                            if($value['rating']=='1') :
                                                        ?>
                                                        <div class="comment-rating">
                                                            <i class="md-icon">star</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                            <i class="md-icon">star_border</i>
                                                        </div>
                                                        <?php
                                                            endif;
                                                        ?>
                                                        <!-- /.comment-rating -->
                                                       <?=$value['review']?>
                                                    </div>
                                                    <!-- /.comment-body -->
                                                </div>
                                                <!-- /.comment-content -->
                                            </div>
                                            <!-- /.comment -->	
                                            <?php
                                                if($value['parent_id']== '1'):
                                            ?>	
                                            <ul>
                                                <?php
                                                    foreach ($replies as $k => $val) :
                                                ?>
                                                <li>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#" style="background-image: url('images/<?= $val['profile_img']?>');"></a>
                                                        </div>
                                                        <!-- /.comment-author -->
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <div class="comment-meta-author">
                                                                    Posted by <a href="#"><?=$val['name']?></a>
                                                                </div>
                                                                <!-- /.comment-meta-author -->
                                                                <!-- <div class="comment-meta-reply">
                                                                    <a href="#">Reply</a>
                                                                </div> -->
                                                                <div class="comment-meta-date">
                                                                    <span>
                                                                    <?php
                                                                        $timestamp= strtotime($val['created_at']);
                                                                        $date = date('d-m-Y', $timestamp);
                                                                        $time = date('h:i A ', $timestamp);
                                                                        echo $time." ".$date;
                                                                    ?>

                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- /.comment -->
                                                            <div class="comment-body">
                                                                <div class="comment-rating">
                                                                <?php
                                                                    if($val['rating']=='5') :
                                                                ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                   <!--  <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i> -->
                                                                <?php
                                                                    endif;
                                                                    if($val['rating']=='4') :
                                                                ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php
                                                                    endif;
                                                                    if($val['rating']=='3') :
                                                                ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php
                                                                    endif;
                                                                    if($val['rating']=='2') :
                                                                ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php
                                                                    endif;
                                                                    if($val['rating']=='1') :
                                                                ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php
                                                                    endif;
                                                                ?>
                                                                </div>
                                                                <!-- /.comment-rating -->
                                                               <?=$val['reply']?>
                                                            </div>
                                                            <!-- /.comment-body -->
                                                        </div>
                                                        <!-- /.comment-content -->
                                                    </div>
                                                    <!-- /.comment -->									
                                                </li>
                                                <?php
                                                    endforeach;
                                                ?>
                                            </ul>
                                            <?php
                                                endif;
                                            ?>
                                        </li>
                                       <?php
                                            // endif;
                                            endforeach;
                                       ?>
                                    </ul>
                                    <h2 id="comment">Write Feedback</h2>
                                    <div class="comment-create clearfix">
                                        <form method="POST" action="classes/action.php">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" rows="5" name="review"></textarea>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="row">
                                                <div class="col-sm-4">
                                                   <!--  <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="username">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label>Rating</label>
                                                        <div style="margin-top: 11%;">
                                                            <input type="radio" name="rating" value="1" class="form-control">
                                                            <input type="radio" name="rating" value="2" class="form-control">
                                                            <input type="radio" name="rating" value="3" class="form-control">
                                                            <input type="radio" name="rating" value="4" class="form-control">
                                                            <input type="radio" name="rating" value="5" class="form-control">
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col-* -->
                                               <!--  <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control" name="email">
                                                    </div> -->
                                                    <!-- /.form-group -->
                                               <!--  </div> -->
                                                <!-- /.col-* -->
                                               <!--  <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Rating</label>
                                                        <div style="margin-top: 11%;">
                                                            <input type="radio" name="rating" value="1" class="form-control">
                                                            <input type="radio" name="rating" value="2" class="form-control">
                                                            <input type="radio" name="rating" value="3" class="form-control">
                                                            <input type="radio" name="rating" value="4" class="form-control">
                                                            <input type="radio" name="rating" value="5" class="form-control">
                                                        </div>
                                                        
                                                    </div> -->
                                                    <!-- /.form-group -->				
                                                <!-- </div> -->
                                                <input type="hidden" name="listid" value="<?=$_GET['id']?>">
                                                <div class="col-sm-4">
                                                <?php
                                                    if(isset($_SESSION['message'])) :
                                                ?>
                                                    <p style="margin-left: 16px;color: red;font-size: 20px;"><?=$_SESSION['message']?></p>
                                                <?php
                                                    endif;
                                                    $_SESSION['message']=" ";
                                                ?> 
                                                </div>   
                                                <!-- /.col-* -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="form-group-btn">
                                                <button type="submit" name="postreview" class="btn btn-primary btn-large pull-right">Post Comment</button>
                                            </div>
                                            <!-- /.form-group-btn -->
                                        </form>
                                    </div>
                                    <!-- /.comment-create -->
                                </div>
                                <!-- /.listing-detail -->
                            </div>
                            <!-- /.push-top-bottom -->
                        </div>
                        <!-- /.col-sm-9 -->
                        <div class="col-md-4 col-lg-3">
                            <div class="sidebar">
                                <div class="widget">
                                    <div class="overview">
                                        <ul>
                                          <!--   <li><strong>Price</strong><span>180$ / person</span></li> -->
                                            <li><strong>Location</strong><span><?= $detailArray[0]['city'].", ".$detailArray[0]['country'] ?></span></li>
                                            <li><strong>Category</strong><span><?= $detailArray[0]['category'] ?></span></li>
                                           <!--  <li><strong>Rating</strong><span>4.2 by 2 users</span></li> -->
                                            <li><strong>Phone</strong><span><?=$detailArray[0]['phone_no']?></span></li>
                                            <li><strong>Website</strong><span><a href="<?=$detailArray[0]['website']?>"><?=$detailArray[0]['website']?></a></span></li>
                                        </ul>
                                    </div>
                                    <!-- /.overview -->
                                </div>
                                <!-- /.widget -->
                                <div class="widget">
                                    <h2 class="widgettitle">Contact Information</h2>
                                    <ul class="contact">
                                        <li><i class="md-icon">email</i> <a href="mailto:hi@example.com"><?=$detailArray[0]['email']?></a></li>
                                        <li><i class="md-icon">link</i> <a href="<?=$detailArray['website']?>"><?=$detailArray[0]['website']?></a></li>
                                        <li><i class="md-icon">phone</i><?=$detailArray[0]['phone_no']?></li>
                                        <li><i class="md-icon">location_on</i><?=$detailArray[0]['address']?><br><?=$detailArray[0]['city']?>, <?=$detailArray[0]['country']?></li>
                                    </ul>
                                </div>
                                <!-- /.widget -->
                                
                                <!-- /.widget -->
                            </div>
                            <!-- /.sidebar -->
                        </div>
                        <!-- /.col-* -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.main-inner -->
    </div>
    <!-- /.main -->
</div>

<script>

      function initMap() {
        var myLatLng = {lat: <?=$detailArray[0]['geo_lat']?>, lng: <?=$detailArray[0]['geo_long']?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          draggable: true,
           title: 'Hello World!'
        });
        var infowindow = new google.maps.InfoWindow({
            content: "<div><h1>Hello World!!</h1></div>",

            // Assign a maximum value for the width of the infowindow allows
            // greater control over the various content elements
            maxWidth: 350
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
          });
        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("latbox").value = this.getPosition().lat();
            document.getElementById("lngbox").value = this.getPosition().lng();

        });
      }
</script>