<?php include('require/header.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    $('.read-more-btn').click(function() {
        var longText = $(this).parent('.long-text');
        longText.toggleClass('expanded');
        
        if (longText.hasClass('expanded')) {
            $(this).text('Read Less');
        } else {
            $(this).text('Read More');
        }
    });
});

</script>
<style>
    .long-text {
    max-height: 100px; 
    overflow: hidden;
    position: relative;
}

.long-text.expanded {
    max-height: auto !important;
    overflow-block: auto;
}

.read-more-btn {
    display: block;
    margin-top: 10px;
}

</style>
    <div class=banner id=layerSlider style="width: 100%;">
        <div class=ls-slide data-ls="transition3d: 33,15; slidedelay: 8000 ; durationin:0;"><img
                src="require/images/banner/background01.jpg" class=ls-bg alt="Slide background">

            <div class="ls-l layercontent01" style="top: 50%; left: 50%; z-index:4;"
                 data-ls="offsetxin:left; offsetxout:right; durationin: 4000; parallaxlevel: 8;"><img
                    src="require/images/banner/player.png" alt=innerimage class=img-responsive
                    style="max-width: 100% !important ;"></div>
            <img src="require/images/banner/ball.png" alt=innerimage class="ls-l layercontent02" style=z-index:5;
                 data-ls="offsetxin: right; offsetxout:left; rotatein:-360; easingin: easeoutquart; durationin: 4000; delayin: 250; parallaxlevel: -5;">
            <img src="require/images/banner/front_particles.png" alt=particles class=ls-l style="z-index:3; left:0;"
                 data-ls="offsetxin: left; offsetxout:left; scalexin:50; easingin: easeoutquart; durationin: 3000; delayin: 250;">
            <img src="require/images/banner/back_particles.png" alt=particles class=ls-l style="z-index:3; left:50%;"
                 data-ls="offsetxin: left; offsetxout:left; scalein:90; easingin: easeoutquart; durationin: 3000; delayin: 250;">

            <h2 class="ls-l bannertext layercontent03" data-ls="offsetxin:left; rotatexin:90 ; durationin: 3500;">
                action</h2>

            <h2 class="ls-l bannertext01 italic01 layercontent04"
                data-ls="offsetxin:left; scalexin:9; durationin: 4000;">starts</h2><h4
                    class="ls-l bannertext02 layercontent05" data-ls="offsetxin:left; rotatexin:90 ; durationin: 4500;">
                from</h4>

            <h2 class="ls-l bannertext01 layercontent06" style="left: 87%; top:760px;"
                data-ls="offsetxin:left; flipxin:90 ; durationin: 5000;">21<sup>st</sup></h2><h6
                    class="ls-l bannertext03 layercontent07" data-ls="offsetxin:left; flipxin:90 ; durationin: 6000;">
                july , 2015</h6></div>
    </div>
    <div class=banner-text>
        <div class=container>
            <div class=row>action start from 9<sup>th</sup> August , 2023.</div>
        </div>
    </div>
    
    <section class="about" id="about">
        <div class=container>
            <div class=row><h2 class=heading>About <span>scc</span></h2>
<p class="pt-2 mt-3">
    <br>
    <br>
<?php 
echo $row_website['about'];

?>

