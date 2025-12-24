<?php

    get_header();
    $current_term = get_queried_object();
    $base_url = get_term_link($current_term);

    if ( is_wp_error($base_url)) {
        global $wp;
        $base_url = home_url( add_query_arg( [], $wp->request) );
    }

?>

<main>
    <section class="child-product-cat">
        <div class="container">

            <section class="newest-blogs">
                <div class="top-sections-title" style="margin:40px 0;">
                    <div class="tst-right">
                        <div class="bar"></div>
                        <div class="tst-rigth-icon">
                            <i class="fa-light fa-folder-magnifying-glass"></i>
                        </div>
                        <span class="tst-right-text">
                            نتایج جستجو برای :<?php the_search_query(); ?>
                        </span>    
                    </div>
                </div>
            </section>

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
                                <form method="get" class="brand-search" action="<?php echo esc_url($base_url); ?>">
                                    <div class="search-brands">
                                        <button type="submit">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#585858" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 22L20 20" stroke="#585858" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <input type="text" name="brand_search" placeholder="برای مثال سامسونگ" value="<?php echo isset($_GET['brand_search']) ? esc_attr($_GET['brand_search']) : ''; ?>" />
                                    </div>
                                    <?php
                                    if ( ! empty($_GET) ) {
                                        foreach ( $_GET as $k => $v ) {
                                            if ( in_array( $k, ['brand_search','paged'], true ) ) continue;
                                            if ( is_array($v) ) {
                                                foreach ( $v as $v2 ) {
                                                    echo '<input type="hidden" name="'.esc_attr($k).'[]" value="'.esc_attr($v2).'">';
                                                }
                                            } else {
                                                echo '<input type="hidden" name="'.esc_attr($k).'" value="'.esc_attr($v).'">';
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="paged" value="1">
                                    <div class="brand-list">
                                        <?php
                                        $brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => false]);
                                        $selected_brands = isset($_GET['brands']) ? (array)$_GET['brands'] : [];
                                        foreach ($brands as $brand) {
                                            $checked = in_array($brand->slug, $selected_brands, true) ? 'checked' : '';
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
                                'date'       => 'جدید ترین ',
                                'price-desc' => 'بیشترین قیمت ',
                                'price'      => 'کم ترین قیمت ',
                                'stock'      => 'موجودی',
                            ];
                            $current_sort = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'popularity';

                            $qs_base = $_GET; unset($qs_base['paged']);
                            foreach ($sort_options as $key => $label) {
                                $active = $current_sort === $key ? 'active' : '';
                                $href = add_query_arg( array_merge( $qs_base, ['orderby' => $key] ), $base_url );
                                echo '<a href="' . esc_url( $href ) . '" class="' . $active . '">' . esc_html($label) . '</a>';
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
                                $href = add_query_arg( array_merge( $qs_base, ['orderby' => $key] ), $base_url );
                                echo '<a href="' . esc_url( $href ) . '" class="' . $active . '">' . esc_html($label) . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="childprocatbox">

                        <?php

                        global $wp_query;

                        $search_term = get_search_query();
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        $args = array(
                            'post_type' => 'product',
                            's' => $search_term,
                            'posts_per_page' => 12,
                            'paged'   => $paged,
                            'orderby' => array(
                                'meta_value' => 'ASC',
                                'date'       => 'DESC'
                            ),
                            'order'      => 'DESC',
                            'meta_key'   => '_stock_status',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key'     => '_stock_status',
                                    'compare' => 'EXISTS',
                                ),
                                array(
                                    'key' => '_stock_status',
                                    'compare' => 'NOT EXISTS',
                                )
                            )
                        );
                        
                        
                        // فقط جستجو روی عنوان محصول
                        add_filter( 'posts_search', function($search, $wp_query) {
                            global $wpdb;
                        
                            $search_term = get_search_query();
                            if (empty($search_term)) return $search;
                        
                            $words = explode(' ', $search_term); // جدا کردن کلمات سرچ
                            $search_parts = [];
                        
                            foreach ($words as $word) {
                                $word = trim($word);
                                if ($word) {
                                    $search_parts[] = $wpdb->prepare("{$wpdb->posts}.post_title LIKE %s", '%' . $wpdb->esc_like($word) . '%');
                                }
                            }
                        
                            if (!empty($search_parts)) {
                                $search = " AND (" . implode(' AND ', $search_parts) . ") ";
                            }
                        
                            return $search;
                        }, 10, 2 );

                        
                        $product_query = new WP_Query( $args );

                        if ( $product_query->have_posts() ) :
                            while ( $product_query->have_posts() ) : $product_query->the_post();
                                global $product;

                                if ( ! $product ) {
                                    $product = wc_get_product( get_the_ID() );
                                }

                                if ( $product->is_type('variable') ) {
                                    $regular_price = $product->get_variation_regular_price('min', true);
                                    $sale_price    = $product->get_variation_sale_price('min', true);
                                } else {
                                    $regular_price = $product->get_regular_price();
                                    $sale_price    = $product->get_sale_price();
                                }

                                $discount_percentage = $regular_price && $sale_price
                                    ? round((($regular_price - $sale_price) / $regular_price) * 100)
                                    : 0;
                                ?>

                                <a href="<?php the_permalink();?>" class="product-card-2">
                                    <div class="product-card-top">
                                        <div class="pct-img">
                                            <?php echo woocommerce_get_product_thumbnail(); ?>
                                        </div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="pcb-title-wrapper">
                                            <h3><?php the_title(); ?></h3>
                                        </div>

                                        <?php if ( $product->is_in_stock() ) : ?>
                                            <div class="pcb-price-wrapper">
                                                <div class="pcb-price-right">
                                                    <span class="add-to-card-btn">
                                                        <i class="fa-light fa-cart-shopping"></i>
                                                    </span>
                                                </div>
                                                <div class="pcb-price-left">
                                                    <?php if ( $product->is_on_sale() ) : ?>
                                                        <span class="price-before" style="text-decoration: line-through;color: #747474;">
                                                            <?php echo wc_price( $regular_price ); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <div class="pbc-price-amount">
                                                        <div class="pcb-price">
                                                            <span>
                                                                <?php echo $sale_price ? wc_price( $sale_price ) : wc_price( $regular_price ); ?>
                                                            </span>
                                                        </div>

                                                        <?php if ( $discount_percentage > 0 ): ?>
                                                            <div class="pcb-off">
                                                                <span><?php echo $discount_percentage; ?>%</span>
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
                            <?php endwhile; ?>                            
                        <?php else : ?>
                            <p><?php esc_html_e( 'هیچ محصولی یافت نشد.', 'woocommerce' ); ?></p>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>

                    </div>

                    <div class="childprocatpagination">

                        <?php echo paginate_links(array(
                            'total' => $product_query->max_num_pages,
                            'current' => max(1, $paged),
                            'next_text' => '>',
                            'prev_text' => '<'
                        )); ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
