<style> 
.form-control{
    border:1px solid grey !important;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey !important;
    border:1px solid grey !important;

}

</style>


<?php if(isset($_GET['type'])&& $_GET['type']=="show_players" && isset($_GET['id'])){
     $id = $_GET['id'];
    $select = mysqli_query($con,"SELECT * FROM `players` WHERE `team_id`='$id' ");
    $select_team = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$id' ");

    $pre = mysqli_fetch_assoc($select_team);
    ?>

<h1  class="text-center rounded text-white p-3 mt-5 mb-2">Players Of <?php echo $pre['name']?></h1> <a style="float:right;" href="index.php?match&type=add_players" class="btn btn-success">Add Players    <i class="fa fa-plus"></i></a>

<div class="container" style="background:white;border-radius:20px;padding:5%;">




                <table class="table text-center  table-sm">
                <thead>
                <tr>    
                    <th>#</th>
                    <th>Player Name</th>
                    <th>Player Image</th>
                    <th>Playing Role</th>
                    
                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
       
<?php 

   
    $i=1;

if(mysqli_num_rows($select)>0){
while($row_fetch = mysqli_fetch_assoc($select)){
    ?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['name'] ?></td>
<td><img src="../require/images/<?php echo $row_fetch['images'] ?>" width="70px" height="70px"></td>
<td><?php echo $row_fetch['playing_role'] ?></td>


<td>
    <a class="w-100 btn btn-info" href="index.php?match&type=player_stats&id=<?php echo $row_fetch['player_id'] ?>">More Details</a>
<br>
    <a class="w-100 btn btn-danger" href="index.php?match&type=delete_players&id=<?php echo $row_fetch['player_id'] ?>">Delete</a>


</td>






</tr>







<?php
}$i++;

if(isset($_GET['type'])&& $_GET['type']=="delete_player" && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($con,"DELETE FROM `players` WHERE `player_id`='$id'");
    $delete2 = mysqli_query($con,"DELETE FROM `player_statistics` WHERE `player_id`='$id'");
    echo'<script>window.location.href="index.php?match&type=show_players&id='. $id . '"</script>';
}

}else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>

</tbody>
</table>


</div>

<?php
}

