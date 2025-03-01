<?php
include('require/config.php'); 

if(isset($_POST['sort'])||isset($_POST['price'])){
    $sort = $_POST['sort'];
    $price = $_POST['price'];

    $query = "SELECT * FROM `merchandise`";

    // Apply price range filtering
    if ($price === '1') {
        $query .= " WHERE price <= 1000"; 
    } elseif ($price === '2') {
        $query .= " WHERE price > 1000 AND price <= 20000"; 
    } elseif ($price === '3') {
        $query .= " WHERE price > 20000 AND price <= 300000";
    }

    // Apply sorting condition
    if ($sort === 'low_to_high') {
        $query .= " ORDER BY price ASC";
    } elseif ($sort === 'high_to_low') {
        $query .= " ORDER BY price DESC";
    }
    $result = mysqli_query($con, $query);

while ($row_pro = mysqli_fetch_assoc($result)) {
    ?>
   <div class=shop_detais>
                                    <div class="shop01 clearfix">
                                        <div class=shop-img>
                                            <div class=bgimg
                                                style="background:url(require/images/<?php echo $row_pro['image_1'] ?>);"></div>
                                        </div>
                                        <div class=shop_info>
                                            <h4 class=headline01><a href=product-details.html><?php echo $row_pro['name'] ?></a>
                                            </h4>

                                            <div class=star><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i></div>
                                            <p>
                                                <?php echo $row_pro['description'] ?>

                                            </p>

                                            <div class=headline01>Rs. <?php echo $row_pro['price'] ?> </div>
                                            <div class=addcart-wrap><a href="shop.php?type=view&id=<?php echo $row_pro['merchandise_id'] ?>"class="btn-addcart ">Add to Cart</a> 
                                            <a href="#" class=btn-fav>Add to Wish list</a></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
    <?php
}
}
?>
