<?php
get_header('blog');
?>

<div class="container">

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
                    // Display the archive title (e.g., category name)
                    the_archive_title();
                    ?>
                </span>    
            </div>
        </div>

        <div class="newest-blogs-wrapper">
            <div class="nb-right" style="width:100%">

                <div class="blog-cards-wrapper">

                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-card-item" style="width:24%">
                                <div class="blog-card">
                                    <div class="blog-card-image-container">
                                        <a href="<?php the_permalink(); ?>" class="blog-image-link">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'medium', array( 'class' => 'blog-image', 'alt' => get_the_title() ) ); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_theme_file_uri( 'assets/images/blog-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" class="blog-image" />
                                            <?php endif; ?>
                                        </a>
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
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html(mb_strlen(get_the_title()) > 70 ? mb_substr(get_the_title(),0,70).'...': get_the_title()); ?>
                                            </a>
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
                                            <a class="blog-link" href="<?php the_permalink(); ?>">
                                                <span>مشاهده</span>
                                                <i class="fa-light fa-arrow-left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'هیچ پستی یافت نشد.', 'your-theme-text-domain' ); ?></p>
                    <?php endif; ?>

                </div>

                <div class="blog-pagination">
                    <?php
                    the_posts_pagination( array(
                        'prev_text' => '<i class="fas fa-chevron-right"></i>',
                        'next_text' => '<i class="fas fa-chevron-left"></i>',
                        'mid_size'  => 2,
                        'screen_reader_text' => __( 'پیمایش پست‌ها', 'your-theme-text-domain' ),
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