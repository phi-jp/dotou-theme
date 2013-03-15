<?php
    $this_cat = get_category($cat);
    $parent_name = get_category_parents($this_cat->category_parent, false, '', false);
    $chapter_list = getLanguageChapter($parent_name, $this_cat->cat_name);
    $post_data = getCategoryPost($this_cat->term_id);

    // 章順に取得
    $sort_data = getSortChapterName($post_data, $chapter_list);
    $sort_data = getSortChapterNumber($sort_data);

?>
<div class="page-header">
    <h1><?php echo $parent_name." ".$this_cat->cat_name; ?></h1>
</div>
<div class="category_list"></div>
<div class="chapter_list well">
    <?php
    foreach ($sort_data as $key => $value) {
        if(is_object($value[0])){
            echo '<h2>'.$value[0]->ChapterName.'</h2>';
            echo '<ol>';
            foreach ($value as $key2 => $value2) {
                echo '<li><a href="'.$value2->guid.'">'.$value2->post_title.'</a></li>';
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
