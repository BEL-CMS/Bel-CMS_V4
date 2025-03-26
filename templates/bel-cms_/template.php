<?php
$link = strtolower($this->link);
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <base href="<?=$this->host;?>">
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Bel-CMS - <?=$this->configTPL->link;?></title>
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <?=$this->css;?>
        <link type="text/css" rel="stylesheet" href="templates/bel-cms/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="templates/bel-cms/css/style.css">
        <link type="text/css" rel="stylesheet" href="templates/bel-cms/css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!-- main start  -->
        <div id="main">
            <!-- progress-bar  -->
            <div class="progress-bar-wrap">
                <div class="progress-bar color-bg"></div>
            </div>
            <!-- progress-bar end -->
            <!-- header -->
            <header class="main-header">
                <!-- top bar -->
                <div class="top-bar fl-wrap">
                    <div class="container">
                        <div class="date-holder">
                            <span class="date_num"></span>
                            <span class="date_mounth"></span>
                            <span class="date_year"></span>
                        </div>
                        <div class="header_news-ticker-wrap">
                            <div class="hnt_title">Hot News :</div>
                            <div class="header_news-ticker fl-wrap">
                                <ul>
                                    <li><a href="post-single.html">They chose to leave rather than put up with a governor who follows science .</a></li>
                                    <li><a href="post-single.html">Hold On to Your Travel Dreams in the World.</a></li>
                                    <li><a href="post-single.html">White  endorses bill that would ensure abortion access.</a></li>
                                    <li><a href="post-single.html">NFL Power Rankings 2021: How all 32 teams stack up after Week 2.</a></li>
                                </ul>
                            </div>
                            <div class="n_contr-wrap">
                                <div class="n_contr p_btn"><i class="fas fa-caret-left"></i></div>
                                <div class="n_contr n_btn"><i class="fas fa-caret-right"></i></div>
                            </div>
                        </div>
                        <ul class="topbar-social">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- top bar end -->
                <div class="header-inner fl-wrap">
                    <div class="container">
                        <!-- logo holder  -->
                        <a href="index.html" class="logo-holder"><img src="images/logo.png" alt=""></a>
                        <!-- logo holder end -->
                        <div class="search_btn htact show_search-btn"><i class="far fa-search"></i> <span class="header-tooltip">Search</span></div>
                        <div class="srf_btn htact show-reg-form"><i class="fal fa-user"></i> <span class="header-tooltip">Sign In</span></div>
                        <div class="show-cart sc_btn htact"><i class="fal fa-shopping-bag"></i><span class="show-cart_count">2</span><span class="header-tooltip">Your Cart</span></div>
                        <!-- header-search-wrap -->
                        <div class="header-search-wrap novis_sarch">
                            <div class="widget-inner">
                                <form action="#">
                                    <input name="se" id="se" type="text" class="search" placeholder="Search..." value="" />
                                    <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!-- header-search-wrap end -->
                        <!-- header-cart_wrap  -->
                        <div class="header-cart_wrap novis_cart">
                            <div class="header-cart_title">Your Cart <span><strong>2</strong> items</span></div>
                            <div class="header-cart_wrap_container fl-wrap">
                                <div class="box-widget-content">
                                    <div class="widget-posts fl-wrap">
                                        <ol>
                                            <li class="clearfix">
                                                <a href="#" class="widget-posts-img"><img src="images/shop/1.jpg" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Awesome Merch Wallet</a>
                                                    <div class="widget-posts-descr_calc clearfix">1 <span>x</span> $845</div>
                                                </div>
                                                <div class="clear-cart_button"><i class="far fa-times"></i></div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#" class="widget-posts-img"><img src="images/shop/1.jpg" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Gmag Merch Wallet</a>
                                                    <div class="widget-posts-descr_calc clearfix">2 <span>x</span> $222</div>
                                                </div>
                                                <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="header-cart_wrap_total fl-wrap">
                                <div class="header-cart_wrap_total_item">Subtotal : <span>$1559</span></div>
                            </div>
                            <div class="header-cart_wrap_footer fl-wrap">
                                <a href="cart.html"> View Cart</a>
                                <a href="checkout.html"> Checkout</a>
                            </div>
                        </div>
                        <!-- header-cart_wrap end  -->
                        <!-- nav-button-wrap-->
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <!-- nav-button-wrap end-->
                        <!--  navigation -->
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">Home <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="index.html">Slider</a></li>
                                            <li><a href="index2.html">Carousel</a></li>
                                            <li><a href="index3.html">Grid</a></li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li>
                                        <a href="#" class="act-link">Posts<i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="blog.html">List</a></li>
                                            <li><a href="blog2.html">2 Sidebars</a></li>
                                            <li><a href="blog3.html">Grid Sidebar</a></li>
                                            <li><a href="blog4.html">Full Width Sidebar </a></li>
                                            <li><a href="blog5.html">3 Columns Grid</a></li>
                                            <li>
                                                <a href="#">Single<i class="fas fa-caret-down"></i></a>
                                                <!--second level -->
                                                <ul>
                                                    <li><a href="post-single.html">Style 1</a></li>
                                                    <li><a href="post-single2.html">Style 2</a></li>
                                                </ul>
                                                <!--second level end-->
                                            </li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li><a href="blog.html">Business</a></li>
                                    <li><a href="blog.html">Technology</a></li>
                                    <li>
                                        <a href="#">Shop <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-single.html">Product Single</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li>
                                        <a href="#">Pages<i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="contacts.html">Contacts</a></li>
                                            <li><a href="category.html">Category</a></li>
                                            <li><a href="author-single.html">Author Single</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- navigation  end -->
                    </div>
                </div>
            </header>
            <!-- header end  -->
            <!-- wrapper -->
            <div id="wrapper">
                <!-- content    -->
                <div class="content">
                    <!--section   -->
                    <section class="hero-section">
                        <div class="bg-wrap hero-section_bg">
                            <div class="bg" data-bg="images/bg/1.jpg"></div>
                        </div>
                        <div class="container">
                            <div class="hero-section_title hs_single-post">
                                <a class="post-category-marker color-bg" href="category.html">Technology</a>
                                <span class="post-date"><i class="far fa-clock"></i> 05 April 2022</span>
                                <div class="clearfix"></div>
                                <h2>Innovations that Bring Pleasure to All Peoples</h2>
                                <h5>Perspiciatis unde omnis iste natus error sit voluptatem.</h5>
                                <div class="author-link"><a href="author-single.html"><img src="images/avatar/1.jpg" alt="">  <span>By Mark Rose</span></a></div>
                                <ul class="post-opt">
                                    <li><i class="far fa-comments-alt"></i> 4 </li>
                                    <li><i class="fal fa-eye"></i>  980 </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div class="scroll-down-wrap scw_transparent">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>
                        </div>
                    </section>
                    <!-- section end  -->
                    <div class="breadcrumbs-section fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-header_url">
                                <a href="#">Home</a><span>Blog List style</span>
                            </div>
                            <div class="share-holder hor-share">
                                <div class="share-title">Share:</div>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                        <div class="pwh_bg"></div>
                    </div>
                    <!--section   -->
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="main-container fl-wrap fix-container-init">
                                        <!-- single-post-media   -->
                                        <div class="single-post-media fl-wrap">
                                            <a class="video-holder fl-wrap  image-popup"  href="https://www.youtube.com/watch?v=K-6tPkm6cZA">
                                                <div class="bg" data-bg="images/all/1.jpg"></div>
                                                <div class="overlay"></div>
                                                <div class="big_prom"> <i class="fas fa-play"></i></div>
                                            </a>
                                        </div>
                                        <!-- single-post-media end   -->
                                        <!-- single-post-content   -->
                                        <div class="single-post-content  fl-wrap">
                                            <div class="fs-wrap smpar fl-wrap">
                                                <div class="fontSize"><span class="fs_title">Font size: </span><input type="text" class="rage-slider" data-step="1" data-min="12" data-max="15" value="12"></div>
                                                <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
                                                <div class="show-more-snopt-tooltip">
                                                    <a href="#comments" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i> Write a Comment</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <a class="print-btn" href="javascript:window.print()" data-microtip-position="bottom"><span>Print</span><i class="fal fa-print"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="single-post-content_text" id="font_chage">
                                                <p class="has-drop-cap">Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</p>
                                                <h4 class="mb_head">Middle Post Heading</h4>
                                                <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</p>
                                                <div class="single-post-content_text_media fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-6"><img src="images/all/1.jpg" alt="" class="respimg"></div>
                                                        <div class="col-md-6">
                                                            <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. </p>
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                            <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. </p>
                                                <h4 class="mb_head">Middle Post Heading</h4>
                                                <div class="single-post-content_text_media fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="has-drop-cap"> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus.  faucibus.Cras lacinia magna vel molestie faucibus.   </p>
                                                        </div>
                                                        <div class="col-md-6"><img src="images/all/1.jpg" alt="" class="respimg"></div>
                                                    </div>
                                                </div>
                                                <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. </p>
                                                <blockquote>
                                                    <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. </p>
                                                </blockquote>
                                                <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</p>
                                                <p>  Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor.</p>
                                            </div>
                                            <div class="single-post-footer fl-wrap">
                                                <div class="post-single-tags">
                                                    <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
                                                    <div class="tags-widget">
                                                        <a href="#">Science</a>
                                                        <a href="#">Technology</a>
                                                        <a href="#">Business</a>
                                                        <a href="#">Lifestyle</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-post-nav"   -->
                                            <div class="single-post-nav fl-wrap">
                                                <a href="post-single.html" class="single-post-nav_prev spn_box">
                                                    <div class="spn_box_img">
                                                        <img src="images/all/1.jpg" class="respimg" alt="">
                                                    </div>
                                                    <div class="spn-box-content">
                                                        <span class="spn-box-content_subtitle"><i class="fas fa-caret-left"></i> Prev Post</span>
                                                        <span class="spn-box-content_title">New VR Glasses and Headset System Release</span>
                                                    </div>
                                                </a>
                                                <a href="post-single.html" class="single-post-nav_next spn_box">
                                                    <div class="spn_box_img">
                                                        <img src="images/all/1.jpg" class="respimg" alt="">
                                                    </div>
                                                    <div class="spn-box-content">
                                                        <span class="spn-box-content_subtitle">Next Post <i class="fas fa-caret-right"></i></span>
                                                        <span class="spn-box-content_title">$310m to help businesses in latest Lockdow</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- single-post-nav"  end   -->
                                        </div>
                                        <!-- single-post-content  end   -->
                                        <div class="limit-box2 fl-wrap"></div>
                                        <!-- post-author-->                                   
                                        <div class="post-author fl-wrap">
                                            <div class="author-img">
                                                <img  src="images/avatar/1.jpg" alt="">	
                                            </div>
                                            <div class="author-content fl-wrap">
                                                <h5>Written By <a href="author-single.html">Mark Rose</a></h5>
                                                <p>At one extremity the rope was unstranded, and the separate spread yarns were all braided and woven round the socket of the harpoon; the pole was then driven hard up into the socket..</p>
                                            </div>
                                            <div class="profile-card-footer fl-wrap">
                                                <a href="author-single.html" class="post-author_link">View Profile <i class="fas fa-caret-right"></i></a>
                                                <div class="profile-card-footer_soc">
                                                    <div class="profile-card-footer_title">Follow: </div>
                                                    <div class="profile-card-social">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--post-author end-->		
                                        <div class="more-post-wrap  fl-wrap">
                                            <div class="pr-subtitle prs_big">Related Posts</div>
                                            <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!--list-post-->	
                                                        <div class="list-post fl-wrap">
                                                            <a class="post-category-marker" href="category.html">Science</a>
                                                            <div class="list-post-media">
                                                                <a href="post-single.html">
                                                                    <div class="bg-wrap">
                                                                        <div class="bg" data-bg="images/all/1.jpg"></div>
                                                                    </div>
                                                                </a>
                                                                <span class="post-media_title">&copy; Image Copyrights Title</span>
                                                            </div>
                                                            <div class="list-post-content">
                                                                <h3><a href="post-single.html">How to start Home renovation.</a></h3>
                                                                <span class="post-date"><i class="far fa-clock"></i>  05 April 2022</span>
                                                            </div>
                                                        </div>
                                                        <!--list-post end-->						  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!--list-post-->	
                                                        <div class="list-post fl-wrap">
                                                            <a class="post-category-marker" href="category.html">Sports</a>
                                                            <div class="list-post-media">
                                                                <a href="post-single.html">
                                                                    <div class="bg-wrap">
                                                                        <div class="bg" data-bg="images/all/1.jpg"></div>
                                                                    </div>
                                                                </a>
                                                                <span class="post-media_title">&copy; Image Copyrights Title</span>
                                                            </div>
                                                            <div class="list-post-content">
                                                                <h3><a href="post-single.html">Warriors face season defining clash</a></h3>
                                                                <span class="post-date"><i class="far fa-clock"></i> 11 March 2022</span>
                                                            </div>
                                                        </div>
                                                        <!--list-post end-->						  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comments  -->
                                        <div id="comments" class="single-post-comm fl-wrap">
                                            <div class="pr-subtitle prs_big">Commnets <span>3</span></div>
                                            <ul class="commentlist clearafix">
                                                <li class="comment">
                                                    <div class="comment-author">
                                                        <img alt="" src="images/avatar/1.jpg" width="50" height="50">
                                                    </div>
                                                    <div class="comment-body smpar">
                                                        <h4><a href="#">Kevin Antony</a></h4>
                                                        <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                        <div class="show-more-snopt-tooltip bxwt">
                                                            <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                            <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.</p>
                                                        <a class="comment-reply-link" href="#"><i class="fas fa-reply"></i> Reply</a>
                                                        <div class="comment-meta"><i class="far fa-clock"></i> January 02, 2020</div>
                                                        <div class="comment-body_dec"></div>
                                                    </div>
                                                </li>
                                                <li class="comment comment_reply">
                                                    <div class="comment-author">
                                                        <img alt="" src="images/avatar/1.jpg" width="50" height="50">
                                                    </div>
                                                    <div class="comment-body smpar">
                                                        <h4><a href="#">Liza Rose</a></h4>
                                                        <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                        <div class="show-more-snopt-tooltip bxwt">
                                                            <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                            <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p>  In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                                                        <a class="comment-reply-link" href="#"><i class="fas fa-reply"></i> Reply</a>
                                                        <div class="comment-meta"><i class="far fa-clock"></i> January 02, 2020</div>
                                                        <div class="comment-body_dec"></div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment-author">
                                                        <img alt="" src="images/avatar/1.jpg" width="50" height="50">
                                                    </div>
                                                    <div class="comment-body smpar">
                                                        <h4><a href="#">Liza Rose</a></h4>
                                                        <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                        <div class="show-more-snopt-tooltip bxwt">
                                                            <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                            <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p> Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                                                        <a class="comment-reply-link" href="#"><i class="fas fa-reply"></i> Reply</a>
                                                        <div class="comment-meta"><i class="far fa-clock"></i> January 02, 2020</div>
                                                        <div class="comment-body_dec"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div id="addcom" class="clearafix">
                                                <div class="pr-subtitle"> Leave A Comment <i class="fas fa-caret-down"></i></div>
                                                <div class="comment-reply-form fl-wrap">
                                                    <form id="add-comment" class="add-comment custom-form">
                                                        <fieldset>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" placeholder="Your Name *" value="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" placeholder="Email Address*" value="" />
                                                                </div>
                                                            </div>
                                                            <textarea placeholder="Your Comment:"></textarea>
                                                        </fieldset>
                                                        <button class="btn float-btn color-btn">  Submit Comment <i class="fas fa-caret-right"></i> </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--end respond-->
                                        </div>
                                        <!--comments end -->					  
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- sidebar   -->
                                    <div class="sidebar-content fl-wrap fixed-bar">
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="box-widget-content">
                                                <div class="search-widget fl-wrap">
                                                    <form action="#">
                                                        <input name="se" id="se12" type="text" class="search" placeholder="Search..." value="" />
                                                        <button class="search-submit2" id="submit_btn12"><i class="far fa-search"></i> </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->						
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="widget-title">Cetegories</div>
                                            <div class="box-widget-content">
                                                <div class="sb-categories_bg">
                                                    <!-- sb-categories_bg_item -->
                                                    <a href="category-single.html" class="sb-categories_bg_item">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="spb-categories_title"><span>01</span>Politics</div>
                                                        <div class="spb-categories_counter">66</div>
                                                    </a>
                                                    <!-- sb-categories_bg_item  end-->
                                                    <!-- sb-categories_bg_item -->
                                                    <a href="category-single.html" class="sb-categories_bg_item">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="spb-categories_title"><span>02</span>Technology</div>
                                                        <div class="spb-categories_counter">22</div>
                                                    </a>
                                                    <!-- sb-categories_bg_item  end-->											
                                                    <!-- sb-categories_bg_item -->
                                                    <a href="category-single.html" class="sb-categories_bg_item">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="spb-categories_title"><span>03</span>Business</div>
                                                        <div class="spb-categories_counter">54</div>
                                                    </a>
                                                    <!-- sb-categories_bg_item  end-->													
                                                    <!-- sb-categories_bg_item -->
                                                    <a href="category-single.html" class="sb-categories_bg_item">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="spb-categories_title"><span>04</span>Sports</div>
                                                        <div class="spb-categories_counter">15</div>
                                                    </a>
                                                    <!-- sb-categories_bg_item  end-->													
                                                    <!-- sb-categories_bg_item -->
                                                    <a href="category-single.html" class="sb-categories_bg_item">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                            <div class="overlay"></div>
                                                        </div>
                                                        <div class="spb-categories_title"><span>05</span>Science</div>
                                                        <div class="spb-categories_counter">29</div>
                                                    </a>
                                                    <!-- sb-categories_bg_item  end-->													
                                                </div>
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="widget-title">Popular Tags</div>
                                            <div class="box-widget-content">
                                                <div class="tags-widget">
                                                    <a href="#">Science</a>
                                                    <a href="#">Politics</a>
                                                    <a href="#">Technology</a>
                                                    <a href="#">Business</a>
                                                    <a href="#">Sports</a>
                                                    <a href="#">Food</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->						
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="widget-title">Follow Us</div>
                                            <div class="box-widget-content">
                                                <div class="social-widget">
                                                    <a href="#" target="_blank" class="facebook-soc">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <span class="soc-widget-title">Likes</span>
                                                    <span class="soc-widget_counter">2640</span>
                                                    </a>
                                                    <a href="#" target="_blank" class="twitter-soc">
                                                    <i class="fab fa-twitter"></i>
                                                    <span class="soc-widget-title">Followers</span>
                                                    <span class="soc-widget_counter">1456</span>												
                                                    </a> 
                                                    <a href="#" target="_blank" class="youtube-soc">
                                                    <i class="fab fa-youtube"></i>
                                                    <span class="soc-widget-title">Followers</span>
                                                    <span class="soc-widget_counter">1456</span>												
                                                    </a> 												
                                                    <a href="#" target="_blank" class="instagram-soc">
                                                    <i class="fab fa-instagram"></i>
                                                    <span class="soc-widget-title">Followers</span>
                                                    <span class="soc-widget_counter">1456</span>												
                                                    </a> 														
                                                </div>
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->						
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="box-widget-content">
                                                <div class="single-grid-slider slider_widget">
                                                    <div class="slider_widget_title">Editor's Choice</div>
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">
                                                            <!-- swiper-slide-->  
                                                            <div class="swiper-slide">
                                                                <div class="grid-post-item     fl-wrap">
                                                                    <div class="grid-post-media gpm_sing">
                                                                        <div class="bg-wrap">
                                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                        <div class="grid-post-media_title">
                                                                            <a class="post-category-marker" href="category.html">Technology</a>
                                                                            <h4><a href="post-single.html">Tesla it tested hypersonic Model-C</a></h4>
                                                                            <span class="video-date"><i class="far fa-clock"></i>16 january 2022</span>
                                                                            <ul class="post-opt">
                                                                                <li><i class="far fa-comments-alt"></i> 11 </li>
                                                                                <li><i class="fal fa-eye"></i>  55 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->
                                                            <!-- swiper-slide-->  
                                                            <div class="swiper-slide">
                                                                <div class="grid-post-item  bold_gpi  fl-wrap">
                                                                    <div class="grid-post-media gpm_sing">
                                                                        <div class="bg-wrap">
                                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                        <div class="grid-post-media_title">
                                                                            <a class="post-category-marker" href="category.html">Politics</a>
                                                                            <h4><a href="post-single.html">Blue Origin practices with   orbital rocket in Florida</a></h4>
                                                                            <span class="video-date"><i class="far fa-clock"></i> 05 december 2021</span>
                                                                            <ul class="post-opt">
                                                                                <li><i class="far fa-comments-alt"></i>  14 </li>
                                                                                <li><i class="fal fa-eye"></i>  134 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->									
                                                            <!-- swiper-slide-->  
                                                            <div class="swiper-slide">
                                                                <div class="grid-post-item  bold_gpi  fl-wrap">
                                                                    <div class="grid-post-media gpm_sing">
                                                                        <div class="bg-wrap">
                                                                            <div class="bg" data-bg="images/all/1.jpg"></div>
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                        <div class="grid-post-media_title">
                                                                            <a class="post-category-marker" href="category.html">Technology</a>
                                                                            <h4><a href="post-single.html">Scientific research goes to the next level</a></h4>
                                                                            <span class="video-date"><i class="far fa-clock"></i> 03 March 2022</span>
                                                                            <ul class="post-opt">
                                                                                <li><i class="far fa-comments-alt"></i>  25 </li>
                                                                                <li><i class="fal fa-eye"></i>  164 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->										
                                                        </div>
                                                        <div class="sgs-pagination sgs_hor "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->	
                                        <!-- box-widget -->
                                        <div class="box-widget fl-wrap">
                                            <div class="box-widget-content">
                                                <!-- content-tabs-wrap -->
                                                <div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
                                                    <div class="content-tabs fl-wrap">
                                                        <ul class="tabs-menu fl-wrap no-list-style">
                                                            <li class="current"><a href="#tab-popular"> Popular News </a></li>
                                                            <li><a href="#tab-resent">Resent News</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--tabs -->                       
                                                    <div class="tabs-container">
                                                        <!--tab -->
                                                        <div class="tab">
                                                            <div id="tab-popular" class="tab-content first-tab">
                                                                <div class="post-widget-container fl-wrap">
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">How to start Home education.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 25 may 2022</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 12</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 654</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">The secret to moving this   screening.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 13 april 2021</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 6</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 1227</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->														
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">Fall ability to keep Congress on rails.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 02 December 2021</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 12</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 654</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->														
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--tab  end-->
                                                        <!--tab -->
                                                        <div class="tab">
                                                            <div id="tab-resent" class="tab-content">
                                                                <div class="post-widget-container fl-wrap">
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">Magpie nesting zone sites.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 05 april 2021</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 16</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 727</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->														
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">Locals help create whole new community.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 22 march 2021</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 31</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 63</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->														
                                                                    <!-- post-widget-item -->
                                                                    <div class="post-widget-item fl-wrap">
                                                                        <div class="post-widget-item-media">
                                                                            <a href="post-single.html"><img src="images/all/thumbs/1.jpg"  alt=""></a>
                                                                        </div>
                                                                        <div class="post-widget-item-content">
                                                                            <h4><a href="post-single.html">Tennis season still to proceed.</a></h4>
                                                                            <ul class="pwic_opt">
                                                                                <li><span><i class="far fa-clock"></i> 06 December 2021</span></li>
                                                                                <li><span><i class="far fa-comments-alt"></i> 05</span></li>
                                                                                <li><span><i class="fal fa-eye"></i> 145</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post-widget-item end -->													
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--tab end-->							
                                                    </div>
                                                    <!--tabs end-->  
                                                </div>
                                                <!-- content-tabs-wrap end -->
                                            </div>
                                        </div>
                                        <!-- box-widget  end -->					
                                    </div>
                                    <!-- sidebar  end -->
                                </div>
                            </div>
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!-- section  -->
                    <div class="gray-bg ad-wrap fl-wrap">
                        <div class="content-banner-wrap">
                            <img src="images/all/banner.jpg" class="respimg" alt="">
                        </div>
                    </div>
                    <!-- section end -->
                </div>
                <!-- content  end-->
                <!-- footer -->
                <footer class="fl-wrap main-footer">
                    <div class="container">
                        <!-- footer-widget-wrap -->
                        <div class="footer-widget-wrap fl-wrap">
                            <div class="row">
                                <!-- footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-content">
                                            <a href="index.html" class="footer-logo"><img src="images/logo2.png" alt=""></a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto. </p>
                                            <div class="footer-social fl-wrap">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-md-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Categories </div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box fl-wrap">
                                                <ul>
                                                    <li> <a href="#">Politics</a></li>
                                                    <li> <a href="#">Technology</a></li>
                                                    <li> <a href="#">Business</a></li>
                                                    <li> <a href="#">Sports</a></li>
                                                    <li> <a href="#">Science</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-md-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Links</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box fl-wrap">
                                                <ul>
                                                    <li> <a href="#">Home</a></li>
                                                    <li> <a href="#">About</a></li>
                                                    <li> <a href="#">Contacts</a></li>
                                                    <li> <a href="#">News</a></li>
                                                    <li> <a href="#">Shop</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->								
                                <!-- footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Subscribe</div>
                                        <div class="footer-widget-content">
                                            <div class="subcribe-form fl-wrap">
                                                <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                                <form id="subscribe" class="fl-wrap">
                                                    <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                                    <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Send </button>
                                                    <label for="subscribe-email" class="subscribe-message"></label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                            </div>
                        </div>
                        <!-- footer-widget-wrap end-->
                    </div>
                    <div class="footer-bottom fl-wrap">
                        <div class="container">
                            <div class="copyright"><span>&#169; Gmag 2022</span> . All rights reserved. </div>
                            <div class="to-top"> <i class="fas fa-caret-up"></i></div>
                            <div class="subfooter-nav">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer end-->  			
                <div class="aside-panel">
                    <ul>
                        <li> <a href="category.html"><i class="far  fa-podium"></i><span>Politics</span></a></li>
                        <li> <a href="category.html"><i class="far fa-atom"></i><span>Technology</span></a></li>
                        <li> <a href="category.html"><i class="far fa-user-chart"></i><span>Business</span></a></li>
                        <li> <a href="category.html"><i class="far fa-tennis-ball"></i><span>Sports</span></a></li>
                        <li> <a href="category.html"><i class="far fa-flask"></i><span>Science</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- wrapper end -->	
            <!--register form -->
            <div class="main-register-container">
                <div class="reg-overlay close-reg-form"></div>
                <div class="main-register-holder">
                    <div class="main-register-wrap fl-wrap">
                        <div class="main-register_bg">
                            <div class="bg-wrap">
                                <div class="bg par-elem "  data-bg="images/bg/2.jpg"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="mg_logo"><img src="images/logo2.png" alt=""></div>
                        </div>
                        <div class="main-register tabs-act fl-wrap">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                            </ul>
                            <div class="close-modal close-reg-form"><i class="fal fa-times"></i></div>
                            <!--tabs -->
                            <div id="tabs-container">
                                <div class="tab">
                                    <!--tab -->
                                    <div id="tab-1" class="tab-content first-tab">
                                        <div class="custom-form">
                                            <form method="post" name="registerform">
                                                <label>Username or Email Address <span>*</span> </label>
                                                <input name="email" type="text" onClick="this.select()" value="">
                                                <label>Password <span>*</span> </label>
                                                <input name="password" type="password" onClick="this.select()" value="">
                                                <div class="filter-tags">
                                                    <input id="check-a" type="checkbox" name="check" checked>
                                                    <label for="check-a">Remember me</label>
                                                </div>
                                                <div class="lost_password">
                                                    <a href="#">Lost Your Password?</a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <button type="submit" class="log-submit-btn color-bg"><span>Log In</span></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--tab end -->
                                    <!--tab -->
                                    <div class="tab">
                                        <div id="tab-2" class="tab-content">
                                            <div class="custom-form">
                                                <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                                    <label>Full Name <span>*</span> </label>
                                                    <input name="name" type="text" onClick="this.select()" value="">
                                                    <label>Email Address <span>*</span></label>
                                                    <input name="email" type="text" onClick="this.select()" value="">
                                                    <label>Password <span>*</span></label>
                                                    <input name="password" type="password" onClick="this.select()" value="">
                                                    <button type="submit" class="log-submit-btn color-bg"><span>Register</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab end -->
                                </div>
                                <!--tabs end -->
                                <div class="log-separator fl-wrap"><span>or</span></div>
                                <div class="soc-log  fl-wrap">
                                    <p>For faster login or register use your social account.</p>
                                    <a href="#"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->

        <?=$this->js;?>
        <script src="templates/bel-cms/js/plugins.js"></script>
        <script src="templates/bel-cms/js/scripts.js"></script>
    </body>
</html>