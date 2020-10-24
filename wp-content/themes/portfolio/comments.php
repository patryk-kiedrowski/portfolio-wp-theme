<h2 id="comments">
  Komentarze
</h2>

<?php
  $fields = [
    'author' => '<div class="comments__row comments__row--author-data"><div class="comment-form-author">' . '<input id="author" class="contact-form-field" name="author" type="text" placeholder="Podpis*" value="' . esc_attr( $commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
    
    'email' => '<div class="comment-form-email">' . '<input id="email" class="contact-form-field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="Email*" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
  ];
  
  $args = [
    'class_submit' => 'btn btn--primary btn--full',
    'label_submit' => __('Skomentuj'),
    'comment_field' =>  '<div class="comments__row comments__row--message"><div class="col comment-form-comment"><textarea id="comment" class="contact-textarea" name="comment" placeholder="Treść komentarza*" aria-required="true">' . '</textarea></div></div>',
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_notes_before' => '',
  ];
?>

<ul class="comments__list">
  <?php wp_list_comments('callback=custom_comments'); ?>
</ul>

<?php comment_form($args); ?>
