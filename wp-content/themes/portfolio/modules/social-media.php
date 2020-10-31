<?php 
  $links = new WP_Query(array(
    'post_type' => 'social-media'
  ));
?>

<div class="socials-wrapper">
  <?php while($links->have_posts()) {
    $links->the_post();
  ?>

  <a class="social" href="<?php the_field('link'); ?>" target="_blank" rel="noopener nofollow">
    <img class="social__logo icon" src="<?php the_field('light_icon'); ?>" alt="<?php the_field('alt_text'); ?>">
  </a>

  <?php } wp_reset_postdata(); ?>
</div>
