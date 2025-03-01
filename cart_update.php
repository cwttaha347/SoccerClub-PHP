<?php
include('require/config.php'); // Include your database connection configuration
$ip = $_SERVER[('REMOTE_ADDR')];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updates']) && is_array($_POST['updates'])) {
        foreach ($_POST['updates'] as $merchandiseId => $quantity) {
            // Sanitize and validate input data here

            // Update the cart in the database
            $updateQuery = "UPDATE cart SET quantity = '$quantity' WHERE merchandise_id = '$merchandiseId' AND `ip`='$ip'";
            $result = mysqli_query($con, $updateQuery);

            if (!$result) {
                // Handle error if update query fails
                echo "Error updating cart.";
                exit;
            }
        }

        // Cart updated successfully
        echo "Cart updated successfully.";
    } else {
        // No updates provided
        echo "No updates received.";
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
