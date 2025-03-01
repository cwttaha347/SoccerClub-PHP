<?php 
use Mpdf\Mpdf;

// Start output buffering to capture any output

if(isset($_GET['type'])&& $_GET['type']==="shipping" && isset($_GET['id'])){
    $id = $_GET['id'];
$select_ship = mysqli_query($con,"SELECT
*
FROM
`order` AS o
JOIN
`merchandise` AS m ON o.merchandise_id = m.merchandise_id
JOIN
`shipping_details` AS s ON o.user_id = s.username WHERE `order_id`='$id' ");

$row_ship = mysqli_fetch_assoc($select_ship);







$invoice = "INV" . rand(1000, 9999);

  

?>
<style>
    table,
td,
th {
  border: 1px solid black;
  border-collapse: collapse;
}

table {
  width: 700px;
  margin-left: auto;
  margin-right: auto;
}

td,
caption {
  padding: 16px;
}

th {
  padding: 16px;
  background-color: lightblue;
  text-align: left;
}

.ps__rail-x{
    display:none !important;
}

</style>
<h1 class="text-center text-white bg-dark w-100 p-3 mb-5">Order Invoice Reciept</h1>
<br>
<div class="row">
    <div class="col">
        <a class="btn btn-success" style="float:right;" href="index.php?proceed&type=shipping&id=<?php echo $id ?>&download=true">Download Pdf</a>
    </div>
</div>
<div class="container w-100 mt-5">
<table class="table table-responsive w-100">

  <tr>
    <th colspan="3" class="bg-dark text-white">Invoice #<?php echo $invoice ?></th>
    <th class="bg-info text-white"><?php
echo $row_ship['order_date'];  
    ?></th>
  </tr>
  <tr>
    <td colspan="2">
      <strong>Pay To:</strong> <br> MSG 360 Team <br>
      Soccer Club<br>
     Metro Star Gate
    </td>
    <td colspan="2">
      <strong>Customer:</strong> <br>
      <?php echo $row_ship['fullname'];   ?> <br>
       <?php echo $row_ship['address'];   ?>  <br>
       <?php echo $row_ship['city'];   ?>  <br>
       <?php echo $row_ship['procvice'];   ?> 
    </td>
  </tr>
  <tr>
    <th>Name/Description</th>
    <th>Qty.</th>
    <th>MRP</th>
    <th>Amount</th>
  </tr>
  <tr>
    <td>       <?php echo $row_ship['name'];   ?> </td>
      
    <td> <?php echo $row_ship['quantity'];   ?> </td>
    <td> <?php echo $row_ship['mrp'];   ?> </td>
    <td> <?php echo $row_ship['price'];   ?> </td>
  </tr>
  
  <tr>
    <th colspan="3">Subtotal:</th>
    <td><?php echo $row_ship['price']*$row_ship['quantity']; ?></td>
  </tr>
  <tr>
    <th colspan="2">Tax</th>
    <td>10%</td>
    <td>180</td>
  </tr>
  <tr>
    <th colspan="3" class="bg-secondary text-white">Grand Total:</th>
    <td class="bg-success text-white">Rs <?php echo $row_ship['price']*$row_ship['quantity']+180 ; ?></td>
  </tr>
  <tr>
    <form action="" method="post">
    <td><button type="submit" name="proceed" class="btn btn-success">Proceed Order</button></td>
    </form>
  </tr>
</table>


</div>




<?php 

if(isset($_POST['proceed'])){


   
    $date = $row_ship['order_date'];  
        
    $fname = $row_ship['fullname'];  
     $address =  $row_ship['address'];  
      $city = $row_ship['city'];   
       $prov =  $row_ship['procvice'];   
     $merch =  $row_ship['name'];   
     $qty =  $row_ship['quantity'];   
     $mrp =  $row_ship['mrp'];   
     $price =  $row_ship['price'];   
     $subtotal =  $row_ship['mrp']*$row_ship['quantity']; 
     $grand_total =  $row_ship['price']*$row_ship['quantity']+180 ; 

     $insert_ship = mysqli_query($con,"INSERT INTO `shipped` (`order_id`, `invoice`, `fullname`, `address`, `city`, `provice`, `merch`, `qty`, `mrp`, `price`, `subtotal`, `grand_total`)
     VALUES ('$id','$invoice','$fname', '$address', '$city', '$prov', '$merch', '$qty', '$mrp', '$price', '$subtotal', '$grand_total')");
$update_order = mysqli_query($con,"UPDATE `order` SET `status`='2' WHERE `order_id`='$id'");

if($insert_ship && $update_order){

echo'<script>window.location.href="index.php?orders&type=completed"</script>';

}

}



if (isset($_GET['type']) && isset($_GET['download']) ) {
    // Your database queries and data extraction code

    // ... your existing code ...
  
    // Generate a random invoice number
    $invoice = "INV". rand(1000, 9999);

    // Include the mPDF library
    require_once 'vendor/autoload.php';



    $mpdf = new Mpdf();



    // HTML content for the invoice
    $html = '
    <style>
    .invoice-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Adjust the height as needed */
  }
  .invoice-table {
    width: 80%;
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse;
            margin-top: 20px;
            justify-content:center;
  }
  .invoice-table th, .invoice-table td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
  }
  .invoice-table th {
      background-color: #333;
      color: white;
  }
        .bg-secondary {
            background-color: #666;
            color: white;
        }
        .bg-dark{
          background-color: #344767 ;
          color: white;
          
        }
        .bg-success {
            background-color: #4CAF50;
            color: white;
        }
        .bg-info{
          background-color: #1A73E8 ;
          color: white;

        }
    </style>
    <center>
    <div class="container w-100 mt-5">
        <table border="1" class="table table-responsive w-100">
            <tr>
                <th colspan="3" class="bg-dark text-white">Invoice #' . $invoice . '</th>
                <th class="bg-info text-white">' . $row_ship['order_date'] . '</th>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Pay To:</strong> <br> MSG 360 Team <br>
                    Soccer Club<br>
                    Metro Star Gate
                </td>
                <td colspan="2">
                    <strong>Customer:</strong> <br>
                    ' . $row_ship['fullname'] . '<br>
                    ' . $row_ship['address'] . '<br>
                    ' . $row_ship['city'] . '<br>
                    ' . $row_ship['procvice'] . '
                </td>
            </tr>
            <tr>
                <th>Name/Description</th>
                <th>Qty.</th>
                <th>MRP</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>' . $row_ship['name'] . '</td>
                <td>' . $row_ship['quantity'] . '</td>
                <td>' . $row_ship['mrp'] . '</td>
                <td>' . $row_ship['price'] . '</td>
            </tr>
            <tr>
                <th colspan="3">Subtotal:</th>
                <td>' . $row_ship['price'] * $row_ship['quantity'] . '</td>
            </tr>
            <tr>
                <th colspan="2">Tax</th>
                <td>10%</td>
                <td>180</td>
            </tr>
            <tr>
                <th colspan="3" class="bg-secondary text-white">Grand Total:</th>
                <td class="bg-success text-white">Rs ' . ($row_ship['price'] * $row_ship['quantity'] + 180) . '</td>
            </tr>
         
        </table>
    </div>
    </center>
    ';
    

    $mpdf->WriteHTML($html);

    // Capture the generated PDF content
    $pdfContent = $mpdf->Output('', 'S');
    
    // Clear the output buffer and turn off output buffering
    ob_end_clean();

    // Set the Content-Disposition header for the download
    header('Content-Disposition: attachment; filename="'.$invoice.'.pdf"');

    // Set the Content-Type header to specify that the content is a PDF
    header('Content-Type: application/pdf');

    // Output the PDF content for direct download
    echo $pdfContent;

    // Terminate the script to prevent further output
    exit;



}

}

?>


