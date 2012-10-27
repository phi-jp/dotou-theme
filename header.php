<header id="header" class="cf">
  <div class="header_content cf">
    <hgroup>
      <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?><!--HOME--></a></h1>
      <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
    <nav>
      <ul class="cf">
        <li>
          <form method="get" action="<?php bloginfo('url'); ?>/">
            <input type="text" name="s">
            <input type="submit" value="検索">
          </form>
        </li>
        <li><a href="">ログイン</a></li>
      </ul>
    </nav>
  </div>
</header>
