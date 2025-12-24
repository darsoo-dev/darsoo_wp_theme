<?php get_header('blog'); ?>

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

            <div class="newest-blogs-wrapper">
                <div class="nb-right">

                    <div class="blog-cards-wrapper">


                        <?php while ( have_posts() ) : the_post(); ?>

                            <a href="<?php the_permalink(); ?>" class="blog-card-item">
                                <div class="blog-card">
                                    <div class="blog-card-image-container">
                                        <div class="blog-image-link">
                                            <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail();
                                                } else { ?>
                                                    <img src="<?php echo get_template_directory_uri() . '/img/0.jpg'; ?>">
                                                <?php }; ?>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blog-title">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="blog-description">
                                          <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                        </p>
                                        <div class="blog-footer">
                                            <span class="blog-link">
                                                <span>مشاهده</span>
                                                <i class="fa-light fa-arrow-left"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        <?php endwhile; 
                        wp_reset_postdata();
                        ?>

                    </div>

                    <div class="blog-pagination">                                                

                        <?php echo paginate_links(array(
                            'next_text' => '>',
                            'prev_text' => '<'
                        )); ?>

                    </div>

                
                </div>
              
            </div>

        </section> 
    </div>

<?php get_footer(); ?>

