<?php 
include('require/header.php');
$ip = $_SERVER[('REMOTE_ADDR')];
$select_cart= mysqli_query($con,"SELECT *
FROM cart AS c
JOIN merchandise AS m
ON c.merchandise_id = m.merchandise_id
WHERE `ip` = '$ip';
");


$count = mysqli_num_rows($select_cart);
;


?>
<style>
   
.checkout-btn.disabled {
    background-color: #ccc; 
    cursor: not-allowed;
    pointer-events: none;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // JavaScript for Quantity Manipulation
    $(document).ready(function () {
        $('.qtyBtn').on('click', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input.qty').val();

            if ($button.hasClass('plus')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }

            $button.parent().find('input.qty').val(newVal);
        });
    });
    $(document).ready(function () {
    $('form.cart').on('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: 'cart_update.php', // Change this to the PHP file that handles cart updates
            data: formData,
            success: function (response) {
                // Handle success response if needed
                window.location.href = "cart.php"; // Redirect to the cart page
            },
            error: function (error) {
                // Handle error response if needed
                console.error('Error updating cart:', error);
            }
        });
    });

    // Update the total price when quantity changes
   
});
$(document).ready(function () {
    function updateTotalPrice() {
        var total = 0;
        $('.cart__row').each(function () {
            var price = parseFloat($(this).find('.cart__price-wrapper .money').text().replace('Rs. ', ''));
            var quantity = parseInt($(this).find('.cart__qty-input').val());
            if (!isNaN(price) && !isNaN(quantity)) {
                total += price * quantity;
            }
        });

        var shippingFee = 100.00; // Fixed shipping fee
        var grandTotal = total + shippingFee;

        $('#total-price .money').text('Rs ' + total.toFixed(2));
        $('#shipping-fee .money').text('Rs ' + shippingFee.toFixed(2));
        $('#grand-total .money').text('Rs ' + grandTotal.toFixed(2));
    }

    updateTotalPrice();

    $('.cart__qty-input').on('change', function () {
        updateTotalPrice();
    });
});

</script><?php
if(isset($_GET['clear'])) {
      $ip = $_SERVER['REMOTE_ADDR'];
      $clearQuery = "DELETE FROM cart WHERE `ip`='$ip'";
      $result = mysqli_query($con, $clearQuery);
      if ($result) {
echo '<script>window.location.href="cart.php"</script>';
      }
    }elseif(isset($_GET['clear'])&& isset($_GET['id'])){
        $id = $_GET['id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $clearQuery = "DELETE FROM cart WHERE `id`='$id' AND `ip`='$ip'";
        $result = mysqli_query($con, $clearQuery);
        if ($result) {
  echo '<script>window.location.href="cart.php"</script>';
        }
    }
?>


<link rel="stylesheet" href="style.css">
<div id="page-content" class="mt-5" style="margin-top:10%;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	
                <form action="cart_update.php" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                                <?php 
                                while($row_cart = mysqli_fetch_assoc($select_cart)){
?>
    
                           <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="require/images/<?php echo $row_cart['image_1'] ?>" alt="product"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="shop.php?type=view&id=<?php echo $row_cart['merchandise_id'] ?>"><?php echo $row_cart['name']?></a>
                                        </div>
                                        
                                        <div class="cart__meta-text">
                                           
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">Rs. <?php echo $row_cart['price']?></span>
                                    </td>
                               
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa-solid fa-minus"></i></a>
                                                <input class="cart__qty-input qty" type="text" name="updates[<?php echo $row_cart['merchandise_id']; ?>]" value="<?php echo $row_cart['quantity'] ?>" pattern="[0-9]*">
  <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">Rs . <?php echo $row_cart['price']*$row_cart['quantity']  ?></span></div>
                                    </td>
                                    <td class="text-center small--hide"><a href="cart.php?clear&id=<?php echo $row_cart['id'] ?>" class="btn btn--secondary cart__remove" title="Remove tem"><i class="fa-solid fa-remove"></i></a></td>
                                </tr>
                               
<?php
                                }
                                
                                ?>
     
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="shop.php" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
                                        
	                                    <a href="cart.php?clear" name="clear" class="btn btn-secondary btn--small  small--hide">Clear Cart</a>
                                    	
                                        <button type="submit" name="updates"   class="btn btn-secondary btn--small cart-continue ml-2 ">Update Cart</button>
                                    </td>
                                </tr>
                               
                            </tfoot>
                            </form> 
                    </table> 
                                
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                    	<div class="col-12 col-sm-12 col-md-4 col-lg-8 mb-4">
                        	<h5>Discount Codes</h5>
                            <form action="#" method="post">
                            	<div class="form-group">
                                    <label for="address_zip">Enter your coupon code if you have one.</label>
                                    <input type="text" name="coupon">
                                </div>
                                <div class="actionRow">
                                    <div><input type="button" class="btn btn-secondary btn--small" value="Apply Coupon"></div>
                                </div>
                            </form>
                        </div>
                       
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                            <div class="solid-border">	
                   <!-- Add an empty div to display the total price -->
<div id="total-price" class="row border-bottom pb-2 pt-2">
    <span class="col-12 col-sm-6 cart__subtotal-title"><strong>SubTotal</strong></span>
    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">Rs 0.00</span></span>
</div>


<div class="row border-bottom pb-2 pt-2" id="shipping-fee">
    <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
    <span class="col-12 col-sm-6 text-right"><span class="money">Rs 10.00</span></span>
</div>
<div class="row border-bottom pb-2 pt-2" id="grand-total">
    <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">Rs 1011.00</span></span>
</div>
<form method="post" action="checkout.php">
                              <div class="cart__shipping">Shipping will be in 2-4 Days</div>
                              
                              <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout <?php if($count_cart === 0) echo 'disabled'; ?>" <?php if($count_cart === 0) echo 'disabled'; ?> value="Proceed To Checkout" >
                              <br>
                              <br>
                              <div class="paymnet-img mt-3"><img src="images/safepayment.png" alt="Payment"></div>
                            </form>
                            </div>
        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>

  
    <?php 
         
    
    include('require/footer.php'); ?>