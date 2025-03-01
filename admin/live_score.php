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
if(isset($_GET['type'])&& $_GET['type']==="add" && isset($_GET['id'])){
    $team_1_score = '';
$team_2_score = '';
    $id= $_GET['id'];
    $select_check = mysqli_query($con,"SELECT * FROM `live_scores` WHERE `match_id`='$id'");
    if(mysqli_num_rows($select_check)){
$fetch_check = mysqli_fetch_assoc($select_check);
$team_1_score = $fetch_check['team1_score'];
$team_2_score = $fetch_check['team2_score'];


    }
?>
<style>
    .form-control{
        border:1px solid black;
        margin-bottom: 4%;
    }
    .form-control:focus{
        border:1px solid black;

    }
</style>
<div class="container p-5">
    <h1 class="text-center bg-dark text-white w-100 p-3 mt-5 mb-5" >Insert Live Scores</h1>
<form action="" method="post">
<input type="hidden" name="match_id" value="<?php echo $_GET['id'] ?>">
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name" class="form-label">Team 1 Score</label>
            <input type="text" class="form-control" value="<?php echo $team_1_score ?>" name="team1_score">
            
        </div>
      
    </div>

    <div class="col">
        <div class="form-group">
            <label for="name" class="form-label">Team 2 Score</label>
            <input type="text" class="form-control" value="<?php echo $team_2_score ?>" name="team2_score">
            
        </div>
    
    </div>
    <div class="col">
        <div class="form-group">
            <label for="name" class="form-label">Select Match Status</label>
           <select class="form-control" name="match_status" id="">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
           </select>
            
        </div>
    
    </div>
</div>

    <input type="submit" value="Insert Scores" class="btn btn-success" name="insert_live">
</form>
</div>
<?php
}
if (isset($_POST['insert_live'])) {
    $match_id = $_POST['match_id'];
    $team1_score = $_POST['team1_score'];
    $team2_score = $_POST['team2_score'];
    $match_status = $_POST['match_status'];
 

    
    $insertQuery =          mysqli_query($con,"SELECT * FROM `live_scores` WHERE `match_id`='$match_id'");
if(mysqli_num_rows($insertQuery) > 0){
$update = mysqli_query($con,"UPDATE `live_scores` SET `team1_score`='$team1_score',`team2_score`='$team2_score',`match_status`='$match_status' WHERE `match_id`='$match_id' ");
if($update){
    echo '<script>window.location.href="index.php?match&type=view"</script>';

}

}else{
    if (mysqli_query($con,"INSERT INTO live_scores (match_id, team1_score, team2_score, match_status)
    VALUES ('$match_id', '$team1_score', '$team2_score', '$match_status')")) {
        echo '<script>window.location.href="index.php?match&type=view"</script>';
    } else {
        echo "Error in  inserting live scores ";
    }
}
    
}
?>
