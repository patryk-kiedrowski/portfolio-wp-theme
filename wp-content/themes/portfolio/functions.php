<?php

require('custom-fields.php');
require('ext/class-remove-actions.php');

function css_and_scripts() {
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
    'main-script-defer', 
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

add_action('wp_enqueue_scripts', 'css_and_scripts');

function change_default_jquery( ){
  wp_dequeue_script( 'jquery');
  wp_deregister_script( 'jquery');   
}

add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

function smartwp_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 

add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/**
* Add async or defer attributes to script enqueues
* @author Mike Kormendy
* @param  String  $tag     The original enqueued <script src="...> tag
* @param  String  $handle  The registered unique name of the script
* @return String  $tag     The modified <script async|defer src="...> tag
*/
// only on the front-end
if(!is_admin()) {
  function add_asyncdefer_attribute($tag, $handle) {
    // if the unique handle/name of the registered script has 'async' in it
    if (strpos($handle, 'async') !== false) {
        // return the tag with the async attribute
        return str_replace( '<script ', '<script async ', $tag );
    }
    // if the unique handle/name of the registered script has 'defer' in it
    else if (strpos($handle, 'defer') !== false) {
        // return the tag with the defer attribute
        return str_replace( '<script ', '<script defer ', $tag );
    }
    // otherwise skip
    else {
        return $tag;
    }
  }
  add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
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

function auto_id_headings( $content ) {

	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link"><img class="icon" src="' . get_theme_file_uri('/assets/icon/link.svg') . '" alt=""></a>';
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $heading_link . $matches[4];
		endif;

		return $matches[0];
	}, $content );

    return $content;

}

add_filter( 'the_content', 'auto_id_headings' );

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

?>