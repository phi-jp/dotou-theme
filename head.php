<meta charset=UTF-8>
<?php if ( current_theme_supports( 'bp-default-responsive' ) ) : ?><meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php endif; ?>
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
-->



<!-- less start -->
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less" />
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.3.3/less.min.js"></script>
<!-- less end -->

<?php
//  remove_action('wp_head', 'wp_generator');
//  wp_deregister_script('prototype');
//  wp_deregister_script('scriptaculous');
//  wp_deregister_script('jquery');
//  wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '1.8.3');
//  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
//  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  do_action( 'bp_head' );
  wp_head();
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/lib/SocialCount/socialcount.js"></script>


<!-- less.js -->
<script src="<?php bloginfo('template_url'); ?>/js/less-1.3.3.js"></script>

<!-- tmlib.js -->
<script src="https://raw.github.com/phi1618/tmlib.js/0.1.3/build/tmlib.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36228975-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Google Analytics -->
