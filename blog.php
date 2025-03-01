
<?php include('require/header.php'); ?>

<div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner><h2 class=bannerHeadline><span>blog</span></h2></div>
    </div>
    <section class="innerpage_all_wrap bg-white">
        <div class=container>
            <div class=row><h2 class=heading>this is our <span>blog page</span></h2>

                <p class=headParagraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat quisquam
                    reprehenderit, blanditiis nam debitis libero facilis illum repudiandae eveniet voluptatibus
                    quibusdam illo ea nisi ipsa accusantium nobis animi asperiores quaerat ,Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Fugiat quisquam reprehenderit, blanditiis nam debitis libero facilis
                    illum repudiandae eveniet voluptatibus quibusdam illo ea nisi ipsa accusantium nobis animi
                    asperiores quaerat .</p>

                <div class=innerWrapper>
                    <main class=contentinner>
                     
                            
                            <?php 
                            $select_blog = mysqli_query($con,"SELECT * FROM `blog` WHERE `status`='1'");
                            $check = mysqli_num_rows($select_blog);
                            if($check > 0)
{
while($row_blog = mysqli_fetch_assoc($select_blog)) {
    ?>
    

                        <div class=blogDetails>
                           
                            <div class=blog_info>
                                <div class=clearfix>
                                    <div class=headlineimgwrap01><img width="100%" src="require/images/<?php echo $row_blog['image'] ?>" alt=image></div>
                                    <div class=headlinewrap01><h4 class=headline02><?php echo $row_blog['title'] ?></h4>

                                        <p class="paragraph02 uppercaseheading"><span class=red><?php echo $row_blog['date'] ?></span>
                                        </p></div>
                                </div>
                                <div>
                                <p class="blog-content"><?php echo $row_blog['des'] ?></p>
                                </div>
                                <div class="blog-detailsfooter clearfix">
                                    <div class="blog-detailsfooter01 clearfix"></div>
                                    <div class=blog-detailsfooter02><a href="blog_details.php?id=<?php echo $row_blog['id'] ?>"
                                                                       class="btn-small01 btn-red">view more</a></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
<?php    }

}                            
                            ?>
                    </main>
                    <aside class="widgetinner clearfix">
                        <div class=row>
                           
                         
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

<?php include('require/footer.php'); ?>