</p>
                <div class=about-wrap>
                    <div class="tab-content nav-content"><p role=tabpanel class="tab-pane fade" id=matches></p></div>
                    <div class=nav-header id=aboutTab>
                        <ul class="nav nav-tabs clearfix" role=tablist>
                         
                            <li class=active><a href=#static aria-controls=static role=tab data-toggle=tab>statics</a>
                            </li>
                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="latestResult">
    <div class="container">
        <div class="row">
            <h2 class="heading">Latest <span>result</span></h2>

            <div class="latestResult-wrap">
                <h4><?php 
                $match = '';
                $select_live = mysqli_query($con,"SELECT * FROM  `matches` WHERE `status`='1'");
                if(mysqli_num_rows($select_live)){
                    $fetch_live = mysqli_fetch_assoc($select_live);
                    $match  =$fetch_live['competition'];
                    if($match==="1"){
                        echo'UEFA Champions League';
                    }elseif($match==="2"){
                        echo'Africa Cup of Nations';
                    }elseif($match==="3"){
                        echo'Fifa World Cup';
                    }elseif($match==="4"){
                        echo'AFC Asian Cup';
                    }elseif($match==="5"){
                        echo'Fifa U-20 World';
                    }elseif($match==="6"){
                        echo'FA Cup';
                    }elseif($match==="7"){
                        echo'Fifa Considerations Cup';
                    }elseif($match==="8"){
                        echo'EFL Cup';
                    }elseif($match==="9"){
                        echo'AFC Cup';
                    }elseif($match==="10"){
                        echo'AFC Champions League';
                    }elseif($match==="11"){
                        echo'Fifa U-17 World Cup';
                    }
                ?>
                    </h4>
               

<?php include('live_score.php'); 
}else{
    echo 'No Matches Available';
}


?>
                
                
            </div>
        </div>
    </div>
