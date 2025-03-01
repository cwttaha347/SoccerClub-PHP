
<?php 
$select_pending_orders = mysqli_query($con,"SELECT * FROM `order` WHERE `status`='1'");
$count_orders_pending = mysqli_num_rows($select_pending_orders);
$select_match = mysqli_query($con,"SELECT * FROM `matches`");
$count_match = mysqli_num_rows($select_match);


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
   <i class="fa-solid fa-3x fa-list text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_orders_pending ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">My Orders</h5>
     </div>
     
  
  </div>
  </a>
  </div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?profile" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-user text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Profile</h5>
     </div>
     
  
  </div>
  </a>
  </div>
  <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=view_match" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-futbol text-center"><span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style="font-size:15px;"><?php echo $count_match ?></span></i>
    <div class="card-body">
      <h5 class="card-title text-center">Upcoming Matches</h5>
     </div>
     
  
  </div>
  </a>
  </div>
  <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=view_teams" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-people-group text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Teams</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?orders" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-gear text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Settings</h5>
     </div>
     
  
  </div>
  </a>
  </div>
   <!-- xxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?soccer_info" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-info text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">Soccer Info</h5>
     </div>
     
  
  </div>
  </a>
  </div>
    </div>
                </div>



            

<div class="container-fluid pt-4 px-4">
<?php
$select_teams = mysqli_query($con,"SELECT * FROM `matches` ");



?>

<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Upcoming Matches</h1>






            <table class="table text-center  table-sm">
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


$i=1;

if(mysqli_num_rows($select_teams)>0){
while($row_match = mysqli_fetch_assoc($select_teams)){
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_match['match_name'] ?></td>
<td><?php echo $row_match['date'] ?></td>
<td><?php echo $row_match['time'] ?></td>
<td><?php 
$team1 = $row_match['team_id_1'];
$team2 = $row_match['team_id_2'];

$select_team_1 = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$team1'"); 
$fetch_t_1 = mysqli_fetch_assoc($select_team_1);
$select_team_2 = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$team2'"); 
$fetch_t_2 = mysqli_fetch_assoc($select_team_2);

echo $fetch_t_1['name'];
echo'<br>';
echo $fetch_t_2['name'];
?></td>
<td><?php  
if($row_match['competition']==="1"){
    echo'UEFA Champions League';
}elseif($row_match['competition']==="2"){
    echo'Africa Cup of Nations';
}elseif($row_match['competition']==="3"){
    echo'Fifa World Cup';
}elseif($row_match['competition']==="4"){
    echo'AFC Asian Cup';
}elseif($row_match['competition']==="5"){
    echo'Fifa U-20 World';
}elseif($row_match['competition']==="6"){
    echo'FA Cup';
}elseif($row_match['competition']==="7"){
    echo'Fifa Considerations Cup';
}elseif($row_match['competition']==="8"){
    echo'EFL Cup';
}elseif($row_match['competition']==="9"){
    echo'AFC Cup';
}elseif($row_match['competition']==="10"){
    echo'AFC Champions League';
}elseif($row_match['competition']==="11"){
    echo'Fifa U-17 World Cup';
}

?></td>

<td>
<a class="w-100 btn btn-info mb-2" href="index.php?match&type=set_reminder&id=<?php echo $row_fetch['match_id'] ?>">Set Reminder   <i class="fa-solid fa-bell"></i></a>




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


<script>
  $(document).ready(function() {

    $('#search').keyup(function() {
      
        var query = $(this).val();

      
        $.ajax({
            type: 'POST',
            url: 'search.php', 
            data: { query: query },
            success: function(response) {
                $('#search-results').html(response); 
            }
        });
    });
});

</script>

          

