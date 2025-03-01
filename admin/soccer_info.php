<?php 
if(isset($_GET['type']) && $_GET['type']==="edit"){
$select = mysqli_query($con,"SELECT * FROM `soccer_info`");
$row_info = mysqli_fetch_assoc($select);
?>


<div class="container">
<h1 class="bg-dark text-white text-center w-100 p-3 mb-3"> Edit Soccer Info </h1>

<form action="" method="post">
    <div class="row">

<div class="col">
<label for="" class="form-label">Tricks</label>
<textarea class="form-control" name="tricks" id="" cols="30" rows="10" ><?php echo $row_info['tricks'] ?></textarea>
</div>
<div class="col">
<label for="" class="form-label">Facts</label>
<textarea class="form-control" name="facts" id="" cols="30" rows="10" ><?php echo $row_info['tricks'] ?></textarea>
</div>
<div class="col">
<label for="" class="form-label">Information</label>
<textarea class="form-control" name="information" id="" cols="30" rows="10" ><?php echo $row_info['tricks'] ?></textarea>
</div>
    </div>
    <div class="row mb-5">
<div class="col-12">
<input type="submit" class="btn btn-primary w-100 mt-5" name="update_soccer_info" value="Update" >
</div>


</div>



</form>


</div>
<?php 
if(isset($_POST['update_soccer_info'])){
$tricks = $_POST['tricks'];
$facts = $_POST['facts'];
$information = $_POST['information'] ;

$update_soccer_info = mysqli_query($con,"UPDATE `soccer_info` SET `tricks`='$tricks' , `facts`='$facts' , `information`='$information'");
if($update_soccer_info){
echo'<script>window.location.href="index.php?website_settings&type=edit"</script>';
}


}



?>



<?php

}


?>