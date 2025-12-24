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

<div id="modal_add_to_cart" class="modal">
    <div class="modal-content modal-add-to-cart">
        <i class="fa-light fa-check"></i>
        محصول به سبد خرید اضافه شد
    </div>
</div>


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
                        <a href="/" class="logo">
                            <img src="<?php if(!empty($logo)){ echo $logo;} ?>" alt="لوگو دارسو" />
                        </a>
                        <form class="search-box" action="<?php echo home_url('/'); ?>" method="get">
                            <input name="s" value="<?php the_search_query(); ?>" type="search" name="q" placeholder="برای مثال گوشی هوشمند">
                            <span>دنبال چی میگردی؟</span>
                            <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="mh-left">
                        <div class="basket-container">
                            <a href="/cart" class="cart-btn">
                                <i class="fa-light fa-cart-shopping"></i>
                                <span class="cart-btn-num"><?php echo wc()->cart->get_cart_contents_count(); ?></span>                           
                            </a>
                            <div class="cart-content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>                       
                      
                        <i class="bar"></i>


                        <?php
                            global $current_user;
                            if (is_user_logged_in()){
                        ?> 

                            <div class="login-btn login-popup">

                                 <i class="fa-light fa-user-large"></i> <?php echo $current_user->display_name; ?> 

                                <div class="user-profile-popup">
                                    <a href="/my-account/edit-account/">
                                        <i class="fa-light fa-user-pen"></i>
                                        <span>تکمیل/ویرایش پروفایل</span>
                                    </a>
                                    <a href="/my-account/mywallet/">
                                        <i class="fa-light fa-wallet"></i>
                                        <span>کیف پول</span>
                                    </a>
                                    <a href="/my-account/wishlist/">
                                        <i class="fa-light fa-heart"></i>
                                        <span>علاقه مندی ها</span>
                                    </a>
                                    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="navigate-to-exit">
                                        <i class="fa-light fa-arrow-right-from-bracket"></i>
                                        <span>خروج</span>
                                    </a>
                                </div>

                            </div>


                        <?php  } else { ?>
                            <a href="/my-account" class="login-btn" target="_blank">
                                <i class="fa-light fa-user-large"></i> ورود / ثبت نام  
                            </a>
                        <?php } ?>  


                        <div class="support-text">
                            <span>پشتیبانی سریع</span>
                            <a href="<?php if(!empty($phonenumberlink)){ echo $phonenumberlink;} ?>"><span>021-<?php if(!empty($phonenumbertext)){echo $phonenumbertext;} ?></span></a>
                        </div>
                        <a href="<?php if($phonenumberlink){ echo $phonenumberlink;} ?>" class="support-btn">
                            <i class="fa-light fa-phone-volume"></i>
                        </a>
                    </div>
    
                </section>
    
                <section class="head-menu">
                    <nav class="menu">


                        <?php if (has_nav_menu('mega-menu')) { ?>
                            <div class="megamenu-box">
                                
                                <div class="t-m">
                                    <i class="fa-light fa-grid-2"></i>
                                    <span>دسته بندی کالاها</span>
                                </div>
                                <div class="darso-megamenu">

                                    <?php wp_nav_menu( 
                                        array(
                                            'theme_location' => 'mega-menu' ,
                                            'container' => '' ,
                                            'menu_class' => '' , 
                                            'menu_id' => '' ,
                                            'walker'         => new MegaMenu_NavWalker_Icons()
                                        ));
                                    ?>

                                </div>
                            </div>

                            
                        <?php } ?>

                        <div class="menu-header">
                        

                            <?php
                                if (has_nav_menu('main-menu')) {
                                    wp_nav_menu( 
                                        array( 
                                            'theme_location' => 'main-menu' , 
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

                                        <a href="/my-account" target="_blank">                                            
                                            <?php
                                                global $current_user;
                                                if (is_user_logged_in()){
                                            ?>  
                                                <i class="fa-light fa-user"></i> 
                                                <span> <?php echo $current_user->display_name; ?></span>

                                            <?php } else { ?>
                                                <i class="fa-light fa-user"></i> 
                                                <span>ورود / ثبت نام</span>

                                            <?php } ?>
                                        </a>

                                    </div>                            

                                </div>

                                <div class="megamenu-box">
                                    <div class="t-m">
                                        <i class="fa-light fa-grid-2"></i>
                                        <span>دسته بندی کالاها</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="darso-megamenu">
                                        <?php wp_nav_menu( 
                                            array(
                                                'theme_location' => 'mega-menu' ,
                                                'container' => '' ,
                                                'menu_class' => '' , 
                                                'menu_id' => '' ,
                                                'walker'         => new Phone_MegaMenu_NavWalker_Icons()
                                            ));
                                        ?>


                                    </div>
                                </div>
        
                                <div class="menu-header">
         
                                    <?php
                                        if (has_nav_menu('main-menu')) {
                                            wp_nav_menu( 
                                                array( 
                                                    'theme_location' => 'main-menu' , 
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

                    <a href="/" class="logo">
                        <img src="<?php if(!empty($logo)){ echo $logo;} ?>" alt="لوگو دارسو" />
                    </a>

                    <div class="login-btn-wrapper">
                        <a href="/my-account" class="login-btn" target="_blank">
                            <?php
                                global $current_user;
                                if (is_user_logged_in()){
                            ?>                            
                                <i class="fa-light fa-user-large"></i> <?php echo $current_user->display_name; ?> 
                            <?php  } else { ?>
                                <i class="fa-light fa-user-large"></i> ورود / ثبت نام  
                            <?php } ?>  
                        </a>
                    </div>                         

                </div>

                <div class="mh-bottom">
                    <form class="search-box" action="<?php echo home_url('/'); ?>" method="get">
                        <input name="s" value="<?php the_search_query(); ?>" type="search" name="q" placeholder="برای مثال گوشی هوشمند">
                        <span>دنبال چی میگردی؟</span>
                        <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                    </form>

					<a href="/cart" class="cart-btn">
						<i class="fa-light fa-cart-shopping"></i>              
                        <span class="cart-btn-num"><?php echo wc()->cart->get_cart_contents_count(); ?></span>        
					</a>
                </div>
            </div>
            
        </div>
    </header>

    <?php 
        global $product;

        if ( ! is_a($product, 'WC_Product') ) {
            $product_id = get_the_ID();
            $product = wc_get_product( $product_id );

            if ( is_a($product, 'WC_Product') ) {
                $color = wc_get_product_terms( $product->get_id(), 'pa_color', array( 'fields' => 'names' ) );
            } else {
                // fallback: set defaults
                $color = [];
                $product_id = null;
            }
        }

    ?>

    

    <main>