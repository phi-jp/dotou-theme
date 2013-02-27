
<meta charset=UTF-8>
<title><?php bloginfo('name'); ?></title>


<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/font/fontello/css/fontello.css" />

<!-- css start -->
<!--
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
-->
<!-- css end -->

<!-- less start -->
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/less/less-1.3.0.min.js"></script>
<!-- less end -->

<!-- prettify -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.js"></script>
<!-- prettify -->

<!-- tmlib.js -->
<script src="https://raw.github.com/phi1618/tmlib.js/0.1.3/build/tmlib.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

<!-- tm scroller -->
<!--<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/tmlib/tm.scroller.js"></script>-->
<!-- tm scroller -->

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

<!--[if IE]>
<style>
  @import url("<?php bloginfo('template_url'); ?>/ie-style.css");
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>