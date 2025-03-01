<?php
include('includes/config.php');
$query = $_POST['query'];

if (!empty($query)) {
    $query = mysqli_real_escape_string($con, $query);
    
    // Construct and execute the database query
    $sql = "SELECT 'Player' AS result_type, 
    `player_id` AS id, 
    `team_id` AS team_id, 
    `name`, 
    `dob`, 
    `career_statistics`, 
    `achivements`, 
    `images`, 
    `playing_role`, 
    NULL AS logo, 
    NULL AS status, 
    NULL AS date_created 
FROM `players` 
WHERE `name` LIKE '%$query%'

UNION

SELECT 'Team' AS result_type, 
    NULL AS id, 
    `team_id`, 
    `name`, 
    NULL AS dob, 
    NULL AS career_statistics, 
    NULL AS achivements, 
    NULL AS images, 
    NULL AS playing_role, 
    `logo`, 
    `status`, 
    `date_created` 
FROM `teams` 
WHERE `name` LIKE '%$query%'";
$result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            
            <div class="col-lg-4 col-sm-5 mt-5  ">
      <a href="index.php?match&type=view_teams&id='. $row['id'] .'" class="card-link">
      <div class="card p-3" style="width: 18rem;">
   <i class="fa-solid fa-3x fa-people-group text-center"></i>
    <div class="card-body">
      <h5 class="card-title text-center">'.$row['name'].'</h5>
     </div>
     
  
  </div>
  </a>
  </div>
            
            ';
        }
    } else {
        echo "<p>No results found</p>";
    }
}

mysqli_close($con);
?>
