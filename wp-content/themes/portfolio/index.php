<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper blog-list-wrapper">
    <div class="section blog-list">
      <header>
        <h1 class="section__heading blog-list__heading">Blog</h1>
      </header>

      <div class="blog-list-wrapper">
        <?php while(have_posts()) { the_post(); ?>
          <?php 
            $date = get_the_date('d-m-Y'); 
            $tags = get_the_tags();
          ?>
          <a href="<?php the_permalink(); ?>" class="blog-entry-wrapper">
            <article class="blog-entry bg-z-1">
              <time datetime="<?php echo $date; ?>" class="blog-entry__category"><?php echo $date; ?></time>

              <h3 class="blog-entry__title"><?php the_title(); ?></h3>

              <p class="blog-entry__excerpt">
                <?php if(get_field('excerpt')) the_field('excerpt'); ?>
              </p>

              <ul class="blog-entry__stack-list">
                <?php 
                  foreach($tags as $tag) {
                    echo '<li class="blog-entry__stack-item">' . $tag->name . '</li>';
                  } 
                ?>
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