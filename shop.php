<?php
include('require/header.php');

if (isset($_GET['type']) && $_GET['type'] === "view" && isset($_GET['id'])) {
    $select_products = mysqli_query($con, "SELECT * FROM `merchandise`");
    $row_pro = mysqli_fetch_assoc($select_products);

    if (isset($_POST['addtocart'])) {
        $ip = $_SERVER[('REMOTE_ADDR')];
       
        $id = $_POST['id'];
        $qty = $_POST['qty'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['img'];
$select = mysqli_query($con,"SELECT * FROM `cart` WHERE `merchandise_id`='$id' AND `ip`='$ip'");
if(mysqli_num_rows($select)){
    echo'<script>window.location.href="shop.php?type=view&id='.$id.'&exists"</script>';
}else{
        $insert = mysqli_query($con, "INSERT INTO `cart`(`ip`,  `merchandise_id`, `quantity`) VALUES ('$ip','$id','$qty')");

        if ($insert) {
            echo '<script>window.location.href="shop.php?type=view&id=' . $id . '"</script>';
        }


    }
    }
    ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: 'Open Sans', sans-serif;
}
body{
    line-height: 1.5;
}
.card-wrapper{
    max-width: 1100px;
    margin: 0 auto;
}
img{
    width: 100%;
    display: block;
}
.img-display{
    overflow: hidden;
}
.img-showcase{
    display: flex;
    width: 100%;
    transition: all 0.5s ease;
}
.img-showcase img{
    min-width: 100%;
}
.img-select{
    display: flex;
}
.img-item{
    margin: 0.3rem;
}
.img-item:nth-child(1),
.img-item:nth-child(2),
.img-item:nth-child(3){
    margin-right: 0;
}
.img-item:hover{
    opacity: 0.8;
}
.product-content{
    padding: 2rem 1rem;
}
.product-title{
    font-size: 3rem;
    text-transform: capitalize;
    font-weight: 700;
    position: relative;
    color: #12263a;
    margin: 1rem 0;
}
.product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 80px;
    background: #12263a;
}
.product-link{
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 400;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 0.5rem;
    background: #256eff;
    color: #fff;
    padding: 0 0.3rem;
    transition: all 0.5s ease;
}
.product-link:hover{
    opacity: 0.9;
}
.product-rating{
    color: #ffc107;
}
.product-rating span{
    font-weight: 600;
    color: #252525;
}
.product-price{
    margin: 1rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.product-price span{
    font-weight: 400;
}
.last-price span{
    color: #f64749;
    text-decoration: line-through;
}
.new-price span{
    color: #256eff;
}
.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 0.9rem;
    padding: 0.3rem;
    opacity: 0.8;
}
.product-detail ul{
    margin: 1rem 0;
    font-size: 0.9rem;
}
.product-detail ul li{
    margin: 0;
    list-style: none;
    background: url(https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/checked.png) left center no-repeat;
    background-size: 18px;
    padding-left: 1.7rem;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}
.product-detail ul li span{
    font-weight: 400;
}
.purchase-info{
    margin: 1.5rem 0;
}
.purchase-info input,
.purchase-info .btn{
    border: 1.5px solid #ddd;
    border-radius: 25px;
    text-align: center;
    padding: 0.45rem 0.8rem;
    outline: 0;
    margin-right: 0.2rem;
    margin-bottom: 1rem;
}
.purchase-info input{
    width: 60px;
}
.purchase-info .btn{
    cursor: pointer;
    color: #fff;
}
.purchase-info .btn:first-of-type{
    background: #256eff;
}
.purchase-info .btn:last-of-type{
    background: #f64749;
}
.purchase-info .btn:hover{
    opacity: 0.9;
}
.social-links{
    display: flex;
    align-items: center;
}
.social-links a{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: #000;
    border: 1px solid #000;
    margin: 0 0.2rem;
    border-radius: 50%;
    text-decoration: none;
    font-size: 0.8rem;
    transition: all 0.5s ease;
}
.social-links a:hover{
    background: #000;
    border-color: transparent;
    color: #fff;
}

