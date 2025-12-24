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
</head>
<body <?php body_class(); ?>>
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


                        <div class="support-text">
                            <span>پشتیبانی سریع</span>
                            <a href="<?php if(!empty($phonenumberlink)){ echo $phonenumberlink;} ?>"><span>021-<?php if(!empty($phonenumbertext)){echo $phonenumbertext;} ?></span></a>
                        </div>
                        <a href="<?php if($phonenumberlink){ echo $phonenumberlink;} ?>" class="support-btn">
                            <i class="fa-light fa-phone-volume"></i>
                        </a>
                    </div>
    
                </section>
            </div>

            <div class="mobile-header">
                <div class="mh-top">
                    
                    <div class="toggle-menu" style="display:none;">
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
                        <a href="/my-account" target="_blank" class="login-btn">
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
    

    <main>