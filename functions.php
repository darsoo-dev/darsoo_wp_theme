<?php
require_once 'inc/loader-plugins.php';


add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts(){
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), false , 'all' );
    
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), false , 'all' );
    
    wp_enqueue_style( 
       'style' ,
       get_stylesheet_uri(),
       [],
       filemtime(get_template_directory() . '/style.css')
    );


    wp_enqueue_script( 'swiper-bundle-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), false , true );

    wp_enqueue_script( 
        'custom',
        get_template_directory_uri() . '/assets/js/custom.js',
        array('jquery'),
        filemtime( get_template_directory() . '/assets/js/custom.js') ,
        true
    );
    
    

    wp_localize_script( 'custom', 'wc_cart_params', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
        
    // wp_localize_script( 'custom', 'deliveryAjax', array(
    //     'ajax_url' => admin_url( 'admin-ajax.php' )
    // ));

    wp_localize_script( 'custom', 'proNotifyVars', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('pro_nofity_nonce'),
    ));
    
    
    wp_localize_script( 'custom', 'qa_ajax', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('qa_nonce'),
    ));

    // این بخش برای این هست که در صفحه چک اوت بیاد و چک کنه که آیا محصول کیف پول به سبد خرید اضافه شده یا نه؟ همچنین بررسی اینکه کالای امانی به سبد خرید اضافه شده است یا نه!
    $has_333 = false;
    $is_amani = false;
    if ( function_exists('WC') && WC()->cart ) {
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            $pid = isset($cart_item['product_id']) ? (int) $cart_item['product_id'] : 0;
            $vid = isset($cart_item['variation_id']) ? (int) $cart_item['variation_id'] : 0;
            // اگر محصول شما متغیره، ممکنه ID در variation_id باشه
            if ( $pid === 333 || $vid === 333 ) {
                $has_333 = true;
                break;
            }

            if(isset($cart_item['is_amani']) && $cart_item['is_amani'] === 'yes'){
                $is_amani = true;
                break;
            }
        }

        
    }

    // Localize to JS
     wp_localize_script('custom', 'myPostData', array(
        'has_333'  => $has_333,
        'is_amani' => $is_amani,
    ));
    
    

    // 4) دیباگ: قبل از اجرای custom.js مقدار را چاپ کن
    // wp_add_inline_script('custom', 'console.log("myPostData inline:", window.myPostData);', 'before');

	if ( is_checkout() ) {
        wp_enqueue_script( 'jalaali', get_template_directory_uri() . '/assets/js/jalaali.js', array('jquery'), false, true );
    }
 
    if ( is_checkout() || is_account_page() ) {
        wp_enqueue_style('mapp-css','https://cdn.map.ir/web-sdk/1.4.2/css/mapp.min.css');
        wp_enqueue_style('mapp-style','https://cdn.map.ir/web-sdk/1.4.2/css/fa/style.css');
    
        wp_register_script('mapp-env', 'https://cdn.map.ir/web-sdk/1.4.2/js/mapp.env.js', array(), null, true);
        wp_add_inline_script('mapp-env', 'window.MappEnv = { apiKey: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjMzMzk0ZjZlMzU0YjMyNWNlM2ZkNzE0Yzg1MmJkMmE5OTU5NDkxNTcyNDQ3OTQ3MTgzMzJiMzJhNWZmZDhhZjIwYTBmYjI2OTE4MzAzN2ZjIn0.eyJhdWQiOiIzMzU4MyIsImp0aSI6IjMzMzk0ZjZlMzU0YjMyNWNlM2ZkNzE0Yzg1MmJkMmE5OTU5NDkxNTcyNDQ3OTQ3MTgzMzJiMzJhNWZmZDhhZjIwYTBmYjI2OTE4MzAzN2ZjIiwiaWF0IjoxNzUzNzk2OTM0LCJuYmYiOjE3NTM3OTY5MzQsImV4cCI6MTc1NjM4ODkzNCwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.lEtKby2GbNaDVZQDyb64YVJlFgBJz0vQytDZrJgHvFwMu3-FhRF81THZ_9OK3dfP7nQTjCwud4uP-wbHtV5jEt4u2g43GthE1osoF7JI4JClxWtcQZUEi_pSbTwoRgdrlCwyk0NF10G9GbYqzCHuTbiWWPyPc42TzRue5mQn1i-qJkH2ieBI5tgFqDk0d-L2n2yOdb9CgmnB_-bZnyg2u8b7nivhRIXb_PUQkOWW3WsfnfWiVOD1FQd6K9ghRAHn8uO4EBJsRifBGN_zFIC2gmj77XZ-2qANjXVJ22J6OaHQcWl1E4DEKCMDrCIYh7r4bnKydcuHRa8E0Lhqjk1sgw" };', 'before');
        wp_enqueue_script('mapp-env');
        
        wp_enqueue_script('mapp-core', 'https://cdn.map.ir/web-sdk/1.4.2/js/mapp.min.js', array('mapp-env', 'jquery'), null, true );
        wp_enqueue_script('map-custom', get_template_directory_uri() . '/assets/js/map.js', array('jquery', 'mapp-core'), null, true );
        wp_enqueue_script('wc-checkout');
    }



}



