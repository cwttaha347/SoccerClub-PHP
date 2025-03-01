<style> 
.form-control{
    border:1px solid grey !important;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey !important;
    border:1px solid grey !important;

}

</style>
<div class="container-fluid" style="background-color:white; color:white; border-radius:20px; padding:5%;">
<h1 class="text-center text-white bg-dark p-3">Add Products</h1><a href="index.php?view_merch" class="btn btn-success" style="float:right;">View Products  <i class="fa-solid fa-eye"></i></a>
<br>
<form action="includes/function.php" method="post" enctype="multipart/form-data">


<div class="row">
  <div class="col mt-2">
    <label for="" class="form-label">Product Name</label>
    <input type="text" style="background:white;" class="form-control" name="p_name" required placeholder="Merch Name">
  </div>
  <div class="col mt-2">
  <label for="" class="form-label ">Product Price</label>

  <input type="number" style="background:white;" name="p_price" class="form-control" required placeholder="price">

  </div>
</div>
<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Description</label>

<textarea style="background:white;" class="form-control w-100" name="des" id="" cols="30" placeholder="Type here Description" rows="10"></textarea>
    </div>
</div>

<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Sale Price (Optional)</label>
    <input style="background:white;" type="number" class="form-control w-100" name="mrp_price" value="0" placeholder="Merch Name">
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Sale price Status</label>
    <select name="sale_status" class="form-control" id="">
<option value="1">Active</option>
<option value="1">DeActive</option>

    </select>
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Status</label>
    <select name="p_status" class="form-control" id="">
<option value="1">Active</option>
<option value="1">DeActive</option>

    </select>
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Category</label>
    <select name="p_cat" class="form-control" id="">
        <?php 
        $select_cat=mysqli_query($con,"SELECT * FROM `categories` WHERE `status`=1");
        if(mysqli_num_rows($select_cat)>0){
            while ( $row_cat = mysqli_fetch_assoc($select_cat) ) {
                ?>
                <option value="" selected disabled>--SELECT--</option>
<option value="<?php echo $row_cat['cat_id'] ?>"><?php echo $row_cat['cat_name'] ?></option>
                <?php
            }
        }
        
        ?>



    </select>
    </div>
</div>


<div class="row">
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 1</label>
    <input type="file" name="pic1" class="form-control" required>
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 2</label>
    <input type="file" name="pic2" class="form-control" required >
    </div>
    <div class="col mt-2">
    <label for="" class="form-label">Product Image 3</label>
    <input type="file" name="pic3" class="form-control" required >
    </div>
</div>

<div class="row">
    <div class="col-12">
        <button type="submit" name="add_pro" class="btn btn-info mt-4 p-2 w-100">Add Product</button>
    </div>
</div>

</form>


</div>

