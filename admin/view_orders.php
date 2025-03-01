<?php 
if(isset($_GET['completed'])){

$select = mysqli_query($con,"SELECT *
FROM `order`
INNER JOIN merchandise
ON order.merchandise_id = merchandise.merchandise_id WHERE `status`='2'");



?>
<script>
  $(document).ready(function() {
    // Listen for input changes in the search field
    $('#search').keyup(function() {
      document.getElementById("tablea").style.display = "none";

        // Get the search query
        var query = $(this).val();

        // Send AJAX request to the server
        $.ajax({
            type: 'POST',
            url: 'search_invoice.php', // The URL of your server-side script
            data: { query: query },
            success: function(response) {
                $('#search-results').html(response); // Update search results
            }
        });
    });
});

</script>
<h1  class="text-center rounded text-white bg-dark p-3 mt-2 mb-2">Completed Orders</h1>


<div class="container-fluid" style="background-color: white; border-radius: 20px; padding: 5%;">
<h3 style="display:none;" class="text-center text-white bg-dark   p-2">Search Results</h3>
    <div id="search-results"></div>   
<table id="tablea" class="table table-responsive text-center" >
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
  if(mysqli_num_rows($select) > 0){
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
    <?php if($row_order['status']==="1") { echo'<a class="btn btn-danger w-100" href="index.php?orders&type=completed&id='.$row_order['order_id'].'">Pending</a>';}elseif($row_order['status']==="2"){ echo'<a class="btn btn-success w-100" href="index.php?orders&type=pending&id='.$row_order['order_id'].'">Completed</a>'; }elseif($row_order['status']==="0" ){echo '<b class="text-danger">Cancelled</b>';}elseif($row_order['status']==="0" ){echo '<b class="text-danger">Delete</b>';}?>

<br>
<a class="w-100 btn btn-danger mt-3" href="index.php?orders&type=delete&id=<?php echo $row_order['order_id'] ?>">DELETE</a>

</td>
    </tr>
   <?php  
$i++;   }
   }else{
echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';
   };
   ?>
  </tbody>
</table>
</div>

<?php 
if(isset($_GET['type']) && $_GET['type']=="completed" && isset($_GET['id'])){
    $id = $_GET['id'];
$update  = mysqli_query($con,"UPDATE `order` SET `status`='2' WHERE `order_id`='$id'");
echo'<script>window.location.href="index.php?orders"</script>';

}

if(isset($_GET['type']) && $_GET['type']=="pending" && isset($_GET['id'])){
    $id = $_GET['id'];
$update  = mysqli_query($con,"UPDATE `order` SET `status`='1' WHERE `order_id`='$id'");
echo'<script>window.location.href="index.php?orders"</script>';
}

if(isset($_GET['type']) && $_GET['type']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
$delete  = mysqli_query($con,"DELETE FROM `order` WHERE `order_id`='$id' ");
echo'<script>window.location.href="index.php?orders"</script>';
}

}else{

?>

<?php 


$select = mysqli_query($con,"SELECT *
FROM `order`
INNER JOIN merchandise
ON `order`.merchandise_id = merchandise.merchandise_id ");



?>

<h1  class="text-center rounded text-white bg-dark p-3 mt-2 mb-2">Orders</h1>


<div class="container" style="background-color: white; border-radius: 20px; padding: 5%;">

<table class="table table-responsive text-center" >
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
<style>
      @media (min-width: 300px) and (max-width: 600px) {
      .container , h1{
        font-size: 10px;
      }
      
      }
</style>

  <?php
  $i=1; 
  if(mysqli_num_rows($select) > 0){
  while ($row_order = mysqli_fetch_assoc($select)) {
  
  ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td scope="col"><?php echo $row_order['name']  ?></td>
      <td scope="col"><img src="../require/images/<?php echo $row_order['image_1']  ?>" width="80px" height="80px" alt=""> </td>
      <td scope="col"> <?php echo $row_order['quantity']  ?></td>
      <td scope="col">Rs .<?php echo $row_order['price'] * $row_order['quantity']  ?></td>
      
      <td scope="col"><?php if($row_order['status']==="1"){echo '<b class="text-info">Pending</b>'; }elseif($row_order['status']==="0" ){echo '<b class="text-danger">Cancelled</b>';}elseif($row_order['status']==="2" ){echo '<b class="text-success">Completed</b>';} ?></td>
<td>
 
<a class=" btn btn-danger " style="border-radius:50%;" href="index.php?orders&type=delete&id=<?php echo $row_order['order_id'] ?>"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
<br>
<a class=" btn btn-primary " style="border-radius:50%;" href="index.php?proceed&type=shipping&id=<?php echo $row_order['order_id'] ?>"><i class="fa-solid fa-location-dot"></i></a>

</td>
    </tr>
   <?php  
$i++;   }
   }else{
echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';
   };
   ?>
  </tbody>
</table>
</div>

<?php 
if(isset($_GET['type']) && $_GET['type']=="completed" && isset($_GET['id'])){
    $id = $_GET['id'];
$update  = mysqli_query($con,"UPDATE `order` SET `status`='2' WHERE `order_id`='$id'");
echo'<script>window.location.href="index.php?orders"</script>';

}

if(isset($_GET['type']) && $_GET['type']=="pending" && isset($_GET['id'])){
    $id = $_GET['id'];
$update  = mysqli_query($con,"UPDATE `order` SET `status`='1' WHERE `order_id`='$id'");
echo'<script>window.location.href="index.php?orders"</script>';
}

if(isset($_GET['type']) && $_GET['type']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
$delete  = mysqli_query($con,"DELETE FROM `order` WHERE `order_id`='$id' ");
echo'<script>window.location.href="index.php?orders"</script>';
}
}



if(isset($_GET['type']) && $_GET['type']=="shipping" && isset($_GET['id'])){
$select = mysqli_query($con,"
SELECT
*
FROM
    `order` o
JOIN
    `users` u ON o.`user_id` = u.`username`
JOIN
    `shipping_details` s ON u.`username` = s.`username`;

");
$fetch = mysqli_fetch_assoc($select);

}



















?>