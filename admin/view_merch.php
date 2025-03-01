
<style> 
.form-control{
    border:1px solid grey;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey;
    border:1px solid grey;

}

</style>
<?php 
if(isset($_GET['type']) && $_GET['type']=="edit" && isset($_GET['id'])){
    $id = $_GET['id'];
    $select = mysqli_query($con,"SELECT * FROM `merchandise` WHERE `merchandise_id`='$id'");
    $row_edit = mysqli_fetch_assoc($select);
    $status = '';
    if($row_edit['p_status'] ==="1"){
$status = '
<select name="p_status" class="form-control" id="">
<option value="1" selected >Active</option>
<option value="1" >DeActive</option>

    </select>
';
    }elseif($row_edit['p_status']==="0"){
        $status = '
        <select name="p_status" class="form-control" id="">
        <option value="1"  >Active</option>
        <option value="1" selected >DeActive</option>
        
            </select>
        ';
    }else{
        $status = '';
    }
    if($row_edit['sale_status'] ==="1"){
        $s_status = '
        <select name="s_status" class="form-control" id="">
        <option value="1" selected >Active</option>
        <option value="1" >DeActive</option>
        
            </select>
        ';
            }elseif($row_edit['sale_status']==="0"){
                $s_status = '
                <select name="s_status" class="form-control" id="">
                <option value="1"  >Active</option>
                <option value="1" selected >DeActive</option>
                
                    </select>
                ';
            }else{
                $s_status = '';
            }
    ?>

<div class="container-fluid" style="background-color:white; color:black; border-radius:20px; padding:5%;">
<h1 class="text-center text-white">Edit Product</h1><a href="index.php?view_merch" class="btn btn-success" style="float:right;">View Products  <i class="fa-solid fa-eye"></i></a>
<br>
<form action="includes/function.php" method="post" enctype="multipart/form-data">

<input type="hidden" value="<?php echo $id ?>" name="id">
<div class="row">
  <div class="col mt-2">
    <label for="" class="form-label">Product Name</label>
    <input type="text" value="<?php echo $row_edit['name'] ?>" style="background:white;" class="form-control" name="p_name" required placeholder="Merch Name">
  </div>
  
  <div class="col mt-2">
  <label for="" class="form-label ">Product Price</label>

  <input type="number" value="<?php echo $row_edit['price'] ?>" style="background:white;" name="p_price" class="form-control" required placeholder="price">

  </div>
</div>
<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Description</label>

<textarea style="background:white;" class="form-control w-100" name="des" id="" cols="30" placeholder="Type here Description" rows="10"><?php echo $row_edit['description'] ?></textarea>
    </div>
</div>

<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Sale Price (Optional)</label>
    <input style="background:white;" value="<?php echo $row_edit['mrp'] ?>" type="number" class="form-control w-100" name="mrp_price" value="0" placeholder="Merch Name">
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Sale price Status</label>
    <?php echo $s_status; ?>
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Status</label>
  <?php echo $status ?>
    </div>
</div>


<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 1</label>
    <input type="file" value="<?php echo $row_edit['image_1'] ?>" name="pic1" class="form-control" >
    <img src="../require/images/<?php echo $row_edit['image_1'] ?>" width="100%" height="200px" alt="">
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 2</label>
    <input type="file" value="<?php echo $row_edit['image_2'] ?>" name="pic2" class="form-control"  >
    <img src="../require/images/<?php echo $row_edit['image_2'] ?>" width="100%" height="200px" alt="">

    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 3</label>
    <input type="file" value="<?php echo $row_edit['image_3'] ?>" name="pic3" class="form-control"  >
    <img src="../require/images/<?php echo $row_edit['image_3'] ?>" width="100%" height="200px" alt="">

    </div>
</div>

<div class="row">
    <div class="col-12">
        <button type="submit" name="update_pro" class="btn btn-info mt-4 p-2 w-100">Update Product</button>
    </div>
</div>

</form>


</div>


<?php
}
else{


?>




<div class="container-fluid" style="background:white;border-radius:20px;padding:5%;">
<h1 class="text-center bg-dark w-100 p-3 text-white">Products</h1><a href="index.php?add_merch" class="btn btn-success" style="float:right;">Add Products  <i class="fa-solid fa-plus"></i></a>
<table class="table-responsive table text-center w-100 " bordered style="background:white;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
     
      <th scope="col">Price</th>
      <th scope="col">Sale Price</th>
      <th scope="col">Image 1</th>
      <th scope="col">Image 2</th>
      <th scope="col">Image 3</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    $select = mysqli_query($con,"SELECT * FROM `merchandise`");
    if(mysqli_num_rows($select) > 0 ){
while ($row_p = mysqli_fetch_assoc($select)) {
    ?>
<tr>
    
    <th scope="row"><?php echo $i; ?></th>
    <td><?php echo $row_p['name']; ?></td>
  
    <td><?php echo $row_p['mrp']; ?></td>
    <td><?php echo $row_p['price']; ?></td>
    <td><img src="../require/images/<?php echo $row_p['image_1']; ?>" width="70px" height="70px" alt=""></td>
    <td><img src="../require/images/<?php echo $row_p['image_2']; ?>" width="70px" height="70px" alt=""></td>
    <td><img src="../require/images/<?php echo $row_p['image_3']; ?>" width="70px" height="70px" alt=""></td>

    <td><a class="btn btn-info w-100" href="index.php?view_merch&type=edit&id=<?php echo $row_p['merchandise_id'] ?>">Edit</a>
<br>
    <a class="btn btn-danger mt-3 w-100" href="index.php?view_merch&type=delete&id=<?php echo $row_p['merchandise_id'] ?>">Delete</a>

</td>

  </tr>

<?php 
}$i++;

    }else{
        echo'<tr class="text-center mt-4" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';
    }
    
    
    ?>
    
   
  </tbody>
</table>




</div>


<?php 
}
if(isset($_GET['type']) && $_GET['type']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($con,"DELETE FROM `merchandise` WHERE `merchandise_id`='$id'");
    if($delete){
        echo'<script>window.location.href="index.php?view_merch"</script>';
    }
}




?>