<?php
    require_once "../classes/replies.php";
    $obj= new replies();
    $allreply=$obj->getreplies();
    // print_r($allreply);
?>
<div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>Manage Reviews </h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Materialist</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Replies</li>
            </ul>
            <!-- /.breadcrumb -->   
        </div>
        <!-- /.admin-title -->
        <div class="admin-reviews">
            <table class="table">
                <thead>
                    <th>User</th>
                    <th>Reply</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                  <?php
                    foreach ($allreply as $key => $value) :
                  ?> 
                    <tr>
                        <td>
                            <div class="admin-reviews-profile">
                                <img src="../images/<?=$value['profile_img']?>" alt=""> 
                                <div class="admin-reviews-profile-content">
                                    <span><?=$value['name']?></span>
                                    <div class="admin-reviews-rating">
                                    <?php
                                        if($value['rating']=='5'):
                                    ?>                                      
                                        <i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i>
                                    <?php
                                        endif;
                                        if($value['rating']=='4') :
                                    ?>                                      
                                         <i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i>
                                    <?php
                                        endif;
                                        if($value['rating']=='3') :
                                    ?>
                                         <i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i>
                                    <?php
                                        endif;
                                        if($value['rating']=='2') :
                                    ?>
                                    <i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i>
                                    <?php
                                        endif;
                                        if($value['rating']=='1') :
                                    ?>
                                    <i class="md-icon">star</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i><i class="md-icon">star_border</i>
                                    <?php
                                        endif;
                                    ?>
                                    </div>
                                    <!-- /.admin-reviews-rating --> 
                                </div>
                                <!-- /.admin-revies-profile-content -->
                            </div>
                            <!-- /.admin-reviews-profile -->                            
                        </td>
                        <td>
                            <div class="admin-reviews-text">
                              <?=$value['reply']?>
                            </div>
                            <!-- /.admin-reviews-text -->
                        </td>
                        <td>
                            <div class="admin-reviews-date">
                             
                              <?=$value['created_at']?>
                            </div>
                            <!-- /.admin-reviews-date -->
                        </td>
                        <td>
                            <div class="admin-reviews-status">
                             <?php
                                if($value['status']=='0'):
                             ?>
                                <span style="color: red;">Not Approved</span>
                               
                            <?php
                                endif;
                                if ($value['status']=='1') :
                            ?>
                                <span style="color: green;">Approved</span>
                            <?php
                                endif;
                            ?>
                            </div>
                            <!-- /.admin-reviews-status -->
                        </td>
                        <td>
                            <div class="admin-reviews-actions">
                                <?php
                                    if($value['status']=='0'):
                                ?>
                                <a href="../classes/action.php?replyid=<?= $value['id']?>" class="btn btn-primary"><i class="md-icon">close</i> Approve</a>
                                <?php
                                    endif;
                                     if($value['status']=='1'):
                                ?>
                                <a href="#" class="btn btn-primary"><i class="md-icon">check</i> Approved</a>
                                <?php
                                    endif;
                                ?>
                                <a href="#" class="btn btn-secondary"><i class="md-icon">delete</i> Trash</a>
                            </div>
                            <!-- /.admin-reviews-actions -->
                        </td>
                    </tr>
                  <?php
                    endforeach;
                  ?>
                </tbody>
            </table>
        </div>
        <!-- /.admin-reviews -->
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