<?php
include('require/config.php');

$live = mysqli_query($con,"SELECT m.match_id, m.match_name, m.date, m.time, t1.name AS team1_name, t1.logo AS team1_logo,
t2.name AS team2_name, t2.logo AS team2_logo, ms.team1_score, ms.team2_score, ms.match_status, ms.match_date
FROM matches AS m
INNER JOIN live_scores AS ms ON m.match_id = ms.match_id
INNER JOIN teams AS t1 ON m.team_id_1 = t1.team_id
INNER JOIN teams AS t2 ON m.team_id_2 = t2.team_id") ; 


if (mysqli_num_rows($live) > 0) {
    echo '<div class="result clearfix">';

    while ($row = mysqli_fetch_assoc($live)) {
        echo '<div class="result-details">';
        echo '<div class="content">';
        echo '<h4>' . $row['team1_name'] . '</h4>';
   
        echo '</div>';
        echo '<div class="figure">';
        echo '<div class="team-logo">';
        echo '<div style="background:url(require/images/' . $row['team1_logo'] . '); background-size:cover;" class="teamLogoImg"></div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="result-count">';
        echo '<div class="count-number">';
        echo '<span class="lose-team">' . $row['team1_score'] . '</span>';
        echo '<span>-</span>';
        echo '<span class="win-team">' . $row['team2_score'] . '</span>';
        echo '</div>';
        echo '<div class="dateTime">';
        echo '<div class="dateTime-container">';
       
        echo '</div>';
        echo '<div class="country-wrap">';
     
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="result-details">';
        echo '<div class="content contentresult">';
        echo '<h4>' . $row['team2_name'] . '</h4>';
      
        echo '</div>';
        echo '<div class="figure figresult">';
        echo '<div class="team-logo">';
        echo '<div style="background:url(require/images/' . $row['team2_logo'] . '); background-size:cover;" class="teamLogoImg"></div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="center">';
        echo '<a href="#" class="btn btn-red score-btn">Score board</a>';
        echo '</div>';
    }

    echo '</div>';
} else {
    echo 'No live scores available.';
}
?>