@media screen and (min-width: 992px){
    .card{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    .card-wrapper{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product-imgs{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .product-content{
        padding-top: 0;
    }
}
</style>
<?php 
if(isset($_GET['exists'])){
    echo'<script>alert("Product is Already added ")</script>';
}

?>
<div class = "card-wrapper mt-5 mb-5" style="margin-top: 20%;margin-bottom:20%;">
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img height="500px" src = "require/images/<?php echo $row_pro['image_1'] ?>">
          <img height="500px" src = "require/images/<?php echo $row_pro['image_2'] ?>" >
          <img height="500px" src = "require/images/<?php echo $row_pro['image_3'] ?>" >
          
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
            <img src = "require/images/<?php echo $row_pro['image_1'] ?>" height="100px" >
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "2">
            <img src = "require/images/<?php echo $row_pro['image_2'] ?>"height="100px">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "3">
            <img src = "require/images/<?php echo $row_pro['image_3'] ?>" height="100px">
          </a>
        </div>
       
      </div>
    </div>
    <!-- card right -->
    <div class = "product-content">
      <h2 class = "product-title"><?php echo $row_pro['name'] ?></h2>
      <a href = "javascript:void();" class = "product-link"></a>
      <div class = "product-rating">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star-half-alt"></i>
        <span>4.7(21)</span>
      </div>
<form action="" method="post" >
    <input type="hidden" value="<?php echo $row_pro['name'] ?>" name="name"><input type="hidden" value="<?php echo $row_pro['price'] ?>" name="price"><input type="hidden" name="img" value="<?php echo $row_pro['image_1'] ?>">
      <div class = "product-price" style="font-size:20px !important;">
        <p style="font-size:20px !important;" class = "last-price">Old Price: <span>Rs.<?php echo $row_pro['mrp'] ?></span></p>
        <p style="font-size:20px !important;" class = "new-price">New Price: <span>Rs.<?php echo $row_pro['price'] ?></span></p>
      </div>
<input type="hidden" name="id" value="<?php echo $row_pro['merchandise_id'] ?>">
      <div class = "product-detail" style="width:100%;">
        <h3>Description </h3>

        <p style="color:black; font-size:12px;"><?php echo $row_pro['description'] ?></p>
     
        <ul style="font-size:12px !important;">
          <li>&nbsp;Available:&nbsp; <span><?php if($row_pro['p_status']==="0"){echo'Out Of Stock';}else{echo'In Stock';} ?></span></li>
          <li>&nbsp;Shipping Area:&nbsp; <span>All over the world</span></li>
          <li>&nbsp;Shipping Fee: &nbsp;<span>Rs 180</span></li>
        </ul>
      </div>

      <div class = "purchase-info">
        <input name="qty" type = "number" min = "0" value = "1">
        <button type = "submit" name="addtocart" class = "btn">Add to Cart <i class = "fas fa-shopping-cart"></i></button>
        
      </div>
</form>
      <div class = "social-links">
        <p>Share At: </p>
        <a href = "#">
          <i class = "fab fa-facebook-f"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-twitter"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-instagram"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-whatsapp"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-pinterest"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
</script>
    <?php
}elseif (isset($_GET['type']) && $_GET['type'] === "category_view" && isset($_GET['id'])){
?>


<div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner>
            <h2 class=bannerHeadline>our <span>shop</span></h2>
        </div>
    </div>
    <section class=innerpage_all_wrap>
        <div class=container>
            <div class=row>
                <h2 class=heading>best soccer <span>accessories shop</span></h2>

                

              
                    <aside class="contentinner" style="width:100%;">
                        <div class="bg-red shop_select clearfix">
                            <div class="select_shopping">
                                <form>
                                    <div id="sort-by" class=form-group><label class=headline01>sort by</label><select class=form-control>
                                            <option value="high_to_low">Price Highest to low</option>
                                            <option value="low_to_high">Price Low to Highest</option>
                                          
                                        </select></div>
                                    <div class=form-group><label class=headline01>per price</label><select
                                            class=form-control id="per-price">
                                            <option value="1">Under Rs 1000</option>
        <option value="2">Rs 1000 - Rs 20000</option>
        <option value="3">Rs 20000 - Rs 300000</option>
                                        </select></div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-wrap-slider clearfix" id="product-list">
                            <?php
                            $id = $_GET['id'];
                            $select_products = mysqli_query($con, "SELECT * FROM `merchandise` WHERE `p_cat_id`=$id");
                            while ($row_pro = mysqli_fetch_assoc($select_products)) {
                                ?>

                                <div class=shop_detais>
                                    <div class="shop01 clearfix">
                                        <div class=shop-img>
                                            <div class=bgimg
                                                style="background:url('require/images/<?php echo $row_pro['image_1'] ?>');"></div>
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


                            ?>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

    function updateProductList(filters) {
        $.ajax({
            type: "POST",
            url: "filter.php",
            data: filters,
            success: function(response) {
                $('#product-list').html(response);
            }
        });
    }

 
    $('select.form-control').on('change', function() {
        var sort = $('#sort-by').val();
        var price = $('#per-price').val();
        
        var filters = {
            sort: sort,
            price: price
        };
        
        updateProductList(filters);
    });
</script>







<?php 

}else {
    ?>



    <div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner>
            <h2 class=bannerHeadline>our <span>shop</span></h2>
        </div>
    </div>
    <section class=innerpage_all_wrap>
        <div class=container>
            <div class=row>
                <h2 class=heading>best soccer <span>accessories shop</span></h2>

                

              
                    <aside class="contentinner" style="width:100%;">
                        <div class="bg-red shop_select clearfix">
                            <div class="select_shopping">
                                <form>
                                    <div id="sort-by" class=form-group><label class=headline01>sort by</label><select class=form-control>
                                            <option value="high_to_low">Price Highest to low</option>
                                            <option value="low_to_high">Price Low to Highest</option>
                                          
                                        </select></div>
                                    <div class=form-group><label class=headline01>per price</label><select
                                            class=form-control id="per-price">
                                            <option value="1">Under Rs 1000</option>
        <option value="2">Rs 1000 - Rs 20000</option>
        <option value="3">Rs 20000 - Rs 300000</option>
                                        </select></div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-wrap-slider clearfix" id="product-list">
                            <?php
                            $select_products = mysqli_query($con, "SELECT * FROM `merchandise`");
                            while ($row_pro = mysqli_fetch_assoc($select_products)) {
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


                            ?>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

    function updateProductList(filters) {
        $.ajax({
            type: "POST",
            url: "filter.php",
            data: filters,
            success: function(response) {
                $('#product-list').html(response);
            }
        });
    }

 
    $('select.form-control').on('change', function() {
        var sort = $('#sort-by').val();
        var price = $('#per-price').val();
        
        var filters = {
            sort: sort,
            price: price
        };
        
        updateProductList(filters);
    });
</script>

<?php
}
include('require/footer.php');


?>