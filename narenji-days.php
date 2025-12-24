<?php
/**
* Template Name: narenji days
*/

get_header('landings');

if (!class_exists('WooCommerce')) {
    echo '<p>ووکامرس فعال نیست.</p>';
    get_footer();
    exit;
}


$timenarenjidays = get_field('select_time_for_narenji_days','option');

if(!empty($timenarenjidays)){
    $istimeset       = $timenarenjidays['time-narenji-days'];
    $rozsaatstart    = $timenarenjidays['select_hour_start_narenji'];
    $rozsaatend      = $timenarenjidays['select_hour_end_narenji'];

    $start_datetime = date('Y-m-d') . ' ' . $rozsaatstart;
    $end_datetime = date('Y-m-d', strtotime('+1 day')) . ' ' . $rozsaatend;

}

    $narenji_message = '';
    $narenji_message_type = '';

    if(isset($_POST['sabt-nazar-narenji-days'])){
        
        if (!isset($_POST['narenji_nonce']) || !wp_verify_nonce($_POST['narenji_nonce'], 'narenji_comment_action')) {
            $narenji_message = 'درخواست نامعتبر است. لطفاً صفحه را رفرش کنید.';
            $narenji_message_type = 'error';
        } else {
            
       
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $rate_limit_key = 'narenji_comment_' . md5($user_ip);
            $last_submit = get_transient($rate_limit_key);
            
            if ($last_submit) {
                $narenji_message = 'لطفاً 2 دقیقه صبر کنید و سپس دوباره تلاش کنید.';
                $narenji_message_type = 'error';
            } else {
                
           
                $name = sanitize_text_field($_POST['name-narenji-days']);
                $desc = sanitize_textarea_field($_POST['desc-narenji-days']); 

                $name = wp_strip_all_tags($name);
                $desc = wp_strip_all_tags($desc);
                
      
                $name = trim($name);
                $desc = trim($desc);

                if(empty($name) || empty($desc)){
                    $narenji_message = 'لطفا نام و نظر خود را وارد کنید.';
                    $narenji_message_type = 'error';
                    
                } elseif(strlen($name) < 2 || strlen($name) > 100) {
                    $narenji_message = 'نام باید بین 2 تا 100 کاراکتر باشد.';
                    $narenji_message_type = 'error';
                    
                } elseif(strlen($desc) < 10 || strlen($desc) > 1000) {
                    $narenji_message = 'نظر باید بین 10 تا 1000 کاراکتر باشد.';
                    $narenji_message_type = 'error';
                    
                } else {
                    
                    global $wpdb;
               
                    $table = $wpdb->prefix . 'narenji_comments';
                    $now = current_time('mysql');
                    
 
                    $exists = $wpdb->get_var(
                        $wpdb->prepare(
                            "SELECT COUNT(*) FROM {$table} 
                            WHERE name = %s 
                            AND comment = %s 
                            AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY)",
                            $name,
                            $desc
                        )
                    );
                    
                    if ($exists > 0){
                        $narenji_message = 'شما قبلاً نظر مشابهی ثبت کرده‌اید.';
                        $narenji_message_type = 'error';
                        
                    } else {
                        
                        $user_ip_hashed = hash('sha256', $user_ip); 
                        
                        $inserted = $wpdb->insert(
                            $table, 
                            array(        
                                'name'        => $name,
                                'comment'     => $desc,
                                'ip_hash'     => $user_ip_hashed, 
                                'status'      => 'pending', 
                                'created_at'  => $now
                            ), 
                            array('%s', '%s', '%s', '%s', '%s')
                        );
                        
                        if($inserted) {

                            set_transient($rate_limit_key, time(), 120);
                            
                            $narenji_message = 'نظر شما با موفقیت ثبت شد و پس از تأیید نمایش داده می‌شود.';
                            $narenji_message_type = 'success';
                            

                            
                        } else {
                            $narenji_message = 'خطا در ثبت اطلاعات. لطفاً دوباره تلاش کنید.';
                            $narenji_message_type = 'error';

                        }
                    }
                }
            }
        }
    }


    if(isset($_POST['submit_suggest_product'])){
        
        
        if (!isset($_POST['suggest_nonce']) || !wp_verify_nonce($_POST['suggest_nonce'], 'suggest_product_action')) {
            $suggest_message = 'درخواست نامعتبر است. لطفاً صفحه را رفرش کنید.';
            $suggest_message_type = 'error';
        } else {
            
         
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $rate_limit_key = 'suggest_product_' . md5($user_ip);
            $last_submit = get_transient($rate_limit_key);
            
            if ($last_submit) {
                $suggest_message = 'لطفاً 5 دقیقه صبر کنید و سپس دوباره پیشنهاد دهید.';
                $suggest_message_type = 'error';
            } else {
                
 
                $suggest_mahsool = isset($_POST['mahsool-pishnahadi']) ? sanitize_text_field($_POST['mahsool-pishnahadi']) : '';
                
                if(empty($suggest_mahsool)){
                    $suggest_message = 'لطفاً یک محصول انتخاب کنید.';
                    $suggest_message_type = 'error';
                } else {
                    

                    $product_exists = get_page_by_title($suggest_mahsool, OBJECT, 'product');
                    
                    if (!$product_exists) {
                        $suggest_message = 'محصول انتخابی نامعتبر است.';
                        $suggest_message_type = 'error';
                    } else {
                        
                        global $wpdb;
                        $table = $wpdb->prefix . 'narenji_usersuggest';
                        $now = current_time('mysql');
                        
                        $user_ip_hashed = hash('sha256', $user_ip);
                        
                        $duplicate = $wpdb->get_var(
                            $wpdb->prepare(
                                "SELECT COUNT(*) FROM {$table} 
                                WHERE suggest_product = %s 
                                AND ip_hash = %s 
                                AND created_at > DATE_SUB(NOW(), INTERVAL 7 DAY)",
                                $suggest_mahsool,
                                $user_ip_hashed
                            )
                        );
                        
                        if ($duplicate > 0) {
                            $suggest_message = 'شما قبلاً این محصول را پیشنهاد داده‌اید.';
                            $suggest_message_type = 'error';
                        } else {
                            
                            $inserted = $wpdb->insert(
                                $table,
                                array(
                                    'suggest_product' => $suggest_mahsool,
                                    'product_id'      => $product_exists->ID,
                                    'ip_hash'         => $user_ip_hashed,
                                    'created_at'      => $now
                                ),
                                array('%s', '%d', '%s', '%s')
                            );
                            
                            if ($inserted) {
                    
                                set_transient($rate_limit_key, time(), 300);
                                
                                $suggest_message = 'پیشنهاد شما با موفقیت ثبت شد. متشکریم!';
                                $suggest_message_type = 'success';
                                
                                error_log("Product suggested: {$suggest_mahsool} (ID: {$product_exists->ID})");
                            } else {
                                $suggest_message = 'خطا در ثبت پیشنهاد. لطفاً دوباره تلاش کنید.';
                                $suggest_message_type = 'error';
                                error_log("Suggest insertion failed: " . $wpdb->last_error);
                            }
                        }
                    }
                }
            }
        }
    }

