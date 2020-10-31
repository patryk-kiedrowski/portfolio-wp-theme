<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Projektowanie i programowanie responsywnych stron internetowych">
  <meta name="keywords" content="Patryk Kiedrowski, Kiedrowski, Front-End, Web developer, strona internetowa, responsywna, mobilna, strona">
  <meta name="theme-color" content="#000000" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta property="og:locale" content="pl_PL">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Patryk Kiedrowski - Front-End Developer">
  <meta property="og:description" content="Projektowanie i programowanie responsywnych stron internetowych">

  <title><?php bloginfo('name'); ?></title>
  <?php wp_head();?>
</head>
<body>
  <div id="scroll-indicator" class="nav-scroll-indicator"></div>

  <!-- NAV -->
  <?php 
    function is_blog () {
      return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
    }

    $isProjects = is_post_type_archive('project') || is_singular('project');
    $isBlog = is_blog() || is_singular('post');
    $isAbout = is_page('about');
    $isContact = is_page('contact');
  ?>
  <nav class="nav-wrapper">
    <div class="nav section">
      <a href="<?php echo site_url('/'); ?>" class="nav__logo">kiedrowski.dev</a>

      <div class="nav__link-wrapper">
        <ul class="nav__link-list">
          <li class="nav__link-item">
            <a href="<?php echo site_url('/projects'); ?>" class="nav__link-anchor <?php if ($isProjects) echo 'active'; ?>">projekty</a>
          </li>
          <li class="nav__link-item">
            <a href="<?php echo site_url('/blog'); ?>" class="nav__link-anchor <?php if ($isBlog) echo 'active'; ?>">blog</a>
          </li>
          <li class="nav__link-item">
            <a href="<?php echo site_url('/about'); ?>" class="nav__link-anchor <?php if ($isAbout) echo 'active'; ?>">o mnie</a>
          </li>
          <li class="nav__link-item">
            <a href="<?php echo site_url('/contact'); ?>" class="nav__link-anchor <?php if ($isContact) echo 'active'; ?>">kontakt</a>
          </li>
        </ul>

        <button id="dark-mode-toggle" class="nav__mode-toggle">
          <img class="dark-theme" src="<?php echo get_theme_file_uri('/assets/icon/light-mode.svg'); ?>" alt="Turn on light mode">
          <img class="light-theme" src="<?php echo get_theme_file_uri('/assets/icon/dark-mode.svg'); ?>" alt="Turn on dark mode">
        </button>
      </div>
    </div>
  </nav>
  <!-- END: NAV -->
