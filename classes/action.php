<?php

  	require_once "../autoload.php";
    if(isset($_POST['register'])){
       $obj=new register();
       $obj->createUser($_POST);
    }

    if(isset($_POST['signin'])){     
    	$obj = new login();
    	$obj->checkUser($_POST);
    }

    if (isset($_POST['submit'])) {
        // print_r($_POST);
    	$obj = new listing();
    	$obj->submitlisting($_POST,$_FILES);
    }

    if(isset($_GET['activation'])){      
        $code=$_GET['activation'];
         $obj=new register();
         $obj->useractivation($code);
    }

    if(isset($_GET['id'])){
        $obj=new mylistings();
        $obj->approve($_GET['id']);
    }
   
    if(isset($_GET['del_id'])){
        $obj=new mylistings();
        $obj->delete($_GET['del_id']);
    }

    if(isset($_POST['addcategory'])){
        $obj=new category();
        $obj->addcategory($_POST);
    }

    if(isset($_POST['postreview'])){        
        $obj=new reviews();
        $obj->postreview($_POST);
    }

    if(isset($_POST['updateuser'])){
        $obj=new settings();
        $obj->updateUser($_POST,$_FILES);
    }

    if(isset($_GET['reviewid'])){
        $obj=new reviews();
        $obj->approve($_GET['reviewid']);
    }

    if(isset($_GET['delreviewid'])){
        $obj=new reviews();
        $obj->delete($_GET['delreviewid']);
    }

    if(isset($_POST['postreply'])){
        //print_r($_POST);
        $obj=new reviews();
        $obj->postreply($_POST);
    }

    if(isset($_GET['replyid'])){
        $obj=new replies();
        $obj->approve($_GET['replyid']);
    }

    if(isset($_POST['search'])){
        $obj=new search();
        $obj->searchdata($_POST);
    }

    if(isset($_POST['reset'])){
        $obj=new reset();
        $obj->resetmyaccount($_POST);
    }

    if(isset($_POST['resetpass'])){
        print_r($_POST);
        $resetpassword=$_POST['resetpass'];
     //   echo $resetpassword;
        $obj=new reset();
        $obj->resetafteremail($_POST,$resetpassword);
    }
?>