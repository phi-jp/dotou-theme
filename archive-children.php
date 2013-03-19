<?php
    $this_cat = get_category($cat);
    $parent_name = get_category_parents($this_cat->category_parent, false, '', false);
    $parent_slug = get_category_parents($this_cat->category_parent, false, '', true);

    // $brother_category_id = get_category_children($this_cat->category_parent);
    // $brother_category_id = explode("/", $brother_category_id);
    $brother_name = array("修練", "鍛練", "熟練");
    $category_list = array("-shuren", "-tanren", "-jukuren");
    // $brother_category = array();
    // foreach ($brother_category_id as $key => $value) {
    //     $cat_name = get_catname($value);
    //     $brother_category[$cat_name] = getLanguageChapter($parent_name, $cat_name);
    // }
?>
<div class="page-header">
    <h1><?php echo $parent_name." ".$this_cat->cat_name; ?></h1>
</div>
<div class="category_list">
    <ul class="nav nav-pills">
    <?php
    foreach ($brother_name as $key => $value) {
        $active = "";
        $link = get_bloginfo('home')."/".$parent_slug."/".$parent_slug.$category_list[$key];
        if($this_cat->cat_name === $value){ $active = "active"; }
        echo '<li class="'.$active.'"><a href="'.$link.'">'.$value.'</a></li>';
    }
    ?>
    </ul>
</div>

<?php
    // 現在のカテゴリの章を取得
    $chapter_list = getLanguageChapter($parent_name, $this_cat->cat_name);

    // 現在のカテゴリの記事を取得
    $post_data = getCategoryPost($this_cat->term_id);

    // 章順に取得
    $sort_data = getSortChapterName($post_data, $chapter_list);
    $sort_data = getSortChapterNumber($sort_data);
?>
<div class="chapter_list well">
    <?php
    foreach ($sort_data as $key => $value) {
        if(is_object($value[0])){
            echo '<h2>'.$value[0]->ChapterName.'</h2>';
            echo '<ol>';
            foreach ($value as $key2 => $value2) {
                echo '<li><a href="'.$value2->link.'">'.$value2->post_title.'</a></li>';
            }
            echo '</ol>';
        }
        else{
            echo '<h2>'.$value["ChapterName"].'</h2>';
            echo '<ol>';
            echo '<li class="unactive">ただいま準備中！</li>';
            echo '</ol>';
        }
    }
    ?>
</div>
