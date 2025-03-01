<?php
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