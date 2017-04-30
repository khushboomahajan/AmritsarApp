<?php
 require_once "classes/home.php";
    $obj=new home();
    $categories=$obj->categories();

?>


<div class="hero" style="background-image: url('assets/img/tmp/hero.jpg'); ">
    <div class="hero-content">
        <div class="container">
            <h1>Amritsar Business Directory</h1>
            <p>
               ABD provides detailed information about the businesses in Amritsar. This can help you to search for the famous places in Amritsar and many more. 
            </p>
          <!--   <a href="#" class="btn btn-primary">Show Pricing</a> -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.hero-content -->
    <div class="hero-form ">
        <div class="container">
            <form method="POST" action="classes/action.php">
                <div class="input-group first col-sm-12 col-md-4">
                    <div class="input-group-addon">
                        <i class="md-icon">my_location</i>
                    </div>
                    <!-- /.input-group-addon -->
                    <input type="text" class="form-control" name="location" placeholder="Type your location">
                </div>
                <!-- /.input-group  -->
                <div class="input-group col-sm-12 col-md-6">
                    <div class="input-group-addon">
                        <i class="md-icon">search</i>
                    </div>
                    <!-- /.input-group-addon -->
                    <input type="text" class="form-control" name="place" placeholder="Search for spot, event or a restaurant">
                </div>
                <!-- /.input-group  -->				
                <div class="form-group last col-sm-12 col-md-2">
                    <button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
                </div>
                <!-- /.col-* -->
            </form>
            <div class="hero-form-sub">
                <strong class="hidden-sm-down">Or search by category</strong>
                <ul>
                    <?php
                        foreach ($categories as $key => $value) :
                    ?>
                    <li><a href="index.php?page=listings&category=<?=$value['name']?>"><?=$value['name']?></a></li>                   
                   
                    <?php
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.hero-form -->	
    <div class="hero-layer"></div>
</div>
<!-- /.hero -->