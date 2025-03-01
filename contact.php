<?php include('require/header.php'); ?>

<div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner><h2 class=bannerHeadline>contact <span>us</span></h2></div>
    </div>
    <section class=innerpage_all_wrap>
        <div class=container>
            <div class=row><h2 class=heading>get in <span>touch</span></h2>

            <p class=headParagraph><?php echo $row_website['contact'] ;?></p>

                <div class=innerWrapper>
                    <ul class="contact_icon clearfix">
                        <li><a href=tel:80052608885263><i class="fa fa-phone"></i> <span>+1 800-256-9876</span></a></li>
                        <li><a href=mailto:msg360combat@gmail.com><i class="fa fa-envelope-o"></i>
                            <span>msg360combat@gmail.com</span></a></li>
                        <li><a href=#><i class="fa fa-map-marker"></i> <span>Metro Star Gate</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  
      
        <div class=container style="background-image:url('require/images/background/innerpageBg.jpg');">
            <?php 
            if(isset($_GET['recieved'])){
echo'<div class="alert alert-success" role="alert">
Thanks for Contacting Us
</div>';
            }
            ?>
            <div class=row>
                <div class=contact_form><h2 class="heading text-white" style="color:white;">contact us <span>by form</span></h2>

                   

                    <form  method="post" class="formcontact clearfix">
                        <div class=form-group><input type=text class=form-control name="name" placeholder=Name required></div>
                        <div class=form-group><input type=text class=form-control name="phone" placeholder=Phone
                                                     required>
                        </div>
                        <div class=form-group><input type=text class=form-control name="subject" placeholder=subject
                                                     required>
                        </div>
                        <div class=form-group><input type=email class=form-control name="email" placeholder=Email
                                                     required>
                        </div>
                        <div class=form-group1><textarea class="form-control" name="comment" placeholder=Message
                                                         required ></textarea></div>
                        <button type=submit class="btn btn-red" name="contact">send Us</button>
                        
                    </form>
                </div>
            </div>
        </div>
  
<?php 

if(isset($_POST['contact'])){
$email = $_POST['email'];
$comment = $_POST['comment'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];

$insert = mysqli_query($con,"INSERT INTO `contact` (`name`,`email`,`phone`,`subject`,`comment`)VALUES('$name','$email','$phone','$subject','$comment')");
 if($insert){
echo'<script>window.location.href="contact.php?recieved"</script>';
 }
}



?>
<?php include('require/footer.php'); ?>
