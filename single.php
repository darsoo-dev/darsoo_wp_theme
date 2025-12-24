<?php
    get_header('blog');
?>
<div class="container">
    <section class="single-blog-wrapper">
        <!-- Breadcrumb -->
        <section class="breadcrumb-product">
            <ul class="breadcrumb-list">
                <?php echo do_shortcode('[rank_math_breadcrumb]'); ?>
            </ul>
        </section>

        <!-- Featured Image -->
        <section class="single-image-wrapper">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php the_title(); ?>" />
            <?php endif; ?>
        </section>

        <div class="newest-blogs mt-set">
            <div class="newest-blogs-wrapper">
                <div class="nb-right">
                    <div class="single-right-content">
                        <div class="src-top">
                            <h1><?php the_title(); ?></h1>

                            <div class="src-meta">
                                <span><i class="fa-light fa-calendar"></i><?php echo get_the_date( 'Y/m/d' ); ?></span>
                            </div>

                            <p><?php echo wp_trim_words( get_the_excerpt(), 40 ); ?></p>

                            <div class="src-meta bottom">
                                <span class="social-share"><i class="fa-light fa-user-large"></i> توسط: <?php the_author(); ?></span>
                                <span class="social-share">اشتراک گذاری: 
                                    <a href="https://www.instagram.com/share/?url=<?php the_permalink(); ?>"><i class="fab fa-instagram"></i></a>
                                    <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>"><i class="fab fa-whatsapp"></i></a>
                                    <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><i class="fa-light fa-paper-plane"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="single-content">
                            <?php the_content(); ?>
                        </div>

                        <!--Comments Section -->
                        <?php if ( comments_open() || get_comments_number() ) : ?>
                            <div class="comments-section">                               
                                <div class="comments-content">    
                                    
                                    <div class="comments-form">
                                        <?php
                                            comments_template();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="nb-left">
                    <!-- Table of Contents -->
                    <div class="top-sections-title blog-sidebar-title-style">
                        <div class="tst-right">
                            <div class="bar"></div>
                            <div class="tst-rigth-icon">
                                <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M44 33.48V9.34C44 6.94 42.04 5.16 39.66 5.36H39.54C35.34 5.72 28.96 7.86 25.4 10.1L25.06 10.32C24.48 10.68 23.52 10.68 22.94 10.32L22.44 10.02C18.88 7.8 12.52 5.68 8.32 5.34C5.94 5.14 4 6.94 4 9.32V33.48C4 35.4 5.56 37.2 7.48 37.44L8.06 37.52C12.4 38.1 19.1 40.3 22.94 42.4L23.02 42.44C23.56 42.74 24.42 42.74 24.94 42.44C28.78 40.32 35.5 38.1 39.86 37.52L40.52 37.44C42.44 37.2 44 35.4 44 33.48Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M24 10.98V40.98" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.5 16.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17 22.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <span class="tst-right-text">آنچه در این مطلب می خوانید</span>
                        </div>
                    </div>

             

                    <div class="blog-sidebar-content-title">
                        <?php
                        $content = apply_filters( 'the_content', get_the_content() );
                        
                        preg_match_all('/<h[2-6](?:\s+[^>]*)?>(.*?)<\/h[2-6]>/i', $content, $headings);
                        
                        if ( ! empty( $headings[1] ) ) {
                            foreach ( $headings[1] as $index => $heading ) {
                                $clean_heading = wp_strip_all_tags( $heading );
                                $heading_id = sanitize_title( $clean_heading );
                                ?>
                                <a href="#<?php echo esc_attr( $heading_id ); ?>" <?php echo ( $index === 0 ) ? 'class="active"' : ''; ?>>
                                    <?php echo esc_html( $clean_heading ); ?>
                                </a>
                                <?php
                            }
                        } else {
                            echo '<p>هیچ عنوانی در این مطلب یافت نشد.</p>';
                        }
                        ?>
                    </div>

                    <!-- Categories -->
                    <div class="top-sections-title blog-sidebar-title-style">
                        <div class="tst-right">
                            <div class="bar"></div>
                            <div class="tst-rigth-icon">
                                <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.3473 3.89326L25.214 7.38659C27.4807 8.38659 27.4807 10.0399 25.214 11.0399L17.3473 14.5333C16.454 14.9333 14.9873 14.9333 14.094 14.5333L6.22734 11.0399C3.96068 10.0399 3.96068 8.38659 6.22734 7.38659L14.094 3.89326C14.9873 3.49326 16.454 3.49326 17.3473 3.89326Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 14.6667C4 15.7867 4.84 17.0801 5.86667 17.5334L14.92 21.5601C15.6133 21.8667 16.4 21.8667 17.08 21.5601L26.1333 17.5334C27.16 17.0801 28 15.7867 28 14.6667" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 21.3333C4 22.5733 4.73333 23.6933 5.86667 24.1999L14.92 28.2266C15.6133 28.5333 16.4 28.5333 17.08 28.2266L26.1333 24.1999C27.2667 23.6933 28 22.5733 28 21.3333" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <span class="tst-right-text">دسته بندی</span>
                        </div>
                    </div>

                    <div class="blog-sidebar-cats">
                        <?php
                        $categories = get_categories();
                        foreach ( $categories as $category ) :
                            ?>
                            <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo esc_html( $category->name ); ?></a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Related Posts -->
                    <div class="top-sections-title blog-sidebar-title-style set-margin-tb">
                        <div class="tst-right">
                            <div class="bar"></div>
                            <div class="tst-rigth-icon">
                                <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M44 33.48V9.34C44 6.94 42.04 5.16 39.66 5.36H39.54C35.34 5.72 28.96 7.86 25.4 10.1L25.06 10.32C24.48 10.68 23.52 10.68 22.94 10.32L22.44 10.02C18.88 7.8 12.52 5.68 8.32 5.34C5.94 5.14 4 6.94 4 9.32V33.48C4 35.4 5.56 37.2 7.48 37.44L8.06 37.52C12.4 38.1 19.1 40.3 22.94 42.4L23.02 42.44C23.56 42.74 24.42 42.74 24.94 42.44C28.78 40.32 35.5 38.1 39.86 37.52L40.52 37.44C42.44 37.2 44 35.4 44 33.48Z" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M24 10.98V40.98" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.5 16.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17 22.98H11" stroke="#D90303" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <span class="tst-right-text">مقالات مرتبط</span>
                        </div>
                    </div>

                    <div class="blog-sidebar-items">
                        <?php
                        $related_posts = get_posts( array(
                            'category__in' => wp_get_post_categories( get_the_ID() ),
                            'numberposts'  => 5,
                            'post__not_in' => array( get_the_ID() ),
                        ) );
                        if ( $related_posts ) :
                            foreach ( $related_posts as $post ) :
                                setup_postdata( $post );
                                ?>
                                <div class="blog-sidebar-card-item">
                                    <div class="card-content">
                                        <div class="image-section">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'phone-image', 'alt' => get_the_title() ) ); ?></a>
                                            <?php else : ?>
                                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/squaer-blog-ph.png" alt="<?php the_title(); ?>" class="phone-image"></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-section">
                                            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                            <div class="icons">
                                                <span><i class="fa-light fa-user-large"></i><?php the_author(); ?></span>
                                                <span><i class="fa-light fa-calendar"></i><?php echo get_the_date( 'Y/m/d' ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>

