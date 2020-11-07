<?php 
  $posts = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'post'
  ));
?>

<div class="blog-list-wrapper">
  <?php while($posts->have_posts()) {
    $posts->the_post();
    $date = get_the_date('d-m-Y');
    $tags = get_the_tags();
  ?>

  <a href="<?php the_permalink(); ?>" class="blog-entry-wrapper" aria-label="<?php the_title(); ?>">
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

  <?php } wp_reset_postdata(); ?>
</div>

<div class="btn-container btn-container--center">
  <a href="<?php the_field('blog_button_link'); ?>" class="btn btn--primary btn--full">
    <?php the_field('blog_button_text'); ?>
  </a>
</div>
