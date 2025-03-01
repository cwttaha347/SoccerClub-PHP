
<div class="container-fluid pt-4 px-4">
<?php
$select_info = mysqli_query($con,"SELECT * FROM `soccer_info` ");



?>

<h1  class="text-center rounded text-white bg-dark p-3 mt-5 mb-2">Soccer Info</h1>






      
<?php 


$i=1;

if(mysqli_num_rows($select_info)>0){
while($row_fetch = mysqli_fetch_assoc($select_info)){
?>




<h2 class="mb-5 mt-4">Tricks</h2>
<p class="mb-5">
<?php echo $row_fetch['tricks'] ?>
</p>
<h2 class="mb-5">Facts</h2>
<p class="mb-5"> 
<?php echo $row_fetch['facts'] ?>
</p>
<h2 class="mb-5">Information</h2>
<p class="mb-5">
<?php echo $row_fetch['information'] ?>
</p>



















<?php
}$i++;



}else{
echo'<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';

}
?>


</div>