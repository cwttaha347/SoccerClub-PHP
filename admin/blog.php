
<style> 
.form-control{
    border:1px solid grey !important;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey !important;
    border:1px solid grey !important;

}

</style>
<?php
 if(isset($_GET['type']) && !isset($_GET['id']) && $_GET['type']==="view"){
    
    if(isset($_GET['type'])&& $_GET['type']==="delete_blog" && isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = mysqli_query($con,"DELETE FROM `blog` WHERE `id`='$id'");
      if($delete){
        echo'<script>window.location.href="index.php?blog&type=view"</script>';
    }
    }


    $select = mysqli_query($con,"SELECT * FROM `blog`  ");


    
    ?>

<h1  class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Blog</h1><a style="float:right;" class="btn btn-success" href="index.php?blog&type=add">Inserta a New Post <i class="fa-solid fa-plus"></i> </a>

<div class="container" style="background:white;border-radius:20px;">



<div class="table-responsive">
                <table class="table text-center table-responsive ">
                <thead>
                <tr>    
                    <th>#</th>
                    <th>Post Name</th>
                    <th>Post Image</th>
                    
                    <th>Status</th>
                    <th>Date</th>
                    
                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
       
<?php 

   
    $i=1;

if(mysqli_num_rows($select)>0){
while($row_fetch = mysqli_fetch_assoc($select)){
    ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.long-text-cell').each(function() {
        var cellContent = $(this).html();
        var truncatedContent = cellContent.substring(0, 100); // Set the desired character limit
        $(this).data('fullContent', cellContent); // Store the full content in a data attribute
        $(this).html('<div class="truncated-content">' + truncatedContent + '</div>');
    });

    $(document).on('click', '.show-more', function(e) {
        e.preventDefault();
        var cell = $(this).closest('.long-text-cell');
        var fullContent = cell.data('fullContent');
        var truncatedContent = cell.find('.truncated-content').html();
        
        if (cell.hasClass('expanded')) {
            cell.removeClass('expanded');
            cell.html('<div class="truncated-content">' + truncatedContent + '</div>');
        } else {
            cell.addClass('expanded');
            cell.html('<div class="full-content">' + fullContent + '</div>');
        }
    });
});
</script>



<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['title'] ?></td>
<td><img src="../require/images/<?php echo $row_fetch['image'] ?>" width="70px" height="70px"></td>

<td><?php echo $row_fetch['status'] ?></td>
<td><?php echo $row_fetch['date'] ?></td>


<td>
    <a class="w-100 btn btn-danger" href="index.php?blog&type=delete_blog&id=<?php echo $row_fetch['id'] ?>">Delete</a>
<br>
<a class="w-100 btn btn-info" href="index.php?blog&type=edit&id=<?php echo $row_fetch['id'] ?>">Edit</a>

   

</td>






</tr>







<?php
}$i++;


}else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>

</tbody>
</table>
</div>

</div>

<?php
}

?>



<?php if(isset($_GET['type']) && !isset($_GET['id']) && $_GET['type']==="add"){
    






    
    ?>
    <style>
        .form-control{
            border: 1px solid black;
        }
        .form-control:focus{
            border: 1px solid black;
        }
    </style>

<h1  class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Add Blog Post</h1>

<div class="container" style="background:white;border-radius:20px;">

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Post Name</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Post Name">
        </div>
    
    </div>
    <div class="col">
        <div class="form-group">
            <label>Post Image</label>
            <input type="file" name="image" class="form-control">
        </div>
    
    </div>
   
    
</div>
<div class="row">
<div class="col">

<div class="form-group">
        <label>Description</label>
        <textarea name="des" class="form-control" rows="3"></textarea>
    </div>


</div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
    
    </div>
    <div class="col mt-4">
    <input type="submit" value="Add Post" name="post_add" class="btn btn-success">
</div>
</div>





</form>

</div>
<?php
if (isset($_POST['post_add'])) {
   
    $title = $_POST['title'];
    $description = mysqli_real_escape_string($con, $_POST['des']);
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = '../require/images/' . $image; 

    if(move_uploaded_file($image_tmp, $image_path)){


    if (mysqli_query($con, "INSERT INTO blog (`title`,`des`, `image`, `status`) 
    VALUES ('$title', '$description', '$image', '$status')")) {
        echo "<script>alert('Post inserted successfully');</script>";
        echo "<script>window.location.href='index.php?blog&type=view'</script>";

      
    } 
}
}
?>

<?php
}

?>


<?php if(isset($_GET['type']) && isset($_GET['id']) && $_GET['type']==="edit"){
    $id = $_GET['id'];
$select_blog =  mysqli_query($con,"SELECT * FROM `blog` WHERE `id`='$id'");

if(mysqli_num_rows($select_blog)>0){
    $fetch_blog = mysqli_fetch_assoc($select_blog);
    ?>

<style>
        .form-control{
            border: 1px solid black;
        }
        .form-control:focus{
            border: 1px solid black;
        }
    </style>

<h1  class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Add Blog Post</h1>

<div class="container" style="background:white;border-radius:20px;">

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Post Name</label>
            <input type="text" name="title" class="form-control" value="<?php echo $fetch_blog['title'] ?>" placeholder="Enter Post Name">
        </div>
    
    </div>
    <div class="col">
        <div class="form-group">
            <label>Post Image</label>
            <input type="file" name="image" class="form-control">
            <img src="../require/images/<?php echo $fetch_blog['image'] ?>" width="70px" height="70px" alt="">
        </div>
    
    </div>
   
    
</div>
<div class="row">
<div class="col">

<div class="form-group">
        <label>Description</label>
        <textarea name="des" class="form-control" rows="3"><?php echo $fetch_blog['des'] ?></textarea>
    </div>


</div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" selected="<?php echo $fetch_blog['status'] ?>">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
    
    </div>
    <div class="col mt-4">
    <input type="submit" value="Update Post" name="post_update" class="btn btn-success">
</div>
</div>





</form>

</div>
<?php
}
if (isset($_POST['post_update'])) {
   $id = $_GET['id'];
    $title = $_POST['title'];
    $description = mysqli_real_escape_string($con, $_POST['des']);
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = '../require/images/' . $image; 

    if(move_uploaded_file($image_tmp, $image_path)){


    if (mysqli_query($con, "UPDATE blog SET  title='$title', des='$description', image='$image', status='$status' WHERE `id`='$id'")) {
        echo "<script>alert('Post inserted successfully');</script>";
        echo "<script>window.location.href='index.php?blog&type=view'</script>";

      
    } 
}
}
?>




<?php }?>
    