// ----------- enqueue admin css  -----------------
function custom_admin_styles() {
    wp_enqueue_style(
        'custom-admin-css',
        get_stylesheet_directory_uri() . '/assets/css/admin-style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/admin-style.css')
    );
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');
// ----------- enqueue admin css  -----------------



add_action('after_setup_theme' , 'darsoo_setup_theme');
function darsoo_setup_theme() {
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    // add_theme_support('wc-product-gallery-slider');

    add_image_size('big-post',588, 300 , true);
    add_image_size('small-post',125, 125 , true);
    add_image_size('product',200, 200 , true);

    register_nav_menus(
        array(
            'main-menu' => __( 'جایگاه نمایش منوی اصلی' ),
            'mega-menu' => __( 'جایگاه نمایش مگامنو' ),
            'blog-menu' => __( 'جایگاه نمایش منو وبلاگ' ),
        )
    );
}



// // حذف تگ های ابتدای صفحه داخلی محصول
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// حذف سایدبار صفحه داخلی محصول
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
// حذف عبارت حراج در صفحه داخلی محصول
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);



add_action('woocommerce_before_quantity_input_field', 'darsoo_before_quantity_input_field');
add_action('woocommerce_after_quantity_input_field', 'darsoo_after_quantity_input_field');


//افزودن دکمه های اضافه و کم کردن تعداد در صفحه محصول
function darsoo_before_quantity_input_field() {
    echo '<div class="quantity-btn plus"><i class="fa-light fa-plus"></i></div>';
}
function darsoo_after_quantity_input_field() {
    echo '<div class="quantity-btn minus"><i class="fa-light fa-minus"></i></div>';
}



//حذف برای نمایش محصولات متغیر در محل پیشفرض و جایگزینی در جای دیگر
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10);

// حذف بخش محصولات پیشنهادی و قیمت در صفحه سبد خرید
remove_action('woocommerce_cart_collaterals','10');


//start-بصورت اتوماتیک محصول متغیری که کمترین قیمت رو داره در برگه محصول انتخاب کن
add_filter('woocommerce_product_get_default_attributes', 'auto_select_lowest_price_variation', 10, 2);

function auto_select_lowest_price_variation($default_attributes, $product) {
    if (!is_admin() && $product->is_type('variable')) {

        $variations = $product->get_available_variations();
        $lowest_price = null;
        $lowest_variation = null;

        foreach ($variations as $variation) {
            if (!$variation['is_purchasable'] || !$variation['is_in_stock']) continue;

            $price = floatval($variation['display_price']);

            if (is_null($lowest_price) || $price < $lowest_price) {
                $lowest_price = $price;
                $lowest_variation = $variation;
            }
        }

        if ($lowest_variation) {
            $default_attributes = array();
            foreach ($lowest_variation['attributes'] as $key => $value) {
                $default_attributes[str_replace('attribute_', '', $key)] = $value;
            }
        }
    }

    return $default_attributes;
}
//end-بصورت اتوماتیک محصول متغیری که کمترین قیمت رو داره در برگه محصول انتخاب کن




