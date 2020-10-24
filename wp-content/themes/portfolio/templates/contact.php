<?php
/*
  Template name: Kontakt
  Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper">
    <div class="section">
      <header>
        <h1 class="section__heading"><?php the_title(); ?></h1>
      </header>

      <?php get_template_part('/modules/contact'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>