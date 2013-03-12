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

<?php }

function user_comment_form( $args = array(), $post_id = null ) {
    global $id;

    if ( null === $post_id )
        $post_id = $id;
    else
        $id = $post_id;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
        'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
                    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );

    $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
    $defaults = array(
        'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), '<br /><code>' . allowed_tags() . '</code>' ) . '</p>',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_submit'         => '',
        'title_reply'          => __( 'Leave a Reply' ),
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Post Comment' ),
    );

    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

    ?>
        <?php if ( comments_open( $post_id ) ) : ?>
            <?php do_action( 'comment_form_before' ); ?>
            <div id="respond">
                <h3 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
                <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
                    <?php echo $args['must_log_in']; ?>
                    <?php do_action( 'comment_form_must_log_in_after' ); ?>
                <?php else : ?>
                    <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
                        <?php do_action( 'comment_form_top' ); ?>
                        <?php if ( is_user_logged_in() ) : ?>
                            <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                            <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                        <?php else : ?>
                            <?php echo $args['comment_notes_before']; ?>
                            <?php
                            do_action( 'comment_form_before_fields' );
                            foreach ( (array) $args['fields'] as $name => $field ) {
                                echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                            }
                            do_action( 'comment_form_after_fields' );
                            ?>
                        <?php endif; ?>
                        <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
                        <?php echo $args['comment_notes_after']; ?>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="<?php echo esc_attr( $args['class_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                            <?php comment_id_fields( $post_id ); ?>
                        </p>
                        <?php do_action( 'comment_form', $post_id ); ?>
                    </form>
                <?php endif; ?>
            </div><!-- #respond -->
            <?php do_action( 'comment_form_after' ); ?>
        <?php else : ?>
            <?php do_action( 'comment_form_comments_closed' ); ?>
        <?php endif; ?>
    <?php
}


function get_jsdoit_id($post_id = null) {
    if ( null === $post_id ) $post_id = $id;
    else $id = $post_id;

    return get_post_meta($post_id, 'jsdoit', true);
}

function get_jsdoit_view($post_id = null) {
    if ( null === $post_id ) $post_id = $id;
    else $id = $post_id;

    $jsdoitView = get_post_meta( $post_id, 'jsdoit_thumbnail', true);
    if (!$jsdoitView) {
        $jsdoitView = 'Screenshot';
    }

    $map = array(
        'Auto play'     => 'play',
        'Screenshot'    => 'screenshot',
        'Readme'        => '',
        'JavaScript'    => 'javascript',
        'HTML'          => 'html',
        'CSS'           => 'css',
    );

    return $map[$jsdoitView];
}

function jsdoit_link($post_id = null) {
    if ( null === $post_id ) $post_id = $id;
    else $id = $post_id;

    $jsdoitID   = get_jsdoit_id($post_id);
    $jsdoitView = get_jsdoit_view($post_id);
    echo 'http://jsdo.it/blogparts/'.$jsdoitID.'/js?width=465&height=521&view='.$jsdoitView;
}

function jsdoit_thumbnail_url($post_id = null) {
    if ( null === $post_id ) $post_id = $id;
    else $id = $post_id;

    $jsdoitID = get_jsdoit_id($post_id);

    echo 'http://jsdo-it-static-contents.s3.amazonaws.com/images/capture/'.$jsdoitID[0].'/'.$jsdoitID[1].'/'.$jsdoitID[2].'/'.$jsdoitID.'.jpg';
}


// ソーシャルのシェアアイコンを取得
function getSNS($link){ ?>
<ul class="socialcount" data-url="<?php echo $link ?>" data-counts="true">
    <li class="twitter">
        <a href="https://twitter.com/intent/tweet?text=<?php echo $link ?>" title="Share on Twitter"><i class="icon-twitter-bird"></i><span class="count">Tweet</span></a>
    </li>
    <li class="facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link ?>" title="Share on Facebook"><i class="icon-facebook-rect"></i><span class="count">Like</span></a>
    </li>
    <li class="hatebu">
        <a href="" title="Share on HatenaBookmark"><i class="icon-vkontakte-rect-1"></i><span class="count">Hatena</span></a>
    </li>
    <li class="googleplus">
        <a href="https://plus.google.com/share?url=<?php echo $link ?>" title="Share on Google Plus"><i class="icon-googleplus-rect-1"></i><span class="count">+1</span></a>
    </li>
</ul>
<?php }


// デバック用
function pr($val){
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}


/*
 * テーマオプション
 */
// テーマオプション機能追加
require_once 'lib/theme-options/theme-options.php';

// テーマオプションのキーネーム
function getThemeOptionsKeyName(){
    return 'dotou_option';
}

// テーマオプションから言語のリストを取得
function getLanguageList(){
    $key_name = getThemeOptionsKeyName();
    $options = get_option( 'dotou_theme_options' );
    return explode( "\n", $options[$key_name] );
}

// 特定の言語を取得
function getLanguage($langage){
    $list = getLanguageCategory();
    return $list[$langage];
}

// 言語のカテゴリを取得
function getLanguageCategory(){
    $options = get_option( 'dotou_theme_options' );
    $list_category = array("_syuren", "_tanren", "_jukuren");
    $list = getLanguageList();
    $data = array();
    foreach ($list as $key => $value) {
        $value = trim($value);
        $array_key = getThemeOptionsKeyName()."_".$value;
        $tmp = array();
        foreach ($list_category as $key2 => $value2) {
            array_push($tmp, explode( "\n", $options[$array_key.$value2] ));
        }
        $data[$value] = $tmp;
    }

    return $data;
}

// 言語の章を取得
function getLanguageChapter($language, $num){
    $list = getLanguage($language);
    return $list[$num];
}
