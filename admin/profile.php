
<style> 
.form-control{
    border:1px solid grey !important;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey !important;
    border:1px solid grey !important;

}

</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row_user['fullname'] ?></span><span class="text-black-50"><?php echo $row_user['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="f_name" class="form-control" placeholder="Full Name" value="<?php echo $row_user['fullname'] ?> "></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="email" name="email" class="form-control" value="<?php echo $row_user['email'] ?>" placeholder="email"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" name="contact" class="form-control" placeholder="enter phone number" value="<?php echo $row_user['contact'] ?>"></div>
              </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="save_profile">Save Profile</button></div>
            </div>
            </form>
        </div>
       
    </div>
</div>
</div>
</div>


<?php 
if(isset($_POST['save_profile'])){
    $username = $row_user['username'];
$email = $_POST['email'];
$f_name = $_POST['f_name'];
$contact = $_POST['contact'];
$update = mysqli_query($con,"UPDATE `users` SET `fullname`='$f_name' ,`email`='$email', `contact`='$contact' WHERE username = '$username'");
if($update){

    echo'<script>window.location.href="index.php?profile"</script>';
}

}




?>