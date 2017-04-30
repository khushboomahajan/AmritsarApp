
<div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>Add New Category</h1>
            <ul class="breadcrumb">
                <li><a href="#">Materialist</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="#">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Category</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>

        <div class="container">
            <div class="box">

                <form method="POST" action="../classes/action.php">
                    <fieldset>
                        <legend>Create Category</legend>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <!-- /.form-group -->
                    </fieldset>
                    <?php
                   
                        if(isset($_SESSION['category'])) :
                    ?>
                    <span><?= $_SESSION['category'] ?></span>
                    <?php
                        endif;
                        $_SESSION['category']=" ";
                    ?>
                    <div class="center">
                        <button class="btn btn-primary btn-large" type="submit" name="addcategory">ADD CATEGORY</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>
