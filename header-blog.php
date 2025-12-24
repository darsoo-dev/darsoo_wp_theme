<!DOCTYPE html >
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">


    <?php wp_head(); ?>

    <script>
        var $ = jQuery;
    </script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PH722CN');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH722CN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>



<!-- get fields from acf options -->
<?php

$top_head_img= get_field('top_header_main_img','option');

$logo = get_field('logo','option');

$phonenumbertext = get_field('header-phone-text','option');

$phonenumberlink = get_field('header-phone-link','option');


?>
<!-- get fields from acf options -->


    <header>

        <?php 


        if($top_head_img){ ?>

            <section class="top-head-banner">
                <a href="#">
                    <img src="<?php if(!empty($top_head_img)){echo $top_head_img;} ?>" alt="بنر بالایی صفحه اصلی">
                </a>
            </section>

        <?php } ?>



        <div class="container">

            <div class="desktop-header">

                <section class="middle-head">
                    <div class="mh-right">
                        <a href="/blog" class="logo">
                            <img src="<?php if(!empty($logo)){ echo $logo;} ?>" alt="لوگو دارسو" />
                        </a>
						<form class="search-box" action="<?php echo home_url('/'); ?>" method="get">
							<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="جستجو در مقالات">
							<input type="hidden" name="post_type" value="post">
							<span>دنبال چی میگردی؟</span>
							<button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
						</form>
                    </div>
                    <div class="mh-left">
                        <a href="/" class="login-btn">
                            برو به فروشگاه  
                        </a>
                    </div>
    
                </section>
    
                <section class="head-menu">
                    <nav class="menu">

                        <div class="menu-header">                    
                            <?php
                                if (has_nav_menu('main-menu')) {
                                    wp_nav_menu( 
                                        array( 
                                            'theme_location' => 'blog-menu' , 
                                            'container' => '' , 
                                            'menu_class' => '' , 
                                            'menu_id' => '' ,
                                            'walker'         => new Menu_NavWalker_Icons()
                                        ));
                                }

                            ?>
                        </div>                       
                    </nav>
                </section>
            </div>

            <div class="mobile-header">
                <div class="mh-top">
                    
                    <div class="toggle-menu">
                        <a href="#" class="toggle-btn"><i class="fa-light fa-bars"></i></a>

                        <div class="backHeadMenu"></div>
                        <div class="head-menu">
                            <div class="closeBtn">
                                <i class="fa-light fa-xmark"></i>
                            </div>
                            <nav class="menu">

                                <div class="menu-head">
                                    <div class="logo">
                                        <img src="<?php if(!empty($logo)){ echo $logo;} ?>" alt="لوگو دارسو" />
                                    </div>
                                    <div class="login-btn">
                                        <a href="/">                                            
                                            ورود به دارسو
                                        </a>
                                    </div>                            
                                </div>                         
        
                                <div class="menu-header">
         
                                    <?php
                                        if (has_nav_menu('main-menu')) {
                                            wp_nav_menu( 
                                                array( 
                                                    'theme_location' => 'blog-menu' , 
                                                    'container' => '' , 
                                                    'menu_class' => '' , 
                                                    'menu_id' => '' ,
                                                    'walker'         => new Menu_NavWalker_Icons()
                                            ));
                                        }
                                    ?>

                                </div>
                               
        
                            </nav>
                        </div>

                    </div>

                    <a href="/blog" class="logo">
                        <img src="<?php if(!empty($logo)){ echo $logo;} ?>" alt="لوگو دارسو" />
                    </a>

                    <div class="login-btn-wrapper">
                        <a href="/" class="login-btn">
                            ورود به دارسو
                        </a>
                    </div>                         

                </div>

                <div class="mh-bottom">
					<form class="search-box" action="<?php echo home_url('/'); ?>" method="get">
						<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="جستجو در مقالات">
						<input type="hidden" name="post_type" value="post">
						<span>دنبال چی میگردی؟</span>
						<button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
					</form>

                </div>
            </div>
            
        </div>
    </header>
    <main>