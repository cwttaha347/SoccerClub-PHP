
<?php 
$select_pending_orders = mysqli_query($con,"SELECT * FROM `order`");
$count_orders_pending = mysqli_num_rows($select_pending_orders);
$select_complete_orders = mysqli_query($con,"SELECT * FROM `order` WHERE `status`='2'");
$count_orders_completed = mysqli_num_rows($select_complete_orders);
$select_merch = mysqli_query($con,"SELECT * FROM `merchandise` ");
$count_products = mysqli_num_rows($select_merch);
$select_user = mysqli_query($con,"SELECT * FROM `users` ");
$count_costumers = mysqli_num_rows($select_user);
$select_players = mysqli_query($con,"SELECT * FROM `players` ");
$count_players = mysqli_num_rows($select_players);
$select_teams = mysqli_query($con,"SELECT * FROM `teams` ");
$count_teams = mysqli_num_rows($select_teams);
$select_matches = mysqli_query($con,"SELECT * FROM `matches` ");
$count_matches = mysqli_num_rows($select_matches);
$select_contact = mysqli_query($con,"SELECT * FROM `contact` ");
$count_contact = mysqli_num_rows($select_contact);
$select_cats = mysqli_query($con,"SELECT * FROM `categories` ");
$count_cats = mysqli_num_rows($select_cats);
?>





                <div class="container-fluid pt-4 px-4">
  <div class="row">
  <h3 style="display:none;" class="text-center text-white bg-dark   p-2">Search Results</h3>
    <div id="search-results"></div>   

  </div>
    <h1  class="text-center rounded text-white bg-dark p-3 mt-2 mb-2">Dashboard</h1>
    <div class="row w-100">
 
      <div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?orders" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-clock text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_orders_pending ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Pending Orders</h5>
     </div>
     
  
  </div>
  </a>
  </div>
  <div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?orders&completed" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-check text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_orders_completed ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Completed Orders</h5>
     </div>
     
  
  </div>
  </a>
  </div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?view_merch" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-cart-shopping text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_products ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Merchandise</h5>
     </div>
     
  
  </div>
  </a>
  </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?categories&type=view_cats" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-list text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_cats ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Categories</h5>
     </div>
     
  
  </div>
  </a>
  </div>
  <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=view_match" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-futbol text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_matches ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Matches</h5>
     </div>
     
  
  </div>
  </a>
  </div>
  <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=view_teams" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-people-group text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_teams ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Teams</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?customers" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-user text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_costumers ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Customers</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?blog&type=view" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-blog text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Blog</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=show_players" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-person text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_players ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Players</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?contact_response" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-envelope text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_contact ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Contact Responses</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?website_settings&type=edit" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-gear text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Website Settings</h5>
     </div>
     
  
  </div>
  </a>
  </div>
    </div>
                </div>
<?php 
$commented_code = '



<h1  class="text-center rounded text-white p-3 mt-5 mb-2">Match Stats</h1>
                <a href="index.php?match&type=assign" class="btn btn-success" style="float:right;">Assign Match  <i class="fa-solid fa-plus"></i></a>
<div class="container" style="background:white;border-radius:20px;padding:5%;">




                <table class="table  table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Match Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teams</th>
                    <th>Competition Type</th>

                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
                
<?php 
$select = mysqli_query($con,"SELECT *
FROM `matches`
");

$i=1;
while($row_match = mysqli_fetch_assoc($select)){
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_match[] ?></td>
<td><?php echo $row_match[] ?></td>
<td><?php echo $row_match[] ?></td>
<td><?php echo $row_match[] ?></td>
<td><?php echo $row_match[] ?></td>
<td>
<a class="btn btn-info w-100" href="index.php?match&type=view_details&id=<?php echo $row_match[] ?>">View Details</a>




<a class="btn btn-success w-100" href="index.php?match&type=set_reminder&id=<?php echo  $row_match[] ?>">Remind me <i class="fa-solid fa-bell"></i></a>





</td>






</tr>









<?php
}$i++;



?>



  </tbody>
</table>


</div>
';
?>



