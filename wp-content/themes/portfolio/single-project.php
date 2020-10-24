<?php get_header(); ?>

<?php $date = get_the_date('d-m-Y'); ?>

<main class="subpage">
  <section class="section-wrapper">
    <article class="section single-article">
      <header>
        <h1 class="section__heading single-article__heading"><?php the_title(); ?></h1>

        <div class="single-article__metadata">
          <div>
            <p class="single-article__author">
              <?php the_field('category'); ?>
            </p>

            <time class="single-article__date" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
          </div>
        </div>
      </header>

      <img class="single-article__image" src="<?php the_post_thumbnail_url(); ?>" alt="">

      <div class="single-article__row single-article__row--margin">
        <div class="single-article__column single-article__column--grow">
          <h2 class="single-article__small-heading">Użyte technologie:</h2>
          <div class="tag-list">
            <?php foreach(get_field('technologies') as $tech): setup_postdata($post); ?>
              <button class="tag tag--small"><?php echo $tech->post_title; ?></button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="single-article__column single-article__column--auto">
          <h2 class="single-article__small-heading">Zobacz projekt:</h2>

          <div class="tag-list">
            <a href="<?php the_field('live_link'); ?>" target="_blank" class="btn btn--primary btn--small btn--full">Strona</a>
            <a href="<?php the_field('code_link'); ?>" target="_blank" class="btn btn--primary btn--small btn--outline">Kod</a>
          </div>
        </div>
      </div>

      <div id="content" class="wysiwyg">
        <?php the_content(); ?>
      </div>
    </article>
  </section>
</main>

<?php get_footer(); ?>