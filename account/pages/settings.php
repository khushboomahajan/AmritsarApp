 
 <?php
    require_once "../classes/settings.php";
    $obj=new settings();
    $userData=$obj->profile();
    //print_r($userData);
 ?>
 <div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>User Profile Settings</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Settings</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
        <div class="admin-box">
        <form method="POST" enctype="multipart/form-data" action="../classes/action.php">
            <fieldset>
                <legend>Personal Information</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?=$userData[0]['name']?>">			
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$userData[0]['email']?>">			
                        </div>
                        <!-- /.form-group -->	
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="<?=$userData[0]['mobile']?>">		
                        </div>
                        <!-- /.form-group -->	
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->
            </fieldset>
            <fieldset>
                <legend>Change Address</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="<?=$userData[0]['address']?>">        
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="<?=$userData[0]['city']?>">         
                        </div>
                        <!-- /.form-group -->   
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state" value="<?=$userData[0]['state']?>">         
                        </div>
                        <!-- /.form-group -->   
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->      
            </fieldset>

            <fieldset>
                <legend>Change Password</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Old password</label>
                            <input type="password" class="form-control" name="password">		
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>New password</label>
                            <input type="text" class="form-control" name="new_password">			
                        </div>
                        <!-- /.form-group -->	
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Retype</label>
                            <input type="text" class="form-control" name="retype_password">			
                        </div>
                        <!-- /.form-group -->	
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->		
            </fieldset>

            <fieldset>
                <legend>Upload Image</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image">                              
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->      
            </fieldset>
            <div class="center">
                <button class="btn btn-primary btn-large" type="submit" name="updateuser">Save Settings</button>
            </div>
            <!-- <div class="form-group">
                <div class="checkbox">	
                    <label><input type="checkbox"> Enable admin approval before publishing</label>	
                </div>
               
            </div> -->
            <!-- /.form-group -->
          <!--   <div class="form-group">
                <div class="checkbox">		
                    <label><input type="checkbox" checked="checked"> Enable strong password</label>	
                </div>
                
            </div> -->
            <!-- /.form-group -->
           <!--  <div class="form-group">
                <div class="checkbox">	
                    <label><input type="checkbox"> Everyone can registers</label>	
                </div>
               
            </div> -->
            <!-- /.form-group -->
            <!-- <div class="form-group">
                <div class="checkbox">		
                    <label><input type="checkbox" checked="checked"> Enable user reviews &amp; ratings </label>	
                </div>
               
            </div> -->
            <!-- /.form-group -->
          <!--   <hr> -->
            <!-- <div class="form-group">
                <div class="radio">
                    <label>
                    <input type="radio" name="gridRadios" checked="checked">
                    Option one is this and that—be sure to include why it's great
                    </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="gridRadios">
                    Option two can be something else and selecting it will deselect option one
                    </label>
                </div>
                <div class="radio	">
                    <label>
                    <input type="radio" name="gridRadios">
                    Option three is disabled
                    </label>
                </div>
            </div> -->
            <!-- /.form-group -->
            </form>
        </div>
        <!-- /.admin-box -->
    </div>
    <!-- /.container-fluid -->
</div>