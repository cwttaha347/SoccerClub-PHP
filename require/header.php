<?php 
session_start();
include('config.php'); 
$select_website = mysqli_query($con,"SELECT * FROM `settings`");
$row_website = mysqli_fetch_assoc($select_website);
$select_matches = mysqli_query($con,"SELECT * FROM `matches`");
$row_match = mysqli_fetch_assoc($select_matches);
$ip = $_SERVER[('REMOTE_ADDR')];
$select_cart= mysqli_query($con , "SELECT * FROM `cart` WHERE `ip`='$ip'");
$count_cart  = mysqli_num_rows($select_cart);


if(isset($_SESSION['user'])){
    $email = $_SESSION['user'];
    $select_user = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email'");
    $row_user = mysqli_fetch_assoc($select_user);
    $display = $row_user['fullname'];

}else{
    $display = "Guest";
}



?>





<!-- header -->


<!doctype html>
<html class=no-js lang="">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>soccer club</title>
    <link rel="shortcut icon" href=favicon.ico>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel=stylesheet href=require/css/vendor.css>
    <link rel=stylesheet href=require/css/style.css>
    <link rel=stylesheet type=text/css href=require/css/layerslider.css>
    <script src=require/js/vendor/modernizr.js></script>
</head>
<body><!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class=wrapper>
    <header class=header-main>
        <div class=header-upper>
            <div class=container>
                <div class=row>
                    <ul>
                        <li><a href="login.php">Signup/login</a></li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span>cart(<span><?php echo $count_cart;  ?></span>)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-lower clearfix">
            <div class=container>
                <div class=row><h1 class=logo><a href=index.php><img src=require/images/logo.png alt=image></a></h1>

                    <div class=menubar>
                        <nav class=navbar>
                            <div class=nav-wrapper>
                                <div class=navbar-header>
                                    <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                        <span class=icon-bar></span></button>
                                </div>
                                <div class=nav-menu>
                                    <ul class="nav navbar-nav menu-bar">
                                        <li><a href="index.php" >Home <span></span> <span></span>
                                            <span></span> <span></span></a></li>
                                         <?php 
                                         $select_setting = mysqli_query($con,"SELECT * FROM `settings` ");
                                         $fetch = mysqli_fetch_assoc($select_setting);
                                         if($fetch['categories_status']==="1"){
                                            echo '  <li class="dropdown">
                                            <a href="javascript:void();">shop <span></span> <span></span> <span></span> <span></span></a>
                                            <div class="dropdown-content" >
                                          <h3 class=" text-left " style="color:white !important;padding:2%;">Categories</h3>
                                          
                                          <div class="row">
                                          ';
                                         $select_cat = mysqli_query($con,"SELECT * FROM `categories` WHERE `status`=1");
                                         while ($row_fetch_cat = mysqli_fetch_assoc($select_cat) ) {
                                            
                                         
                                         ?>
                                         
                                          <div class="col-lg-2"> <a href="shop.php?type=category_view&id=<?php echo $row_fetch_cat['cat_id'] ?>"><?php echo $row_fetch_cat['cat_name'] ?></a> </div>
                                         
                                          
                                          
                                        
                                          <?php
                                         }
                                       echo '    
                                       </div>
                                       </div>
                                          </li>' ;
                                            ?>
 

<?php
                                         }else{
echo'
<li><a href="shop.php" >Shop <span></span> <span></span>
                                            <span></span> <span></span></a></li>';

                                         }
                                         
                                         
                                         ?>
                                        <li><a href="index.php#about">about <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        
                                        <li><a href="blog.php">blog <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        
                                        
                                        <li><a href="contact.php">contact <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class=social><a href=https://www.facebook.com/templatespoint.net class=facebook><i
                            class="fa fa-facebook"></i></a> <a href=https://twitter.com/itobuztech class=twitter><i
                            class="fa fa-twitter"></i></a> <a href=https://www.behance.net/ class=behance><i
                            class="fa fa-behance"></i></a></div>
                </div>
            </div>
        </div>
    </header>