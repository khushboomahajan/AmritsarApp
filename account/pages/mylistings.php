<?php
   require_once "../classes/mylistings.php";
    $obj=new mylistings();
    $user_id=$obj->getloggedinuser();
    
    $perpage=5;
    $offset=0;
       
    if(isset($_GET['p'])){
        $offset = ($_GET['p']-1)*$perpage;
    }
    if($_SESSION['role']== 'admin'){
        $totalListing=$obj->getlistingsforadmin();
        $listingArray = $obj->getAllListingsForAdminCount($offset,$perpage);
     }else{
       
        $listingArray = $obj->getListingsForUser($user_id,$offset,$perpage);    
        $totalListing=$obj->getalllistings($user_id);

     }

     $countoflisting=count($totalListing);
     $pages=ceil($countoflisting/$perpage); 
?>


<div class="admin-content">
    <div class="container-fluid">
        <div class="admin-title">
            <h1>Listings Management</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Materialist</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li><a href="admin-dashboard.html">Dashboard</a> <i class="md-icon">keyboard_arrow_right</i></li>
                <li class="active">Listings</li>
            </ul>
            <!-- /.breadcrumb -->	
        </div>
        <!-- /.admin-title -->
        <div class="admin-box no-padding">
            <table class="table small-header">
                <thead>
                    <tr>
                        <th class="min-width"></th>
                        <th class="min-width">Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($listingArray as $key => $value) :
                        
                    ?>
                    <tr>
                        <td class="min-width">
                       <!--  <input type="checkbox"> -->
                        </td>
                        <?php
                            $images=explode(",", $value['images']);
                            foreach ($images as $k => $v) {
                                if(is_array($v)){
                                    $image=$v[0];
                                }else{
                                     $image=$v;
                                }
                            }
                        ?>
                        <td class="min-width">
                        <img src="../images/<?= $image ?>" alt="<?= $value['title']?>">
                        </td>
                        <td><?= $value['title']?></td>
                        <td><a href="#"><?=$value['category']?></a></td>
                        <td><a href="#"><?=$value['email']?></a></td>
                        <td style="width: 35%;">
                           <!--  <a href="index.php?page=listingview&viewid=<?= $value['id'] ?>" class="btn btn-primary" style="font-size: 11px !important;"><i class="md-icon">remove_red_eye</i> View</a> -->
                            <?php
                                if($_SESSION['role'] == 'admin') :
                                   if($value['status']== '0') :
                            ?>
                            <a href="../classes/action.php?id=<?= $value['id'] ?>" class="btn btn-primary" style="font-size: 11px !important;"><i class="md-icon">close</i> Approve</a>
                            <?php
                                endif;
                                if($value['status']== '1') :
                            ?>
                                 <a href="" class="btn btn-primary" style="font-size: 11px !important;"><i class="md-icon">check</i> Approved</a>

                            <?php
                                endif;
                                endif;
                            ?>
                            <a href="../classes/action.php?del_id=<?= $value['id'] ?>" style="font-size: 11px !important;" class="btn btn-secondary"><i class="md-icon">delete</i> Remove</a>
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
            <?php
                                    if($_GET['p'] == 1){
                                ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                    }else{

                ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?=$_GET['page']?>&p=<?=$_GET['p']-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php
                    }
                ?>
                <?php
                    for($i=1;$i<=$pages;$i++) :
                ?>
                 <li class="<?=($_GET['p'] == $i)?'page-item active':'page-item'?>">
                    <a class="page-link"  href="index.php?page=mylistings&p=<?=$i?>"><?=$i?></a>
                </li>
                <?php
                    endfor;
                ?>
                <?php
                    if($_GET['p']==$pages) {
                ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php
                    }else{
                ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?=$_GET['page']?>&p=<?=$_GET['p']+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- /.container-fluid -->
</div>