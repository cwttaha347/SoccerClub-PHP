

<?php 
include('config.php');
if(isset($_POST['add_pro'])){
$dir = "../../require/images/";
 $name = mysqli_real_escape_string($con,$_POST['p_name']);
 $des = mysqli_real_escape_string($con,$_POST['des']);
 $mrp = mysqli_real_escape_string($con,$_POST['mrp_price']);
 $price = mysqli_real_escape_string($con,$_POST['p_price']);
 $target_pic_1 = $dir . basename($_FILES['pic1']['name']) ;
 $target_pic_2 = $dir . basename($_FILES['pic2']['name']) ;
 $target_pic_3 = $dir . basename($_FILES['pic3']['name']) ;
 $p_status = $_POST['p_status'];
 $sale_status = $_POST['sale_status'];


//  $image_type = strtolower(pathinfo($target_pic_1,PATHINFO_EXTENSION)($target_pic_2,PATHINFO_EXTENSION)($target_pic_3,PATHINFO_EXTENSION));

// if($image_type!="jpg" && $image_type!="png" && $image_type!="jpeg"){
//     echo'<div class="alert alert-danger" role="alert">
//     Error : Image Type is Invalid You can Only Upload .jpg , .png , .jpeg.
//   </div>';
// }
$name_1 = $_FILES['pic1']['name'];
$name_2 = $_FILES['pic2']['name'];
$name_3 = $_FILES['pic3']['name'];

$move_1 = move_uploaded_file($_FILES['pic1']['tmp_name'],$target_pic_1);
$move_2 = move_uploaded_file($_FILES['pic2']['tmp_name'],$target_pic_2);
$move_3 =  move_uploaded_file($_FILES['pic3']['tmp_name'],$target_pic_3); 
if($move_1 && $move_2 && $move_3){


    $insert = mysqli_query($con,"INSERT INTO `merchandise`( `name`, `description`, `mrp`, `price`, `image_1`,`image_2`,`image_3`, `sale_status`,`p_status`) VALUES ('$name','$des','$mrp','$price','$name_1','$name_2','$name_3','$sale_status','$p_status')");
if($insert){
    echo'<script>window.location.href="../index.php?view_merch"</script>';
}
}

    
    
    
    
}



if(isset($_POST['update_pro'])){
    $id = $_POST['id'];
    $select_from_updating = mysqli_query($con,"SELECT * FROM `merchandise` WHERE `merchandise_id`='$id'");
    $updating_fetch = mysqli_fetch_assoc($select_from_updating);
    $dir = "../../require/images/";
   $name = mysqli_real_escape_string($con,$_POST['p_name']);
     $des = mysqli_real_escape_string($con,$_POST['des']);
   $mrp = mysqli_real_escape_string($con,$_POST['mrp_price']);
   $price = mysqli_real_escape_string($con,$_POST['p_price']);
   $p_status = $_POST['p_status'];
     $sale_status = $_POST['s_status'];
    if(!isset($_FILES['pic1'])&&!isset($_FILES['pic2'])&&!isset($_FILES['pic3'])){
        $name_1 = $updating_fetch['image_1'];
        $name_2 = $updating_fetch['image_2'];
         $name_3 = $updating_fetch['image_3'];
         $update = mysqli_query($con,"UPDATE `merchandise` SET `name`='$name',`description`='$des',`mrp`='$mrp',`price`='$price',`image_1`='$name_1',`image_2`='$name_2',`image_3`='$name_3',`sale_status`='$sale_status',`p_status`='$p_status' WHERE `merchandise_id`='$id'");
         if($update){
             echo'<script>window.location.href="../index.php?view_merch"</script>';
         }
    }else{
        $target_pic_1 = $dir . basename($_FILES['pic1']['name']) ;
     $target_pic_2 = $dir . basename($_FILES['pic2']['name']) ;
     $target_pic_3 = $dir . basename($_FILES['pic3']['name']) ;
     $name_1 = $_FILES['pic1']['name'];
     $name_2 = $_FILES['pic2']['name'];
     $name_3 = $_FILES['pic3']['name'];
         
    $move_1 = move_uploaded_file($_FILES['pic1']['tmp_name'],$target_pic_1);
    $move_2 = move_uploaded_file($_FILES['pic2']['tmp_name'],$target_pic_2);
    $move_3 =  move_uploaded_file($_FILES['pic3']['tmp_name'],$target_pic_3); 
    if($move_1 && $move_2 && $move_3){
    
    
        $update = mysqli_query($con,"UPDATE `merchandise` SET `name`='$name',`description`='$des',`mrp`='$mrp',`price`='$price',`image_1`='$name_1',`image_2`='$name_2',`image_3`='$name_3',`sale_status`='$sale_status',`p_status`='$p_status' WHERE `merchandise_id`='$id'");
    if($update){
        echo'<script>window.location.href="../index.php?view_merch"</script>';
    }
    }
    }
     
   
    
   
    
        
        
        
        
    }


?>