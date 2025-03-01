<?php 
$user = $row_user['username'];
$select = mysqli_query($con,"SELECT *
FROM `order`
INNER JOIN merchandise
ON order.merchandise_id = merchandise.merchandise_id WHERE `user_id`='$user'");



?>



<div class="container" style="background-color: white; border-radius: 20px; padding: 5%;">
<h1 class="text-white text-center bg-dark w-100 p-3 mb-3 mt-2" >My Orders</h1>
<table class="table text-center" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>

      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>


  <?php
  $i=1; 
  if(mysqli_num_rows($select)>0){
  while ($row_order = mysqli_fetch_assoc($select)) {
  
  ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row_order['name']  ?></td>
      <td><img src="../require/images/<?php echo $row_order['image_1']  ?>" width="80px" height="80px" alt=""> </td>
      <td><?php echo $row_order['quantity']  ?></td>
      <td>Rs .<?php echo $row_order['price'] * $row_order['quantity']  ?></td>
      
      <td><?php if($row_order['status']==="1"  ){echo '<b class="text-info">Pending</b>'; }elseif($row_order['status']==="0" ){echo '<b class="text-danger">Cancelled</b>';}elseif($row_order['status']==="2" ){echo '<b class="text-success">Completed</b>';} ?></td>
<td>
    <?php if($row_order['status']!="0") { echo'<a class="btn btn-danger w-100" href="index.php?orders&type=cancel&id='.$row_order['order_id'].'">Cancel Order</a>';}else{ echo'<a class="btn btn-danger w-100" href="javascript:void(0);">Cancelled</a>'; }?>



</td>
    </tr>
   <?php  $i++;}
   }else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';
    
    }
   ?>
  </tbody>
</table>
</div>
<?php 

if(isset($_GET['type'])&&$_GET['type']=="cancel"){
 $id= $_GET['id'];
  $update = mysqli_query($con,"UPDATE `order` SET `status`='0' WHERE `order_id`='$id'");
  echo'<script>window.location.href="index.php?orders"</script>';

}



?>