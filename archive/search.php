<div id="contents" class="cf">
  <h1 class="title"><?php wp_title(""); ?></h1>
  <div class="main_content cf">
    <?php
    if(have_posts()): while(have_posts()):the_post();
      $title = get_the_title();
      $link = get_permalink();
      $date = get_the_time('Y/m/d');
      $category = get_the_category(); $category = $category[0];
      $parent_link = get_category_parents($category->category_parent, true, '');
      ?>
      <article class="entry">
        <ul>
          <li class="post_title">
            <a class="link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
            <p>
              <em class="WebIconFonts">[</em>
              <span class="category_parent"><?php echo $parent_link; ?></span>
              <span class="category_child"><?php the_category(", "); ?></span>
            </p>
          </li>
        </ul>
      </article>
      <?php endwhile; endif; ?>
  </div>
</div>
