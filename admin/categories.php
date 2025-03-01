<style> 
.form-control{
    border:1px solid grey;

}
.form-control:focus{
    box-shadow:0px 5px 16px 3px grey;
    border:1px solid grey;

}

</style>
<?php

if (isset($_GET['type']) && $_GET['type'] === "view_cats") {
    ?>

    <h1 class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Categories</h1><a style="float:right;"
        class="btn btn-success" href="index.php?categories&type=add">Inserta a New Category <i class="fa-solid fa-plus"></i>
    </a>

    <div class="container" style="background:white;border-radius:20px;padding:5%;">




        <table class="table text-center  table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Category Status</th>
                    <th>Category Date</th>

                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $select_cat = mysqli_query($con, "SELECT * FROM `categories`");
                if (mysqli_num_rows($select_cat) > 0) {
                    $i=1;
                    while ($row = mysqli_fetch_array($select_cat)) { ?>



                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $row['cat_name'] ?>
                            </td>
                            <td>
                                <?php if ($row['status'] === "1") {
                                    echo '<b class="text-success">Active</b>';
                                } else {
                                    echo '<b class="text-success">Active</b>';
                                } ?>
                            </td>

                            <td>
                                <?php echo $row['date_created'] ?>
                            </td>


                            <td>
                                <a class="w-100 btn btn-info"
                                    href="index.php?categories&type=edit&id=<?php echo $row['cat_id'] ?>">Edit</a>
                                <br>
                                <a class="w-100 btn btn-danger"
                                    href="index.php?categories&type=delete&id=<?php echo $row['cat_id'] ?>">Delete</a>



                            </td>






                        </tr>


















                    <?php
                    }$i++;


                    if (isset($_GET['type']) && $_GET['type'] == "delete_player" && isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $delete = mysqli_query($con, "DELETE FROM `players` WHERE `player_id`='$id'");
                        $delete2 = mysqli_query($con, "DELETE FROM `player_statistics` WHERE `player_id`='$id'");
                        echo '<script>window.location.href="index.php?match&type=show_players&id=' . $id . '"</script>';
                    }

                } else {
                    echo '<tr class="text-center mt-2" ><td colspan="7" class="text-center mt-2">No record found</td></tr>';
                }
                ?>



            </tbody>
        </table>


    </div>

<?php } ?>



<?php
if (isset($_GET['type']) && $_GET['type'] === "add") {

    if(isset($_POST['add_cat'])){
$cat_name= $_POST['cat_name'];
$status= $_POST['cat_status'];
$insert = mysqli_query($con,"INSERT INTO `categories` (`cat_name`,`status`)VALUES('$cat_name','$status')");

if($insert){
 echo '<script>window.location.href="index.php?categories&type=view_cats"</script>';
}
    }
    ?>
    <style>

    </style>
    <h1 class="text-center rounded bg-dark text-uppercase text-white p-3 mt-5 mb-2">Add Categories</h1><a style="float:right;"
        class="btn btn-success" href="index.php?categories&type=add">View Categories <i class="fa-solid fa-eye"></i>
    </a>

    <div class="container" style="background:white;border-radius:20px;padding:5%;">


        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" required name="cat_name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Category Status</label>
                        <select class="form-control" name="cat_status" id="" required>
                            <option value="1">Active</option>
                            <option value="0">DeActive</option>



                        </select>
                    </div>

                </div>

              
            </div>
            <div class="row mt-5">
                <center>
                    <button class="btn btn-success w-50" type="submit" name="add_cat">Add Category</button>
                    </center>
                </div>


        </form>



    </div>




<?php } ?>