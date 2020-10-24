<?php

require('custom-fields.php');

function css_and_scripts() {
  //ładowanie CSS
  
  wp_enqueue_style(
    'wp-style-file',
    get_template_directory_uri().'/style.css'
  );

  wp_enqueue_style(
    'main-styles',
    get_template_directory_uri().'/dist/style.css'
  );

  wp_enqueue_style(
    'material-icons',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    false
  );
  
  //ładowanie skryptów
  wp_enqueue_script(
    'main-script', 
    get_template_directory_uri().'/dist/bundle.js', 
    'main',
    false,
    true
  );

  wp_enqueue_script(
    'dark-mode',
    get_template_directory_uri().'/dark-mode.js'
  );
}

function custom_comments($comment, $args, $depth) {
  $GLOBALS[' comment '] = $comment; ?>

  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="single-comment-container">
      <div class="author-avatar-container">
        <?php echo get_avatar($comment, $size='96', $default ); ?>
      </div>
      
      <div class="author-date-comment-container">
        <p class="author-date">
          <?php printf (__('<span class="comment-author-name">%s</span>'), get_comment_author_link()) ?>
          <span class="comment-date">
            <a href="<?php echo htmlspecialchars( get_comment_link($comment->comment_ID )) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time() ) ?> 
            </a>
          </span>
        </p>
        
        <p class="comment-text">
          <?php comment_text() ?>
        </p>
        
        <p class="edit-own-comment"><?php edit_comment_link(__(' edytuj '), '   ', ' ') ?></p>
        
        <div class="reply">
          <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))) ?>   
        </div>
        
        <?php if ($comment->comment_approved =='0') : ?>
        <em><?php _e('Komentarz oczekuje na zatwierdzenie przez moderatora.') ?> </em>
        <br />
        <?php endif ; ?>
        
      </div>
  <?php    
}

register_nav_menus(array(
'top-nav' => 'Gorne menu strony'
));

register_sidebar( array(
  'name' => 'sidebar-right',
  'description' => 'Panel boczny',
  'before_title' => '<h1 class="sidebar-header">',
  'after_title' => '</h1>'
));

add_theme_support('post-thumbnails');

add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));

add_action('wp_enqueue_scripts', 'css_and_scripts');
?>