<header id="header" class="cf">
  <div class="header_content cf">
    <hgroup>
      <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?><!--HOME--></a></h1>
      <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
    <nav class="global_nav">
      <ul class="cf">
        <li>
          <form method="get" action="<?php bloginfo('url'); ?>/">
            <input type="text" name="s">
            <input type="submit" value="検索">
          </form>
        </li>
        <li><a href="<?php echo home_url( '/' ); ?>wp-login.php">ログイン</a></li>
      </ul>
    </nav>
  </div>
  <div class="lang_nav">
    <nav>
      <ul>
        <?php
        $allCategory = get_terms( "category", "fields=all&get=all" );
        foreach($allCategory as $value):
          if($value->parent == 0){ ?>
            <li><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a></li>
            <?php }
        endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
