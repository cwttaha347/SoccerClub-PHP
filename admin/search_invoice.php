<?php
include('includes/config.php');
$query = mysqli_real_escape_string($con, $_POST['query']); // Assuming you're getting the query from a POST request

$sql = "SELECT *
        FROM `shipped`
        WHERE `invoice` LIKE '%$query%'";

$stmt = mysqli_prepare($con, $sql);


    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

  
    
    if (mysqli_num_rows($result) > 0) {
        while ($row_order = mysqli_fetch_assoc($result)) {
            echo '
            <style>
.table {
  max-width: 100%;
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
            </style>
            <table class="table table-responsive table-collapsed text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Invoice</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
               
                <th scope="col">Quantity</th>
                <th scope="col">Grandtotal</th>
                <th scope="col">Date Proceed</th>

              </tr>
            </thead>
            <tbody>';
            
            $i = 1; 
            if (mysqli_num_rows($result) > 0) {
                while ($row_order = mysqli_fetch_assoc($result)) {
                    echo '
                    <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$row_order['merch'].'</td>
                      <td>'.$row_order['invoice'].'</td>
                      <td>'.$row_order['fullname'].'</td>
                      <td>'.$row_order['address'].'</td>
                     
                      <td>'.$row_order['qty'].'</td>
                      <td>'.$row_order['grand_total'].'</td>
                      <td>'.$row_order['date'].'</td>

                     
                     
                    </tr>';
                    
                    $i++;
                }
            } else {
                echo '<tr class="text-center mt-2"><td colspan="7" class="text-center mt-2">No record found</td></tr>';
            }
            
            echo '
            </tbody>
            </table>';
        }
    } else {
        echo "<p>No results found</p>";
        mysqli_stmt_close($stmt);
    }


mysqli_close($con);
?>