//ajax add-to-cart
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <span class="cart-btn-num">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php $fragments['.cart-btn-num'] = ob_get_clean();
    return $fragments;
});

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['.cart-content'] = ob_get_clean();
    return $fragments;
});


//start - namayesh gheymat kamtar dar card haye mahoslat
function darsoo_wooocmmerce_discount ($id) {
    $product = wc_get_product( $id );
    if($product->is_on_sale()){
        if($product->is_type( 'variable' ))
        {
            $regular_price = $product->get_variation_regular_price( 'min' );
            $sale_price = $product->get_variation_sale_price( 'min' );
        }
        else
        {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        }

        $insale_price = (int)$regular_price - (int)$sale_price;
        $discount_price = round(($insale_price/$regular_price)*100);
        return $discount_price;
    }
}
//end - namayesh gheymat kamtar dar card haye mahoslat


// start ---handle wordpress redirect for discount categories
function init_needed_darsoo(){
    
    add_rewrite_rule(
        '^discount/([^/]+)/?$',
        'index.php?pagename=discount&discount_cat=$matches[1]',
        'top'
    );
    
    register_post_status( 'wc-shipped', array(
        'label'                     => 'ارسال شده',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'ارسال شده (%s)', 'ارسال شده (%s)' )
    ));
    
}

add_action('init', 'init_needed_darsoo');


// افزودن به لیست وضعیت‌های ووکامرس
add_filter( 'wc_order_statuses', 'add_shipped_to_order_statuses' );
function add_shipped_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();

    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;

        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-shipped'] = 'ارسال شده';
        }
    }

    return $new_order_statuses;
}


function custom_discount_query_vars($vars){
    $vars[] = 'discount_cat';
    return $vars;
}
add_filter('query_vars', 'custom_discount_query_vars');

// end ---handle wordpress redirect for discount categories



// start - این بخش برای اضافه کردن id به لینک های جدول محتوای مقالات و همچنین حذف url از کامنت هاست
add_filter( 'the_content', 'add_ids_to_headings' );
function add_ids_to_headings( $content ) {
    $content = preg_replace_callback(
        '/(<h[2-6])(.*?)?>(.*?)<\/h[2-6]>/i',
        function( $matches ) {
            $clean_heading = wp_strip_all_tags( $matches[3] );
            $id = sanitize_title( $clean_heading );
            $attributes = ! empty( $matches[2] ) ? $matches[2] : '';
            if ( ! preg_match( '/id=/i', $attributes ) ) {
                $attributes .= ' id="' . esc_attr( $id ) . '"';
            }
            return $matches[1] . $attributes . '>' . $matches[3] . '</h' . $matches[1][2] . '>';
        },
        $content
    );
    return $content;
}

add_filter( 'comment_form_defaults', 'remove_reply_title_id' );
function remove_reply_title_id( $defaults ) {
    $defaults['title_reply_before'] = '<div class="top-sections-title" style="margin-top:30px;">
                                        <div class="tst-right">
                                            <div class="bar"></div>
                                            <div class="tst-rigth-icon">
                                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.3201 21.74C18.1201 21.72 17.8801 21.72 17.6601 21.74C12.9001 21.58 9.12012 17.68 9.12012 12.88C9.12012 7.98 13.0801 4 18.0001 4C22.9001 4 26.8801 7.98 26.8801 12.88C26.8601 17.68 23.0801 21.58 18.3201 21.74Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M32.8196 8C36.6996 8 39.8196 11.14 39.8196 15C39.8196 18.78 36.8196 21.86 33.0796 22C32.9196 21.98 32.7396 21.98 32.5596 22" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M8.32043 29.12C3.48043 32.36 3.48043 37.64 8.32043 40.86C13.8204 44.54 22.8404 44.54 28.3404 40.86C33.1804 37.62 33.1804 32.34 28.3404 29.12C22.8604 25.46 13.8404 25.46 8.32043 29.12Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M36.6797 40C38.1197 39.7 39.4797 39.12 40.5997 38.26C43.7197 35.92 43.7197 32.06 40.5997 29.72C39.4997 28.88 38.1597 28.32 36.7397 28" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>                                        
                                            </div>
                                            <span class="tst-right-text">';
    $defaults['title_reply_after'] = '    </span>    
                                        </div>
                                    </div>';
    $defaults['title_reply'] = 'ارسال نظرات کاربران '; 
    return $defaults;
}