</section>

    
    <section class="latest_news mt-5" style="background:url('require/images/background/latestnews.jpg');background-repeat:no-repeat; margin-top:2%;">
        
        <div class=container>
            <div class=row><h2 class=heading>latest <span>news</span></h2>

                <p class=headParagraph></p>

                <div class="LatestNews_wrap clearfix">
                   
                    <div class="tab-content news_display_container clearfix">
                    <ul id=club_news class="tab-pane active clearfix">
                            <?php 
                            $select_blog = mysqli_query($con , "SELECT * FROM `blog` LIMIT 0,5");
                            while($row_blog = mysqli_fetch_array($select_blog)){
                            ?>
                            <li>
                                <div class=figure>
                                    <div class=column-news>
                                        <div class="figure-01" style="background:url('require/images/<?php echo $row_blog['image'] ?>');background-repeat:no-repeat; width:100%; height:200px; background-size:cover;"></div>
                                        <div class=content-01><h6><a href="blog_details.php?id=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['title'] ?></a></h6>

                                
                                            <p class="description long-text"><?php echo $row_blog['des'] ?>
                                            <br>
                                            
        </p>
        <a href="blog_details.php?id=<?php echo $row_blog['id'] ?>" style="font-size:10px; color:white;" class="read-more-btn">Read More</a>
                              

     </div>
                                        <div class="news_date clearfix"><span><?php echo $row_blog['date'] ?></span> <span class=like><a
                                                href=#>45</a></span></div>
                                    </div>
                                </div>
                            </li>
                          
                          <?php } ?>
                        </ul>
                    </div>
        </div>
    </section>
   
    <!-- <section class=gallery>
        <div class=container>
            <div class=row><h2 class=heading>our <span>gallery</span></h2>

                <p class=headParagraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis
                    consequuntur animi, commodi, voluptatibus labore aperiam fugit maxime quos optio architecto cum?
                    Laborum nesciunt doloribus expedita atque error rem molestias, ducimus.</p></div>
        </div>
        <div class=galleryWrapper>
            <div class=grid>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery02.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery03.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery04.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery021.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery031.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/five.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery031.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/masonry/medium_01.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/gallery041.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=grid_item>
                    <div class=gallery_dtl><img src=images/gallery/masonry/medium_03.jpg alt=image>

                        <div class=gallery_info>
                            <div class=galleryinfo_wrap><p class=uppercase>consectetur</p>

                                <p class=red_p>Magna aliqua</p></div>
                        </div>
                    </div>
                </div>
                <div class=gutter></div>
            </div>
        </div>
        <a class="btn btn-red">read more</a></section>
    <section class=social-media>
        <div class=container>
            <div class=row>
                <ul class=socialinfo>
                    <li><a href="#">
                        <div class=sociallink><i class="fa fa-twitter"></i></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur aperiam ut necessitatibus,
                            assumenda a maxime eos nulla maiores perspiciatis deleniti! A ratione ipsam magnam accusamus
                            assumenda consectetur reiciendis hic obcaecati.</p></a></li>
                    <li><a href="#">
                        <div class=sociallink><i class="fa fa-facebook"></i></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur aperiam ut necessitatibus,
                            assumenda a maxime eos nulla maiores perspiciatis deleniti! A ratione ipsam magnam accusamus
                            assumenda consectetur reiciendis hic obcaecati.</p></a></li>
                    <li><a href="#">
                        <div class=sociallink><i class="fa fa-behance"></i></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur aperiam ut necessitatibus,
                            assumenda a maxime eos nulla maiores perspiciatis deleniti! A ratione ipsam magnam accusamus
                            assumenda consectetur reiciendis hic obcaecati.</p></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class=awards>
        <div class=container>
            <div class=row><h2 class=heading>awa<span>rds</span></h2>

                <p class=headParagraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis
                    consequuntur animi, commodi, voluptatibus labore aperiam fugit maxime quos optio architecto cum?
                    Laborum nesciunt doloribus expedita atque error rem molestias, ducimus.</p>

                <div class="wrapper-container clearfix"><a class="prv awards_prev"></a> <a class="nxt awards_next"></a>
                    <ul class="awards-wrap clearfix">
                        <li><a href=achivement_details.html><img src=images/awards/awards01.png alt=image>
                            <ul class=awards-info>
                                <li>uefa 2014</li>
                                <li>champion</li>
                            </ul>
                        </a></li>
                        <li><a href=achivement_details.html><img src=images/awards/awards02.png alt=image>
                            <ul class=awards-info>
                                <li>uefa 2014</li>
                                <li>champion</li>
                            </ul>
                        </a></li>
                        <li><a href=achivement_details.html><img src=images/awards/awards03.png alt=image>
                            <ul class=awards-info>
                                <li>uefa 2014</li>
                                <li>champion</li>
                            </ul>
                        </a></li>
                        <li><a href=#><img src=images/awards/awards04.png alt=image>
                            <ul class=awards-info>
                                <li>uefa 2014</li>
                                <li>champion</li>
                            </ul>
                        </a></li>
                        <li><a href=achivement_details.html><img src=images/awards/awards02.png alt=image>
                            <ul class=awards-info>
                                <li>uefa 2014</li>
                                <li>champion</li>
                            </ul>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <section class="product bg-white">
        <div class=container>
       
 <style>
    .card-mera{
        background-color: rgb(255, 255, 255);
       
        margin: 1%;
width: 100%;
border-radius: 20px;
text-decoration: none !important;
height: auto;
    overflow: hidden;
    padding-bottom: 10%;

    }

    .card-mera:hover{
box-shadow: 0px 2px 20px 0px #c5c5c5;
transition: 0.3s;
    }

   

    .card-img-meri{
        width: 100%;
        height: 280px;
        overflow: hidden;
        margin-bottom: 2%;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;

    }
</style>
    <div class="row">
        <h2 class="heading col-12">TOP PRODUCTS & <span>merchandise</span></h2>
<?php
$select_merch_all = mysqli_query($con, "SELECT * FROM `merchandise`");
while ($row = mysqli_fetch_assoc($select_merch_all)) {
?>
<div class="col-lg-4">
 <a href="shop.php?type=view&id=<?php echo $row['merchandise_id'] ?>">
<div class="card-mera">
<img class="card-img-meri" src="require/images/<?php echo $row['image_1']; ?>" alt="">
<div class="card-mera-body">
    <div>
        
            <h5 style="text-decoration: none !important; float:left;    padding: 3%;
    color: black;
    font-size: 20px;"><?php echo $row['name']; ?></h5>
     
        
       
            <h5 style="text-decoration: none !important;float:right;    padding: 3%;
    color: black;
    font-size: 20px;">PKR<?php echo $row['price']; ?></h5>
      
    </div>
    
</div>

</div>
</a>
</div>
<?php
}
?>

       


        </div>
        </div>
    </section>


<?php include('require/footer.php'); ?>
