<?php
if(is_user_logged_in()) {
  $user = wp_get_current_user();
  $url = get_bloginfo('home')."/user/".$user->user_nicename;
//  wp_redirect( $url, 302 );
//  exit();
  ?>
  <script type="text/javascript">
    function reDirect(){
      top.location.href="<?php echo $url; ?>";
    }
    reDirect();
  </script>
  <?php
}
else{
  ?>
<div class="well">

  <?php do_action( 'bp_before_sidebar_login_form' ); ?>

  <?php if ( bp_get_signup_allowed() ) : ?>

<div class="register_box cf">
  <div class="register_header">
    <h2>ログイン</h2>
    <p id="login-text">アカウントを取得していない場合は先に<strong><?php printf( __( '<a href="%s" title="Create an account">取得</a>', 'buddypress' ), bp_get_signup_page() ); ?></strong>しよう。</p>
  </div>

  <?php endif; ?>

  <div class="normal_login">
    <form name="login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ); ?>" method="post">
      <label><?php _e( 'Username', 'buddypress' ); ?><br />
        <input type="text" name="log" id="sidebar-user-login" class="input" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>" tabindex="97" /></label>

      <label><?php _e( 'Password', 'buddypress' ); ?><br />
        <input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="98" /></label>

      <?php do_action( 'bp_sidebar_login_form' ); ?>
      <div class="submit clearfix">
        <span class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="99" /> <?php _e( 'Remember Me', 'buddypress' ); ?></label></span>
        <div class="button_group">
          <input class="btn" type="reset" name="reset" value="Cancel" />
          <input class="btn" type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e( 'Log In', 'buddypress' ); ?>" tabindex="100" />
          <input type="hidden" name="testcookie" value="1" />
        </div>
      </div>
    </form>
  </div>

  <div class="sns_login">
    <h4>その他のサービスでログイン</h4>
    <?php do_action( 'login_form' ); // Wordpress hook ?>
  </div>

  <?php do_action( 'bp_after_sidebar_login_form' ); ?>
</div>
</div>

<?php
}
?>
