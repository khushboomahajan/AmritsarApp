<?php
    require_once "../classes/users.php";
    $obj=new users();
    $usersData=$obj->registeredusers();
?>
<div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>Users Management</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Materialist</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Users</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
        <div style="text-align: right; padding: 10px;">
             <a href="../classes/export.php" class="btn btn-primary" >Export Users</a>
        </div>
        <div class="admin-box no-padding">
            <table class="table small-header">
                <thead>
                    <tr>
                       <!--  <th></th> -->
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Email</th>
                       <!--  <th></th> -->
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($usersData as $key => $value) :
                ?>
                    <tr>
                        <!-- <td class="min-width"><input type="checkbox"></td> -->
                        <td class="min-width">
                            <div class="user-avatar">
                                <img src="../images/<?=$value['profile_img']?>" alt="" style="    height: 40px !important;line-height: 40px;">
                            </div>
                            <!-- /.user-avatar -->
                        </td>
                        <td><?=$value['name']?></td>
                        <td><?=$value['role']?></td>
                        <td><?=$value['mobile']?></td>
                        <td><?=$value['city']?></td>
                        <td><?=$value['email']?></td>
                        <td class="min-width">
                            <!-- <a href="#" class="btn btn-primary"><i class="md-icon">edit</i> Edit</a> -->
                            <!-- <a href="#" class="btn btn-secondary"><i class="md-icon">delete</i> Remove</a> -->
                        </td>
                    </tr>
                <?php
                    endforeach;
                ?>  
                </tbody>
            </table>
            <!-- /.table -->
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