
<meta charset=UTF-8>
<title><?php bloginfo('name'); ?></title>


<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/font/fontello/css/fontello.css" />

<style>
    @import url("<?php bloginfo('stylesheet_url'); ?>");
</style>

<!-- css start -->
<!--
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
-->
<!-- css end -->

<!-- less start -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/lib/bootstrap/css/bootstrap.css" />
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/tmlib.less" />
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/lib/SocialCount/less/socialcount.min.less" />
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less" />
<?php
if(is_single()){
  echo '<link rel="stylesheet/less" type="text/css" href="'.get_bloginfo('template_url').'/less/single.less" />';
}
else if(is_page()){
  echo '<link rel="stylesheet/less" type="text/css" href="'.get_bloginfo('template_url').'/less/page.less" />';
}
else if(is_archive() || is_404()){
  echo '<link rel="stylesheet/less" type="text/css" href="'.get_bloginfo('template_url').'/less/archive.less" />';
}
?>

<script>
    // TODO: Javascript
</script>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- jQuery -->

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/less/less-1.3.0.min.js"></script>
<!-- less end -->

<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/bootstrap.min.js"></script>

<!-- prettify -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.js"></script>
<!-- prettify -->

<!-- tm scroller -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/tmlib/tm.scroller.js"></script>
<!-- tm scroller -->

<!-- SocialCount -->
<script src="<?php bloginfo('template_url'); ?>/lib/SocialCount/socialcount.js"></script>
<!-- SocialCount -->

<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

<!--[if IE]>
<style>
    @import url("<?php bloginfo('template_url'); ?>/ie-style.css");
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>

