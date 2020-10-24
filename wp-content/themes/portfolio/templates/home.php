<?php
/*
  Template name: Strona główna
  Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="home">
  <?php get_template_part('modules/home/hero'); ?> 

  <section class="section-wrapper projects-section-wrapper bg-z-1">
    <div class="section projects-section">
      <header>
        <h2 class="section__heading projects-section__heading"><?php the_field('projects_heading'); ?></h2>
      </header>

      <?php get_template_part('modules/home/project-list'); ?>
    </div>
  </section>

  <?php get_template_part('modules/home/technologies'); ?>

  <section class="section-wrapper blog-list-wrapper section-wrapper--bottom-mob">
    <div class="section blog-list">
      <header>
        <h2 class="section__heading blog-list__heading"><?php the_field('blog_heading'); ?></h2>
      </header>

      <?php get_template_part('modules/home/blog-list'); ?>
    </div>
  </section>

  <section class="section-wrapper contact-section-wrapper">
    <div class="section contact-section">
      <header>
        <h2 class="section__heading contact-section__heading"><?php the_field('contact_heading'); ?></h2>
      </header>

      <?php get_template_part('modules/contact'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
