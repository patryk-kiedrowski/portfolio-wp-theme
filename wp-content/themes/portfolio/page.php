<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper">
    <article class="section single-article">
      <header>
        <h1 class="section__heading"><?php the_title(); ?></h1>
      </header>

      <div id="content" class="wysiwyg">
        <?php the_content(); ?>
      </div>
    </article>
  </section>
</main>

<?php get_footer(); ?>