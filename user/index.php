<?php 
session_start();
include('includes/config.php');
if(!isset($_SESSION['user'])){

echo'<script>window.location.href="../login.php"</script>';



}
if(isset($_GET['logout'])){
session_destroy();
echo'<script>window.location.href="../login.php"</script>';

}
$user = $_SESSION['user'];
$select_f_user = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$user'");
$row_f = mysqli_fetch_assoc($select_f_user);
$username = $row_f['username'];
$select_user  = mysqli_query($con,"SELECT *
FROM users AS u
JOIN shipping_details AS s
ON u.username = s.username
WHERE u.username ='$username'");
$row_user = mysqli_fetch_assoc($select_user);





?>

<?php include('includes/header.php') ?>


<!-- template -->






<?php 
if(isset($_GET['dashboard'])){
    include('dashboard.php');
}

if(isset($_GET['profile'])){
    include('profile.php');
}
if(isset($_GET['settings'])){
    include('settings.php');
}
if(isset($_GET['add_merch'])){
    include('insert_merch.php');
}

if(isset($_GET['orders'])){
    include('view_orders.php');
}
if(isset($_GET['view_merch'])){
    include('view_merch.php');
}
if(isset($_GET['soccer_info'])){
    include('soccer_info.php');
}
if(isset($_GET['assign_matches'])){
    include('assign_match.php');
}
if(isset($_GET['match'])){
    include('match.php');
}


?>




<?php include('includes/footer.php') ?>
