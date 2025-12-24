<?php
if (is_page('my-account')) {
    get_header('account');
} elseif (is_page('blog')) {
    get_header('blog');
} else {
    get_header();
}
?>

  <?php
  if ( have_posts() ) :
      while ( have_posts() ) : the_post();
          the_content();
      endwhile;
  endif;
  ?>

<?php
if (is_page('my-account')) {
    get_footer('account'); 
} else {
    get_footer(); 
}
?>