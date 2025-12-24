<?php
/**
 * Template Name: main blog Cat
 */
get_header('blog');
?>

    <section class="main-blog-slider-wrapper desktop">

        <div class="swiper mainBlogSlider">
            <div class="swiper-wrapper">
               <?php
                if (have_rows('main_blog_slider','option')):
                    while (have_rows('main_blog_slider','option')) : the_row();
                    $imageurl = get_sub_field('main_blog_slider_image_item','option');
                    $link = get_sub_field('add_main_blog_slider_link','option');   
                    $title = get_sub_field('add_main_blog_slider_title','option');                   
                ?>
                <div class="swiper-slide mbs-item-wrapper">
                    <div class="blog-slide-item" style="background-image: url(<?php echo $imageurl; ?>);"></div>
                    <div class="mbs-content-wrapper">
                        <a href="<?php echo $link; ?>">
                            <h3><?php echo $title; ?></h3>
                        </a>
                    </div>
                    <div class="mbs-overlay"></div>                    
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>       

    </section>



    <section class="main-blog-slider-wrapper phone">

        <div class="swiper mainBlogSlider">
            <div class="swiper-wrapper">
               <?php
                if (have_rows('main_blog_slider_phone','option')):
                    while (have_rows('main_blog_slider_phone','option')) : the_row();

                    $imageurlphone = get_sub_field('main_blog_slider_phone_image_item','option');
                    $linkphone = get_sub_field('add_main_blog_slider_phone_link','option');            
                    $titlephone = get_sub_field('add_main_blog_slider_phone_title','option');            
                ?>
                <div class="swiper-slide mbs-item-wrapper">
                    <div class="blog-slide-item" style="background-image: url(<?php echo $imageurlphone; ?>);"></div>
                    <div class="mbs-content-wrapper">
                        <a href="<?php echo $linkphone; ?>">
                            <h3><?php echo $titlephone; ?></h3>
                        </a>
                    </div>
                    <div class="mbs-overlay"></div>                    
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>       

    </section>






    <div class="container">

        <!-- <section class="top-blogs-slider-wrapper">

            <div class="top-sections-title">
                <div class="tst-right">
                    <div class="bar"></div>
                    <div class="tst-rigth-icon">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M43.3204 20.879L41.3604 29.239C39.6804 36.459 36.3604 39.379 30.1204 38.779C29.1204 38.699 28.0404 38.519 26.8804 38.239L23.5204 37.439C15.1804 35.459 12.6004 31.339 14.5604 22.979L16.5204 14.599C16.9204 12.899 17.4004 11.419 18.0004 10.199C20.3404 5.35904 24.3204 4.05904 31.0004 5.63904L34.3404 6.41904C42.7204 8.37904 45.2804 12.519 43.3204 20.879Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M30.1207 38.7792C28.8807 39.6192 27.3207 40.3192 25.4207 40.9392L22.2607 41.9792C14.3207 44.5392 10.1407 42.3992 7.56068 34.4592L5.00068 26.5592C2.44068 18.6192 4.56068 14.4192 12.5007 11.8592L15.6607 10.8192C16.4807 10.5592 17.2607 10.3392 18.0007 10.1992C17.4007 11.4192 16.9207 12.8992 16.5207 14.5992L14.5607 22.9792C12.6007 31.3392 15.1807 35.4592 23.5207 37.4392L26.8807 38.2392C28.0407 38.5192 29.1207 38.6992 30.1207 38.7792Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M25.2812 17.0605L34.9812 19.5205" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M23.3203 24.8008L29.1203 26.2808" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <span class="tst-right-text">
                        مطالب پیشنهادی برای شما
                    </span>    
                </div>
            </div>

            <div class="swiper topBlogSlider">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-card-item">
                            <div class="blog-card">
                                <div class="blog-card-image-container">
                                    <a href="#" class="blog-image-link">
                                    <img
                                        src="assets/images/blogimage.jpg"
                                        alt="Blog Image"
                                        class="blog-image"
                                    />
                                    </a>
                                    <div class="blog-tags">
                                    <a href="#"> برترین قابلیت گوشی هوشمند </a>
                                    <a href="#"> برترین قابلیت گوشی هوشمند </a>
                                    <a href="#"> تبلت های نسل جدید </a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blog-title">
                                    <a href="#">قابلیت برترین گوشی هوشمند آیفون و تاثیر آن بر کیفیت عکس و تولید محتوا!</a>
                                    </h2>
                                    <p class="blog-description">
                                    چنانچه قصد دارید در حوزه‌ی کسب و کارهای اینترنتی فعالیت کنید باید بدانید که..
                                    </p>
                                    <div class="blog-footer">
                                    <div class="blog-date">
                                        <i class="fa-light fa-calendar"></i>
                                        <span>1403/04/16</span>
                                    </div>
                                    <div class="blog-time">
                                        <i class="fa-thin fa-book-open-cover"></i>
                                        <span>10 دقیقه</span>
                                    </div>
                                    <a class="blog-link" href="#">
                                        <span>مشاهده</span>
                                        <i class="fa-light fa-arrow-left"></i>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </section> -->

        <section class="newest-blogs">

            <div class="top-sections-title set-margin">
                <div class="tst-right">
                    <div class="bar"></div>
                    <div class="tst-rigth-icon">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M44 33.48V9.34C44 6.94 42.04 5.16 39.66 5.36H39.54C35.34 5.72 28.96 7.86 25.4 10.1L25.06 10.32C24.48 10.68 23.52 10.68 22.94 10.32L22.44 10.02C18.88 7.8 12.52 5.68 8.32 5.34C5.94 5.14 4 6.94 4 9.32V33.48C4 35.4 5.56 37.2 7.48 37.44L8.06 37.52C12.4 38.1 19.1 40.3 22.94 42.4L23.02 42.44C23.56 42.74 24.42 42.74 24.94 42.44C28.78 40.32 35.5 38.1 39.86 37.52L40.52 37.44C42.44 37.2 44 35.4 44 33.48Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24 10.98V40.98" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5 16.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 22.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="tst-right-text">
                        <?php
                        the_archive_title();
                        ?>
                    </span>    
                </div>
            </div>

            <div class="newest-blogs-wrapper">
                <div class="nb-right" style="width:100%">

                    <div class="blog-cards-wrapper">
                        <?php
                           $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

                            if (is_page() && !$paged) {
                                $paged = get_query_var('page') ? intval(get_query_var('page')) : 1;
                            }

                            $recent_posts = new WP_Query(array(
                                'post_type'      => 'post',
                                'posts_per_page' => 12,
                                'paged'          => $paged, 
                            ));
                            if ($recent_posts->have_posts()) :
                                while ($recent_posts->have_posts()) : $recent_posts->the_post(); 
                            ?>
                                <div class="blog-card-item" style="width:24%">

                                    <a href="<?php the_permalink(); ?>" class="blog-card">
                                        <div class="blog-card-image-container">
                                            <div class="blog-image-link">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'blog-image', 'alt' => get_the_title() ) ); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_theme_file_uri( 'assets/images/blog-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" class="blog-image" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="blog-tags">
                                                <?php
                                                $tags = get_the_tags();
                                                if ( $tags ) :
                                                    foreach ( $tags as $tag ) :
                                                        ?>
                                                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h2 class="blog-title">
                                                <?php echo esc_html(mb_strlen(get_the_title()) > 70 ? mb_substr(get_the_title(),0,70).'...': get_the_title()); ?>
                                            </h2>
                                            <div class="blog-footer">
                                                <div class="blog-date">
                                                    <i class="fa-light fa-calendar"></i>
                                                    <span>
                                                        <?php
                                                        // Format date in Persian (requires WP Jalali or similar)
                                                        if ( function_exists( 'jdate' ) ) {
                                                            echo jdate( 'Y/m/d', strtotime( get_the_date() ) );
                                                        } else {
                                                            echo get_the_date( 'Y/m/d' );
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="blog-link">
                                                    <span>مشاهده</span>
                                                    <i class="fa-light fa-arrow-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php esc_html_e( 'هیچ پستی یافت نشد.', 'your-theme-text-domain' ); ?></p>
                        <?php endif; ?>

                    </div>

                    <div class="blog-pagination">           
                        <?php
                            echo paginate_links( array(
                                'total'   => $recent_posts->max_num_pages,
                                'current' => $paged,
                                'prev_text' => '<i class="fas fa-chevron-right"></i>',
                                'next_text' => '<i class="fas fa-chevron-left"></i>',
                                'mid_size'  => 2,
                            ) );
                        ?>
                    </div>

                </div>
            </div>

        </section> 

    </div>


<?php
    get_footer();
?>