<?php
$link = (defined(strtoupper($this->link))) ? constant(strtoupper($this->link)) : $this->link;
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bel-CMS - <?=$link;?></title>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="templates//bel-cms-v4/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="templates//bel-cms-v4/css/style.css">
        <link type="text/css" rel="stylesheet" href="templates//bel-cms-v4/css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="templates/bel-cms-v4/images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="main-loader-wrap">
            <div class="loading-spinner"><img src="templates//bel-cms-v4/images/logo_bg.png" alt=""></div>
        </div>
        <!--loader end-->
        <!--  main start  -->
        <div id="main">
            <!--  header main-header  -->
            <header class="main-header">
                <!--logo-->
                <a href="index.html" class="logo-holder color-bg"><img src="templates//bel-cms-v4/images/logo.png" alt=""></a>
                <!--logo end-->
                <!--  hero-wrap-social  -->
                <div class="social-container">
                    <span class="social-container_title">Find: </span>
                    <a href="#" target="_blank">Fb</a> 
                    <a href="#" target="_blank">Ins</a> 
                    <a href="#" target="_blank">Tw</a> 
                    <a href="#" target="_blank">Tic</a> 
                    <a href="#" target="_blank">Be</a> 
                </div>
                <!--  hero-wrap-social end  -->					
                <div class="share_btn show_share"><strong>Share</strong> <span class="share_btn-icon"></span></div>
                <!-- nav-button-wrap-->
                <div class="nav-button-wrap">
                    <div class="menu-button-text">Menu</div>
                    <div class="nav-button but-hol">
                        <span  class="ncs"></span>
                        <span class="nos"></span>
                        <span class="nbs"></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <a href="portfolio.html" class="pr_btn"><span class="pr_btn_dots"></span><strong>Projects</strong> <i class="fal fa-angle-right"></i></a>	
            </header>
            <!-- Header   end-->
            <!--navigation-->
            <div class="nav-holder isvis_menu">
                <div class="nav-overlay fs-wrapper"></div>
                <div class="nav-container">
                    <div class="nav-title hid_vismen"> me<br>nu <span>.</span>  </div>
                    <div class="hsd_dec2 hdec_d hid_vismen"></div>
                    <div class="nav-wrap hid_vismen">
                        <!-- nav -->
                        <nav class="nav-inner" id="menu">
                            <ul>
                                <li>
                                    <a href="#" class="act-link">Home</a>
                                    <!--level 2 -->
                                    <ul>
                                        <li><a href="index.html">Slider</a></li>
                                        <li><a href="index2.html">Carousel</a></li>
                                        <li><a href="index3.html">Video</a></li>
                                        <li><a href="index4.html">Slideshow</a></li>
                                        <li><a href="index5.html">MultiSlideshow</a></li>
                                        <li><a href="index6.html">Image</a></li>
                                        <li><a href="coming-soon.html" target="_blank">Coming Soon</a></li>
                                    </ul>
                                    <!--level 2 end -->
                                </li>
                                <li>
                                    <a href="#">Portfolio</a>
                                    <!--level 2 -->
                                    <ul>
                                        <li><a href="portfolio.html">Creative Grid</a></li>
                                        <li><a href="portfolio2.html">Column Grid</a></li>
                                        <li><a href="portfolio3.html">Fullscreen Grid </a></li>
                                        <li><a href="portfolio4.html">List</a></li>
                                        <li>
                                            <a href="#">Single</a>
                                            <!--level 3 -->
                                            <ul>
                                                <li><a href="portfolio-single.html">Style 1</a></li>
                                                <li><a href="portfolio-single2.html">Style 2</a></li>
                                                <li><a href="portfolio-single3.html">Style 3</a></li>
                                                <li><a href="portfolio-single4.html">Style 4</a></li>
                                            </ul>
                                            <!--level 3 end -->
                                        </li>
                                    </ul>
                                    <!--level 2 end -->
                                </li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li>
                                    <a href="#">Shop</a>
                                    <!--level 3 -->
                                    <ul>
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="shop-single.html">Shop Single</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                    </ul>
                                    <!--level 3 end -->
                                </li>
                            </ul>
                        </nav>
                        <!-- nav end-->
                    </div>
                    <div class="nav_arrow hid_vismen"><span></span></div>
                </div>
            </div>
            <!--navigation end-->
            <!-- wrapper -->
            <div id="wrapper">
                <!-- hero-content  -->
                <div class="hero-content full-height" id="sec1">
                    <!-- fs-wrapper -->
                    <div class="fs-wrapper">
                        <div class="bg" data-bg="templates/bel-cms-v4/images/bg/1.jpg"></div>
                        <div class="fs-slider_align_title fsat_single">
                            <div class="fs-slider_align_title_container">
                                <h2>Cyberbook Design<br> <span>Digital Agency</span></h2>
                                <p>Praesent eu massa vel diam laoreet elementum ac sed felis. Donec suscipit ultricies risus sed mollis. Donec volutpat porta risus posuere imperdiet. </p>
                                <a href="portfolio.html" class="half-hero-wrap_link">View Our Portfolio</a>
                            </div>
                        </div>
                        <div class="overlay"></div>
                        <div class="hero-video_single">
                            <div class="bg" data-bg="templates/bel-cms-v4/images/bg/1.jpg"></div>
                            <div class="overlay"></div>
                            <div class="promo-video-btn" id="html5-videos" data-html="#video1"><span><i class="fas fa-play"></i></span> </div>
                            <!-- Hidden video div -->
                            <div style="display:none;" id="video1" class="popup_video" data-videolink="video/1.mp4">
                                <video class="lg-video-object lg-html5" controls preload="none">
                                    <source src="/" type="video/mp4">
                                </video>
                            </div>
                            <div class="hsv_title color-bg">Play Video In HD</div>
                            <a href="#sec2" class="custom-scroll-link start-btn_sin"><span> Start explore <i class="fal fa-long-arrow-down"></i></span></a>
                        </div>
                        <div class="showcase-dec_line sdl_top sdl_top2"></div>
                    </div>
                    <!-- fs-wrapper end -->
                </div>
                <!-- hero-content end -->
                <!-- fixed-column-image -->
                <div class="fixed-column-image-wrap">
                    <div class="fixed-column-image fs-wrapper">
                        <div class="bg hor_scroll"  data-bg="templates/bel-cms-v4/images/bg/2.jpg"></div>
                        <div class="overlay"></div>
                        <div class="overlay-dec"></div>
                    </div>
                    <footer class="column-footer">
                        <div class="column-footer_arrow-dec_wrap color-bg">
                            <div class="arrow_dec_wrap">
                                <div class="arrow_dec"></div>
                            </div>
                        </div>
                        <div class="column-footer_head">Scroll  Down</div>
                        <div class="column-footer_content fl-wrap">
                            <div class="column-footer_title"><span>Our  Story</span></div>
                        </div>
                        <div class="dir-arrow"></div>
                    </footer>
                    <div class="fci_progress-bar-wrap dark-bg">
                        <div class="ver_progress-bar_wrap">
                            <div class="ver_progress-bar color-bg"></div>
                        </div>
                        <div class="pbw_animicon">
                            <i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="hero-arrows_dec"></div>
                </div>
                <!-- fixed-column-image end -->
                <!-- scroll-nav-container -->
                <div class="scroll-nav-container">
                    <div class="page-scroll-nav">
                        <div class="scroll-down-container">
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden_wrap_btn"><span></span></div>
                        <nav class="scroll-init page-scroll-nav_wrap">
                            <ul>
                                <li><a class="scroll-link fbgs act-sec" href="#sec1"  data-bgtext="Home"  data-bgnum="01"><span>Hero</span></a></li>
                                <li><a class="scroll-link fbgs" href="#sec2"  data-bgtext="About"  data-bgnum="02"><span>About</span></a></li>
                                <li><a class="scroll-link fbgs" href="#sec3"  data-bgtext="Our Serrvices"  data-bgnum="03"><span>Services</span></a></li>
                                <li><a class="scroll-link fbgs" href="#sec4"  data-bgtext="Our Works"  data-bgnum="04"><span>Folio</span></a></li>
                                <li><a class="scroll-link fbgs" href="#sec5"  data-bgtext="Team"  data-bgnum="05"><span>Team</span></a></li>
                                <li><a class="scroll-link fbgs" href="#sec6"  data-bgtext="Clients"  data-bgnum="06"><span>Clients</span></a></li>
                            </ul>
                        </nav>
                        <div class="section-counter color-bg">
                            <div class="section-counter_cuurent"><span>01</span></div>
                            <div class="section-counter_total"></div>
                        </div>
                    </div>
                </div>
                <!-- scroll-nav-container end -->
                <!-- column-wrap -->
                <div class="column-wrap hcw_sin">
                    <div class="content fl-wrap full-height">
                        <!-- section -->
                        <section id="sec2" class="scroll_sec">
                            <div class="container">
                                <div class="section-title">
                                    <h2>Our Story</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                                </div>
                                <div class="about_row">
                                    <div class="block_text">
                                        <h2>Innovative solutions to boost <br><span> your creative </span>  projects</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.Praesent nec leo venenatis elit semper aliquet id ac enim.  .</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua. Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius  mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                        <a href="portfolio.html" class="btn   fl-btn color-bg"><span>Our portfolio</span></a>							
                                    </div>
                                    <div class="block_img">
                                        <img src="templates/bel-cms-v4/images/all/1.jpg" class="respimg" alt="">
                                        <div class="about-img-hotifer dark-bg">
                                            <p>Your website is fully responsive so visitors can view your content from their choice of device.</p>
                                            <h4>Mark Antony</h4>
                                            <h5>Cyberbook CEO</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticker-wrap fl-wrap">
                                    <div class="content-marquee-outer">
                                        <div class="content-marquee-inner">
                                            <div class="ticker" data-text="Web Design Ui/Ux Design Branding Ecommerce">Web Design Ui/Ux Design Branding Ecommerce</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-number"> <span>0</span>1. </div>
                            <div class="sec-dec" style="left: -270px; bottom: -5%"></div>
                            <div class="dec_cirlce" style="right: -120px; top: 350px"><span></span></div>
                            <div class="sec-lines"></div>
                        </section>
                        <!-- section end -->
                        <!-- section  -->
                        <section class="no-padding">
                            <div class="half-bg-wrap fl-wrap">
                                <div class="half-bg">
                                    <div class="bg"  data-bg="templates/bel-cms-v4/images/bg/1.jpg"></div>
                                    <div class="overlay"></div>
                                    <div class="half-bg_title">
                                        <h2>Some <br> Facts</h2>
                                    </div>
                                </div>
                                <div class="half-bg-container dark-bg">
                                    <div class="inline-facts-container">
                                        <div class="container">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="145">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Finished projects</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="357">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Happy customers</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="825">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Working hours</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="15">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Awards won</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end --> 
                                        </div>
                                    </div>
                                    <div class="half-bg-container_dec"></div>
                                    <div class="chart-dec"><span><i class="fal fa-plus"></i></span></div>
                                </div>
                            </div>
                        </section>
                        <!-- section end-->
                        <!-- section  -->
                        <section id="sec3" class="scroll_sec">
                            <div class="container">
                                <div class="section-title">
                                    <h2>Our Services</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                                </div>
                                <!-- items-list-conatiner -->
                                <div class="items-list-conatiner">
                                    <!-- list-item -->
                                    <div class="list-item  fl-wrap" data-bgsrc="templates/bel-cms-v4/images/services/1.jpg">
                                        <div class="reval-image">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="list-item_link fl-wrap">
                                            <div class="list-item-header"><span>01</span>Web Design</div>
                                            <div class="list-item-details">
                                                <ul class="pdcw_list fl-wrap">
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>3D Modeling</li>
                                                </ul>
                                            </div>
                                            <div class="list-item-link_dec color-bg"></div>
                                        </div>
                                        <div class="list-item_content fl-wrap">
                                            <div class="piechart-holder" data-skcolor="#fff">
                                                <!-- piechart-item  -->
                                                <div class="piechart-item color-bg">
                                                    <div class="piechart">
                                                        <span class="chart" data-percent="85"></span>
                                                    </div>
                                                    <div class="percentage-wrap">
                                                        <div class="percentage_title">Points</div>
                                                        <div class="percentage"></div>
                                                        <span class="percentage_total">/ 100</span>
                                                    </div>
                                                    <div class="skills-footer fl-wrap">
                                                        <h4>9 Years experience</h4>
                                                    </div>
                                                </div>
                                                <!-- piechart-item end -->
                                            </div>
                                            <div class="list-item_content_wrap">
                                                <h4>Services Details</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. </p>
                                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                                <div class="price-content">
                                                    <span>Price:</span>
                                                    150$ - 560$
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-item end -->
                                    <!-- list-item -->
                                    <div class="list-item fl-wrap" data-bgsrc="templates/bel-cms-v4/images/services/1.jpg">
                                        <div class="reval-image">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="list-item_link fl-wrap">
                                            <div class="list-item-header"><span>02</span>Ui/Ux Design</div>
                                            <div class="list-item-details">
                                                <ul class="pdcw_list fl-wrap">
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>3D Modeling</li>
                                                </ul>
                                            </div>
                                            <div class="list-item-link_dec color-bg"></div>
                                        </div>
                                        <div class="list-item_content fl-wrap">
                                            <div class="piechart-holder" data-skcolor="#fff">
                                                <!-- piechart-item  -->
                                                <div class="piechart-item color-bg">
                                                    <div class="piechart">
                                                        <span class="chart" data-percent="55"></span>
                                                    </div>
                                                    <div class="percentage-wrap">
                                                        <div class="percentage_title">Points</div>
                                                        <div class="percentage"></div>
                                                        <span class="percentage_total">/ 100</span>
                                                    </div>
                                                    <div class="skills-footer fl-wrap">
                                                        <h4>3 Years experience</h4>
                                                    </div>
                                                </div>
                                                <!-- piechart-item end -->
                                            </div>
                                            <div class="list-item_content_wrap">
                                                <h4>Services Details</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. </p>
                                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                                <div class="price-content">
                                                    <span>Price:</span>
                                                    320$ - 780$
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-item end -->
                                    <!-- list-item -->
                                    <div class="list-item fl-wrap" data-bgsrc="templates/bel-cms-v4/images/services/1.jpg">
                                        <div class="reval-image">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="list-item_link fl-wrap">
                                            <div class="list-item-header"><span>03</span>Branding</div>
                                            <div class="list-item-details">
                                                <ul class="pdcw_list fl-wrap">
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>3D Modeling</li>
                                                </ul>
                                            </div>
                                            <div  class="list-item-link_dec color-bg"></div>
                                        </div>
                                        <div class="list-item_content fl-wrap">
                                            <div class="piechart-holder" data-skcolor="#fff">
                                                <!-- piechart-item  -->
                                                <div class="piechart-item color-bg">
                                                    <div class="piechart">
                                                        <span class="chart" data-percent="75"></span>
                                                    </div>
                                                    <div class="percentage-wrap">
                                                        <div class="percentage_title">Points</div>
                                                        <div class="percentage"></div>
                                                        <span class="percentage_total">/ 100</span>
                                                    </div>
                                                    <div class="skills-footer fl-wrap">
                                                        <h4>6 Years experience</h4>
                                                    </div>
                                                </div>
                                                <!-- piechart-item end -->
                                            </div>
                                            <div class="list-item_content_wrap">
                                                <h4>Services Details</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. </p>
                                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                                <div class="price-content">
                                                    <span>Price:</span>
                                                    680$ - 1360$
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-item end -->										
                                    <!-- list-item -->
                                    <div class="list-item fl-wrap" data-bgsrc="templates/bel-cms-v4/images/services/1.jpg">
                                        <div class="reval-image">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="list-item_link fl-wrap">
                                            <div class="list-item-header"><span>04</span>Ecommerce</div>
                                            <div class="list-item-details">
                                                <ul class="pdcw_list fl-wrap">
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>3D Modeling</li>
                                                </ul>
                                            </div>
                                            <div class="list-item-link_dec color-bg"></div>
                                        </div>
                                        <div class="list-item_content fl-wrap">
                                            <div class="piechart-holder" data-skcolor="#fff">
                                                <!-- piechart-item  -->
                                                <div class="piechart-item color-bg">
                                                    <div class="piechart">
                                                        <span class="chart" data-percent="56"></span>
                                                    </div>
                                                    <div class="percentage-wrap">
                                                        <div class="percentage_title">Points</div>
                                                        <div class="percentage"></div>
                                                        <span class="percentage_total">/ 100</span>
                                                    </div>
                                                    <div class="skills-footer fl-wrap">
                                                        <h4>3 Years experience</h4>
                                                    </div>
                                                </div>
                                                <!-- piechart-item end -->
                                            </div>
                                            <div class="list-item_content_wrap">
                                                <h4>Services Details</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. </p>
                                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                                <div class="price-content">
                                                    <span>Price:</span>
                                                    220$ - 2260$
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-item end -->										
                                    <!-- list-item -->
                                    <div class="list-item fl-wrap" data-bgsrc="templates/bel-cms-v4/images/services/1.jpg">
                                        <div class="reval-image">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="list-item_link fl-wrap">
                                            <div class="list-item-header"><span>05</span>Photography</div>
                                            <div class="list-item-details">
                                                <ul class="pdcw_list fl-wrap">
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>3D Modeling</li>
                                                </ul>
                                            </div>
                                            <div class="list-item-link_dec color-bg"></div>
                                        </div>
                                        <div class="list-item_content fl-wrap">
                                            <div class="piechart-holder" data-skcolor="#fff">
                                                <!-- piechart-item  -->
                                                <div class="piechart-item color-bg">
                                                    <div class="piechart">
                                                        <span class="chart" data-percent="97"></span>
                                                    </div>
                                                    <div class="percentage-wrap">
                                                        <div class="percentage_title">Points</div>
                                                        <div class="percentage"></div>
                                                        <span class="percentage_total">/ 100</span>
                                                    </div>
                                                    <div class="skills-footer fl-wrap">
                                                        <h4>8 Years experience</h4>
                                                    </div>
                                                </div>
                                                <!-- piechart-item end -->
                                            </div>
                                            <div class="list-item_content_wrap">
                                                <h4>Services Details</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. </p>
                                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                                <div class="price-content">
                                                    <span>Price:</span>
                                                    1000$ - 3600$
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-item end -->																
                                </div>
                                <!-- items-list-conatiner end-->
                            </div>
                            <div class="section-number"> <span>0</span>2. </div>
                            <div class="sec-dec" style="right: -270px; bottom: -15%"></div>
                            <div class="dec_cirlce" style="left: -120px; bottom: 150px"><span></span></div>
                            <div class="sec-lines"></div>
                        </section>
                        <!-- section end-->
                        <!-- section  -->
                        <section class="no-bottom-padding dark-bg scroll_sec" id="sec4">
                            <div class="section-number"> <span>0</span>2. </div>
                            <div class="container">
                                <div class="section-title">
                                    <h2>Featured Projects</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="half-carousel-wrap">
                                <div class="half-carousel-conatiner fl-wrap">
                                    <div class="half-carousel fl-wrap full-height">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <!--half-carousel-item   -->
                                                <div class="swiper-slide">
                                                    <div class="half-carousel-item fl-wrap">
                                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                                            <div class="overlay"></div>
                                                            <div class="bg" data-bg="templates/bel-cms-v4/images/folio/1.jpg" data-swiper-parallax="10%"></div>
                                                        </div>
                                                        <div class="grid-det_category"><a href="#">Ui/Ux</a> <a href="#">Barnding</a></div>
                                                        <span class="testi-number color-bg">.01</span>	
                                                        <div class="half-carousel-content">
                                                            <h3><a href="portfolio-single.html">Fitness Studio Website</a></h3>
                                                            <p>Constant care and attention to the patients makes good record</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--half-carousel-item end -->
                                                <!--half-carousel-item   -->
                                                <div class="swiper-slide">
                                                    <div class="half-carousel-item fl-wrap">
                                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                                            <div class="overlay"></div>
                                                            <div class="bg" data-bg="templates/bel-cms-v4/images/folio/1.jpg" data-swiper-parallax="10%"></div>
                                                        </div>
                                                        <div class="grid-det_category"><a href="#">Branding</a> <a href="#">Webdesign</a></div>
                                                        <span class="testi-number color-bg">.02</span>	
                                                        <div class="half-carousel-content">
                                                            <h3><a href="portfolio-single.html">Project Endoran</a></h3>
                                                            <p>Constant care and attention to the patients makes good record</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--half-carousel-item end -->
                                                <!--half-carousel-item   -->
                                                <div class="swiper-slide">
                                                    <div class="half-carousel-item fl-wrap">
                                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                                            <div class="overlay"></div>
                                                            <div class="bg" data-bg="templates/bel-cms-v4/images/folio/1.jpg" data-swiper-parallax="10%"></div>
                                                        </div>
                                                        <div class="grid-det_category"><a href="#">Photography</a> <a href="#">Branding</a></div>
                                                        <span class="testi-number color-bg">.03</span>	
                                                        <div class="half-carousel-content">
                                                            <h3><a href="portfolio-single.html">Trinity Motobike Company</a></h3>
                                                            <p>Constant care and attention to the patients makes good record</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--half-carousel-item end -->
                                                <!--half-carousel-item   -->
                                                <div class="swiper-slide">
                                                    <div class="half-carousel-item fl-wrap">
                                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                                            <div class="overlay"></div>
                                                            <div class="bg" data-bg="templates/bel-cms-v4/images/folio/1.jpg" data-swiper-parallax="10%"></div>
                                                        </div>
                                                        <div class="grid-det_category"><a href="#">Webdesign</a> <a href="#">Ecommerce</a></div>
                                                        <span class="testi-number color-bg">.04</span>	
                                                        <div class="half-carousel-content">
                                                            <h3><a href="portfolio-single.html">Coffeshop Website</a></h3>
                                                            <p>Constant care and attention to the patients makes good record</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--half-carousel-item end -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="half-carousel_controls fl-wrap">
                                        <div class="hcw_btn_wrap">
                                            <div class="hcw_btn hcw-cont-prev"><i class="fal fa-angle-left"></i></div>
                                            <div class="hcw_btn hcw-cont-next"><i class="fal fa-angle-right"></i></div>
                                        </div>
                                        <div class="cen-slider-pagination_wrap">
                                            <div class="cen-slider-pagination"></div>
                                        </div>
                                        <a href="portfolio.html" class="fpc_btn"><span>View All Projects</span> <i class="fal fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--section end-->														
                        <!--section  -->	
                        <section class="dec_sec">
                            <div class="container">
                                <div class="text-row">
                                    <div class="text-column">
                                        <div class="text-column_title">
                                            <h4>Our Process</h4>
                                            <h2>We Offer Smarter & More Affordable Access To  Digital Services and Products. <br> We Are Cyberbook.</h2>
                                        </div>
                                    </div>
                                    <div class="text-column">
                                        <p>Aiusmod tempor incididunt ut labore sed dolore magna aliquay dnim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea reprehen deritin voluptate.</p>
                                        <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="cards-row">
                                    <!--card-item-->	
                                    <div class="card-item">
                                        <div class="card-item-inner">
                                            <div class="dec-icon act-link">
                                                <i class="fal fa-users-cog"></i>
                                            </div>
                                            <h3>User Admin Panel</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                        </div>
                                        <span class="testi-number color-bg">.01</span>										
                                    </div>
                                    <!--card-item end-->	
                                    <!--card-item-->	
                                    <div class="card-item">
                                        <div class="card-item-inner">
                                            <div class="dec-icon  ">
                                                <i class="fal fa-headset"></i>
                                            </div>
                                            <h3>24 Hours Support</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                        </div>
                                        <span class="testi-number color-bg">.02</span>										
                                    </div>
                                    <!--card-item end-->
                                    <!--card-item-->	
                                    <div class="card-item">
                                        <div class="card-item-inner">
                                            <div class="dec-icon  ">
                                                <i class="fal fa-phone-laptop"></i>
                                            </div>
                                            <h3>Mobile Friendly</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                        </div>
                                        <span class="testi-number color-bg">.03</span>									
                                    </div>
                                    <!--card-item end-->
                                    <!--card-item-->	
                                    <div class="card-item">
                                        <div class="card-item-inner">
                                            <div class="dec-icon  ">
                                                <i class="fal fa-rocket"></i>
                                            </div>
                                            <h3>Seo Friendly</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                        </div>
                                        <span class="testi-number color-bg">.04</span>									
                                    </div>
                                    <!--card-item end-->									
                                </div>
                                <!--order-wrap-->		
                                <div class="order-wrap   dark-bg">
                                    <h4>Ready to order your project ?</h4>
                                    <a href="contact.html" class="btn color-bg"><span>Get In Touch</span></a>
                                </div>
                                <!-- order-wrap end -->											
                            </div>
                            <div class="dec_cirlce" style="left: -120px; bottom: -120px"><span></span></div>
                            <div class="dec_cirlce" style="right: -120px; top: 350px"><span></span></div>
                            <div class="sec-lines"></div>
                        </section>
                        <!--section end-->							
                        <!-- section  -->
                        <section class="dark-bg scroll_sec" id="sec5">
                            <div class="container">
                                <div class="section-title">
                                    <h2>Our Team</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                                </div>
                                <div class="team-container">
                                    <!-- team-item  -->
                                    <div class="team-item">
                                        <div class="team-img">
                                            <img src="templates/bel-cms-v4/images/team/1.jpg" alt="" class="respimg">
                                            <div class="team-details color-bg">
                                                <div class="team-social">
                                                    <span class="team-details_title ">Find On:</span>
                                                    <ul >
                                                        <li><a href="#" target="_blank">Fb</a></li>
                                                        <li><a href="#" target="_blank">In</a></li>
                                                        <li><a href="#" target="_blank">Tw</a></li>
                                                        <li><a href="#" target="_blank">Tic</a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-skills-container">
                                                    <span class="team-details_title ">Skills:</span>
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Angular</span>
                                                        <span class="skill-bar-percent">
                                                        90%</span>			
                                                        <div class="team-skill" style="--prog: 90%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->	
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Phyton</span>
                                                        <span class="skill-bar-percent">
                                                        70%</span>			
                                                        <div class="team-skill" style="--prog: 70%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->		
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Photoshop</span>
                                                        <span class="skill-bar-percent">
                                                        83%</span>			
                                                        <div class="team-skill" style="--prog: 83%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-header">
                                            <h4>Alica Limishko</h4>
                                            <h6>Ceo / Designer</h6>
                                        </div>
                                    </div>
                                    <!-- team-item end  -->
                                    <!-- team-item  -->
                                    <div class="team-item">
                                        <div class="team-header">
                                            <h4>Mark Antony</h4>
                                            <h6>Developer / Designer</h6>
                                        </div>
                                        <div class="team-img">
                                            <img src="templates/bel-cms-v4/images/team/1.jpg" alt="" class="respimg">
                                            <div class="team-details color-bg">
                                                <div class="team-social">
                                                    <span class="team-details_title ">Find On:</span>
                                                    <ul >
                                                        <li><a href="#" target="_blank">Fb</a></li>
                                                        <li><a href="#" target="_blank">In</a></li>
                                                        <li><a href="#" target="_blank">Tw</a></li>
                                                        <li><a href="#" target="_blank">Be</a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-skills-container">
                                                    <span class="team-details_title ">Skills:</span>
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Angular</span>
                                                        <span class="skill-bar-percent">
                                                        70%</span>			
                                                        <div class="team-skill" style="--prog: 70%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->	
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Phyton</span>
                                                        <span class="skill-bar-percent">
                                                        90%</span>			
                                                        <div class="team-skill" style="--prog: 90%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->		
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Photoshop</span>
                                                        <span class="skill-bar-percent">
                                                        66%</span>			
                                                        <div class="team-skill" style="--prog: 66%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- team-item end  -->												
                                    <!-- team-item  -->
                                    <div class="team-item">
                                        <div class="team-img">
                                            <img src="templates/bel-cms-v4/images/team/1.jpg" alt="" class="respimg">
                                            <div class="team-details color-bg">
                                                <div class="team-social">
                                                    <span class="team-details_title ">Find On:</span>
                                                    <ul >
                                                        <li><a href="#" target="_blank">Fb</a></li>
                                                        <li><a href="#" target="_blank">In</a></li>
                                                        <li><a href="#" target="_blank">Tw</a></li>
                                                        <li><a href="#" target="_blank">Be</a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-skills-container">
                                                    <span class="team-details_title ">Skills:</span>
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Angular</span>
                                                        <span class="skill-bar-percent">
                                                        90%</span>			
                                                        <div class="team-skill" style="--prog: 90%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->	
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Phyton</span>
                                                        <span class="skill-bar-percent">
                                                        70%</span>			
                                                        <div class="team-skill" style="--prog: 70%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->		
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Photoshop</span>
                                                        <span class="skill-bar-percent">
                                                        83%</span>			
                                                        <div class="team-skill" style="--prog: 83%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-header">
                                            <h4>Ketty Anderson</h4>
                                            <h6>Junior Designer</h6>
                                        </div>
                                    </div>
                                    <!-- team-item end  -->												
                                    <!-- team-item  -->
                                    <div class="team-item">
                                        <div class="team-header">
                                            <h4>Fill Domentore</h4>
                                            <h6>Senior Developer</h6>
                                        </div>
                                        <div class="team-img">
                                            <img src="templates/bel-cms-v4/images/team/1.jpg" alt="" class="respimg">
                                            <div class="team-details color-bg">
                                                <div class="team-social">
                                                    <span class="team-details_title ">Find On:</span>
                                                    <ul >
                                                        <li><a href="#" target="_blank">Fb</a></li>
                                                        <li><a href="#" target="_blank">In</a></li>
                                                        <li><a href="#" target="_blank">Tw</a></li>
                                                        <li><a href="#" target="_blank">Tik</a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-skills-container">
                                                    <span class="team-details_title ">Skills:</span>
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Angular</span>
                                                        <span class="skill-bar-percent">
                                                        74%</span>			
                                                        <div class="team-skill" style="--prog: 74%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->	
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Phyton</span>
                                                        <span class="skill-bar-percent">
                                                        80%</span>			
                                                        <div class="team-skill" style="--prog: 80%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->		
                                                    <!-- team-skills_item  -->
                                                    <div class="team-skills_item fl-wrap">
                                                        <span class="skill_title">Photoshop</span>
                                                        <span class="skill-bar-percent">
                                                        99%</span>			
                                                        <div class="team-skill" style="--prog: 99%;"></div>
                                                    </div>
                                                    <!-- team-skills_item end  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- team-item end  -->												
                                </div>
                            </div>
                            <div class="section-number"> <span>0</span>3. </div>
                            <div class="sec-dec" style="left: -270px; bottom: -5%"></div>
                        </section>
                        <!-- section end-->	
                        <!-- section  -->
                        <section class="no_bottom_padding scroll_sec" id="sec6">
                            <div class="container">
                                <div class="section-title">
                                    <h2>Reviews &amp; Clients</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                                </div>
                            </div>
                            <div class="testimonilas-carousel_wrap fl-wrap">
                                <div class="testimonilas-carousel fl-wrap">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <span class="testi-number color-bg">.01</span>
                                                    <div class="testimonilas-text   fl-wrap">
                                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    </div>
                                                    <div class="testi-footer fl-wrap">
                                                        <div class="testi-avatar"><img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""></div>
                                                        <h3>Frank Dellov</h3>
                                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <span class="testi-number color-bg">.02</span>
                                                    <div class="testimonilas-text   fl-wrap">
                                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    </div>
                                                    <div class="testi-footer fl-wrap">
                                                        <div class="testi-avatar"><img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""></div>
                                                        <h3>Andy Dimasky</h3>
                                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <span class="testi-number color-bg">.02</span>
                                                    <div class="testimonilas-text   fl-wrap">
                                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    </div>
                                                    <div class="testi-footer fl-wrap">
                                                        <div class="testi-avatar"><img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""></div>
                                                        <h3>Centa Simpson</h3>
                                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->													
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <span class="testi-number color-bg">.02</span>
                                                    <div class="testimonilas-text   fl-wrap">
                                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    </div>
                                                    <div class="testi-footer fl-wrap">
                                                        <div class="testi-avatar"><img src="templates/bel-cms-v4/images/avatar/1.jpg" alt=""></div>
                                                        <h3>Nicolo Svensky</h3>
                                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->													
                                        </div>
                                    </div>
                                </div>
                                <div class="tc-button tc-button-next"><i class="fal fa-angle-right"></i></div>
                                <div class="tc-button tc-button-prev"><i class="fal fa-angle-left"></i></div>
                                <div class="tc-pagination"></div>
                            </div>
                            <!-- clients-carousel-wrap-->
                            <div class="clients-carousel-wrap fl-wrap">
                                <div class="clients-carousel">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="templates/bel-cms-v4/images/clients/1.png" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="templates/bel-cms-v4/images/clients/1.png" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="templates/bel-cms-v4/images/clients/1.png" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="templates/bel-cms-v4/images/clients/1.png" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- clients-carousel-wrap end-->
                            <div class="sec-lines"></div>
                            <div class="section-number"> <span>0</span>2. </div>
                        </section>
                        <!-- section end-->									
                    </div>
                </div>
                <!-- column-contaent end -->
                <!-- footer -->
                <div class="height-emulator fl-wrap"></div>
                <footer class="main-footer">
                    <div class="footer-inner fl-wrap">
                        <div class="policy-box">
                            <span>&#169; Bel-CMS V4 2015-<?=date('Y');?> . All rights reserved. </span>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#" target="_blank">Facebook</a></li>
                                <li><a href="#" target="_blank">Instagram</a></li>
                                <li><a href="#" target="_blank">Twitter</a></li>
                                <li><a href="#" target="_blank">Tiktok</a></li>
                                <li><a href="#" target="_blank">Behance</a></li>
                            </ul>
                        </div>
                        <div class="to-top-btn color-bg to-top"><i class="fal fa-long-arrow-up"></i></div>
                        <div class="footer-dec color-bg"></div>
                    </div>
                </footer>
                <!-- footer end -->
            </div>
            <!-- wrapper end -->
            <!-- share-wrapper-->
            <div class="share-wrapper fs-wrapper isShare">
                <div class="share-overlay cl_sh fs-wrapper"></div>
                <div class="share-container fl-wrap  isShare">
                    <div class="share-text">
                        <svg viewBox="0 0 100 100" width="100" height="100">
                            <defs>
                                <path id="circle"
                                    d="
                                    M 50, 50
                                    m -37, 0
                                    a 37,37 0 1,1 74,0
                                    a 37,37 0 1,1 -74,0"/>
                            </defs>
                            <text font-size="17">
                                <textpath xlink:href="#circle">
                                    Share This Page  
                                </textpath>
                            </text>
                        </svg>
                    </div>
                    <div class="close-share-btn cl_sh"><i class="fal fa-times"></i></div>
                </div>
            </div>
            <!-- share-wrapper  end -->					
            <!-- cursor-->
            <div class="element">
                <div class="element-item"></div>
            </div>
            <!-- cursor end-->			
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->   
        <script  src="templates/bel-cms-v4/js/jquery.min.js"></script>
        <script  src="templates/bel-cms-v4/js/plugins.js"></script>
        <script  src="templates/bel-cms-v4/js/scripts.js"></script>
    </body>
</html>