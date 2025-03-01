<?php if(isset($_GET['type'])&& $_GET['type']=="show_players" && isset($_GET['id'])){
     $id = $_GET['id'];
    $select = mysqli_query($con,"SELECT * FROM `players` WHERE `team_id`='$id' ");
    $select_team = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$id' ");

    $pre = mysqli_fetch_assoc($select_team);
    ?>

<h1  class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Players Of <?php echo $pre['name']?></h1>

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

?>

 <?php   if(isset($_GET['type'])&&$_GET['type']=="view_teams"){

    $select_teams = mysqli_query($con,"SELECT * FROM `teams` ");
   

    
    ?>

<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Teams </h1>

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
    <?php } ?>

  <?php  if(isset($_GET['type'])&&$_GET['type']=="team_stats"&& isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_team = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$id'");
    $pre = mysqli_fetch_assoc($select_team);
    $select_specific_team = mysqli_query($con,"SELECT * FROM `team_statistics` WHERE team_id='$id'");
    $fetch = mysqli_fetch_assoc($select_specific_team);
    ?>







 

<br>
<br>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .card-img img {
            max-width: 100%;
            height: auto;
        }
        .card-body {
            font-size: 20px;
            margin-top: 15px;
        }
        .card-footer {
            margin-top: 15px;
        }
        .card-footer ul {
            list-style: none;
            padding: 0;
        }
        .card-footer ul li {
            margin-bottom: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>

<div class="container">
  
        <div class="card">
        <h1 class="text-center text-white bg-dark w-100 p-3 mt-2 mb-5 text-uppercase">Team Stats of <?php echo $pre['name']?></h1>
            <div class="card-img"><img src="../require/images/<?php echo $pre['logo']; ?>" alt=""></div>
            <div class="card-body">Teams Stats (history)</div>
            <div class="card-footer">
                <ul>
                    <li>Matches Played: <?php echo $fetch['matches_played']; ?></li>
                    <li>Matches Lost: <?php echo $fetch['matched_lost']; ?></li>
                    <li>Matches Tie: <?php echo $fetch['matches_tie']; ?></li>
                </ul>
                <a class="btn" href="index.php?match&type=show_players&id=<?php echo $pre['team_id']; ?>">View Players</a>
            </div>
        </div>
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
  <h1 class=" text-uppercase text-white bg-dark w-100 p-3 text-center"> Stats of <?php echo $fetch['name']?></h1>

  <center>
<div class="card">
  <div class="card-img"><img style="border-radius:50%;" src="../require/images/<?php echo $fetch['images'] ?>" alt=""></div>
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

<a class="btn btn-success mt-4 text-center" href="index.php?match&type=view_teams&id=<?php echo $fetch['team_id'] ?>">View Team of This Player </a>


  </div>
</div>
  </center>
  </div>



<?php
    }
?>



<?php   if(isset($_GET['type'])&&$_GET['type']=="view_match"){

$select_teams = mysqli_query($con,"SELECT * FROM `matches` ");



?>

<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Upcoming Matches</h1>

<div class="container" style="background:white;border-radius:20px;padding:5%;">




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
while($row_fetch = mysqli_fetch_assoc($select_teams)){
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['match_name'] ?></td>
<td><?php echo $row_fetch['date'] ?></td>
<td><?php echo $row_fetch['time'] ?></td>
<td><?php 
$team1 = $row_fetch['team_id_1'];
$team2 = $row_fetch['team_id_2'];

$select_team_1 = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$team1'"); 
$fetch_t_1 = mysqli_fetch_assoc($select_team_1);
$select_team_2 = mysqli_query($con,"SELECT * FROM `teams` WHERE `team_id`='$team2'"); 
$fetch_t_2 = mysqli_fetch_assoc($select_team_2);

echo $fetch_t_1['name'];
echo'<br>';
echo $fetch_t_2['name'];
?></td>
<td><?php  
if($row_fetch['competition']==="1"){
    echo'UEFA Champions League';
}elseif($row_fetch['competition']==="2"){
    echo'Africa Cup of Nations';
}elseif($row_fetch['competition']==="3"){
    echo'Fifa World Cup';
}elseif($row_fetch['competition']==="4"){
    echo'AFC Asian Cup';
}elseif($row_fetch['competition']==="5"){
    echo'Fifa U-20 World';
}elseif($row_fetch['competition']==="6"){
    echo'FA Cup';
}elseif($row_fetch['competition']==="7"){
    echo'Fifa Considerations Cup';
}elseif($row_fetch['competition']==="8"){
    echo'EFL Cup';
}elseif($row_fetch['competition']==="9"){
    echo'AFC Cup';
}elseif($row_fetch['competition']==="10"){
    echo'AFC Champions League';
}elseif($row_fetch['competition']==="11"){
    echo'Fifa U-17 World Cup';
}

?></td>

<td>
<?php
$email = $row_user['email'];
$match_id = $row_fetch['match_id'];
$select_reminder = mysqli_query($con,"SELECT * FROM `reminder` WHERE `match_id`='$match_id' AND `email`='$email'"); 
if(mysqli_num_rows($select_reminder)>0){
echo '<a class="w-100 btn btn-info mb-2" href="javascript:void();">will be notified   <i class="fa-solid fa-bell"></i></a>
';
}else{
    ?>
    <a class="w-100 btn btn-info mb-2" href="index.php?match&type=set_reminder&id=<?php echo $row_fetch['match_id'] ?>">Set Reminder   <i class="fa-solid fa-bell"></i></a>
<?php
}

?>





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
<?php } ?>


    <?php
    if(isset($_GET['type'])&& $_GET['type']==="set_reminder" && isset($_GET['id'])){
        $match_id = $_GET['id'];
        $email = $row_user['email'];
        $status = 'active';
      $select = mysqli_query($con,"INSERT INTO `reminder` (`match_id`, `email`, `status`) VALUES ('$match_id', '$email', '$status')");
   if($select){
echo'<script>window.location.href="index.php?match&type=view_match"</script>';
   }
   
    }
    
    
    ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");
require("../PHPMailer/src/Exception.php");

include('includes/config.php');

$reminderQuery = "SELECT * FROM `reminder`";
$reminderResult = mysqli_query($con, $reminderQuery);

if (mysqli_num_rows($reminderResult) > 0) {
    while ($row = mysqli_fetch_assoc($reminderResult)) {
        $matchID = $row['match_id'];

       
        $matchQuery = "SELECT * FROM `matches` WHERE `match_id` = $matchID";
        $matchResult = mysqli_query($con, $matchQuery);

        if (mysqli_num_rows($matchResult) > 0) {
            $matchData = mysqli_fetch_assoc($matchResult);
            $matchTime = strtotime($matchData['date'] . ' ' . $matchData['time']);
            $currentTime = time();
            $reminderTimeInSeconds = 100; 

            if ($matchTime - $currentTime <= $reminderTimeInSeconds) {

                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = 'msg360combat@gmail.com'; 
                $mail->Password = 'blwiwoefzmbiufmx'; 

                $mail->SetFrom('msg360combat@gmail.com', 'Soccer Club');
                $mail->AddAddress($row['email']);

                $mail->Subject = 'Match Reminder';
                $mail->Body = 'The match "' . $matchData['match_name'] . '" is scheduled soon.';

                if ($mail->Send()) {
                    echo 'Reminder email sent to ' . $row['email'] . '<br>';
                } else {
                    echo 'Error sending email to ' . $row['email'] . ': ' . $mail->ErrorInfo . '<br>';
                }
            }
        }
    }
}


?>




