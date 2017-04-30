<?php
	 require_once "../classes/mylistings.php";
	 if(isset($_GET['viewid'])){
	        $obj=new mylistings();
	        $viewData=$obj->view($_GET['viewid']);
	      //  print_r($viewData);
	 }
?>

<div class="admin-content">
	<div class="container-fluid">
		<div class="admin-title">
            <h1><?=$viewData[0]['title']?></h1>
            <ul class="breadcrumb" style="margin-right: 80px;">                
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Listing View</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
		
		 	<div class="container">
		 	<div class="row">
		 		<div class="col-md-8 col-lg-9">
					  <div class="gallery">
				        <?php
				            $images = explode(',',$viewData[0]['images']);
				           // print_r($images);
				            //exit;
				            foreach($images as $key => $value):
				        ?>
				        <div class="gallery-item" style="background-image: url('../images/<?= $value ?>');">
				            <div class="gallery-item-description">
				              <!-- description if any -->
				            </div>
				            <!-- /.gallery-item-description -->
				        </div>
				        <?php
				            endforeach;
				        ?>              
				    </div>
				
			    </div>
		    </div>
        </div>
	</div>
</div>