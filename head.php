
<meta charset=UTF-8>
<title><?php bloginfo('name'); ?></title>


<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/font/fontello/css/fontello.css" />

<style>
    @import url("<?php bloginfo('stylesheet_url'); ?>");
</style>

<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<script>
    // TODO: Javascript
</script>

<!-- css start -->
<!--
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
-->
<!-- css end -->

<!-- less start -->
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/tmlib.less" />
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/less/less-1.3.0.min.js"></script>
<!-- less end -->

<!-- prettify -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/prettify/prettify.js"></script>
<!-- prettify -->

<!-- tm scroller -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/plugins/tmlib/tm.scroller.js"></script>
<!-- tm scroller -->

<!--[if IE]>
<style>
    @import url("<?php bloginfo('template_url'); ?>/ie-style.css");
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>

