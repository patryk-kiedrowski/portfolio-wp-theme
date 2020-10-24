<?php 
  $homepage = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => 17
  ));

  while($homepage->have_posts()) {
    $homepage->the_post();

    $contact_text = get_field('contact_text');
    $contact_form = get_field('form');
  } 
  
  wp_reset_postdata();
?>

<div class="contact">
  <div class="contact__data">
    <p class="contact__description">
      <?php echo $contact_text; ?>
    </p>

    <address class="contact__location">
      <img class="contact__location-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/location.svg'); ?>" alt="">
      <span class="contact__location-text">Gdańsk, Polska</span>
    </address>

    <a href="mailto:patkiedr@gmail.com" class="contact__email">
      <img class="contact__email-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/email-alt.svg'); ?>" alt="">
      <span class="contact__email-text">patkiedr@gmail.com</span>
    </a>

    <?php get_template_part('modules/social-media'); ?>
  </div>

  <div class="contact__form">
    <?php echo $contact_form; ?>
  </div>
</div>
