<?php get_header(); ?>

<main class="subpage">
  <section class="section-wrapper blog-list-wrapper">
    <div class="section blog-list">
      <header>
        <h1 class="section__heading blog-list__heading">Strona nie istnieje [&nbsp;<span class="primary-text">404</span>&nbsp;]</h1>
      </header>

      <div id="content" class="wysiwyg">
        <p>
          Strona, której szukasz, nie istnieje. Wróć na stronę główną, albo poczytaj moje wpisy na blogu :)
        </p>
        <p>&nbsp;</p>
      </div>

      <div class="btn-container">
        <a href="<?php echo site_url('/'); ?>" class="btn btn--primary btn--full">Strona główna</a>
        <a href="<?php echo site_url('/blog'); ?>" class="btn btn--primary btn--outline">Blog</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>