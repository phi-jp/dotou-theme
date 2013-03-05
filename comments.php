<?php
// コメント数を取得
$num_comments = 0;
$num_trackbacks = 0;
foreach ( (array) $comments as $comment ) {
    if ( 'comment' != get_comment_type() ){
        $num_trackbacks++;
    }
    else{
        $num_comments++;
    }
}
?>

<h2><?php the_title(); ?>へのコメント(<?php echo $num_comments; ?>件)</h2>
<ul class="unstyled">
    <?php wp_list_comments('callback=custom_comments_list'); ?>
</ul>
<?php
$fields =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author">名前' . ( $req ? '<span class="required">(必須)</span>' : '' ) . '</label>'.
                '<input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>',
    'email'  => '<p class="comment-form-email"><label for="email">メールアドレス' . ( $req ? '<span class="required">(必須)</span>' : '' ) . '</label>'.
                '<input id="inputEmail" name="email" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p>',
    'url'    => '<p class="comment-form-url"><label for="url">ウェブサイト</label>' .
                '<input id="url" name="url" type="text" placeholder="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>',
);
$defaults = array(
    'fields'            => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'     => '<p class="comment-form-comment row-fluid"><label for="comment">コメント</label><textarea class="span9" id="comment" name="comment" rows="5" aria-required="true"></textarea></p>'
);
?>
<div class="form-horizontal">
    <div class="control-group">
        <?php comment_form($defaults); ?>
    </div>
</div>
