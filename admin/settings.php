<style> 
.form-control{
    border:1px solid grey !important;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey !important;
    border:1px solid grey !important;

}

</style>
<?php if(isset($_GET['type'])&&$_GET['type']==="edit") {
    $select = mysqli_query($con,"SELECT * FROM `settings`");
    $row_website = mysqli_fetch_assoc($select);
    
    
    ?>
<style>
.form-control{
    border:1px solid black;
}
.form-control:focus{
    border:1px solid red;
}

</style>
<h1 class="text-center text-white bg-dark w-100 p-3">Website Settings</h1>
<div class="container">
<form action="" method="post">

<div class="row">
  <div class="col mt-5">
    <label for="" class="form-label">About Text</label>
    <textarea name="about" class="form-control"  id="" cols="30" rows="10"><?php echo $row_website['about'] ?></textarea>
  </div>
  <div class="col mt-5">
    <label for="" class="form-label">Contact Text</label>
<textarea name="contact" class="form-control" cols="30" rows="10"><?php echo $row_website['contact'] ?></textarea>
  </div>
</div>
<div class="row mb-5">
<div class="col-12">
<input type="submit" class="btn btn-primary w-100 mt-5" name="update" value="Update" >
</div>


</div>



</form>





</div>
<?php 
if(isset($_POST['update'])){
    $about = mysqli_real_escape_string($con, $_POST['about']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $update = mysqli_query($con,"UPDATE `settings` SET `about`='$about',`contact`='$contact' WHERE 1");
    if($update){
        echo "<script>alert('Successfully Updated');</script>";
        echo "<script>window.location.href='index.php?settings&type=edit';</script>";
    }
}

?>
<?php include('soccer_info.php'); 






echo'<br>';

?>
<?php 
$select_links = mysqli_query($con,"SELECT * FROM `settings`");
$fetch_links = mysqli_fetch_assoc($select_links);
if(isset($_POST['links_update'])){
$update = mysqli_query($con,"UPDATE `settings` SET `facebook_link`='$facebook',`twitter_link`='$twitter',`behance_link`='$behance'");
echo'<script>window.location.href="index.php?settings&type=edit"</script>';
}

?>
<h2 class="text-center text-white bg-dark w-100 p-3">Social Links</h2>
<form action="" method="post">
    <div class="container">
<div class="row">
    <div class="col">
<input type="url" name="facebook" value="<?php echo $fetch_links['facebook_link'] ?>" required class="form-control" placeholder="Facebook Url"  id="">
    </div>
    <div class="col">
<input type="url" name="twitter" value="<?php echo $fetch_links['twitter_link'] ?>" required class="form-control" placeholder="Twitter Url"  id="">
    </div>
    <div class="col">
<input type="url" name="behance" value="<?php echo $fetch_links['behance_link'] ?>" required class="form-control" placeholder="Bhance Url"  id="">
    </div>
    <div class="col">
<button type="submit" name="links_update" class="btn btn-primary"><i class="fa-solid fa-arrow-right" ></i></button>
    </div>
</div>
</div>
</form>






    <div class="container">
<div class="row">
    <div class="col-12">
        <center>
            <h4 class="text-center text-white bg-dark w-100 p-3">Category status in NavBar</h4>
        
<?php 
$select = mysqli_query($con,"SELECT * FROM `settings`");
$fetch_cat = mysqli_fetch_assoc($select);
if($fetch_cat['categories_status']==="0"){
    echo '<a  href="index.php?settings&type=edit&turn_on_cat" class="btn btn-danger">Turn On</a>';
}else{
    echo'<a  href="index.php?settings&type=edit&turn_off_cat" class="btn btn-success">Turn Off</a>';
}
if(isset($_GET['type'])&& $_GET['type']==="edit" && isset( $_GET['turn_on_cat'])){
$update = mysqli_query($con,"UPDATE `settings` SET categories_status='1' WHERE `id`=1");
echo'<script>window.location.href="index.php?settings&type=edit"</script>';
}
if(isset($_GET['type'])&& $_GET['type']==="edit" && isset($_GET['turn_off_cat'])){
    $update = mysqli_query($con,"UPDATE `settings` SET categories_status='0' WHERE `id`=1");
    echo'<script>window.location.href="index.php?settings&type=edit"</script>';
    }
?>
</center>
    </div>
   
   
</div>
</div>


<?php




?>
<?php }
?>





<?php 
if(isset($_GET['type'])&& $_GET['type']==="password"){

$pwd = $row_user['password'];
if(isset($_POST['change_pwd'])){
    $old_pwd = $_POST['old_pwd'];
if($old_pwd===$pwd){
    $email = $row_user['email'];
    $new = $_POST['new_pwd'];
$update = mysqli_query($con,"UPDATE `users` SET `password`='$new' WHERE `email`='$email'");
if ($update) {
    echo'<script>window.location.href="index.php?settings"</script>';
}
}

}

?>

<div class="container">
    <style>
        .form-control{
            border: 1px solid black;
        }
    </style>
<h1 class="bg-dark text-center text-white w-100 p-3 mb-3 mt-2" >Change Password</h1>
<form action="" method="post">
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control" id="old_password" name="old_pwd" placeholder="PASSWORD">
        </div>
    
    </div>
    <div class="col">   
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_pwd" placeholder="PASSWORD">
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-12">
     <center>   <input type="submit" class="btn btn-success mt-5 text-center" value="Change Password" name="change_pwd"></center>
    </div>
</div>


</form>

</div>
<?php
}
?>
