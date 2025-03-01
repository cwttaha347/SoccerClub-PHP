<?php
 session_start();
 $msg='';
include('require/config.php');
if(isset($_SESSION['user'])){
    
    $msg='';
   
?>



<?php

    
    
    $ip = $_SERVER[('REMOTE_ADDR')];
    $select_cart= mysqli_query($con , "SELECT * FROM `cart` WHERE `ip`='$ip'");
    $count  = mysqli_num_rows($select_cart);
    $email = $_SESSION['user'];
    $select_user = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email'");
    $row_user = mysqli_fetch_assoc($select_user);
    $username= $row_user['username'];
    $select_address = mysqli_query($con,"SELECT * FROM `shipping_details` WHERE `username`='$username'");

if($select_address){
    $checkout = mysqli_fetch_assoc($select_address);

}
?>

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
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span>cart(<span
                                class=cartitems><?php echo $count;  ?></span>)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-lower clearfix">
            <div class=container>
                <div class=row><h1 class=logo><a href=index-2.html><img src=require/images/logo.png alt=image></a></h1>

                    <div class=menubar>
                        <nav class=navbar>
                            <div class=nav-wrapper>
                                <div class=navbar-header>
                                    <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                        <span class=icon-bar></span></button>
                                </div>
                                <div class=nav-menu>
                                    <ul class="nav navbar-nav menu-bar">
                                        <li><a href="index.php" class=active>Home <span></span> <span></span>
                                            <span></span> <span></span></a></li>
                                        <li><a href="about.php">about <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        <li><a>gallery <span></span> <span></span> <span></span> <span></span></a>
                                            <ul class=sub-menu>
                                                <li><a href=gallerypage01.html>masonry</a></li>
                                                <li><a href=gallery02.html>gallery column two</a></li>
                                                <li><a href=gallery03.html>gallery column 03</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.php">blog <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        <li><a href=bookTicket.html>book Tickets <span></span> <span></span>
                                            <span></span> <span></span></a></li>
                                        <li><a href="shop.php">shop <span></span> <span></span> <span></span>
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
<div class="container mt-5" style="margin-top: 15%;" >
  <h1>Shipping</h1>
  <p>Please enter your shipping details.</p>
  <hr />

<form action="" method="post">
<div class="row">
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">Full Name</label>
    <input type="text" class="form-control" placeholder="Fullname" name="name" value="<?php echo $row_user['fullname'] ?>">
  </div>
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">Contact</label>
    <input type="text" class="form-control" placeholder="contact" name="contact" value="<?php echo $row_user['contact'] ?>">
  </div>
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">Address</label>
    <textarea name="address" id="" cols="30" rows="10" class="form-control"><?php echo $checkout['address'] ?></textarea>
  </div>
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">Postal Code</label>
    <input type="text" class="form-control" placeholder="postal code" name="postal_code" value="<?php echo $checkout['postal_code'] ?>">
  </div>
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">Province</label>
   <select name="province" class="form-control" id="">
<option value="sindh">Sindh</option>
<option value="balochistan">Balochistan</option>
<option value="gilgit">Gilgit</option>
<option value="kpk">KPK</option>
<option value="Punjab">Punjab</option>



   </select>
  </div>
  <div class="col" style="margin-top: 2%;">
    <label for="" class="form-label mt-3">City</label>
  <input type="text" placeholder="City" class="form-control" name="city" value="<?php echo $checkout['city'] ?>">
  </div>

  <div class="col mt-5" style="margin-top: 2%;">
 
 <center> <input type="submit"  class="btn btn-secondary mt-5 mb-5 text-center " name="place" value="Place Order"></center>
  </div>
</div>






</form>



</div>


<?php
if(isset($_POST['place'])){
    $ip = $_SERVER[('REMOTE_ADDR')];
    $cart = mysqli_query($con,"SELECT * FROM `cart` WHERE `ip`='$ip'");
    $cart_data = mysqli_fetch_assoc($cart);
    $m_id = $cart_data['merchandise_id'];
    $qty = $cart_data['quantity'];
$fullname = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$postal = $_POST['postal_code'];
$province = $_POST['province'];
$city = $_POST['city'];
$username = $row_user['username'];

$double_check = mysqli_query($con,"SELECT * FROM `shipping_details` WHERE `username`='$username'");
$check = mysqli_num_rows($double_check);

if($check >0){
    $update = mysqli_query($con, "UPDATE `shipping_details` SET
    `fullname` = '$fullname',
    `address` = '$address',
    `contact` = '$contact',
    `postal_code` = '$postal',
    `procvice` = '$province',
    `city` = '$city'
WHERE `username` = '$username'");
if($update){
    $status="1";
    $order = mysqli_query($con,"INSERT INTO `order`( `user_id`, `merchandise_id`, `quantity`,  `status`) VALUES ('$username','$m_id','$qty','$status')");
    if($order){
        $delete_cart = mysqli_query($con,"DELETE FROM `cart` WHERE `ip`='$ip'");
        echo'<script>window.location.href="user/index.php?orders"</script>';
    }
}
}else{


$insert = mysqli_query($con,"INSERT INTO `shipping_details`(`username`, `fullname`, `address`, `contact`, `postal_code`, `procvice`, `city`) VALUES ('$username','$fullname','$address','$contact','$postal','$province','$city')");
if($insert){
    $status="1";
    $order = mysqli_query($con,"INSERT INTO `order`( `user_id`, `merchandise_id`, `quantity`,  `status`) VALUES ('$username','$m_id','$qty','$status')");
    if($order){
        $delete_cart = mysqli_query($con,"DELETE FROM `cart` WHERE `ip`='$ip'");
        echo'<script>window.location.href="user/index.php?orders"</script>';
    }
}

}

}
}elseif(!isset($_GET['register'])){
    
    

    
   
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Soccer Club . Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pwd = mysqli_real_escape_string($con,$_POST['pwd']);

// $encrypt = password_hash($pwd,PASSWORD_DEFAULT);

// $raw  = password_verify($pwd,$encrypt);


$check = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pwd'");
if(mysqli_num_rows($check) > 0){

$fetch = mysqli_fetch_assoc($check);
if($fetch['role']=="1"){
    $_SESSION['user']= $email;
echo'<script>window.location.href="checkout.php"</script>';

}


}else{
    echo'<script>window.location.href="login.php?incorrect"</script>';
}


}



?>

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           
                            <h3 class="text-center">Log In</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input name="pwd" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            <a href="forgot_password.php">Forgot Password</a>

                            
                        </div>
                        <?php echo $msg; ?>
                        <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="checkout.php?register">Sign Up</a></p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/lib/chart/chart.min.js"></script>
    <script src="admin/lib/easing/easing.min.js"></script>
    <script src="admin/lib/waypoints/waypoints.min.js"></script>
    <script src="admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admin/js/main.js"></script>
</body>

</html>



<?php
}else{
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Your Account</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 w-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-12 col-lg-6 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           
                            <h3>Sign Up</h3>
                        </div>
                        <form method="post">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingPassword" name="fullname" placeholder="fullname">
                            <label for="floatingPassword">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="username" placeholder="username">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" id="floatingPassword" name="contact" placeholder="phone">
                            <label for="floatingPassword">Contact</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        
                        
                        <button type="submit" name="register" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="checkout.php">Log In</a></p>
                    </div>
</form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/lib/chart/chart.min.js"></script>
    <script src="admin/lib/easing/easing.min.js"></script>
    <script src="admin/lib/waypoints/waypoints.min.js"></script>
    <script src="admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admin/js/main.js"></script>
</body>

</html>


<?php 
$msg='';
if(isset($_POST['register'])){

$fname = mysqli_real_escape_string($con,$_POST['fullname']);
$username = mysqli_real_escape_string($con,$_POST['username']);
$contact = mysqli_real_escape_string($con,$_POST['contact']);
$password = mysqli_real_escape_string($con,$_POST['pwd']);
$email = mysqli_real_escape_string($con,$_POST['email']);

// $raw = password_hash($password);


$insert = mysqli_query($con , "INSERT INTO `users` (`fullname`,`email`,`username`,`contact`,`password`,`status`)VALUES('$fname','$email','$username','$contact','$password','1')");
if($insert){
    session_start();
$_SESSION['user'] = $email;
echo'<script>window.location.href="checkout.php"</script>';



}else{
   $msg = '';
}

}



?>






<?php }


?>

