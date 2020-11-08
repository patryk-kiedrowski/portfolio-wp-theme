<?php 
  $projects = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'project',
    'meta_query' => [
      [
        'key'     => 'featured',
        'value'   => 1,
      ]
    ],
  ));

  $posts = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    'meta_query' => [
      [
        'key'     => 'featured',
        'value'   => 1,
      ]
    ],
  ));
?>

<footer class="footer-wrapper section-wrapper bg-z-1">
  <div class="footer section">
    <div class="footer__row">
      <div class="footer__column footer__column--logo">
        <a href="<?php echo site_url('/'); ?>" class="nav__logo logo-wrapper">
          <div class="logo">
            <div class="logo__piece logo__piece--tr"></div>
            <div class="logo__piece logo__piece--br"></div>
            <div class="logo__piece logo__piece--tl"></div>
            <div class="logo__piece logo__piece--bl"></div>
          </div>
          <span>kiedrowski.dev</span>
        </a>
      </div>

      <div class="footer__column">
        <h3 class="footer__column-heading">wpisy</h3>

        <ul class="footer__column-list">
          <?php while($posts->have_posts()) {
            $posts->the_post();
          ?>
            <li class="footer__column-list-item">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="footer__column-link"><?php the_title(); ?></a>
            </li>
          <?php } wp_reset_postdata(); ?>
        </ul>
      </div>

      <div class="footer__column">
        <h3 class="footer__column-heading">projekty</h3>

        <ul class="footer__column-list">
          <?php while($projects->have_posts()) {
            $projects->the_post();
          ?>
            <li class="footer__column-list-item">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="footer__column-link"><?php the_title(); ?></a>
            </li>
          <?php } wp_reset_postdata(); ?>
        </ul>
      </div>

      <div class="footer__column footer__column--spacer"></div>

      <div class="footer__column">
        <h3 class="footer__column-heading">strony</h3>

        <ul class="footer__column-list">
          <li class="footer__column-list-item">
            <a href="<?php echo site_url('/projects'); ?>" class="footer__column-link">projekty</a>
          </li>

          <li class="footer__column-list-item">
            <a href="<?php echo site_url('/blog'); ?>" class="footer__column-link">blog</a>
          </li>

          <li class="footer__column-list-item">
            <a href="<?php echo site_url('/about'); ?>" class="footer__column-link">o mnie</a>
          </li>

          <li class="footer__column-list-item">
            <a href="<?php echo site_url('/contact'); ?>" class="footer__column-link">kontakt</a>
          </li>
        </ul>
      </div>

      <div class="footer__column">
        <h3 class="footer__column-heading">kontakt</h3>

        <ul class="footer__column-list">
          <li class="footer__column-list-item">
            <p class="footer__column-link">Gdańsk, Polska</p>
          </li>

          <li class="footer__column-list-item">
            <a href="mailto:patkiedr@gmail.com" class="footer__column-link">patkiedr@gmail.com</a>
          </li>

          <li class="footer__column-list-item footer__column-list-item--socials">
            <?php get_template_part('modules/social-media'); ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<?php 
  $isProjects = is_post_type_archive('project') || is_singular('project');
  $isBlog = is_blog() || is_singular('post');
  $isAbout = is_page('about');
  $isContact = is_page('contact');
?>

<!-- BOTTOM NAV -->
<nav class="bottom-nav-wrapper">
  <div class="bottom-nav">
    <ul class="bottom-nav__list">
      <li class="bottom-nav__item <?php if ($isProjects) echo 'active'; ?>">
        <a href="<?php echo site_url('/projects'); ?>" class="bottom-nav__item-anchor">
          <img class="bottom-nav__item-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/projects.svg'); ?>" alt="">

          <p class="bottom-nav__item-text">projekty</p>
        </a>
      </li>

      <li class="bottom-nav__item <?php if ($isBlog) echo 'active'; ?>">
        <a href="<?php echo site_url('/blog'); ?>" class="bottom-nav__item-anchor">
          <img class="bottom-nav__item-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/blog.svg'); ?>" alt="">

          <p class="bottom-nav__item-text">blog</p>
        </a>
      </li>

      <li class="bottom-nav__item <?php if ($isAbout) echo 'active'; ?>">
        <a href="<?php echo site_url('/about'); ?>" class="bottom-nav__item-anchor">
          <img class="bottom-nav__item-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/about.svg'); ?>" alt="">

          <p class="bottom-nav__item-text">o mnie</p>
        </a>
      </li>

      <li class="bottom-nav__item <?php if ($isContact) echo 'active'; ?>">
        <a href="<?php echo site_url('/contact'); ?>" class="bottom-nav__item-anchor">
          <img class="bottom-nav__item-icon icon" src="<?php echo get_theme_file_uri('/assets/icon/contact.svg'); ?>" alt="">

          <p class="bottom-nav__item-text">kontakt</p>
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- END: BOTTOM NAV -->

<?php wp_footer(); ?> 
</body>
</html>