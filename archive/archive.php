<div id="contents" class="cf">
  <?php
    $currentCategory = get_the_category();
    $currentCategory = $currentCategory[0];
    $parentName = get_category_parents($currentCategory->category_parent, false, '', false);
    $parentSlug = get_category_parents($currentCategory->category_parent, false, '', true);
  ?>
  <h1 class="title"><?php echo $parentName; ?></h1>
  <div class="main_content cf">
    <?php
    $showCategory = "";
    // 親カテゴリ
    if($currentCategory->parent != 0){
      $showCategory = $cat_page->category_parent;
    }
    $shurenPost = array();
    $tanrenPost = array();
    $jukurenPost = array();

    $posts = get_posts('numberposts=-1&category='.$showCategory);
    if($posts): foreach($posts as $post): setup_postdata($post);
      $category = get_the_category(); $category = $category[0];
      $tmp = array(
        "title" => get_the_title(),
        "link" => get_permalink(),
        "content" => get_the_content(),
        "excerpt" => get_the_excerpt()
      );
      if(preg_match('/'.$parentSlug.'-shuren/', $category->slug)){
        array_push($shurenPost, $tmp);
      }
      else if(preg_match('/'.$parentSlug.'-tanren/', $category->slug)){
        array_push($tanrenPost, $tmp);
      }
      else if(preg_match('/'.$parentSlug.'-jukuren/', $category->slug)){
        array_push($jukurenPost, $tmp);
      }


    endforeach; endif; ?>

    <hgroup class="cf">
      <h2 class="category_tab minus">修練</h2>
      <h2 class="category_tab plus">鍛錬</h2>
      <h2 class="category_tab plus">熟練</h2>
    </hgroup>

    <?php
    // 親カテゴリ
    if($currentCategory->parent == 0){
      showCategoryList("修練", $shurenPost, 0);
      showCategoryList("鍛錬", $tanrenPost, 1);
      showCategoryList("熟練", $jukurenPost, 2);
    }
    // 小カテゴリ
    else{
      showCategoryList("修練", $shurenPost, 0);
      showCategoryList("鍛錬", $tanrenPost, 1);
      showCategoryList("熟練", $jukurenPost, 2);
    }
    ?>
  </div>
</div>

<?php
function showCategoryList($catTitle, $postArray, $num){ ?>
<section class="category_section category_section<?php echo $num; ?>">
  <ul>
  <?php
  foreach($postArray as $value){ ?>
    <li>
      <h2><a href="<?php echo $value["link"]; ?>"><?php echo $value["title"]; ?></a></h2>
      <p><?php echo $value["excerpt"]; ?></p>
    </li>
  <?php } ?>
  <?php
  for($i = 0; $i < 100; $i++){ ?>
    <li>
      <h2><a href="">test<?php echo $i; ?></a></h2>
      <p>dammyダミーdammyダミーdammyダミーdammyダミーdammyダミーdammyダミー</p>
    </li>
  <?php } ?>
  </ul>
</section>
<?php } ?>
