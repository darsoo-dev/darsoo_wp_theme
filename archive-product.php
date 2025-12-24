<?php get_header(); ?>

<main>
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
                                'taxonomy' => 'product_brand',
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

                        $paged = max(1, get_query_var('paged'), get_query_var('page'));
                        $ppp   = get_option('posts_per_page'); 

                        $args = [
                            'post_type'      => 'product',
                            'tax_query'      => $tax_query,
                            'meta_query'     => $meta_query,
                            'post_status'    => 'publish',
                            'posts_per_page' => $ppp,
                            'paged'          => $paged,
                        ];

                        $args['meta_key'] = '_stock_status';
                        $args['orderby']  = [
                            'meta_value' => 'ASC',
                        ];


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


                        // کوئری اصلی
                        $products = new WP_Query($args);

                        $GLOBALS['wp_query'] = $products;

                        
                        // کوئری شمارش کل برای paginate_links
                        $count_args = $args;
                        $count_args['posts_per_page'] = -1;
                        $count_args['fields'] = 'ids';
                        $count_args['paged'] = 0;
                        $count_q = new WP_Query($count_args);

                        $total_products = count($count_q->posts);

                        $total_pages = ceil($total_products / $ppp);


                        if ($products->have_posts()) :
                            while ($products->have_posts()) : $products->the_post();
                                global $product;
                                ?>
                                <a href="<?php the_permalink(); ?>" class="product-card-2">
                                    <div class="product-card-top">
                                        <div class="pct-img">
                                            <?php echo woocommerce_get_product_thumbnail(); ?>
                                        </div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="pcb-title-wrapper">
                                            <div class="pcb-cat">
                                                <?php echo esc_html(get_queried_object()->name); ?>
                                            </div>
                                            <h3><?php the_title(); ?></h3>
                                        </div>


                                        <?php if ($product->is_in_stock()) : ?>

                                            <div class="pcb-price-wrapper">
                                                <div class="pcb-price-right">
                                                    <div class="add-to-card-btn">
                                                        <i class="fa-light fa-cart-shopping"></i>
                                                    </div>
                                                </div>
                                                <div class="pcb-price-left">
                                                    <?php if ($product->is_on_sale()) : ?>
                                                        <span class="price-before">
                                                            <?php echo wc_price($product->get_regular_price()); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <div class="pbc-price-amount">
                                                        <div class="pcb-price">
                                                            <span><?php echo wc_price($product->get_price()); ?></span>
                                                        </div>
                                                        <?php if ($product->is_on_sale()) : ?>
                                                            <div class="pcb-off">
                                                                <span><?php echo esc_html(round(($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price() * 100)) . '%'; ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php else: ?>

                                            <div class="pcb-price-wrapper" style="margin-top: 30px;justify-content: center;">
                                                <div class="pcb-price-left">
                                                    <div class="pbc-price-amount">
                                                        <div class="pcb-price">
                                                            <span style="color:#df2d2d">ناموجود</span>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endif; ?>

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

                        $pagination = paginate_links([
                            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'format'    => '',
                            'current'   => max(1, $paged),
                            'total'     => $total_pages,
                            'prev_text' => '<i class="fas fa-chevron-right"></i>',
                            'next_text' => '<i class="fas fa-chevron-left"></i>',
                        ]);

                        if ($pagination) {

                            $pagination = preg_replace('/<a[^>]*?class="page-numbers"[^>]*?>\s*' . $total_pages . '\s*<\/a>/', '', $pagination);                            
                            echo '<div class="childprocatpagination">' . $pagination . '</div>';      

                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
        $term = get_queried_object();
        $term_name = esc_html($term->name);
        $term_description = term_description($term->term_id, $term->taxonomy);

        if ( $term_description ) :
    ?>

    <section class="topProCatDescription">
        <div class="container">
            <div class="topProCatDescription-wrapper">
                
                <div class="tpcd-content">
                    <h1><?php echo $term_name; ?></h1>
                    <?php echo wp_kses_post($term_description); ?>
                </div>                

                <div class="tpcd-button">
                    <div class="tpcd-button-content">
                        <span class="tpcd-button-text">مشاهده بیشتر</span>
                        <i class="fa-light fa-chevron-down tpcd-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>



</main>


<?php get_footer(); ?>