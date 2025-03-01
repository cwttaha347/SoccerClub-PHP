
<h1  class="text-center bg-dark rounded text-white p-3 mt-5 mb-2">Contact Responses</h1> 

<div class="container" style="background:white;border-radius:20px;padding:5%;">




                <table class="table text-center  table-sm">
                <thead>
                <tr>    
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    
                    <th>Action</th>


                </tr>
  </thead>
  <tbody>
       
<?php 

   
    $i=1;
$select = mysqli_query($con,"SELECT * FROM `contact`");
if(mysqli_num_rows($select)>0){
while($row_fetch = mysqli_fetch_assoc($select)){
    ?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_fetch['name'] ?></td>
<td><?php echo $row_fetch['phone'] ?></td>
<td><?php echo $row_fetch['email'] ?></td>
<td><?php echo $row_fetch['subject'] ?></td>
<td><?php echo $row_fetch['comment'] ?></td>




<td>
   
    <a class="w-100 btn btn-danger" href="index.php?contact_response&type=delete&id=<?php echo $row_fetch['id'] ?>">Delete</a>


</td>






</tr>







<?php
}$i++;

if(isset($_GET['type'])&& $_GET['type']=="delete" && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($con,"DELETE FROM `contact` WHERE `player_id`='$id'");
    echo'<script>window.location.href="index.php?contact_response"</script>';
}

}else{
    echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>

</tbody>
</table>


</div>