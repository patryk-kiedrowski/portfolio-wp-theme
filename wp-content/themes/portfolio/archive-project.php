<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper project-list-wrapper">
    <div class="section project-list">
      <header>
        <h1 class="section__heading project-list__heading">Projekty</h1>
      </header>

      <div class="project-list-wrapper">
        <?php while(have_posts()) { the_post(); ?>
          <?php $date = get_the_date('d-m-Y'); ?>
          <a href="<?php the_permalink(); ?>" class="project-wrapper">
            <article class="project bg-z-1">
              <p class="project__category"><?php the_field('category'); ?></p>

              <h3 class="project__title"><?php the_title(); ?></h3>

              <p class="project__excerpt">
                <?php if(get_field('excerpt')) the_field('excerpt'); ?>
              </p>

              <ul class="project__stack-list">
                <?php foreach(get_field('technologies') as $tech): setup_postdata($post); ?>
                  <li class="project__stack-item"><?php echo $tech->post_title; ?></li>
                <?php endforeach; ?>
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