?>
<?php
if (isset($_GET['type']) && $_GET['type'] ==="assign_match") {
 
?>
<style>
    .form-control , .form-select {
        background: none;
        border:1px solid black !important;
    }
</style>

<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Add Match </h1> <a style="float:right;" href="index.php?match&type=view_match" class="btn btn-success">View Matches    <i class="fa fa-eye"></i></a>

<div class="container" style="background:white; padding:5%;border-radius:20px;">
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Match Name</label>
                <input type="text" class="form-control" placeholder="Match Name" required name="match_name">
            </div>
            <div class="col">
                <label for="" class="form-label">Match Date</label>
                <input type="date" class="form-control" placeholder="Match Date" required name="match_date">
            </div>
            <div class="col">
                <label for="" class="form-label">Match Time</label>
                <input type="time" class="form-control" placeholder="Match time" required name="match_time">
            </div>
            <div class="col">
                <label for="" class="form-label">Competition Type</label>
              <select class="form-select" name="competition_type" required>
              <option value="" selected disabled>---Select Competition---</option>
                
                <option value="1">UEFA Champions League</option>
                <option value="2">Africa Cup of nations</option>
                <option value="3">Fifa World Cup</option>
                <option value="4">AFC Asian Cup</option>
                <option value="5">Fifa U-20 World</option>
                <option value="6">FA cup</option>
                <option value="7">Fifa Considerations cup</option>
                <option value="8">EFL Cup</option>
                <option value="9">AFC Cup</option>
                <option value="10">AFC Champions League</option>
                <option value="11">Fifa U-17 World Cup</option>

              </select>
            </div>
            </div>
            <div class="row">
            <div class="col mt-3">
                <label for="" class="form-label">Team No 1</label>
              <select class="form-select" name="team_1" required>
              <option value="" selected disabled>---Select Team---</option>
                <?php 
                $select_team1 = mysqli_query($con,"SELECT * FROM `teams`");
                if(mysqli_num_rows($select_team1)>0){
while ($row_team1 = mysqli_fetch_assoc($select_team1)) {
    ?>
<option value="<?php echo $row_team1['team_id'] ?>"><?php echo $row_team1['name'] ?></option>
    
    <?php 
} 
}?>
                
               
              </select>
            </div>
            <div class="col mt-3">
                <label for="" class="form-label">Team No 2</label>
              <select class="form-select" name="team_2" required>
              <option value="" selected disabled>---Select Team---</option>
                <?php 
                $select_team2 = mysqli_query($con,"SELECT * FROM `teams`");
                if(mysqli_num_rows($select_team2)>0){
while ($row_teams = mysqli_fetch_assoc($select_team2)) {
    ?>
<option value="<?php echo $row_teams['team_id'] ?>"><?php echo $row_teams['name'] ?></option>
    <?php
     }
 }
 ?>
                
               
              </select>
            </div>
            <div class="col mt-3">
<label for="" class="form-label">Logo</label>
<input type="file" name="logo" required class="form-control">
            </div>
            </div>
            
            <div class="row">
                <div class="col mt-3 mb-5">
                    <label for="" class="form-label">Additional Info</label>
                    <textarea class="form-control" name="addi_info" id="" cols="30" required rows="10"></textarea>
                </div>
            </div>
        <button type="submit" name="assign_match" class="btn btn-primary">Add Match</button>
    </form>
</div>

<?php 
if (isset($_POST['assign_match'])) {
    $match_name = $_POST['match_name'];
    $match_date = $_POST['match_date'];
    $match_time = $_POST['match_time'];
    $competition_type = $_POST['competition_type'];
    $team1 = $_POST['team_1'];
    $team2 = $_POST['team_2'];
    $addi_info = $_POST['addi_info'];
    $logo_name = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name']; 
    $dir = '../require/images/' . $logo_name; 
    
if(move_uploaded_file($logo_tmp, $dir)){
 
    $insert_match = mysqli_query($con,"INSERT INTO matches (`match_name`, `date`, `time`, `competition`, `team_id_1`,`team_id_2`, `additional_info`) VALUES ('$match_name', '$match_date', '$match_time', '$competition_type','$team_id_1','$team_id_2',  '$addi_info')");
  
    if ($insert_match) {
        echo '<script>window.location.href="index.php?match&type=view_match"</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
}
}
?>


<?php 
if(isset($_GET['type'])&&$_GET['type']=="add_team"){?>

<style>
    .form-control , .form-select {
        background: none;
        border:1px solid black !important;
    }
</style>
<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Add Teams</h1> 
<a class="btn btn-success " style="float: right;"  href="index.php?match&type=view_teams">View Teams <i class="fa-solid fa-eye"></i></a>
<div class="container" style="background:white; padding:5%;border-radius:20px;">
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Team Name</label>
                <input type="text" class="form-control" placeholder="Team Name" required name="team_name">
            </div>
            <div class="col">
                <label for="" class="form-label">Matches Played</label>
                <input type="text" class="form-control" placeholder="Match Played" required name="matches_played">
            </div>
            <div class="col">
                <label for="" class="form-label">Matches Win</label>
                <input type="text" class="form-control" placeholder="Match win" required name="matches_win">
            </div>
            <div class="col">
                <label for="" class="form-label">Matches Lost</label>
                <input type="text" class="form-control" placeholder="Match Lost" required name="matches_lost">
            </div>
            <div class="col">
                <label for="" class="form-label">Matches Tie</label>
                <input type="text" class="form-control" placeholder="Match Tie" required name="matches_tie">
            </div>
            <div class="col">
                <label for="" class="form-label">Status</label>
               <select name="status" class="form-select">
                 <option selected disabled>Select Status</option>
                 <option value="1">Active</option>
                 <option value="2">DeActive</option>
              
               </select>
            </div>
            
           
            
            </div>
            <div class="row">
            <div class="col mt-3">
<label for="" class="form-label">Logo</label>
<input type="file" name="logo_team" required class="form-control">
            </div>
            </div>
           
        <button type="submit" name="add_team" class="btn btn-primary mt-5">Add Team</button>
    </form>
</div>


<?php 
if (isset($_POST['add_team'])) {
    $team_name = $_POST['team_name'];
   $status = $_POST['status'];
  $mat_win= $_POST['matches_win'];

  $mat_played= $_POST['matches_played'];
  $mat_lost= $_POST['matches_lost'];
  $mat_tie= $_POST['matches_tie'];

     
     $logo_name = $_FILES['logo_team']['name'];
     $logo_tmp = $_FILES['logo_team']['tmp_name'];
     $dir = '../require/images/' . $logo_name; 
     
if(move_uploaded_file($logo_tmp, $dir)){
    $insert_teams = mysqli_query($con,"INSERT INTO `teams`(`name`, `logo`, `status`) VALUES ('$team_name','$logo_name','$status')");
    $team_id = mysqli_insert_id($con);
$insert_stats = mysqli_query($con,"INSERT INTO `team_statistics`(`team_id`, `matches_played`, `matches_win`, `matched_lost`, `matches_tie`)VALUES('$team_id','$mat_played','$mat_win','$mat_lost','$mat_tie')");

    if ($insert_teams && $insert_stats) {
        echo '<script>window.location.href="index.php?match&type=view_teams"</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
}



?>
    <?php }?>

 <?php   if(isset($_GET['type'])&&$_GET['type']=="view_teams"){

    $select_teams = mysqli_query($con,"SELECT * FROM `teams` ");
   

    
    ?>

<h1  class="text-center rounded text-white p-3 mt-5 mb-2">Teams </h1><a href="index.php?match&type=add_team" class="btn btn-success" style="float:right;">Add Teams   <i class="fa-solid fa-plus"></i></a>

<div class="container" style="background:white;border-radius:20px;padding:5%;">




                <table class="table text-center  table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Team Name</th>
                    <th>Team Logo</th>
                    <th>Team Status</th>
                  
                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
       
<?php 

   
    $i=1;

if(mysqli_num_rows($select_teams)>0){
while($row_fetch = mysqli_fetch_assoc($select_teams)){
    ?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['name'] ?></td>
<td><img src="../require/images/<?php echo $row_fetch['logo'] ?>" width="70px" height="70px" alt=""></td>
<td><?php if($row_fetch['status']==="1"){echo'<b class="text-success text-center">Active</b>';}elseif($row_fetch['status']==="0"){echo'<b class="text-danger text-center">DeActive</b>';} ?></td>


<td>
    <a class="w-100 btn btn-info mb-2" href="index.php?match&type=team_stats&id=<?php echo $row_fetch['team_id'] ?>">More Details</a>
    <br>
    <a class="w-100 btn btn-info mb-2" href="index.php?match&type=show_players&id=<?php echo $row_fetch['team_id'] ?>">Show Players</a>
<br>
    <a class="w-100 btn btn-danger" href="index.php?match&type=delete_team&id=<?php echo $row_fetch['team_id'] ?>">Delete</a>


</td>






</tr>







<?php
}$i++;

if(isset($_GET['type'])&& $_GET['type']=="delete_team" && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($con,"DELETE FROM `teams` WHERE `team_id`='$id'");
    $delete2 = mysqli_query($con,"DELETE FROM `team_statistics` WHERE `team_id`='$id'");
    echo'<script>window.location.href="index.php?match&type=view_teams&id='. $id . '"</script>';
}

}else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>

  </tbody>
                </table>
</div>
    <?php } ?>

  <?php  if(isset($_GET['type'])&&$_GET['type']=="team_stats"&& isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_team = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$id'");
    $pre = mysqli_fetch_assoc($select_team);
    $select_specific_team = mysqli_query($con,"SELECT * FROM `team_statistics` WHERE team_id='$id'");
    $fetch = mysqli_fetch_assoc($select_specific_team);
    ?>




<div class="container">
  <p class="container-title">Team Stats of <?php echo $pre['name']?></p>

 

<br>
<br>


  <center>
<div class="card">
  <div class="card-img"><img src="../require/images/<?php echo $pre['logo'] ?>" alt=""></div>
  <div class="card-body">Teams Stats (history)</div>
  <div class="card-footer">
<li>Matches Played : <?php echo $fetch['matches_played'] ?></li>
<li>Matches Lost : <?php echo $fetch['matched_lost'] ?></li>
<li>Matches Tie : <?php echo $fetch['matches_tie'] ?></li>
<a class="btn btn-success text-center" href="index.php?match?type=show_players&id=<?php echo $pre['team_id'] ?>">View Players </a>


  </div>
</div>
  </center>
  </div>








    <?php } ?>




    <?php  if(isset($_GET['type'])&&$_GET['type']=="player_stats"&& isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_player = mysqli_query($con,"SELECT *
    FROM player_statistics AS ps
    JOIN players AS p
    ON ps.player_id = p.player_id
    WHERE ps.player_id = '$id'
    ");
   

    $fetch = mysqli_fetch_assoc($select_player);
    ?>

<div class="container">
  <h1 class="text-center text-white bg-dark w-100 p-3 mb-3"> Stats of <?php echo $fetch['name']?></h1>

 

<br>
<br>


  <center>
<div class="card">
  <div class="card-img"><img src="../require/images/<?php echo $fetch['images'] ?>" alt=""></div>
  <div class="card-body">Teams Stats (history)</div>
  <div class="card-footer">
<li>Date Of Birth : <?php echo $fetch['dob'] ?></li>
<li>Career statistics : <?php echo $fetch['career_statistics'] ?></li>
<li>Acheivements : <?php echo $fetch['achivements'] ?></li>
<li>Playing Role : <?php echo $fetch['playing_role'] ?></li>
<li>Goals : <?php echo $fetch['goals'] ?></li>
<li>Assists : <?php echo $fetch['assists'] ?></li>
<li>Shots On Target : <?php echo $fetch['shots_on_target'] ?></li>
<li>Yellow Card : <?php echo $fetch['yellow_card'] ?></li>
<li>Red Card : <?php echo $fetch['red_card'] ?></li>

<a class="btn btn-success text-center" href="index.php?match&type=view_teams&id=<?php echo $fetch['team_id'] ?>">View Team of This Player </a>


  </div>
</div>
  </center>
  </div>



<?php
    }
?>



<?php
if (isset($_GET['type']) && $_GET['type'] == "add_players") { ?>

<style>
    .form-control , .form-select {
        background: white !important;
        border:black;
    }
</style>
<h1  class="text-center rounded text-white p-3 mt-5 mb-2">Add Players</h1> 
<a class="btn btn-success " style="float: right;"  href="index.php?match&type=view_teams">View Teams <i class="fa-solid fa-eye"></i></a>
<div class="container" style="background:white; padding:5%;border-radius:20px;">
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="row">
            <div class="col mt-3">
                <label for="" class="form-label">Player Name</label>
                <input type="text" class="form-control" placeholder="Player Name" required name="player_name">
            </div>
            <div class="col mt-3">
                <label for="" class="form-label">Date of birth</label>
                <input type="date" class="form-control" placeholder="dob" required name="dob">
            </div>
            <div class="col mt-3">
                <label for="" class="form-label">Playing Role</label>
                <input type="text" class="form-control" placeholder="example : Goal keeper , defender etc" required name="playing_role">
            </div>
            <div class="col mt-3">
                <label for="" class="form-label">Player Image</label>
                <input type="file" class="form-control"  required name="player_image">
            </div>
           
            
           
            
            </div>
            <div class="row">
            <div class="col mt-3">
                <label for="" class="form-label">Career Statistics</label>
                <textarea class="form-control" name="career_statistics" id="" cols="30" required rows="10"></textarea>
            
            </div>
            <div class="col mt-3">
                <label for="" class="form-label">Acheivements</label>
                <textarea class="form-control" name="achievements" id="" cols="30" required rows="10"></textarea>
            
            </div>

            </div>
           <div class="row">
           <div class="col mt-3">
                <label for="" class="form-label">Select Team Of this Player</label>
               <select name="team" class="form-select">
                 <option selected disabled>Select Team</option>
                 <?php 
                 $select_teams = mysqli_query($con,"SELECT * FROM `teams`");
              
                 while(   $fetch = mysqli_fetch_assoc($select_teams)){

                
                 ?>
<option value="<?php echo $fetch['team_id'] ?>"><?php echo $fetch['name'] ?></option>

                 <?php
                  }
                 ?>
                
              
               </select>
            </div>
            <div class="col mt-3">
<label for="" class="form-label">Goals of this Player</label>
<input type="text" name="goals" required class="form-control">
            </div>
            <div class="col mt-3">
<label for="" class="form-label">Assists of this Player</label>
<input type="text" name="assists" required class="form-control">
            </div>
            <div class="col mt-3">
<label for="" class="form-label">Shots On Target</label>
<input type="text" name="s_on_t" required class="form-control">
            </div>
           </div>

           <div class="row">
           <div class="col mt-3">
<label for="" class="form-label">Yellow Cards to this Player</label>
<input type="text" name="yellow_card" required class="form-control">
            </div>
            <div class="col mt-3">
<label for="" class="form-label">Red Cards to this Player</label>
<input type="text" name="red_card" required class="form-control">
            </div>
           </div>
        <button type="submit" name="add_player" class="btn btn-primary mt-5">Add Player</button>
    </form>
</div>


<?php 
if (isset($_POST['add_player'])) {
    $player_name = $_POST['player_name'];
   $team = $_POST['team'];
  $goals= $_POST['goals'];
$acheivements = $_POST['achievements'];
  $assists= $_POST['assists'];
  $s_on_t= $_POST['s_on_t'];
  $red_cards= $_POST['red_card'];
  $dob = $_POST['dob'];
  $playing_role = $_POST['playing_role'];
  $yellow_cards= $_POST['yellow_card'];
     $career_stats = $_POST['career_statistics'];
     $logo_name = $_FILES['player_image']['name'];
     $logo_tmp = $_FILES['player_image']['tmp_name'];
     $dir = '../require/images/' . $logo_name; 
     
if(move_uploaded_file($logo_tmp, $dir)){
    $insert_stats = mysqli_query($con,"INSERT INTO `players`(`team_id`, `name`, `dob`, `career_statistics`, `achivements`, `images`, `playing_role`) VALUES ('$team','$name','$dob','$career_stats','$acheivements','$logo_name','$playing_role')");
    $player_id = mysqli_insert_id($con);
    $insert_players_stats = mysqli_query($con,"INSERT INTO `player_statistics`(`player_id`, `goals`, `assists`, `shots_on_target`, `yellow_card`, `red_card`) VALUES ('$player_id','$goals','$assists','$s_on_t','$yellow_cards','$red_cards')");

    if ($insert_players_stats && $insert_stats) {
        echo '<script>window.location.href="index.php?match&type=show_players&id='. $team .'"</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
}



?>
    <?php }?>



   <?php 
   if(isset($_GET['type']) && $_GET['type']==="view_match"){
?>



<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Match Stats</h1>
                <a href="index.php?match&type=assign_match" class="btn btn-success" style="float:right;">Assign Match  <i class="fa-solid fa-plus"></i></a>
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
<a class="btn btn-info w-100" href="index.php?match&type=view_teams&id=<?php echo $row_match['match_id'] ?>">View Teams</a>



<br>

<a class="btn btn-success w-100" href="index.php?live_scores&type=add&id=<?php echo  $row_match['match_id'] ?>">Update Live score<i class="fa-solid fa-plus"></i></a>

<br>
<?php
 
if($row_match['status']==="0"){
echo '
<a class="btn btn-warning w-100" href="index.php?match&type=set_live&id= '.$row_match['match_id'].' ">Set Live<i class="fa-solid fa-plus"></i></a>
';
}else{
    echo '
<a class="btn btn-success w-100" href="index.php?match&type=set_dissmiss&id= '.$row_match['match_id'].' ">Showing Live <i class="fa-solid fa-plus"></i></a>
';
}

?>



</td>






</tr>









<?php
}$i++;



?>



  </tbody>
</table>


</div>
<?php 
   }
   
   
   ?> 


<?php if(isset($_GET['type'])&& $_GET['type']==="show_players" && !isset($_GET['id'])){
    



    $select = mysqli_query($con,"SELECT * FROM `players`  ");


    
    ?>

<h1  class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Players </h1>

<div class="container" style="background:white;border-radius:20px;padding:5%;">




                <table class="table text-center  table-sm">
                <thead>
                <tr>    
                    <th>#</th>
                    <th>Player Name</th>
                    <th>Player Image</th>
                    <th>Playing Role</th>
                    
                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
       
<?php 

   
    $i=1;

if(mysqli_num_rows($select)>0){
while($row_fetch = mysqli_fetch_assoc($select)){
    ?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['name'] ?></td>
<td><img src="../require/images/<?php echo $row_fetch['images'] ?>" width="70px" height="70px"></td>
<td><?php echo $row_fetch['playing_role'] ?></td>


<td>
    <a class="w-100 btn btn-info" href="index.php?match&type=player_stats&id=<?php echo $row_fetch['player_id'] ?>">More Details</a>

   

</td>






</tr>







<?php
}$i++;

if(isset($_GET['type'])&& $_GET['type']=="delete_player" && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($con,"DELETE FROM `players` WHERE `player_id`='$id'");
    $delete2 = mysqli_query($con,"DELETE FROM `player_statistics` WHERE `player_id`='$id'");
    echo'<script>window.location.href="index.php?match&type=show_players&id='. $id . '"</script>';
}

}else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>

</tbody>
</table>


</div>

<?php
}




if(isset($_GET['type']) && $_GET['type']==="set_live" && isset($_GET['id'])){
    $id = $_GET['id'];
$query = mysqli_query($con,"UPDATE `matches` SET `status`='1' WHERE `match_id`='$id'");
echo'<script>window.location.href="index.php?match&type=view_match"</script>';
}else
if(isset($_GET['type']) && $_GET['type']==="set_dissmiss" && isset($_GET['id'])){
    $id = $_GET['id'];
$query = mysqli_query($con,"UPDATE `matches` SET `status`='0' WHERE `match_id`='$id'");
echo'<script>window.location.href="index.php?match&type=view_match"</script>';
}
?>