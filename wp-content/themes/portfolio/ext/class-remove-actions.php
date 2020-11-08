<?php

class ZymRemoveActions {

  function __construct() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    remove_action('wp_head', 'wp_shortlink_wp_head');

    add_action('do_feed', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_rdf', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_rss', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_rss2', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_atom', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_rss2_comments', [$this, 'wpb_disable_feed'], 1);
    add_action('do_feed_atom_comments', [$this, 'wpb_disable_feed'], 1);

    if (is_user_logged_in()) {
      add_action('get_header', [$this, 'remove_admin_login_header']);
      add_action('wp_before_admin_bar_render', [$this, 'admin_bar_render']);
      add_action('customize_register', [$this, 'remove_view_css_section'], 15);
      add_action('admin_bar_menu', [$this, 'remove_admin_bar_opts'], 999);
    }
  }

  function wpb_disable_feed() {
    wp_redirect(home_url_defined());
  }

  function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }

  function admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
  }

  function remove_view_css_section($wp_customize) {
    $wp_customize->remove_section('custom_css');
  }

  function remove_admin_bar_opts() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('new-link');
    $wp_admin_bar->remove_node('new-media');
    $wp_admin_bar->remove_node('customize');
  }

}

new ZymRemoveActions();
