<?php get_header(); ?>

<?php 
  function getReadingTime($input) {
    $words = count(explode(' ', $input));
    $wordsPerMinute = 200;
    $time = ceil($words / $wordsPerMinute);

    return $time;
  } 

  $date = get_the_date('d-m-Y');
?>

<main class="subpage">
  <section class="section-wrapper single-article-wrapper">
    <article class="section single-article">
      <header>
        <h1 class="section__heading single-article__heading"><?php the_title(); ?></h1>

        <div class="single-article__metadata">
          <div class="single-article__metadata-image-wrapper">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 64 ); ?>
          </div>

          <div>
            <p class="single-article__author">
              <?php the_author(); ?>
            </p>

            <div class="single-article__metadata-text-wrapper">
              <time class="single-article__date" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>

              <p class="single-article__reading-time"><?php echo getReadingTime(get_the_content()); ?> min czytania</p>
            </div>
          </div>
        </div>
      </header>

      <img class="single-article__image" src="<?php the_post_thumbnail_url(); ?>" alt="">

      <!-- TODO: -->
      <!-- <?php if(get_the_excerpt()) { ?>
        <p class="single-article__excerpt">
          <?php the_excerpt(); ?>
        </p>
      <?php } ?>  -->

      <div id="content" class="single-article__content">
        <?php the_content(); ?>
      </div>

      <ul class="single-article__tags">
        <?php the_tags('<li class="tag">', '</li><li class="tag">'); ?>
      </ul>

      <!--
        TODO:
        - udostępnianie
        - podobne artykuły / następny poprzedni
        - sidebar
       -->

       <div class="comments-container">
         <div class="comments">
           <?php comments_template(); ?>
         </div>
       </div>
    </article>
  </section>
</main>

<?php get_footer(); ?>
