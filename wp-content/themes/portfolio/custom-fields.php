<?php 

function custom_post_types() {
  // PROJEKTY
  register_post_type('project', array(
    'supports' => array('title', 'editor', 'thumbnail'),
    'show_in_rest' => true,
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Projekty',
      'add_new_item' => 'Dodaj projekt',
      'add_new' => 'Dodaj projekt',
      'new_item' => 'Nowa projekt',
      'edit_item' => 'Edytuj projekt',
      'all_items' => 'Wszystkie projekty',
      'singular_name' => 'Projekt'
    ),
    'rewrite' => array(
      'slug' => 'projects',
      'with_front' => false
    ),
    'menu_icon' => 'dashicons-portfolio'
    )
  );

  // PROJEKTY
  register_post_type('skill', array(
    'supports' => array('title'),
    'show_in_rest' => true,
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Technologie',
      'add_new_item' => 'Dodaj technologię',
      'add_new' => 'Dodaj technologię',
      'new_item' => 'Nowa technologia',
      'edit_item' => 'Edytuj technologię',
      'all_items' => 'Wszystkie technologie',
      'singular_name' => 'Technologia'
    ),
    'menu_icon' => 'dashicons-list-view'
    )
  );

  // SOCIAL MEDIA
  register_post_type('social-media', array(
    'supports' => array('title'),
    'show_in_rest' => true,
    'has_archive' => false,
    'public' => true,
    'labels' => array(
      'name' => 'Social Media',
      'add_new_item' => 'Dodaj link',
      'add_new' => 'Dodaj link',
      'new_item' => 'Nowy link',
      'edit_item' => 'Edytuj link',
      'all_items' => 'Wszystkie linki',
      'singular_name' => 'Social Media Link'
    ),
    'menu_icon' => 'dashicons-share'
    )
  );
}

add_action('init', 'custom_post_types');