<?php
global $pageSlug;
?>
<!DOCTYPE html>

<html>
<head>
  <?php get_template_part('head'); ?>
</head>
<?php
$pageSlug = getSlug($page_id);
$body_class = "";
if(checkEmEn($pageSlug)){ $body_class =  $pageSlug; };
?>
<body <?php body_class($body_class); ?> id="bp-default">
<?php do_action( 'bp_before_header' ); ?>

<header class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
      <div class="nav-collapse">
        <ul class="nav">
          <li><a href="<?php echo home_url(); ?>/about">About</a></li>
          <?php
          $list = get_categories();
          ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">List<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php
              foreach ($list as $key => $value) {
                if($value->parent == 0){
                  echo '<li><a href="'.get_bloginfo('home').'/'.$value->slug.'/'.$value->slug.'-shuren" title="'.$value->cat_name.''.$value->cat_name.'">'.$value->cat_name.'</a></li>';
                }
              }
              ?>
            </ul>
          </li>
          <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
        </ul>

        <ul class="nav pull-right" id="main-menu-right">
        <!--
          <li>
            <form class="navbar-searc" method="get" action="<?php bloginfo('url'); ?>/">
              <input class="search-query" type="text" name="s">
              <input type="submit" value="検索">
            </form>
          </li>
          <li class="divider-vertical"></li>
          <?php
          $user = wp_get_current_user();
          if( is_user_logged_in() ){ ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url( '/' ); ?>user/<?php echo $user->user_nicename; ?>"><?php echo $user->user_nicename; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $user->user_nicename; ?>">Profile</a></li>
              <li><a class="button logout" href="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e( 'Log Out', 'buddypress' ); ?></a></li>
            </ul>
          <?php
          }
          else{
            printf( __( '<li><a class="register" href="%s" title="Create an account">新規登録</a></li>', 'buddypress' ), bp_get_signup_page() ); ?>
            <li><a href="<?php echo home_url( '/' ); ?>login/">ログイン</a></li>
          <?php } ?>
            </ul>
          </li>
        -->
        </ul>
      </div>
    </div>
  </div>
</header>
<!--
<header class="navbar navbar-fixed-top" id="header">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
      <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a href="<?php echo home_url(); ?>/about">about</a></li>
          <?php
          $list = get_categories();
          ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">list<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php
              foreach ($list as $key => $value) {
                if($value->parent == 0){
                  echo '<li><a href="'.get_bloginfo('home').'/'.$value->slug.'/'.$value->slug.'-shuren" title="'.$value->cat_name.''.$value->cat_name.'">'.$value->cat_name.'</a></li>';
                }
              }
              ?>
            </ul>
          </li>
          <li><a href="<?php echo home_url(); ?>/contact">contact</a></li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li>
            <form class="navbar-searc" method="get" action="<?php bloginfo('url'); ?>/">
              <input class="search-query" type="text" name="s">
              <input type="submit" value="検索">
            </form>
          </li>
          <li class="divider-vertical"></li>
          <?php
          $user = wp_get_current_user();
          if( is_user_logged_in() ){ ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url( '/' ); ?>user/<?php echo $user->user_nicename; ?>"><?php echo $user->user_nicename; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $user->user_nicename; ?>">Profile</a></li>
              <li><a class="button logout" href="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e( 'Log Out', 'buddypress' ); ?></a></li>
            </ul>
          <?php
          }
          else{
            printf( __( '<li><a class="register" href="%s" title="Create an account">新規登録</a></li>', 'buddypress' ), bp_get_signup_page() ); ?>
            <li><a href="<?php echo home_url( '/' ); ?>login/">ログイン</a></li>
          <?php } ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <?php do_action( 'bp_header' ); ?>
</header>
-->

<?php do_action( 'bp_after_header'     ); ?>
<?php do_action( 'bp_before_container' ); ?>

<div class="container" id="container">
  <div class="row">
