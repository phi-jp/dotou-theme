<!DOCTYPE html>

<html class="<?php echo getBrowser(); ?>">
<head>
  <?php get_template_part('head'); ?>
</head>

<body <?php body_class(); ?>>
<a class="reload_btn" href="">確認用更新</a>
<?php get_header(); ?>
<!-- content -->
  <?php
  $pageSlug = getSlug($page_id);
  if(is_home()){
    get_template_part( "page/home" );
  }
  else if(is_page()){
    switch ($pageSlug) {
      case 'list':
        get_template_part( "page/".$pageSlug."" );
        break;
      case 'login':
        get_template_part( "page/".$pageSlug."" );
        break;
      default:
        get_template_part( "page/page" );
        break;
    }
  }
  else if(is_single()){
    if(get_post_type() === "news"){
      get_template_part( "single/news" );
    }
    else{
      get_template_part( "single/single" );
    }
  }
  else if(is_archive()){
    //echo get_post_type();
    if(get_post_type() === "news"){
      get_template_part( "archive/news" );
    }
    else{
      get_template_part( "archive/archive" );
    }
  }
  else if(is_search()){
    get_template_part( "archive/search" );
  }
  else if(is_404()){
    get_template_part( "page/404" );
  }
  else{
    echo "other";
  }
  ?>
<!-- content end -->
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
