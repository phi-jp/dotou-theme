<?php
global $pageSlug;
?>
<?php get_header(); ?>


<div id="content">
  <div class="padder">

    <?php do_action( 'bp_before_blog_home' ); ?>

    <?php do_action( 'template_notices' ); ?>

    <div class="page cf" id="blog-latest" role="main">

      <?php

      // echo $pageSlug;
      // echo get_post_type();
      if(is_home()){
        get_template_part( "page/home" );
      }
      else if(is_page()){
        if($pageSlug === "login"){
          get_template_part( "page/login" );
        }
        else if($pageSlug === "contact"){
          get_template_part( "page/contact" );
        }
        else{
          get_template_part( "page/page" );
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
    </div>

    <?php do_action( 'bp_after_blog_home' ); ?>

  </div><!-- .padder -->
</div><!-- #content -->

<?php get_footer(); ?>
