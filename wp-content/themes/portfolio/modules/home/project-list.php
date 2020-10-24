<?php 
  $projects = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'project',
    'meta_query' => [
      'key'     => 'featured',
      'value'   => true,
    ],
  ));
?>

<div class="project-list-wrapper">
  <?php while($projects->have_posts()) {
    $projects->the_post();
  ?>

  <a href="<?php the_permalink(); ?>" class="project-wrapper">
    <article class="project bg-z-0">
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

  <?php } wp_reset_postdata(); ?>
</div>

<div class="btn-container btn-container--center">
  <a href="<?php the_field('projects_button_link'); ?>" class="btn btn--primary btn--full">
    <?php the_field('projects_button_text'); ?>
  </a>
</div>
