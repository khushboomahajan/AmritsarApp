<?php
  require_once "../classes/categories.php";
  $obj=new categories();
  $categorydata=$obj->allcategories();
  //print_r($categorydata);

?>


<div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>All Categories</h1>
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Categories</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
        <div class="admin-box no-padding">
            <table class="table small-header">
                <thead>
                    <tr>
                        <th>id</th>                        
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                        foreach ($categorydata as $key => $value) :                         
                    ?>                  
                    <tr>
                        <td><?=$value['id']?></td>
                        <td><a href="#"><?=$value['name']?></a></td>
                        <td>
                           <!--  <a href="#" class="btn btn-primary"><i class="md-icon">remove_red_eye</i> View</a> -->
                           
                          <!--   <a href="../classes/action.php?id=<?= $value['id'] ?>" class="btn btn-primary"><i class="md-icon">check</i> Approve</a> -->
                           
                            <a href="#" class="btn btn-secondary"><i class="md-icon">delete</i> Remove</a>
                        </td>
                    </tr>
                  <?php
                    endforeach;
                  ?>
                </tbody>
            </table>
        </div>
        <!-- /.admin-box -->
        <nav class="pagination-wrapper">
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
        </nav>
    </div>
    <!-- /.container-fluid -->
</div>