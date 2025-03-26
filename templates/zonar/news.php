<div id="wrapper">
    <?php include 'menu.php'; ?>
    <!-- content-->    
    <div class="content" data-pagetitle="<?=$var->link;?>">
        <!-- hero-section-dec-->                  
        <div class="hero-section-dec color-bg">
            <div class="progress-indicator">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="-1 -1 34 34">
                    <circle cx="16" cy="16" r="15.9155"
                        class="progress-bar__background" />
                    <circle cx="16" cy="16" r="15.9155"
                        class="progress-bar__progress 
                        js-progress-bar" />
                </svg>
            </div>
        </div>
        <div class="fixed-column-wrap">
            <div class="pr-bg"></div>
            <div class="fixed-column-wrap-content">
                <div class="bg"  data-bg="templates/zonar/images/bg/2.jpg"></div>
                <div class="overlay"></div>
                <div class="progress-bar-wrap bot-element">
                    <div class="progress-bar"></div>
                </div>
                <div class="fixed-column-wrap_title first-tile_load">
                    <h2>Dernières actualités</h2>
                </div>
                <div class="fixed-column-dec"></div>
                <div class="fixed-column-linedec"></div>
                <div class="scroll-notifer">Scroll Down  </div>
            </div>
            <!--fixed-column-wrap-content end-->                                     
        </div>
        <!--fixed-column-wrap end-->
        <!--column-wrap--> 
        <div class="column-wrap">
            <!--column-wrap-container -->   
            <div class="column-wrap-container fl-wrap">
                <div class="col-wc_dec"></div>
                <section class="scroll_sec" id="sec1">
                    <div class="container">
                        <div class="section-title">
                            <h3>Actualité</h3>
                            <p>Nos dernières actualités, n'hésitez pas à poster un message.</p>
                        </div>
                        <!-- portfolio start -->
                        <?=$var->page;?>                                                           
                    </div>
                </section>
                <!--section end-->                 
            </div>
            <!--column-wrap-container end -->          
        </div>
        <!--column-wrap end-->    
        <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
    </div>
    <!-- content end--> 

</div>