<?php
function custom_comments_list($comment, $args, $depth){
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class('comment-body'); ?>>
<div class="clearfix">
    <div class="comment-img pull-left"><?php echo get_avatar($comment, 50); ?></div>
    <div class="pull-left">
        <span><?php comment_author_link() ?> の発言</span>
        <span class="comment-date">(<?php comment_date(__('Y/m/d G:i')) ?>)</span>
        <div class="comment-text"><?php comment_text() ?></div>

        <div class="comment-metadata">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'reply_text' => '返信', 'before' => '<button class="btn">', 'after' => '</button>') ) ); ?>
            <?php if(function_exists("qc_comment_edit_link")){ _e(' | '); qc_comment_edit_link(); } ?>
            <?php edit_comment_link(__('編集'), ' | ', ''); ?>
        </div>
    </div>
</div>
<?php
}