add_filter( 'comment_form_default_fields', 'disable_comment_form_url_field' );
function disable_comment_form_url_field( $fields ) {
    unset( $fields['url'] );
    return $fields;
}
// end - این بخش برای اضافه کردن id به لینک های جدول محتوای مقالات و همچنین حذف url از کامنت هاست




// علت اینکه این کد فانکشن اسکریپت رو اینجا گذاشتم بخاطر این هست که این کد دقیقا تو تابع های woocommerce_variation  کار بکنه 
// این کد اگه داخل custom.js باشه اجرا نمیشه و کار نمیکنه
add_action('wp_enqueue_scripts', function() {
    wp_add_inline_script(
        'wc-add-to-cart-variation',
        "
        jQuery(document).ready(function($) {
            var form = $('.variations_form');
            var isSyncing = false; // جلوگیری از لوپ

            // وقتی رنگ انتخاب میشه
            form.on('change', 'select[name^=attribute_pa_color]', function() {
                if (isSyncing) return;
                var color = $(this).val();
                if (!color) return;

                var variations = form.data('product_variations');

                $.each(variations, function(i, variation) {
                    if (variation.attributes['attribute_pa_color'] === color) {
                        if (variation.attributes['attribute_pa_guarantee']) {
                            var warranty = variation.attributes['attribute_pa_guarantee'];
                            var warrantySelect = form.find('select[name^=attribute_pa_guarantee]');
                            if (warrantySelect.val() !== warranty) {
                                isSyncing = true;
                                warrantySelect.val(warranty).change(); 
                                isSyncing = false;
                            }
                        }
                        return false; // break
                    }
                });
            });

            // وقتی گارانتی انتخاب میشه
            form.on('change', 'select[name^=attribute_pa_guarantee]', function() {
                if (isSyncing) return;
                var warranty = $(this).val();
                if (!warranty) return;

                var variations = form.data('product_variations');

                $.each(variations, function(i, variation) {
                    if (variation.attributes['attribute_pa_guarantee'] === warranty) {
                        if (variation.attributes['attribute_pa_color']) {
                            var color = variation.attributes['attribute_pa_color'];
                            var colorSelect = form.find('select[name^=attribute_pa_color]');
                            if (colorSelect.val() !== color) {
                                isSyncing = true;
                                colorSelect.val(color).change();
                                isSyncing = false;
                            }
                        }
                        return false; // break
                    }
                });
            });
        });
        "
    );
});

// علت اینکه این کد فانکشن اسکریپت رو اینجا گذاشتم بخاطر این هست که این کد دقیقا تو تابع های woocommerce_variation  کار بکنه 
// این کد اگه داخل custom.js باشه اجرا نمیشه و کار نمیکنه
function custom_search_template($template) {
    if (is_search()) {
        $post_type = get_query_var('post_type');

        if ($post_type === 'post') {
            $new_template = locate_template('search-post.php');
            if ($new_template) return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'custom_search_template');



// این بخش برای تغییر قیمت محصولات نارنجی دیز




// این بخش برای تغییر قیمت محصولات نارنجی دیز


require_once 'template/improve/speed/optimise-speed.php'; 
require_once 'template/woo/notify/notify-users.php';
require_once 'template/woo/QAwoocommerce/qa-woocommerce.php';
require_once 'template/improve/menu/menu-walker-icons.php';
require_once 'template/checkout-and-delivery/checkout-delivery-rules.php';
require_once 'template/checkout-and-delivery/myaccount-rules.php';
require_once 'template/landings/landings-code.php';