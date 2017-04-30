
<?php

    require_once "classes/categories.php";
    $obj=new categories();
    $categorydata=$obj->allcategories();

?>

<div class="main-wrapper">
    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="content-title">
                    <div class="container">
                        <h1>Submit Listing</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                            <li class="active">Submit Listing</li>
                        </ul>
                        <!-- /.breadcrumb -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.content-title -->
                <div class="container push-top-bottom">
                    <div class="box">
                        <form method="POST" action="classes/action.php" enctype="multipart/form-data" id="listingForm">
                            <fieldset>
                                <legend>Select Category</legend>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category" required>
                                        <?php
                                            foreach ($categorydata as $key => $value) :                                               
                                        ?>
                                        <option><?=$value['name']?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                       <!--  <option>Hotels</option>
                                        <option>Hospitals</option>
                                        <option>Travel</option>
                                        <option>Food & Drink</option>
                                        <option>Beauty</option>
                                        <option>Jobs</option>
                                        <option>Shopping</option>
                                        <option>Property</option>
                                        <option>Education</option>
                                        <option>Book Store</option>
                                        <option>Fitness</option>
                                        <option>Computer</option>
                                        <option>Repairing Shops</option>
                                        <option>Industries</option>
                                        <option>Jewellers</option>
                                        <option>Sweets</option>
                                        <option>Marble House</option>
                                        <option>Dealers</option>
                                        <option>Color Lab</option> -->
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </fieldset>
                            <fieldset>
                                <legend>Basic Information</legend>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="6" name="description" required></textarea>
                                </div>
                                <!-- /.form-group -->
                            </fieldset>
                          
                            <fieldset>
                                <legend>Contact Information</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="country" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phoneno" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" name="website">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col-* -->
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Availability</legend>
                                <div class="row">
                                    <div class="checkbox-list">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="monday" name="day[Monday]"> Monday</label>
                                            <div style="width: 85%;">
                                                <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Monday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Monday][to]" class="form-control">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="tuesday" name="day[Tuesday]"> Tuesday</label>
                                            <div style="width: 85%;">
                                                 <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Tuesday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Tuesday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="wednesday" name="day[Wednesday]"> Wednesday</label>
                                            <div style="width: 85%;">
                                                <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Wednesday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Wednesday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="thursday" name="day[Thursday]"> Thursday</label>
                                            <div style="width: 85%;">
                                                 <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Thursday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Thursday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="friday" name="day[Friday]"> Friday</label>
                                            <div style="width: 85%;">
                                                 <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Friday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Friday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="saturday" name="day[Saturday]"> Saturday</label>
                                            <div style="width: 85%;">
                                                <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Saturday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Saturday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="sunday" name="day[Sunday]"> Sunday</label>
                                            <div style="width: 85%;">
                                                 <div style="float: left;width: 40%;">
                                                     <label>From</label>
                                                    <input type="text" name="time[Sunday][from]" class="form-control">
                                                </div>
                                                <div style="float: left;width: 40%;margin-left: 20px;">
                                                    <label>To</label>
                                                    <input type="text" name="time[Sunday][to]" class="form-control">
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.checkbox-->
                                    </div>                              
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Facilities</legend>
                                <div class="checkbox-list">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="facilities[]" value="wifi"> Wi-Fi</label>
                                        <div style="width: 85%;">
                                            <select name="wifi" class="form-control">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.checkbox-->
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="facilities[]" value="parking"> Parking</label>
                                         <div style="width: 85%;">
                                            <input type="text" name="parking" class="form-control" >
                                        </div>
                                    </div>
                                    <!-- /.checkbox-->
                                  
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="facilities[]" value="music"> Music</label>
                                        <div style="width: 85%;">
                                            <input type="text" name="music" class="form-control">
                                        </div>
                                    </div>
                                    <!-- /.checkbox-->
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="facilities[]" value="meals"> Meals Served</label>
                                        <div style="width: 85%; margin-top: 20px;" class="checkbox">
                                            <label><input type="checkbox" name="meals[]" value="breakfast">Breakfast</label>
                                            <label><input type="checkbox" name="meals[]" value="lunch">Lunch</label>
                                            <label><input type="checkbox" name="meals[]" value="dinner">Dinner</label>
                                            <label><input type="checkbox" name="meals[]" value="desert">Desert</label>
                                        </div>
                                    </div>
                                    <!-- /.checkbox-->
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="facilities[]" value="appointment"> Appointment</label>
                                         <div style="width: 85%">
                                            <select name="appointment" class="form-control">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.checkbox-list -->
                            </fieldset>
                            <fieldset>
                                <legend>Upload Images</legend>
                                <div>
                                    <input type="file" name="images[]" multiple required />
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Select Location</legend>
                                <div id="map" style="height: 300px;width: 100%;"></div>
                                 <input type="hidden" name="geo_lat" value="" id="latbox" />
                                 <input type="hidden" name="geo_long" value="" id="lngbox" />
                            </fieldset>
                            <div class="center">
                                <button class="btn btn-primary btn-large" type="submit" name="submit">Submit Listing</button>
                            </div>
                            <!-- /.center -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.main-inner -->
    </div>
    <!-- /.main -->
</div>

<script>

      function initMap() {
        var myLatLng = {lat: 31.6339793, lng: 74.8722642};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          draggable: true,
          
        });
       
        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("latbox").value = this.getPosition().lat();
            document.getElementById("lngbox").value = this.getPosition().lng();

        });
      }
</script>

