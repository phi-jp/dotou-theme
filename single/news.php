<div id="content">
  <div class="padder">
    <div class="row-fluid">
      <div class="span8">
        <?php do_action( 'bp_before_blog_single_post' ); ?>
        <div class="page" id="blog-single" role="main">
          <?php /* main loop */
          $paged = get_query_var('paged');
          if(have_posts()): while(have_posts()):the_post();
            $title = get_the_title();
            $link = get_permalink();
            $date = get_the_time('Y/m/d');
            $cat = get_the_category(); $cat = $cat[0];
            ?>
            <article class="entry">
              <header class="post_header">
                <div class="meta clearfix">
                  <h1 class="post_title"><?php echo $title; ?></h1>
                  <time><?php echo $date; ?></time>
                </div>
                <div class="clearfix">
                  <?php getSNS($link); ?>
                </div>
              </header>
              <div class="post cf">
                <div class="content"><?php the_content(); ?></div>
              </div>
            </article>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <div class="span4 well">
        <?php get_template_part( "side/news" ); ?>
      </div>
    </div><!-- row -->
  </div><!-- .padder -->
</div><!-- #content -->
