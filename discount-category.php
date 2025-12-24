<?php
/**
* Template Name: Discount Category Page
*/

get_header();

$discount_slug = get_query_var('discount_cat');

if (!class_exists('WooCommerce')) {
    echo '<p>ووکامرس فعال نیست.</p>';
    get_footer();
    exit;
}

?>


    <section class="container special-discount-slider-button-wrapper">            
        <div class="special-discount-title">
            <div class="top-sections-title">
                <div class="tst-right">
                    <div class="bar"></div>
                    <div class="tst-rigth-icon">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.97779 29.3209L4.93781 26.2808C3.69781 25.0408 3.69781 23.0008 4.93781 21.7608L7.97779 18.7208C8.49779 18.2008 8.91779 17.1808 8.91779 16.4608V12.1607C8.91779 10.4007 10.3578 8.96076 12.1178 8.96076H16.4178C17.1378 8.96076 18.1578 8.54082 18.6778 8.02082L21.7178 4.98078C22.9578 3.74078 24.9978 3.74078 26.2378 4.98078L29.2778 8.02082C29.7978 8.54082 30.8178 8.96076 31.5378 8.96076H35.8378C37.5978 8.96076 39.0378 10.4007 39.0378 12.1607V16.4608C39.0378 17.1808 39.4578 18.2008 39.9778 18.7208L43.0178 21.7608C44.2578 23.0008 44.2578 25.0408 43.0178 26.2808L39.9778 29.3209C39.4578 29.8409 39.0378 30.8609 39.0378 31.5809V35.8807C39.0378 37.6407 37.5978 39.0809 35.8378 39.0809H31.5378C30.8178 39.0809 29.7978 39.5008 29.2778 40.0208L26.2378 43.0609C24.9978 44.3009 22.9578 44.3009 21.7178 43.0609L18.6778 40.0208C18.1578 39.5008 17.1378 39.0809 16.4178 39.0809H12.1178C10.3578 39.0809 8.91779 37.6407 8.91779 35.8807V31.5809C8.91779 30.8409 8.49779 29.8209 7.97779 29.3209Z" stroke="#D90303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18 30L30 18" stroke="#D90303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M28.989 29H29.007" stroke="#D90303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.989 19H19.007" stroke="#D90303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="tst-right-text">
                        تخفیفات ویژه دارسو
                    </span>    
                </div>
            </div>
        </div>        
        <div class="spdscSliderButtons">
            <div class="spdscSliderButtonR">
                <i class="fa-light fa-chevron-right"></i>
            </div>
            <div class="spdscSliderButtonL">
                <i class="fa-light fa-chevron-left"></i>
            </div>
        </div>
    </section>


    <!-- <div class="special-discount-select-cat">            
        <div class="swiper spdscSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="spdsci active">همه محصولات</a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>گوشی هوشمند</span> <i class="fa-light fa-mobile-notch"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>تبلت و لپتاپ</span> <i class="fa-light fa-tablet"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>هندزفری و هدست</span><i class="fa-light fa-headphones"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>ساعت هوشمند</span> <i class="fa-light fa-watch-smart"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>سیستم صوتی</span> <i class="fa-light fa-computer-speaker"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>گوشی هوشمند</span> <i class="fa-light fa-mobile-notch"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>تبلت و لپتاپ</span> <i class="fa-light fa-tablet"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>هندزفری و هدست</span><i class="fa-light fa-headphones"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>ساعت هوشمند</span> <i class="fa-light fa-watch-smart"></i></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="spdsci"><span>سیستم صوتی</span> <i class="fa-light fa-computer-speaker"></i></a>
                </div>
            </div>
        </div>
    </div> -->


    <section class="child-product-cat">
        <div class="container">         
            
            <div class="child-product-cat-wrapper">
                <div class="child-product-cat-right">
                    <div class="filter-container">
                        <a href="#" class="close"><i class="fa-light fa-xmark"></i></a>
                        <div class="filter-header">
                            <div class="filter-right">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.3333 23.3333H20" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66602 23.3333H2.66602" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M29.334 8.66675H25.334" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9993 8.66675H2.66602" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.33268 19.3333H17.3327C18.7993 19.3333 19.9993 19.9999 19.9993 21.9999V24.6666C19.9993 26.6666 18.7993 27.3333 17.3327 27.3333H9.33268C7.86602 27.3333 6.66602 26.6666 6.66602 24.6666V21.9999C6.66602 19.9999 7.86602 19.3333 9.33268 19.3333Z" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.6667 4.66675H22.6667C24.1333 4.66675 25.3333 5.33341 25.3333 7.33341V10.0001C25.3333 12.0001 24.1333 12.6667 22.6667 12.6667H14.6667C13.2 12.6667 12 12.0001 12 10.0001V7.33341C12 5.33341 13.2 4.66675 14.6667 4.66675Z" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                    
                                <span>فیلتــر کالاها</span>
                            </div>
                            <div class="filter-left">
                                <button class="clear-filters">حذف فیلترها <i class="fa-light fa-xmark"></i></button>
                            </div>
                        </div>

                        <div class="mojodi-toggle">
                            <div class="toggle-available-text">
                                <span>فقط کالاهای موجود</span>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" name="in_stock" <?php echo isset($_GET['in_stock']) ? 'checked' : ''; ?>>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="price-filter-box">
                            <div class="filter-title">
                                <span>فیلتر بر اساس قیمت</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="filter-content">
                                <div class="price-range-container">
                                    <?php
                                    $min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
                                    $max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 100000000;
                                    ?>
                                    <input type="range" min="0" max="100000000" value="<?php echo esc_attr($min_price); ?>" step="100000" id="minRange">
                                    <input type="range" min="0" max="100000000" value="<?php echo esc_attr($max_price); ?>" step="100000" id="maxRange">
                                </div>
                                <div class="price-input-box">
                                    <label>محدوده قیمت از</label>
                                    <div class="price-input">
                                        <span>تومان</span>
                                        <input type="text" id="minPrice" value="<?php echo esc_attr($min_price); ?>">
                                    </div>
                                </div>
                                <div class="price-input-box">
                                    <label>محدوده قیمت تا</label>
                                    <div class="price-input">
                                        <span>تومان</span>
                                        <input type="text" id="maxPrice" value="<?php echo esc_attr($max_price); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="brand-filter-box">
                            <div class="filter-title">
                                <span>برندها</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="filter-content">
                                <form method="get" class="brand-search">

                                    <div class=search-brands>

                                        <button type="submit">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#585858" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 22L20 20" stroke="#585858" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <input type="text" name="brand_search" placeholder="برای مثال سامسونگ" value="<?php echo isset($_GET['brand_search']) ? esc_attr($_GET['brand_search']) : ''; ?>" />
                                        
                                    </div>

                                    <div class="brand-list">
                                        <?php
                                        $brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => false]);
                                        $selected_brands = isset($_GET['brands']) ? (array)$_GET['brands'] : [];
                                        foreach ($brands as $brand) {
                                            $checked = in_array($brand->slug, $selected_brands) ? 'checked' : '';
                                            echo '<label><input type="checkbox" name="brands[]" value="' . esc_attr($brand->slug) . '" ' . $checked . '> ' . esc_html($brand->name) . '</label>';
                                        }
                                        ?>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="child-product-cat-left">
                    <div class="childprocatfiltermobile">
                        <a href="#" class="cpcfb-order">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3473 3.89326L25.214 7.38659C27.4807 8.38659 27.4807 10.0399 25.214 11.0399L17.3473 14.5333C16.454 14.9333 14.9873 14.9333 14.094 14.5333L6.22734 11.0399C3.96068 10.0399 3.96068 8.38659 6.22734 7.38659L14.094 3.89326C14.9873 3.49326 16.454 3.49326 17.3473 3.89326Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 14.6667C4 15.7867 4.84 17.0801 5.86667 17.5334L14.92 21.5601C15.6133 21.8667 16.4 21.8667 17.08 21.5601L26.1333 17.5334C27.16 17.0801 28 15.7867 28 14.6667" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 21.3333C4 22.5733 4.73333 23.6933 5.86667 24.1999L14.92 28.2266C15.6133 28.5333 16.4 28.5333 17.08 28.2266L26.1333 24.1999C27.2667 23.6933 28 22.5733 28 21.3333" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>مرتب سازی</span>
                        </a>
                        <a href="#" class="cpcfb-filter">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.3333 23.3333H20" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.66602 23.3333H2.66602" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M29.334 8.66675H25.334" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.9993 8.66675H2.66602" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.33268 19.3333H17.3327C18.7993 19.3333 19.9993 19.9999 19.9993 21.9999V24.6666C19.9993 26.6666 18.7993 27.3333 17.3327 27.3333H9.33268C7.86602 27.3333 6.66602 26.6666 6.66602 24.6666V21.9999C6.66602 19.9999 7.86602 19.3333 9.33268 19.3333Z" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.6667 4.66675H22.6667C24.1333 4.66675 25.3333 5.33341 25.3333 7.33341V10.0001C25.3333 12.0001 24.1333 12.6667 22.6667 12.6667H14.6667C13.2 12.6667 12 12.0001 12 10.0001V7.33341C12 5.33341 13.2 4.66675 14.6667 4.66675Z" stroke="#D90303" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>  
                            <span>فیلترها</span>
                        </a>

                        <div class="cpcfb-order-items">
                            <a href="#" class="close"><i class="fa-light fa-xmark"></i></a>
                            <?php
                            $sort_options = [
                                'popularity' => 'پرفروش ترین ',
                                'date' => 'جدید ترین ',
                                'price-desc' => 'بیشترین قیمت ',
                                'price' => 'کم ترین قیمت '
                            ];
                            $current_sort = isset($_GET['orderby']) ? $_GET['orderby'] : 'popularity';
                            foreach ($sort_options as $key => $label) {
                                $active = $current_sort === $key ? 'active' : '';
                                echo '<a href="' . esc_url(add_query_arg('orderby', $key)) . '" class="' . $active . '">' . esc_html($label) . '</a>';
                            }
                            ?>
                        </div>
                        <div class="filtermobile-back"></div>
                    </div>

                    <div class="childprocatfilterbox">
                        <div class="cpcfb-right">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3473 3.89326L25.214 7.38659C27.4807 8.38659 27.4807 10.0399 25.214 11.0399L17.3473 14.5333C16.454 14.9333 14.9873 14.9333 14.094 14.5333L6.22734 11.0399C3.96068 10.0399 3.96068 8.38659 6.22734 7.38659L14.094 3.89326C14.9873 3.49326 16.454 3.49326 17.3473 3.89326Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 14.6667C4 15.7867 4.84 17.0801 5.86667 17.5334L14.92 21.5601C15.6133 21.8667 16.4 21.8667 17.08 21.5601L26.1333 17.5334C27.16 17.0801 28 15.7867 28 14.6667" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 21.3333C4 22.5733 4.73333 23.6933 5.86667 24.1999L14.92 28.2266C15.6133 28.5333 16.4 28.5333 17.08 28.2266L26.1333 24.1999C27.2667 23.6933 28 22.5733 28 21.3333" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>مرتب سازی بر اساس</span>
                        </div>
                        <div class="cpcfb-left">
                            <?php
                            foreach ($sort_options as $key => $label) {
                                $active = $current_sort === $key ? 'active' : '';
                                echo '<a href="' . esc_url(add_query_arg('orderby', $key)) . '" class="' . $active . '">' . esc_html($label) . '</a>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="childprocatbox">
                        <?php
                        $meta_query = [];

                        $min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
                        $max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 100000000;
                    

                        if (isset($_GET['in_stock'])) {

                            $meta_query[] = [
                                'key' => '_stock_status',
                                'value' => 'instock',
                            ];
                            
                        }

                        if (isset($_GET['min_price']) && isset($_GET['max_price'])) {

                            $meta_query[] = [
                                'key' => '_price',
                                'value' => [$min_price, $max_price],
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC',
                            ];

                        }

                        $tax_query = [
                            [
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => get_queried_object()->slug,
                            ]
                        ];

                        if (isset($_GET['brands'])) {                
                            $tax_query[] = [
                                'taxonomy' => 'product_brand',
                                'field'    => 'slug',
                                'terms'    => (array) $_GET['brands'],
                            ];
                        }
                        

                        if (!empty($_GET['brand_search'])) {
                            $tax_query[] = [
                                'taxonomy' => 'product_brand',
                                'field'    => 'name',
                                'terms'    => sanitize_text_field($_GET['brand_search']),
                                'operator' => 'LIKE',
                            ];
                        }




                        // $product_args = array(
                        //     'numberposts' => 1000,
                        //     'post_status' => array('publish', 'pending', 'private', 'draft'),
                        //     'post_type' => array('product', 'product_variation'),
                        //     'order' => 'ASC',
                        //         );

                        // $product_args['tax_query'] = array(
                        //     array(
                        //         'taxonomy' => 'product_cat',
                        //         'field' => 'id',
                        //         'terms' => array(13), //vategory IDs
                        //         'operator' => 'IN',
                        // ));
                        // $all_product_n_variation_query = new WP_Query($product_args);

                        // اول همه variationهایی که فروش ویژه دارند رو پیدا می کنیم .
                        $variation_ids_on_sale = get_posts([
                            'post_type'      => 'product_variation',
                            'post_status'    => 'publish',
                            'posts_per_page' => -1,
                            'fields'         => 'ids',
                            'meta_query'     => [
                                [
                                    'key'     => '_sale_price',
                                    'value'   => 0,
                                    'compare' => '>',
                                    'type'    => 'NUMERIC',
                                ],
                            ],
                        ]);

                        // از روی variationها، ID محصولات والد (variable) رو پیدا کن
                        $parent_ids = [];
                        foreach ($variation_ids_on_sale as $variation_id) {
                            $parent_ids[] = wp_get_post_parent_id($variation_id);
                        }
                        $parent_ids = array_unique($parent_ids);

                        // حالا محصولات متغیری که والد اون variationها هستند رو نمایش بده
                        
                        if(!empty($parent_ids)){

                            $args = [
                                'post_type'      => 'product',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'post__in'       => $parent_ids,
                                'meta_query'     => [
                                    [
                                        'key'     => '_stock_status',
                                        'value'   => 'instock',
                                        'compare' => '=',
                                    ],
                                ],
                            ];
                        }
                        else{
                            $args = [];
                        }
                        

                        $query = new WP_Query($args);

                        if (isset($_GET['orderby'])) {
                            switch ($_GET['orderby']) {
                                case 'popularity':
                                    $args['orderby'] = 'meta_value_num';
                                    $args['meta_key'] = 'total_sales';
                                    break;
                                case 'date':
                                    $args['orderby'] = 'date';
                                    $args['order'] = 'DESC';
                                    break;
                                case 'price':
                                    $args['orderby'] = 'meta_value_num';
                                    $args['meta_key'] = '_price';
                                    $args['order'] = 'ASC';
                                    break;
                                case 'price-desc':
                                    $args['orderby'] = 'meta_value_num';
                                    $args['meta_key'] = '_price';
                                    $args['order'] = 'DESC';
                                    break;
                            }
                        }                                                

                        $products = new WP_Query($args);

                        if ($products->have_posts()) :
                            while ($products->have_posts()) : $products->the_post();
                                global $product;

                                if ($product->is_type('variable')) {
                                    $regular_price = $product->get_variation_regular_price('min', true); // min regular price
                                    $sale_price    = $product->get_variation_sale_price('min', true);    // min sale price
                                } else {
                                    $regular_price = $product->get_regular_price();
                                    $sale_price    = $product->get_sale_price();
                                }

                                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'full');
                                $product_image = $product_image ? $product_image[0] : get_template_directory_uri() . '/assets/images/productsample.png';
                                $discount_percentage = $regular_price && $sale_price ? round((($regular_price - $sale_price) / $regular_price) * 100) : 0;

                                ?>
                                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="product-card-2">
                                    <div class="product-card-top">
                                        <div class="pct-img">
                                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                                        </div>
                                        <!-- <div class="pct-bottom">
                                            <span class="pcb-text">
                                                دارســو آف
                                            </span>
                                            <span class="pcb-counter">
                                                14:02:56 
                                            </span>
                                        </div> -->
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="pcb-title-wrapper">
                                            <div class="pcb-cat">
                                                تخفیف ویژه
                                            </div>
                                            <h3>
                                                <?php echo esc_html($product->get_name()); ?>
                                            </h3>
                                        </div>
                                        <div class="pcb-price-wrapper">
                                            <div class="pcb-price-right">

                                                <?php
                                                echo sprintf('<div data-quantity="1" class="%s add-to-card-btn" %s><i class="fa-light fa-cart-shopping"></i></div>',
                                                    esc_url($product->add_to_cart_url()),
                                                    esc_attr(implode(' ', array_filter(array(
                                                        'button', 'product_type_' . $product->get_type(),
                                                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                                        $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                                                    )))),
                                                    wc_implode_html_attributes(array(
                                                        'data-product_id' => $product->get_id(),
                                                        'data-product_sku' => $product->get_sku(),
                                                        'aria-label' => $product->add_to_cart_description(),
                                                        'rel' => 'nofollow',
                                                    )),
                                                    esc_html($product->add_to_cart_text())
                                                );
                                                ?>

                                            </div>
                                            <div class="pcb-price-left">
                                                <?php if ($regular_price && $sale_price): ?>
                                                    <span class="price-before" style="text-decoration: line-through;color: #747474;">
                                                        <?php 
                                                            if($regular_price > $sale_price){
                                                                echo wc_price($regular_price); 
                                                            }
                                                        ?>
                                                    </span>
                                                <?php endif; ?>
                                                <div class="pbc-price-amount">
                                                    <div class="pcb-price">
                                                        <span><?php echo wc_price($sale_price); ?></span>
                                                    </div>
                                                    <?php if ($discount_percentage > 0): ?>
                                                        <div class="pcb-off">
                                                            <span><?php echo $discount_percentage; ?>%</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>' . __('هیچ محصولی یافت نشد.', 'woocommerce') . '</p>';
                        endif;
                        ?>
                    </div>

                    <div class="childprocatpagination">
                        <?php
                        echo paginate_links([
                            'total' => $products->max_num_pages,
                            'current' => max(1, get_query_var('paged')),
                            'format' => '?paged=%#%',
                            'prev_text' => '<i class="fas fa-chevron-right"></i>',
                            'next_text' => '<i class="fas fa-chevron-left"></i>',
                            'type' => 'plain',
                            'add_args' => $_GET,
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
?>
