<section class="section-wrapper hero-wrapper">
  <div class="section hero">
    <div class="hero__texts">
      <header>
        <h1 class="hero__heading"><?php the_field('hero_heading'); ?></h1>

        <p class="hero__text">
          <?php the_field('hero_subheading'); ?>
        </p>
      </header>

      <div class="hero__button-wrapper">
        <a href="<?php the_field('full_button_link'); ?>" class="btn btn--primary btn--full">
          <?php the_field('full_button_text'); ?>
        </a>
        <a href="<?php the_field('outline_button_link'); ?>" class="btn btn--primary btn--outline">
          <?php the_field('outline_button_text'); ?>
        </a>
      </div>
    </div>

    <div class="hero__image">
      <div class="hero__circle one"></div>
      <div class="hero__circle two"></div>
      <div class="hero__circle three"></div>
    </div>
  </div>
</section>