<header id="header" class="cf">
  <div class="header_content cf">
    <hgroup>
      <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?><!--HOME--></a></h1>
      <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
    <nav class="global_nav">
      <ul class="cf">
        <li class="search">
          <form class="form-search" method="get" action="<?php bloginfo('url'); ?>/">
            <input class="input-medium" type="text" name="s">
            <input class="btn" type="submit" value="検索">
          </form>
        </li>
        <li class="user_nav">
          <?php
          $user = wp_get_current_user();
          if( is_user_logged_in() ){ ?>
            <a href="<?php echo home_url( '/' ); ?>login/"><?php echo $user->display_name; ?></a>
            <ul class="cf">
              <li><a href="<?php echo home_url( '/' ); ?>login/">Profile</a></li>
              <li><a href="http://dotou.lugn-design.com/login/?action=logout&amp;_wpnonce=749526fd45">Logout</a>
            </ul>
          <?php }
          else{ ?>
            <a class="register" href="<?php echo home_url( '/' ); ?>login/?action=register">新規登録</a>
            <a href="<?php echo home_url( '/' ); ?>login/">ログイン</a>
          <?php } ?>
        </li>
      </ul>
    </nav>
  </div>
  <div class="lang_nav">
    <nav>
      <ul>
        <?php
        $allCategory = get_terms( "category", "fields=all&get=all&exclude_tree=1" );
        foreach($allCategory as $value):
          if($value->parent == 0){ ?>
            <li><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a></li>
            <?php }
        endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
