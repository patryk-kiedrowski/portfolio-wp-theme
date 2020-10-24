<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper blog-list-wrapper">
    <div class="section blog-list">
      <header>
        <h1 class="section__heading blog-list__heading"><?php echo get_the_archive_title(); ?></h1>
      </header>

      <div class="blog-list-wrapper">
        <?php while(have_posts()) { the_post(); ?>
          <?php $date = get_the_date('d-m-Y'); ?>
          <a href="<?php the_permalink(); ?>" class="blog-entry-wrapper">
            <article class="blog-entry bg-z-1">
              <time datetime="<?php echo $date; ?>" class="blog-entry__category"><?php echo $date; ?></time>

              <h3 class="blog-entry__title"><?php the_title(); ?></h3>

              <p class="blog-entry__excerpt">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum eros et sollicitudin interdum. In nisi dui, auctor vel consectetur vitae, fermentum ullamcorper leo.
              </p>

              <ul class="blog-entry__stack-list">
                <li class="blog-entry__stack-item">Angular</li>
                <li class="blog-entry__stack-item">RxJS</li>
                <li class="blog-entry__stack-item">HTML</li>
                <li class="blog-entry__stack-item">SCSS</li>
              </ul>
            </article>
          </a>
        <?php } ?>
      </div>

      <!--
        TODO:
        - paginacja
      -->
    </div>
  </section>
</main>

<?php get_footer(); ?>