<?php
use BelCMS\User\User;
$link = defined(strtoupper($var->link)) ? constant(strtoupper($var->link)) : ucfirst($var->link);
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <base href="<?=$this->host;?>">
        <title>Bel-CMS - <?=$link;?></title>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rentstate - Real Estate Agency Template</title>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="templates/bel-cms-v4/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="templates/bel-cms-v4/css/style.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="templates/bel-cms-v4/images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <svg>
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                            <fecolormatrix in="blur"   values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                            <fecomposite in="SourceGraphic" in2="gooey" operator="atop"/>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
        <!--loader end-->
        <!--  main   -->
        <div id="main">
            <!--header-->
            <header class="main-header">
                <div class="container">
                    <div class="header-inner">
                        <a href="index.html" class="logo-holder"><img src="templates/bel-cms-v4/images/logo.png" alt=""></a>
                        <!--  navigation --> 
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul class="no-list-style">
                                    <li>
                                        <a href="#">Home <i class="fa-solid fa-caret-down"></i></a>
                                        <!--second level -->   
                                        <ul>
                                            <li><a href="index.html">Slider</a></li>
                                            <li><a href="index2.html">Video</a></li>
                                            <li><a href="index3.html">Slideshow</a></li>
                                            <li><a href="index4.html">Parallax Image</a></li>
                                            <li><a href="dashboard.html">User Dasboard</a></li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li>
                                        <a href="#">Listings <i class="fa-solid fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="listing.html">Style 1</a></li>
                                            <li><a href="listing2.html">Style 2</a></li>
                                            <li><a href="listing3.html">Style 3</a></li>
                                            <li><a href="listing4.html">Style 4</a></li>
                                            <li>
                                                <a href="#">Single <i class="fa-solid fa-caret-right"></i></a>
                                                <!--third  level  -->
                                                <ul>
                                                    <li><a href="listing-single.html">Style 1</a></li>
                                                    <li><a href="listing-single2.html">Style 2</a></li>
                                                    <li><a href="listing-single3.html">Style 3</a></li>
                                                </ul>
                                                <!--third  level end-->
                                            </li>
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li>
                                        <a href="blog.html" class="act-link">News</a>
                                    </li>
                                    <li>
                                        <a href="#">Pages <i class="fa-solid fa-caret-down"></i></a>
                                        <!--second level -->   
                                        <ul>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="contacts.html">Contacts</a></li>
                                            <li><a href="agent-single.html">Agent single</a></li>
                                            <li><a href="help.html">How it Works</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                            <li><a href="add-listing.html">Add Listing</a></li>
                                        </ul>
                                        <!--second level end-->                                
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- navigation  end -->						
                        <!-- nav-button-wrap-->
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <!-- nav-button-wrap end-->					
                        <div class="header-search-btn tolt" data-microtip-position="bottom"  data-tooltip="Search"><i class="fa-regular fa-magnifying-glass"></i> </div>
                        <a href="add-listing.html" class="header-btn"><span>Add Your Propperty</span></a>
                        <div class="wish_btn swl_btn tolt" data-microtip-position="bottom"  data-tooltip="Wishlist">
                            <div class="wish_btn-item"><i class="fa-thin fa-heart"></i><span class="wish_count">3</span></div>
                        </div>
                        <div class="show-reg-form modal-open"><i class="fa-thin fa-user"></i><span>Sign In</span></div>
                        <!-- header-search-wrap  -->	
                        <div class="header-search-wrap novis_search">
                            <div class="header-search">
                                <div class="header-search-nav">
                                    <div class="header-search-nav_container">
                                        <div class="header-search-radio">
                                            <input class="hidden radio-label" type="radio" name="accept-offers" id="sale-button" checked="checked">
                                            <label class="button-label" for="sale-button">Sale</label>
                                            <input class="hidden radio-label" type="radio" name="accept-offers" id="rent-button">
                                            <label class="button-label" for="rent-button">Rent</label>							
                                            <input class="hidden radio-label" type="radio" name="accept-offers" id="comm-button">
                                            <label class="button-label" for="comm-button">Commercial</label>								
                                        </div>
                                    </div>
                                </div>
                                <div class="header-search-container">
                                    <div class="custom-form">
                                        <!-- listsearch-input-item -->
                                        <div class="cs-intputwrap">
                                            <i class="fa-light fa-house"></i>
                                            <input type="text"   placeholder="Keywords..." value="">
                                        </div>
                                        <!-- listsearch-input-item -->									
                                        <!-- listsearch-input-item -->
                                        <div class="cs-intputwrap">
                                            <i class="fa-light fa-location-dot"></i>
                                            <input type="text"   placeholder="Location..." value="">
                                        </div>
                                        <!-- listsearch-input-item -->										
                                        <!-- listsearch-input-item -->
                                        <div class="cs-intputwrap">
                                            <div class="price-range-wrap ">
                                                <label>Price Range</label>
                                                <div class="price-rage-item">
                                                    <input type="text" class="price-range-double" data-min="100" data-max="100000"  name="price-range1"  data-step="1" value="1" data-prefix="$">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- listsearch-input-item -->										
                                        <button onclick="window.location.href='listing.html'" class="commentssubmit commentssubmit_fw">Search</button>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- header-search-wrap  end -->		
                    </div>
                </div>
            </header>
            <div class="body-overlay fs-wrapper search-form-overlay close-search-form"></div>
            <!--header-end-->
            <!--warpper-->
            <div class="wrapper">
                <!--content-->
                <div class="content">
                    <!--section-->
                    <div class="section hero-section hero-section_sin">
                        <div class="hero-section-wrap">
                            <div class="hero-section-wrap-item">
                                <div class="container">
                                    <div class="hero-section-container">
                                        <div class="hero-section-title">
                                            <h2>Our Last News</h2>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="hs-scroll-down-wrap">
                                    <div class="scroll-down-item">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span>Scroll Down To Discover</span>
                                    </div>
                                    <div class="svg-corner svg-corner_white"  style="bottom:0;right: -39px; transform: rotate( 90deg)" ></div>
                                    <div class="svg-corner svg-corner_white"  style="bottom:0;left:  -39px;"></div>
                                </div>
                                <div class="bg-wrap bg-hero bg-parallax-wrap-gradien fs-wrapper" data-scrollax-parent="true">
                                    <div class="bg" data-bg="templates/bel-cms-v4/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--section-end-->				
                    <!--container-->
                    <div class="container">
                        <!--breadcrumbs-list-->
                        <div class="breadcrumbs-list bl_flat">
                            <a href="#">Home</a><a href="#">News</a><span>Post Single</span>
                            <div class="breadcrumbs-list_dec"><i class="fa-thin fa-arrow-up"></i></div>
                        </div>
                        <!--breadcrumbs-list end-->					
                        <!--main-content-->
                        <div class="main-content">
                            <!--boxed-container-->
                            <div class="boxed-container">
                                <div class="scroll-content-wrap">
                                    <div class="share-holder init-fix-column">
                                        <span class="share-title">  Share   </span>
                                        <div class="share-container  isShare"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="post-container">
                                                <div class="boxed-content">
                                                    <div class="boxed-content-title">
                                                        <h3> How to Book a Room online</h3>
                                                    </div>
                                                    <div class="boxed-content-item">
                                                        <!-- blog media -->
                                                        <div class="blog-media">
                                                            <div class="single-slider-wrap">
                                                                <div class="single-slider">
                                                                    <div class="swiper-container">
                                                                        <div class="swiper-wrapper lightgallery">
                                                                            <div class="swiper-slide hov_zoom"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""><a href="templates/bel-cms-v4/images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                                            <div class="swiper-slide hov_zoom"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""><a href="templates/bel-cms-v4/images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                                            <div class="swiper-slide hov_zoom"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""><a href="templates/bel-cms-v4/images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="fw-carousel-button-prev slider-button"><i class="fa-solid fa-caret-left"></i></div>
                                                                <div class="fw-carousel-button-next slider-button"><i class="fa-solid fa-caret-right"></i></div>
                                                                <div class="fwc-controls_wrap">
                                                                    <div class="solid-pagination_btns ss-slider-pagination"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- blog media end -->		
                                                        <div class="text-block post-single_tb">
                                                            <div class="post-card-details" style="margin-bottom: 20px;">
                                                                <ul>
                                                                    <li><i class="fa-light fa-calendar-days"></i><span>September 10, 2023</span></li>
                                                                    <li><i class="fa-light fa-comment"></i><span>2 comments</span></li>
                                                                </ul>
                                                                <div class="pv-item_wrap pv-item_wrap_single"><i class="fa-light fa-glasses"></i><span> Viewed - <strong>59</strong></span></div>
                                                            </div>
                                                            <div class="text-block-container">
                                                                <p>Qraesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non, faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec velit non odio aliquam suscipit. Sed non neque faucibus, condimentum lectus at, accumsan enim.   </p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra. Interdum et malesu they adamale fames ac anteipsu pimsine faucibus curabitur arcu site feugiat in tortor in, volutpat sollicitudin libero. Hotel non lorem acer suscipit bibendum vulla facilisi nedeuter .</p>
                                                                <div class="post-img-row">
                                                                    <div class="post-img-row_item">
                                                                        <img src="templates/bel-cms-v4/images/all/1.jpg" class="respimg" alt=""> 
                                                                    </div>
                                                                    <div class="post-img-row_item">
                                                                        <img src="templates/bel-cms-v4/images/all/1.jpg" class="respimg" alt=""> 
                                                                    </div>
                                                                </div>
                                                                <p>Fames massa tortor sit nisl sit. Duis nulla tempus quisque et diam condimentum nisl. Rhoncus quisque elementum nulla lorem at turpis vitae quisque. Vulputate duis vel et odio hendrerit magna. Nec lacus dui egestas sit. Vulputate tincidunt viverra viverra etiam porta facilisis. Diam dui euismod eget donec. Pharetra leo sed felis urna. At a viverra urna elementum tristique ac integer pretium. Vel tincidunt sed mi nulla lectus sagittis.</p>
                                                                <blockquote>
                                                                    <p> Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus.   </p>
                                                                </blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec nisi et nibh sollicitudin pellentesque vitae sit amet tortor. Vestibulum lacinia mi non lacus tincidunt accumsan. Nunc venenatis erat ac enim facilisis pulvinar. Donec placerat et velit nec bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec luctus, augue vitae blandit lobortis, augue urna varius tellus, et viverra odio ipsum id velit. Morbi pellentesque scelerisque dignissim. In dignissim luctus augue. Phasellus viverra nibh vel sapien facilisis, id placerat nunc congue. Aliquam erat volutpat. Aenean semper dui id accumsan pulvinar. Aliquam congue mollis turpis, a volutpat metus lobortis nec. Integer in mollis quam. Cras nisl mi, dapibus a ante non, accumsan luctus augue.</p>
                                                            </div>
                                                            <div class="tagcloud_single">
                                                                <span class="tc_single_title"><i class="fa-regular fa-tag"></i>Post Tags:</span>
                                                                <div class="tags-widget">
                                                                    <a href="#">Hotel</a>
                                                                    <a href="#">Hostel</a>
                                                                    <a href="#">Room</a>
                                                                    <a href="#">Photography</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-nav-fixed dark-bg scale_anim">
                                                    <ul>
                                                        <li>
                                                            <a href="blog-single.html" class="ln"><i class="fal fa-long-arrow-left"></i><span>Prev <strong>- Post Title</strong></span></a>
                                                            <div class="content-nav_mediatooltip cnmd_leftside">
                                                                <div class="overlay"></div>
                                                                <div class="bg" data-bg="templates/bel-cms-v4/images/all/1.jpg"></div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single.html" class="rn"><span >Next <strong>- Post Title</strong></span> <i class="fal fa-long-arrow-right"></i></a>
                                                            <div class="content-nav_mediatooltip cnmd_rightside">
                                                                <div class="overlay"></div>
                                                                <div class="bg" data-bg="templates/bel-cms-v4/images/all/1.jpg"></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="boxed-content">
                                                    <div class="boxed-content-title">
                                                        <h3> Post Comments</h3>
                                                    </div>
                                                    <div class="boxed-content-item">
                                                        <div class="comments-wrap">
                                                            <!-- comments-item -->   
                                                            <div class="comments-item">
                                                                <div class="comments-avatar">
                                                                    <img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""> 
                                                                </div>
                                                                <div class="comments-item-text">
                                                                    <div class="comments-header">
                                                                        <h4><a href="#">Liza Rose</a></h4>
                                                                    </div>
                                                                    <div class="comments-item-text-wrap">
                                                                        <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                                    </div>
                                                                    <div class="comments-item-footer">
                                                                        <div class="comments-item-date"><span><i class="fa-light fa-calendar"></i>12 April 2024</span></div>
                                                                        <a href="#" class="reply-item">Reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--comments-item end--> 
                                                            <!-- comments-item -->  
                                                            <div class="comments-item">
                                                                <div class="comments-avatar">
                                                                    <img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""> 
                                                                </div>
                                                                <div class="comments-item-text">
                                                                    <div class="comments-header">
                                                                        <h4><a href="#">Adam Koncy</a></h4>
                                                                    </div>
                                                                    <div class="comments-item-text-wrap">
                                                                        <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                                    </div>
                                                                    <div class="comments-item-footer">
                                                                        <div class="comments-item-date"><span><i class="fa-light fa-calendar"></i>03 December 2023</span></div>
                                                                        <a href="#" class="reply-item">Reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--comments-item end-->                                                                
                                                        </div>
                                                        <div class="comment-form_title">Add your Comment</div>
                                                        <div class="comment-form custom-form">
                                                            <form  class="comment-form"   name="commentform" id="commentform">
                                                                <fieldset>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="cs-intputwrap">
                                                                                <i class="fa-light fa-user"></i>
                                                                                <input   name="name" type="text"   placeholder="Your name" onClick="this.select()" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="cs-intputwrap">
                                                                                <i class="fa-light fa-envelope"></i>
                                                                                <input   name="name" type="text"   placeholder="Your name" onClick="this.select()" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                                                    <button class="commentssubmit" id="commentssubmit" style="margin-top: 20px">Send Comment</button>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <!--boxed-container-->
                                            <div class="sb-container fixed-bar">
                                                <!-- main-sidebar-widget-->   
                                                <div class="main-sidebar-widget">
                                                    <div class="search-widget">
                                                        <form action="#">
                                                            <input name="se" id="se" type="text" class="search-inpt-item" placeholder="Search.." value="Search...">
                                                            <button class="search-submit color-bg" id="submit_btn"><i class="fa-regular fa-magnifying-glass"></i> </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- main-sidebar-widget end-->
                                                <!--boxed-content-->
                                                <div class="boxed-content">
                                                    <!--boxed-content-title-->
                                                    <div class="boxed-content-title">
                                                        <h3>Recent Posts</h3>
                                                    </div>
                                                    <!--boxed-content-title end-->
                                                    <!--boxed-content-item-->
                                                    <div class="boxed-content-item bc-item_smal_pad">
                                                        <div class="recent-post-widget">
                                                            <ul>
                                                                <li>
                                                                    <div class="recent-post-img"><a href="#"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""></a></div>
                                                                    <div class="recent-post-content">
                                                                        <h4><a href="#">How to Book a Room online</a></h4>
                                                                        <div class="recent-post-opt">
                                                                            <span class="post-date">March 10, 2024</span> 
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="recent-post-img"><a href="#"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""></a></div>
                                                                    <div class="recent-post-content">
                                                                        <h4><a href="#">Snowy Mountains Trip</a></h4>
                                                                        <div class="recent-post-opt">
                                                                            <span class="post-date">August 10, 2023</span> 
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="recent-post-img"><a href="#"><img src="templates/bel-cms-v4/images/all/1.jpg" alt=""></a></div>
                                                                    <div class="recent-post-content">
                                                                        <h4><a href="#">Traveller on our Hotel</a></h4>
                                                                        <div class="recent-post-opt">
                                                                            <span class="post-date">September 10, 2023</span> 
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--boxed-content-item end-->
                                                </div>
                                                <!--boxed-content end-->									
                                                <!--boxed-content-->
                                                <div class="boxed-content">
                                                    <!--boxed-content-title-->
                                                    <div class="boxed-content-title">
                                                        <h3>Property Tags</h3>
                                                    </div>
                                                    <!--boxed-content-title end-->
                                                    <!--boxed-content-item-->
                                                    <div class="boxed-content-item bc-item_smal_pad">
                                                        <div class="tags-widget">
                                                            <a href="#">Hotel</a>
                                                            <a href="#">Hostel</a>
                                                            <a href="#">Room</a>
                                                            <a href="#">Spa</a>
                                                            <a href="#">Restourant</a>
                                                            <a href="#">Parking</a>
                                                        </div>
                                                    </div>
                                                    <!--boxed-content-item end-->
                                                </div>
                                                <!--boxed-content end-->									
                                                <!--boxed-content-->
                                                <div class="boxed-content">
                                                    <div class="post-banner-widget">
                                                        <div class="bg-wrap fs-wrapper bg-parallax-wrap-gradien">
                                                            <div class="bg  " data-bg="templates/bel-cms-v4/images/all/1.jpg"></div>
                                                        </div>
                                                        <div class="post-banner-widget_content">
                                                            <h5>Do you want to sell your home quickly and efficiently?</h5>
                                                            <a href="add-listing.html" >Add Your Property</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--boxed-content-item end-->
                                                <!--boxed-content-->
                                                <div class="boxed-content">
                                                    <!--boxed-content-title-->
                                                    <div class="boxed-content-title">
                                                        <h3>Categories</h3>
                                                    </div>
                                                    <!--boxed-content-title end-->
                                                    <!--boxed-content-item-->
                                                    <div class="boxed-content-item bc-item_smal_pad">
                                                        <div class="category-widget">
                                                            <ul class="cat-item">
                                                                <li><a href="#">Hotel</a><span>12</span></li>
                                                                <li><a href="#">Video</a><span>21</span></li>
                                                                <li><a href="#">Travel</a><span>8</span></li>
                                                                <li><a href="#">Photos</a><span>9</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--boxed-content-item end-->
                                                </div>
                                                <!--boxed-content end-->									
                                                <!--boxed-content-->
                                                <div class="boxed-content">
                                                    <!--boxed-content-title-->
                                                    <div class="boxed-content-title">
                                                        <h3>Social Widget</h3>
                                                    </div>
                                                    <!--boxed-content-title end-->
                                                    <!--boxed-content-item-->
                                                    <div class="boxed-content-item bc-item_smal_pad">
                                                        <div class="social-widget">
                                                            <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a> 
                                                            <a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a> 
                                                            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a> 
                                                            <a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                                            <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--boxed-content-item end-->
                                                </div>
                                                <!--boxed-content end-->									
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="limit-box"></div>
                            </div>
                            <!--boxed-container end-->
                        </div>
                        <!--main-content end-->
                        <div class="to_top-btn-wrap">
                            <div class="to-top to-top_btn"><span>Back to top</span> <i class="fa-solid fa-arrow-up"></i></div>
                            <div class="svg-corner svg-corner_white"  style="top:0;left:  -40px; transform: rotate(-90deg)"></div>
                            <div class="svg-corner svg-corner_white"  style="top:0;right: -40px; transform: rotate(-180deg)"></div>
                        </div>
                    </div>
                    <!-- container end-->
                </div>
                <!--content  end-->
                <!--main-footer-->
                <div class="height-emulator"></div>
                <footer class="main-footer">
                    <div class="container">
                        <div class="footer-inner">
                            <div class="row">
                                <!-- footer-widget -->
                                <div class="col-lg-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Get Our Application</div>
                                        <div class="footer-widget-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                                            <div class="api-links-wrap">
                                                <a href="#" class="footer-widget-content-link"><span> On Apple Store</span><i class="fa-brands fa-apple"></i></a>
                                                <a href="#" class="footer-widget-content-link"><span> On Google PLay</span><i class="fa-brands fa-google-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-lg-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Helpful links</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box  ">
                                                <ul>
                                                    <li><a href="#">Our last News</a></li>
                                                    <li><a href="#">Pricing Plans</a></li>
                                                    <li><a href="#">Contacts</a></li>
                                                    <li><a href="#">Help Center</a></li>
                                                    <li><a href="#">Privacy Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-lg-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Our Contacts</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box  ">
                                                <ul  class="footer-contacts  ">
                                                    <li><span>Mail :</span><a href="#" target="_blank">yourmail@domain.com</a></li>
                                                    <li> <span>Adress :</span><a href="#" target="_blank">USA 27TH Brooklyn NY</a></li>
                                                    <li><span>Phone :</span><a href="#">+2(111)123456789</a></li>
                                                </ul>
                                                <a href="contacts.html" class="footer-widget-content-link"><span>Get in Touch</span><i class="fa-solid fa-caret-right"></i></a>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->								
                                <!-- footer-widget -->
                                <div class="col-lg-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Subscribe</div>
                                        <div class="footer-widget-content">
                                            <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                            <form id="subscribe"   class="subscribe-item">
                                                <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                                <button type="submit" id="subscribe-button" class="subscribe-button"><span>Send</span> </button>
                                                <label for="subscribe-email" class="subscribe-message"></label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                            </div>
                            <!-- footer-widget-wrap end-->					
                        </div>
                        <div class="footer-bottom">
                            <a href="index.html" class="footer-home_link"><i class="fa-regular  fa-house"></i></a>		
                            <div class="copyright"> <span>&#169;Renstate 2024</span> . All rights reserved. </div>
                            <div class="footer-social">
                                <span class="footer-social-title">Follow Us</span>
                                <div class="footer-social-wrap">
                                    <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a> 
                                    <a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a> 
                                    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a> 
                                    <a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                    <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>										 
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--main-footer end-->
            </div>
            <!--warpper end-->
            <!--wish-list-wrap-->
            <div class="wish-list-wrap">
                <div class="wish-list-close clwl_btn"><i class="fa-regular fa-xmark"></i></div>
                <div class="wish-list_header">
                    <div class="wish-list-title">Your Wishlist <span>3</span></div>
                </div>
                <div class="wish-list-container">
                    <!--wish-list-item-->
                    <div class="wish-list-item fl-wrap">
                        <div class="wish-list-img"><a href="listing-single.html"><img src="templates/bel-cms-v4/images/all/thumbnails/1.jpg" alt=""></a>  
                        </div>
                        <div class="wish-list-descr">
                            <h4><a href="listing-single.html">Urban House</a></h4>
                            <div class="geodir-category-location fl-wrap"><a href="#"> 40 Journal Square  , NJ, USA</a></div>
                            <div class="wish-list-price"> $ 320,000</div>
                            <div class="clear-wishlist"><i class="fa-regular fa-trash-can"></i></div>
                        </div>
                    </div>
                    <!--wish-list-item end-->
                    <!--wish-list-item-->
                    <div class="wish-list-item fl-wrap">
                        <div class="wish-list-img"><a href="listing-single.html"><img src="templates/bel-cms-v4/images/all/thumbnails/1.jpg" alt=""></a>  
                        </div>
                        <div class="wish-list-descr">
                            <h4><a href="listing-single.html">Luxury Family Home</a></h4>
                            <div class="geodir-category-location fl-wrap"><a href="#">  40 Journal Square  , NJ, USA</a></div>
                            <div class="wish-list-price">  $ 1500 - per month</div>
                            <div class="clear-wishlist"><i class="fa-regular fa-trash-can"></i></div>
                        </div>
                    </div>
                    <!--wish-list-item end-->
                    <!--wish-list-item-->
                    <div class="wish-list-item fl-wrap">
                        <div class="wish-list-img"><a href="listing-single.html"><img src="templates/bel-cms-v4/images/all/thumbnails/1.jpg" alt=""></a>  
                        </div>
                        <div class="wish-list-descr">
                            <h4><a href="listing-single.html">Modern Apartment</a></h4>
                            <div class="geodir-category-location fl-wrap"><a href="#">  40 Journal Square  , NJ, USA</a></div>
                            <div class="wish-list-price"> $ 1,600,000</div>
                            <div class="clear-wishlist"><i class="fa-regular fa-trash-can"></i></div>
                        </div>
                    </div>
                    <!--wish-list-item end-->					
                </div>
                <div class="wish-list-footer">
                    <div class="clear_wishlist">  Clear Wishlist</div>
                </div>
            </div>
            <!--wish-list-wrap end-->
            <div class="mob-nav-overlay fs-wrapper"></div>
            <div class="body-overlay fs-wrapper wishlist-wrap-overlay clwl_btn"></div>
            <!--register form -->
            <div class="main-register-container">
                <div class="main-register_box">
                    <div class="main-register-holder">
                        <div class="main-register-wrap ">
                            <div class="main-register_bg">
                                <div class="mr_title">
                                    <h4>Welcome to Rentstate</h4>
                                    <h5>Premium Real Estate Agency</h5>
                                </div>
                                <div class="main-register_contacts-wrap">
                                    <h4>Have a questions?</h4>
                                    <a href="contacts.html">  Get in Touch</a>
                                    <div class="svg-corner svg-corner_white"  style="bottom:0;left:  -39px;"></div>
                                    <div class="svg-corner svg-corner_white"  style="bottom:0;right:  -39px;transform: rotate(90deg)"></div>
                                </div>
                                <div class="main-register_bg-dec"></div>
                            </div>
                            <div class="main-register tabs-act fl-wrap">
                                <ul class="tabs-menu">
                                    <li class="current"><a href="#tab-1"><i class="fa-regular fa-sign-in-alt"></i> Login</a></li>
                                    <li><a href="#tab-2"> <i class="fa-regular fa-user-plus"></i> Register</a></li>
                                </ul>
                                <div class="close-modal close-reg-form"><i class="fa-regular fa-xmark"></i></div>
                                <!--tabs -->
                                <div id="tabs-container">
                                    <div class="tab">
                                        <!--tab -->
                                        <div id="tab-1" class="tab-content first-tab">
                                            <div class="custom-form">
                                                <form method="post" name="registerform">
                                                    <!-- listsearch-input-item -->
                                                    <div class="cs-intputwrap">
                                                        <i class="fa-light fa-user"></i>
                                                        <input type="text"   placeholder="Username or Email Address" value="">
                                                    </div>
                                                    <!-- listsearch-input-item -->												
                                                    <div class="cs-intputwrap pass-input-wrap">
                                                        <i class="fa-light fa-lock"></i>
                                                        <input type="password" class="pass-input" placeholder="Current Password" value="">
                                                        <div class="view-pass"></div>
                                                    </div>
                                                    <!-- listsearch-input-item -->	
                                                    <div class="filter-tags">
                                                        <input id="check-a" type="checkbox" name="check" checked>
                                                        <label for="check-a">Remember me</label>
                                                    </div>
                                                    <div class="lost_password">
                                                        <a href="#">Lost Your Password?</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <button type="submit" class="commentssubmit"> Log In </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--tab end -->
                                        <!--tab -->
                                        <div class="tab">
                                            <div id="tab-2" class="tab-content">
                                                <div class="custom-form">
                                                    <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-user"></i>
                                                            <input type="text"   placeholder="Full Name" value="">
                                                        </div>
                                                        <!-- listsearch-input-item -->													
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-envelope"></i>
                                                            <input type="text"   placeholder="Email Address" value="">
                                                        </div>
                                                        <!-- listsearch-input-item -->														
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap pass-input-wrap">
                                                            <i class="fa-light fa-lock"></i>
                                                            <input type="password" class="pass-input" placeholder="Password" value="">
                                                            <div class="view-pass"></div>
                                                        </div>
                                                        <!-- listsearch-input-item -->														
                                                        <button type="submit" class="commentssubmit"><span>Register</span></button>
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
                                        <a href="#" class="google_log"><i class="fa-brands fa-google"></i>Connect with Google</a>
                                        <a href="#" class="fb_log"><i class="fa-brands fa-facebook-f"></i> Connect with Facebook</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-overlay fs-wrapper reg-overlay close-reg-form"></div>
            </div>
            <!--register form end -->			
            <!-- progress-bar  -->
            <div class="progress-bar-wrap">
                <div class="progress-bar color-bg"></div>
            </div>
            <!-- progress-bar end -->			
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->   
        <script  src="templates/bel-cms-v4/js/jquery.min.js"></script>
        <script  src="templates/bel-cms-v4/js/plugins.js"></script>
        <script  src="templates/bel-cms-v4/js/scripts.js"></script>
    </body>
</html>