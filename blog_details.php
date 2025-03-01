
 <?php
if(isset($_GET['id'])){
    include('require/header.php'); 
$id = $_GET['id'];
$select_blog_post = mysqli_query($con,"SELECT * FROM `blog` WHERE `id`='$id'");
$select_reviews = mysqli_query($con,"SELECT * FROM `reviews` WHERE `blog_id`='$id'");
$fetch_blog = mysqli_fetch_assoc($select_blog_post); 
?>




<div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner><h2 class=bannerHeadline>Blog <span>details</span></h2></div>
    </div>
    <section class=innerpage_all_wrap>
        <div class=container>
            
          

                <p class=headParagraph></p>

                <div class=innerWrapper>
                    <article class=contentinner>
                        <div class=blogDetails>
                            <div class=blogimg>
                                <ul class=blog_slider>
                                   <img src="require/images/<?php echo $fetch_blog['image'] ;?>" alt=image height="400px">
                                  
                                </ul>
                            </div>
                            <div class=blog_info>
                                <div class=clearfix>
                                    <div class=headlineimgwrap01><img src=images/icons/chart.png alt=image></div>
                                    <div class=headlinewrap01><h4 class=headline02><?php echo $fetch_blog['title'] ;?></h4>

                                        <p class="paragraph02 uppercaseheading"><span class=red><?php echo $fetch_blog['date'] ?></span>
                                        </p></div>
                                </div>
                                <p class=blog-content><?php echo $fetch_blog['des'] ?></p>

                                <div class="social-share clearfix">
                                    <div class=share-cont><i class="fa fa-share-alt"></i> <span>share</span></div>
                                    <div class="social-wraps clearfix"><a href=https://www.facebook.com/templatespoint.net
                                                                          class=facebook-icon><i
                                            class="fa fa-facebook"></i></a> <a href=https://twitter.com/
                                                                               class=twitter-icon><i
                                            class="fa fa-twitter"></i></a> <a href=https://www.behance.net/
                                                                              class=behance-icon><i
                                            class="fa fa-behance"></i></a></div>
                                </div>
                                <div id="comments">
                                    <?php 
                                    if(mysqli_num_rows($select_reviews)>0){
                                        while ($fetch_review = mysqli_fetch_assoc($select_reviews)) {
                                            
                                       
?>


<div class="user d-flex align-items-start justify-content-between bg-light p-4 rounded" style="background: floralwhite !important;">
                    <div class="d-flex align-items-start">
                        <img src="./img/JayeHannah-150x150.jpeg" class="img-fluid rounded-circle" alt="">
                        <div class="d-block">
                            <span class="d-block">by <a class="h6" href="#"><?php $fetch_review['name'] ?></a></span>
                            <span class="d-block"><?php echo $fetch_review['date_commented'] ?></span>
                            <span class="d-block"></span>
                        </div>
                    </div>
<?php
              }                       }else{
                                        echo'<p class="text-center mt-3">No Comments here</p>';
                                    }
                                    
                                    
                                    
                                    
                                    ?>
                                </div>
                                <div class="contact-form clearfix"><h6>leave a comment</h6>

                                    <form method="post"  >
                                        <input type="hidden" name="blog_id" value="<?php echo $fetch_blog['id'] ?>">
                                        <div class=form-group><input type=text class="form-control text" 
                                                                     name="name" placeholder="Your name"></div>
                                        <div class=form-group><input type="email" class="form-control text" 
                                                                     name="email" placeholder="Your E-mail"></div>
                                        <div class=form-group1><textarea class="form-control textas" 
                                                                         name="comment" placeholder=Message></textarea>
                                        </div>
                                        <button type="submit" class="submit" name="comment">send message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                    <aside class="widgetinner clearfix">
                        
                                   
                            <div class=blog_widget><h4 class=oswald16>follow us</h4>

                                <div class=blog_social><a href=# class=social_link><i class="fa fa-facebook"></i></a> <a
                                        href=# class=social_link><i class="fa fa-twitter"></i></a> <a href=#
                                                                                                      class=social_link><i
                                        class="fa fa-behance"></i></a> <a href=# class=social_link><i
                                        class="fa fa-vine"></i></a> <a href=# class=social_link><i
                                        class="fa fa-youtube"></i></a></div>
                            </div>
                            <div class=blog_widget><h4 class=oswald16>popular posts</h4>
                            <ul>
<?php 
$select_blog_all = mysqli_query($con,"SELECT * FROM `blog` LIMIT 0,5");
while ($fetch_all = mysqli_fetch_assoc($select_blog_all)) {
    
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   <li class="mb-5"><a href="blog_details.php?id=<?php echo $fetch_all['id'] ?>" class=clearfix>
   <div class="blog-title" style="margin-top:2%;"><h6 style="color:black!important;"><?php echo $fetch_all['title'] ?></h6></div>
                                        <div class=comment-pic>
                                            <div class=columnpic><img style="border-radius:50%; width:100% !important; height:auto;" src="require/images/<?php echo $fetch_all['image'] ?>" alt=image></div>
                                        </div>
                                        <div class="commentinfo long-text-cell"><p></p>

                                            <p class=red><?php echo $fetch_all['date'] ?></p></div>
                                    </a></li>
                                 

    <?php
}

?>
                               
                                </ul>
                            </div>
                         
                            
                           
                            <div class=blog_widget><h4 class=oswald16>subscribe</h4>

                                <p class="red italic01">follow my latest news</p>

                                <div class=mail_input>
                                    <form class=form_mailSubscribe data-parsley-validate=""><input type=email
                                                                                                   placeholder="your Email"
                                                                                                   name=email>
                                        <button class=mail_subscribe><i class="fa fa-envelope-o"></i></button>
                                        <div class=form-submessges></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <?php
 include('require/footer.php'); 
}






?>