?>

    
 
    <header>

        <section class="narenji-hero">

            <div class="container">

                <div class="narenji-menu">
                    <div class="narenji-menu-container">
                        
                        <span class="close-narenji-menu">
                            <i class="fa-light fa-xmark"></i>
                        </span>
                       
                        <ul>
                            <li><a href="https://darsoo.com">صفحه اصلی</a></li>
                            <li><a href="https://darsoo.com/about/">درباره ما</a></li>
                            <li><a href="https://darsoo.com/contact">تماس با ما</a></li>
                            <li><a href="https://darsoo.com/blog">مجله دارسو</a></li>
                        </ul>

                        <div class="narenji-menu-footer">
                            <i class="fa-light fa-phone"></i><a href="tel:+982191009828"><span>021-91009828</span></a>
                        </div>
                    </div>                 
                </div>

                <div class="landing-menu">
                    <a href="#" class="menu" id="narenji-menu">
                        <i class="fa-light fa-bars"></i>
                    </a>                    
                    <a href="https://darsoo.com" class="logo">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/logo.png'; ?>" alt="دارسو">
                    </a>        
                </div>

                <main class="narenji-head-content">
                    <div class="narenji-slide">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/narenji-main-slider.webp'; ?>" alt="اسلایدر نارنجی دیز">
                    </div>

                    <?php if($istimeset == 'yes'){ ?>

                    <h2>تا پایان جشنواره این هفته</h2>

                    <div class="narenji-timer">
                        <div>
                            <span  id="narenji-second">00</span>
                            <p>ثانیه</p>
                        </div>                        
                        <div>
                            <span id="narenji-minute">00</span>
                            <p>دقیقه</p>
                        </div>                 
                         <div>
                            <span id="narenji-hour">00</span>
                            <p>ساعت</p>
                        </div>       
                    </div>

                    <?php } else { ?>


                    <h2>جشنواره این هفته به پایان رسید!</h2>                    


                    <?php } ?>

                </main>

            </div>

            <div class="percent-1">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/percent.png'; ?>" alt="آیکون درصد">
            </div>
            <div class="percent-2">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/percent.png'; ?>" alt="آیکون درصد">
            </div>
            <div class="money-1">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/money.png'; ?>" alt="آیکون پول">
            </div>
            <div class="money-2">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/money.png'; ?>" alt="آیکون پول">
            </div>
            <div class="radbargh-1">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/radobargh.png'; ?>" alt="آیکون رعد و برق">
            </div>
            <div class="radbargh-2">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/radobargh.png'; ?>" alt="آیکون رعد و برق">
            </div>

            <div class="phone-buttom"></div>

        </section>

    </header>

    <main>

        <!----------------------- Start-popup for submit message on narenji-days -------------------->

        <form method="post" id="modal-nazarNarenji-days" class="wc-notify-modal <?php echo !empty($narenji_message) ? 'hide-modal' : ''; ?>">

            <?php wp_nonce_field('narenji_comment_action', 'narenji_nonce'); ?>

            <div class="wc-notify-modal-inner">
				<div class="notify-add-to-card-head">

					<div class="natc-r">

                        <span class="bar"></span>                        
                        <i class="fa-light fa-mobile"></i>

                        <div class="ersal-nazar">
                            <span class="ersal-title">ارسال نظر</span>
						    <span class="ersal-subtitle">نظر خود را در رابطه با نارنجی دیز ثبت کنید!</span>
                        </div>                        
					</div>

					<div class="natc-l">
						<div class="closeBtn" id="close-icon-narenji-days">
						    <i class="fa-light fa-xmark"></i>
						</div>
					</div>

				</div>

				<input 
                    type="text" 
                    name="name-narenji-days"
                    id="name-narenji-days" 
                    placeholder="نام خود را وارد کنید"
                    max-length="100"
                    required
                    value="<?php echo isset($_POST['name-narenji-days']) && $narenji_message_type === 'error' ? esc_attr($_POST['name-narenji-days']) : ''; ?>"                        
                >

                <textarea 
                    name="desc-narenji-days" 
                    id="desc-narenji-days"   
                    max-length="1000"
                    required              
                    placeholder="جزئیات نظر خود را وارد کنید..."><?php echo isset($_POST['desc-narenji-days']) && $narenji_message_type === 'error' ? esc_textarea($_POST['desc-narenji-days']) : ''; ?></textarea>

				<div class="notify-buttons">
					<button type="submit" name="sabt-nazar-narenji-days" id="sabt-nazar-narenji-days">ثبت نظر</button> 
				</div>

                 <div class="narenji-msg-container <?php echo !empty($narenji_message) ? 'show-message' : ''; ?>"
                    data-message-type="<?php echo esc_attr($narenji_message_type); ?>">       
                    
                    <div class="closeBtn" id="close-icon-narenji-days">
                        <i class="fa-light fa-xmark"></i>
                    </div> 

                    <div id="narenji-msg">
                        <?php if(!empty($narenji_message)) echo esc_html($narenji_message); ?>
                    </div>
                </div>
				
            </div>
        </form>

       
        

        <!----------------------- End-popup for submit message on narenji-days -------------------->


        <section class="narenji-takhfif-hot">

            <div class="container">
                <div class="narenji-title-container">
                    <div class="nth-icon">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/fire-icon.png'; ?>" alt="آیکون آتیش">
                    </div>
                    <div class="nth-content">
                        <h3>تخفیفات داغ</h3>
                        <p>تخفیف هایی که فقط در روز چهارشنبه نارنجی دارسو میبینید!</p>
                    </div>                    
                </div>
            </div>

            <?php 

                $variations = get_posts(array(
                    'post_type'      => 'product_variation',
                    'posts_per_page' => 10,
                    'meta_query'     => array(
                        array(
                            'key'     => 'narenji_price',
                            'value'   => '',
                            'compare' => '!=',
                        ),
                    ),
                ));

                if($variations != null){

            ?>
            
            <div class="swiper narenjiOffSlider">

                <div class="swiper-wrapper">

                <?php               
                    $parent_ids = array();

                    foreach ($variations as $variation) {
                        $parent_ids[] = $variation->post_parent;
                    }

                    // حذف تکراری‌ها
                    $parent_ids = array_unique($parent_ids);

                    // سپس محصولات متغیر را از میان والد‌های یافت‌شده بگیر
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => $parent_ids,
                        'posts_per_page' => 10,
                        'post_status'    => 'publish',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product_type',
                                'field'    => 'slug',
                                'terms'    => 'variable',
                            ),
                        ),
                    );


                    $landing_query = new WP_Query($args);

                    if ($landing_query->have_posts()) :
                        while ($landing_query->have_posts()) :
                            $landing_query->the_post();
                ?>


                    <!-- <div class="swiper-slide">
                        <a href="#">                        
                            <div class="product-card">
                                <div class="discount-badge">
                                ۴۵ عدد باقی مانده
                                </div>
                                <div class="stock-progress">
                                    <div class="stock-progress__fill"></div>
                                </div>
                                <figure class="product-image">
                                    <img src="<!?php echo get_template_directory_uri() . '/assets/images/landing/product-image.png'; ?>" alt="ساعت هوشمند ایل سری ۹ بنفش" width="300" height="400" >
                                </figure>
                                <div class="product-info-container">
                                    <div class="product-info">
                                        <h2 class="product-title">
                                            ساعت هوشمند ایل سری ۹
                                        </h2>

                                        <div class="price-container">

                                            <div class="pc-right">
                                                <div class="price-original">
                                                    <del>۳,۴۵۰,۰۰۰</del>
                                                    <span class="currency">تومان</span>
                                                </div>
                                                <div class="price-discounted">
                                                <strong>۱,۵۷۰,۰۰۰</strong>
                                                <span class="currency">تومان</span>
                                                </div>
                                            </div>

                                            <div class="pc-left">
                                                <div class="percent-holder">
                                                    <span>5%</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </a>
                    </div> -->


                    <div class="swiper-slide">
                        <a href="<?php the_permalink(); ?>">                        
                            <div class="product-card">

                                <figure class="product-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </figure>

                                <div class="product-info-container">
                                    <div class="product-info">
                                        <h2 class="product-title"><?php the_title(); ?></h2>

                                        <div class="price-container">
                                            <?php echo $product->get_price_html(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
          

                </div>

                <div class="pagination-bullets">
                    <div class="swiper-pagination"></div>
                </div>
               
            </div>

            <?php } else{ ?>

                <div class="container">
                    <p class="not-found">محصولی در تخفیف ویژه یافت نشد.</p>
                </div>                

            <?php }; ?>

        </section>


        <section class="customer-reviews">

            <div class="container">

                <div class="narenji-title-container">
                    <div class="nth-icon">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/nazarat-shoma.png';?>" alt="آیکون نظرات شما">
                    </div>
                    <div class="nth-content">
                        <h3>نظرات شما</h3>
                        <p>نظر خود را درباره روزهای نارنجی دارسو بنویسید</p>
                    </div>                    
                </div>

                <?php 
                
                    global $wpdb;
                    $narenji_comment_tbl = $wpdb->prefix . 'narenji_comments';
                    $conmmet_results = $wpdb->get_results(
                        "SELECT * FROM {$narenji_comment_tbl} WHERE status = 'taeed'"
                    );
                    
                    if(!empty($conmmet_results)){                             
                ?>

                    <div class="swiper narenjiReviewSlider">

                        <div class="swiper-wrapper">

                        <?php 
                            foreach ($conmmet_results as $row) {
                        ?>
                    
                                <div class="swiper-slide">
                                    <div class="customer-review-items">
                                        <div class="comment-meta">
                                            <div class="user-info">
                                                <div class="user-avatar">
                                                    <i class="fa-light fa-user"></i>
                                                </div>
                                                <div class="user-details">
                                                    <div class="user-name"><?php echo esc_html($row->name); ?></div>
                                                    <span class="comment-time">
                                                        <span class="comment-time">
                                                            
                                                        <?php 
                                                            $timestamp = strtotime($row->created_at);
                                                            echo wp_date('j F Y', $timestamp); 
                                                        ?>

                                                        </span>                                                                                                          
                                                    </span>
                                                </div>
                                            </div>
                                            <button class="like-btn">                                                
                                                <span class="like-icon">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <p class="comment-text">
                                            <?php echo esc_html($row->comment); ?>                                       
                                        </p>                    
                                    </div>
                                </div>

                        <?php } ?>


                        </div>

                        <div class="pagination-bullets">
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                <?php 
                    }else{
                ?>

                    <div class="swiper narenjiReviewSlider">

                        <div class="swiper-wrapper">
                    
                            <div class="swiper-slide">
                                <div class="customer-review-items">
                                    <div class="comment-meta">
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <i class="fa-light fa-user"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">کیارش امیری</div>
                                                <span class="comment-time">50 دقیقه پیش</span>
                                            </div>
                                        </div>
                                        <button class="like-btn">
                                            12
                                            <span class="like-icon">
                                                <i class="fa-light fa-heart"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <p class="comment-text">
                                        سلام به تیم دارسو، ممنون از نقد و بررسی کاملتون. رنگ سورمه&zwnj;ای اش به آبی نزدیک&zwnj;تره یا سورمه&zwnj;ای سیر؟
                                    </p>                    
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="customer-review-items">
                                    <div class="comment-meta">
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <i class="fa-light fa-user"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">کیارش امیری</div>
                                                <span class="comment-time">50 دقیقه پیش</span>
                                            </div>
                                        </div>
                                        <button class="like-btn">
                                            12
                                            <span class="like-icon">
                                                <i class="fa-light fa-heart"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <p class="comment-text">
                                        سلام به تیم دارسو، ممنون از نقد و بررسی کاملتون. رنگ سورمه&zwnj;ای اش به آبی نزدیک&zwnj;تره یا سورمه&zwnj;ای سیر؟
                                    </p>                    
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="customer-review-items">
                                    <div class="comment-meta">
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <i class="fa-light fa-user"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">کیارش امیری</div>
                                                <span class="comment-time">50 دقیقه پیش</span>
                                            </div>
                                        </div>
                                        <button class="like-btn">
                                            12
                                            <span class="like-icon">
                                                <i class="fa-light fa-heart"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <p class="comment-text">
                                        سلام به تیم دارسو، ممنون از نقد و بررسی کاملتون. رنگ سورمه&zwnj;ای اش به آبی نزدیک&zwnj;تره یا سورمه&zwnj;ای سیر؟
                                    </p>                    
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="customer-review-items">
                                    <div class="comment-meta">
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <i class="fa-light fa-user"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">کیارش امیری</div>
                                                <span class="comment-time">50 دقیقه پیش</span>
                                            </div>
                                        </div>
                                        <button class="like-btn">
                                            12
                                            <span class="like-icon">
                                                <i class="fa-light fa-heart"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <p class="comment-text">
                                        سلام به تیم دارسو، ممنون از نقد و بررسی کاملتون. رنگ سورمه&zwnj;ای اش به آبی نزدیک&zwnj;تره یا سورمه&zwnj;ای سیر؟
                                    </p>                    
                                </div>
                            </div>

                        </div>

                        <div class="pagination-bullets">
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                
                <?php 
                    };
                ?>


                <button type="button" id="submit-narenji-comment" class="customer-SubRevBtn">
                    ثبت نظر
                </button>
                
            </div>

        </section>



        <!-- <section class="narenji-thisWeekProducts">

            <div class="container">

                <div class="narenji-title-container">
                    <div class="nth-icon">
                        <img src="<!?php echo get_template_directory_uri() . '/assets/images/landing/icon-thisweek.png'; ?>" alt="آیکون محصولات این هفته">
                    </div>
                    <div class="nth-content">
                        <h3>محصولات این هفته</h3>
                        <p>تخفیف هایی که فقط در روز چهارشنبه نارنجی دارسو میبینید!</p>
                    </div>                    
                </div>



                <div class="narenji-thisweek-procard-container">

                    <div class="narenji-thisweek-procard">
                        <div class="product-top">
                            <img src="<!?php echo get_template_directory_uri() . '/assets/images/landing/product-image.png'; ?>" alt="product">
                            <div class="sold-out">تمام شد!<br><span>SOLD OUT</span></div>
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">ساعت هوشمند اپل سری 9</h3>
                            <div class="old-price">۱۲,۳۲۰,۰۰۰ تومان</div>
                            <div class="price-row">
                                <div class="new-price">۱۰,۳۷۵,۰۰۰ تومان</div>
                                <div class="discount-badge">۱۵٪</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </section> -->

        
        <section class="narenji-nextWeek">

            <div class="nextweek-right">

                <form method="post" id="suggest-product-form" class="<?php echo !empty($suggest_message) && $suggest_message_type === 'success' ? 'form-hidden' : ''; ?>"> 
                    
                    <?php wp_nonce_field('suggest_product_action', 'suggest_nonce'); ?>               
                    
                    <div class="nextweek-right-content">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/speaker-icon.png'; ?>" alt="آیکون اسپیکر" />
                        <h3>هفته بعد چطور؟</h3>
                        <p>محصولات چهارشنبه بعدی را شما مشخص کنید.</p>
                        <?php
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 15,
                            'meta_key'       => 'total_sales',
                            'orderby'        => 'meta_value_num',
                            'order'          => 'DESC',
                            'post_status'    => 'publish',
                        );

                        $best_products = new WP_Query($args);

                        if ( $best_products->have_posts() ) : ?>
                            <div class="mahsool-pishnahadi-container">
                                <select name="mahsool-pishnahadi" id="mahsool-pishnahadi">
                                    <?php while ( $best_products->have_posts() ) : $best_products->the_post(); ?>
                                        <option value="<?php echo esc_attr(get_the_title()); ?>"
                                            data-product-id="<?php echo esc_attr(get_the_ID()); ?>"
                                            <?php echo (isset($_POST['mahsool-pishnahadi']) && $_POST['mahsool-pishnahadi'] === get_the_title() && $suggest_message_type === 'error') ? 'selected' : ''; ?>                                        
                                        >
                                            <?php echo esc_html(get_the_title()); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        <?php endif;

                        wp_reset_postdata();
                        ?>


                        <input type="submit" name="submit_suggest_product" value="پیشنهادم اینه!" />
                    </div>
                </form>
                
                <div class="phone-icon">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/phone-icon-side.png'; ?>" alt="آیکون تلفن" />
                </div>

                <div class="playstation-icon">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/playstation-icon.png'; ?>" alt="آیکون پلی استیشن" />
                </div>

            </div>

            <!-- <div class="nextweek-left">

                <div class="narenji-title-container">
                    <div class="nth-icon">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/nazarat-shoma.png'; ?>" alt="آیکون نظرات شما کاربران">
                    </div>
                    <div class="nth-content">
                        <h3>محصولات منتخب طبق نظرات</h3>
                        <p>در این بخش محصولاتی که می توانید برای تخفیف هفته بعدی انتخاب کنید را لیست کرده ایم.</p>
                    </div>                    
                </div>

                <div class="nextweek-left-item">
                    <div class="nextweek-left-item-img">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/image-phone.jpg'; ?>" alt="آیکون تلفن">
                    </div>
                    <div class="nextweek-left-item-content">
                        <h3>گوشی موبایل شیائومی 4G ظرفیت 256 گیگابایت رم 8 گیگابایت دو سیم کار</h3>
                        <div class="vote-items">
                            <div class="icon">
                                <i class="fa-light fa-people-group"></i>
                            </div>
                            <span>670 رای</span>-<span>رتبه اول</span>
                        </div>
                    </div>
                    <div class="nextweek-left-item-number">                        
                        <span>1</span>
                    </div>
                    <div class="like-dislike-buttons">
                        <a href="#">
                            <i class="fa-light fa-thumbs-down"></i>
                        </a>
                        <a href="#">
                            <i class="fa-light fa-thumbs-up"></i>
                        </a>
                    </div>
                </div>
                <div class="nextweek-left-item">
                    <div class="nextweek-left-item-img">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/image-phone.jpg'; ?>" alt="آیکون تلفن">
                    </div>
                    <div class="nextweek-left-item-content">
                        <h3>گوشی موبایل شیائومی 4G ظرفیت 256 گیگابایت رم 8 گیگابایت دو سیم کار</h3>
                        <div class="vote-items">
                            <div class="icon">
                                <i class="fa-light fa-people-group"></i>
                            </div>
                            <span>670 رای</span>-<span>رتبه اول</span>
                        </div>
                    </div>
                    <div class="nextweek-left-item-number">                        
                        <span>1</span>
                    </div>
                    <div class="like-dislike-buttons">
                        <a href="#">
                            <i class="fa-light fa-thumbs-down"></i>
                        </a>
                        <a href="#">
                            <i class="fa-light fa-thumbs-up"></i>
                        </a>
                    </div>
                </div>
                <div class="nextweek-left-item">
                    <div class="nextweek-left-item-img">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/image-phone.jpg'; ?>" alt="آیکون تلفن">
                    </div>
                    <div class="nextweek-left-item-content">
                        <h3>گوشی موبایل شیائومی 4G ظرفیت 256 گیگابایت رم 8 گیگابایت دو سیم کار</h3>
                        <div class="vote-items">
                            <div class="icon">
                                <i class="fa-light fa-people-group"></i>
                            </div>
                            <span>670 رای</span>-<span>رتبه اول</span>
                        </div>
                    </div>
                    <div class="nextweek-left-item-number">                        
                        <span>1</span>
                    </div>
                    <div class="like-dislike-buttons">
                        <a href="#">
                            <i class="fa-light fa-thumbs-down"></i>
                        </a>
                        <a href="#">
                            <i class="fa-light fa-thumbs-up"></i>
                        </a>
                    </div>
                </div>

            </div> -->



            <div class="nextweek-left">

                <div class="narenji-title-container">
                    <div class="nth-icon">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/landing/nazarat-shoma.png'; ?>" alt="آیکون نظرات شما کاربران">
                    </div>
                    <div class="nth-content">
                        <h3>محصولات منتخب طبق نظرات</h3>
                        <p>در این بخش محصولاتی که می توانید برای تخفیف هفته بعدی انتخاب کنید را لیست کرده ایم.</p>
                    </div>                    
                </div>

                <?php
                // دریافت محصولات پیشنهادی از جدول suggest
                global $wpdb;
                $suggest_table = $wpdb->prefix . 'narenji_usersuggest';
                $votes_table = $wpdb->prefix . 'narenji_votes';
                
                // گرفتن محصولات با بیشترین رای
                $top_products = $wpdb->get_results("
                    SELECT 
                        us.product_id,
                        us.suggest_product,
                        COUNT(DISTINCT us.id) as suggest_count,
                        (SELECT COUNT(*) FROM {$votes_table} WHERE product_id = us.product_id AND vote_type = 'like') as likes,
                        (SELECT COUNT(*) FROM {$votes_table} WHERE product_id = us.product_id AND vote_type = 'dislike') as dislikes
                    FROM {$suggest_table} us
                    WHERE us.product_id IS NOT NULL
                    GROUP BY us.product_id
                    ORDER BY likes DESC, suggest_count DESC
                    LIMIT 10
                ");
                
                if ($top_products) :
                    $rank = 1;
                    foreach ($top_products as $item) :
                        $product = wc_get_product($item->product_id);
                        if (!$product) continue;
                        
                        $votes = narenji_get_product_votes($item->product_id);
                        $user_vote = narenji_get_user_vote($item->product_id);
                        $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($item->product_id), 'medium');
                        ?>
                        
                        <div class="nextweek-left-item" data-product-id="<?php echo esc_attr($item->product_id); ?>">
                            <div class="nextweek-left-item-img">
                                <img src="<?php echo $product_image ? esc_url($product_image[0]) : wc_placeholder_img_src(); ?>" 
                                    alt="<?php echo esc_attr($product->get_name()); ?>">
                            </div>
                            
                            <div class="nextweek-left-item-content">
                                <h3><?php echo esc_html($product->get_name()); ?></h3>
                                <div class="vote-items">
                                    <div class="icon">
                                        <i class="fa-light fa-people-group"></i>
                                    </div>
                                    <span class="vote-count"><?php echo $votes['total']; ?></span>
                                    <span>رای</span> - 
                                    <span>رتبه <?php echo narenji_convert_to_persian_number($rank); ?></span>
                                </div>
                            </div>
                            
                            <div class="nextweek-left-item-number">                        
                                <span><?php echo narenji_convert_to_persian_number($rank); ?></span>
                            </div>
                            
                            <div class="like-dislike-buttons">
                                <button class="vote-btn dislike-btn <?php echo $user_vote === 'dislike' ? 'active' : ''; ?>" 
                                        data-product-id="<?php echo esc_attr($item->product_id); ?>" 
                                        data-vote-type="dislike">
                                    <i class="fa-light fa-thumbs-down"></i>
                                    <span class="dislike-count"><?php echo $votes['dislikes']; ?></span>
                                </button>
                                <button class="vote-btn like-btn <?php echo $user_vote === 'like' ? 'active' : ''; ?>" 
                                        data-product-id="<?php echo esc_attr($item->product_id); ?>" 
                                        data-vote-type="like">
                                    <i class="fa-light fa-thumbs-up"></i>
                                    <span class="like-count"><?php echo $votes['likes']; ?></span>
                                </button>
                            </div>
                        </div>
                        
                        <?php
                        $rank++;
                    endforeach;
                else : ?>
                    <p>هنوز محصولی پیشنهاد نشده است.</p>
                <?php endif; ?>

            </div>

            <?php
            // تابع تبدیل اعداد به فارسی
            function narenji_convert_to_persian_number($number) {
                $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
                $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                return str_replace($english, $persian, $number);
            }
            ?>


        </section>

        <?php get_footer(); ?>        

        <script>
            const SALE_START = "<?php echo $start_datetime; ?>";
            const SALE_END   = "<?php echo $end_datetime; ?>";

            $(document).ready(function () {
                const startTime = new Date(SALE_START);
                const endTime   = new Date(SALE_END);

                function updateTimer() {
                    const now = new Date();

                    if (now < startTime) {
                        // شمارش تا شروع
                        showCountdown(startTime - now);
                        return;
                    }

                    if (now >= startTime && now <= endTime) {
                        // شمارش تا پایان
                        showCountdown(endTime - now);
                        return;
                    }

                    // بعد از پایان
                    showCountdown(0);
                }

                function showCountdown(diff) {
                    if (diff <= 0) {
                        $('#narenji-hour').text('00');
                        $('#narenji-minute').text('00');
                        $('#narenji-second').text('00');
                        return;
                    }

                    const hours = Math.floor(diff / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    $('#narenji-hour').text(hours.toString().padStart(2, '0'));
                    $('#narenji-minute').text(minutes.toString().padStart(2, '0'));
                    $('#narenji-second').text(seconds.toString().padStart(2, '0'));
                }

                updateTimer();
                setInterval(updateTimer, 1000);
            });



            $(document).ready(function () {
        
                $('.close-message-btn').on('click', function() {
                    $('.narenji-msg-container').removeClass('show-message');
                    $('#modal-nazarNarenji-days').removeClass('hide-modal');
                });

                $('#close-icon-narenji-days').on('click', function() {
                    $('#modal-nazarNarenji-days').hide();
                });
                
                $('#name-narenji-days, #desc-narenji-days').on('input', function() {
                    $('.narenji-msg-container').removeClass('show-message');
                    $('#modal-nazarNarenji-days').removeClass('hide-modal');
                });
            });


            $(document).ready(function () {
                
                $('.vote-btn').on('click', function(e) {
                    e.preventDefault();
                    
                    var $btn = $(this);
                    var productId = $btn.data('product-id');
                    var voteType = $btn.data('vote-type');
                    var $item = $btn.closest('.nextweek-left-item');
                    
                    // for users that didnt click it relentleslly
                    if ($btn.hasClass('processing')) {
                        return false;
                    }
                    
                    $btn.addClass('processing');
                    
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: {
                            action: 'narenji_vote',
                            nonce: '<?php echo wp_create_nonce('narenji_vote_action'); ?>',
                            product_id: productId,
                            vote_type: voteType
                        },
                        success: function(response) {
                            if (response.success) {
                                var data = response.data;
                                
                                // update number of votes
                                $item.find('.vote-count').text(data.total_votes);
                                $item.find('.like-count').text(data.total_likes);
                                $item.find('.dislike-count').text(data.total_dislikes);
                                
                                // update status of buttons
                                $item.find('.vote-btn').removeClass('active');
                                if (data.user_vote) {
                                    $item.find('.vote-btn[data-vote-type="' + data.user_vote + '"]').addClass('active');
                                }
                                
                                // animation of votes
                                $item.find('.vote-items').addClass('pulse');
                                setTimeout(function() {
                                    $item.find('.vote-items').removeClass('pulse');
                                }, 600);
                                
                            } else {
                                alert(response.data.message || 'خطا در ثبت رای');
                            }
                        },
                        error: function() {
                            alert('خطا در ارتباط با سرور');                        
                        },
                        complete: function() {
                            $btn.removeClass('processing');
                        }
                    });
                });
            });


        </script>
