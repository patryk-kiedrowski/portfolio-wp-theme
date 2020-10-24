<?php 
  $advanced_skills = get_field('advanced_skills');
  $intermediate_skills = get_field('intermediate_skills');
  $beginner_skills = get_field('beginner_skills');
?>

<section class="section-wrapper technologies-wrapper">
  <div class="section technologies">
    <header>
      <h2 class="section__heading technologies__heading"><?php the_field('technologies_heading'); ?></h2>
    </header>

    <div class="technologies__list-wrapper">
      <div class="technologies__advancement">
        <h3 class="technologies__list-heading"><?php the_field('advanced_heading'); ?></h3>

        <ul class="technologies__list">
          <?php foreach($advanced_skills as $post) { 
            setup_postdata($post); 
          ?>
            <li class="technologies__item"><?php the_title(); ?></li>
          <?php } wp_reset_postdata(); ?>
        </ul>
      </div>

      <div class="technologies__advancement">
        <h3 class="technologies__list-heading"><?php the_field('intermediate_heading'); ?></h3>

        <ul class="technologies__list">
          <?php foreach($intermediate_skills as $post) { 
            setup_postdata($post); 
          ?>
            <li class="technologies__item"><?php the_title(); ?></li>
          <?php } wp_reset_postdata(); ?>
        </ul>
      </div>

      <div class="technologies__advancement">
        <h3 class="technologies__list-heading"><?php the_field('beginner_heading'); ?></h3>

        <ul class="technologies__list">
          <?php foreach($beginner_skills as $post) { 
            setup_postdata($post); 
          ?>
            <li class="technologies__item"><?php the_title(); ?></li>
          <?php } wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </div>
</section>
