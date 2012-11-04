<div id="contents" class="cf">
  <h1 class="title"><?php wp_title(""); ?></h1>
  <div class="main_content cf">
    <?php
    $shurenPost = array();
    $tanrenPost = array();
    $jukurenPost = array();

    if(have_posts()): while(have_posts()):the_post();
      $category = get_the_category(); $category = $category[0];
      $tmp = array(
        "title" => get_the_title(),
        "link" => get_permalink(),
        "content" => get_the_content()
      );
      if(preg_match('/shuren/', $category->slug)){
        array_push($shurenPost, $tmp);
      }
      else if(preg_match('/tanren/', $category->slug)){
        array_push($tanrenPost, $tmp);
      }
      else if(preg_match('/jukuren/', $category->slug)){
        array_push($jukurenPost, $tmp);
      }


    endwhile; endif; ?>

    <?php
    $cat_page = get_category( $cat );
    // 親カテゴリ
    if($cat_page->parent == 0){
      showCategoryList("修練", $shurenPost);
      showCategoryList("鍛錬", $tanrenPost);
      showCategoryList("熟練", $jukurenPost);
    }
    // 小カテゴリ
    else{
      showCategoryList("修練", $shurenPost);
      showCategoryList("鍛錬", $tanrenPost);
      showCategoryList("熟練", $jukurenPost);
    }
    ?>
  </div>
</div>

<?php
function showCategoryList($catTitle, $postArray){ ?>
<section>
  <h2><?php echo $catTitle; ?></h2>
  <ul>
  <?php
  foreach($postArray as $value){ ?>
    <li><a href="<?php echo $value["link"]; ?>"><?php echo $value["title"]; ?></a></li>
  <?php } ?>
  </ul>
</section>
<?php } ?>