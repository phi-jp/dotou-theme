<?php
    $this_cat = get_the_category($cat); $this_cat = $this_cat[0];
    $parent_name = get_category_parents($this_cat->category_parent, false, '', false);
    $chapter_list = getLanguageChapter($parent_name, $this_cat->cat_name);
    $post_data = getCategoryPost($this_cat->term_id);

    // 章順に取得
    $sort_data = getSortChapterName($post_data, $chapter_list);
    $sort_data = getSortChapterNumber($sort_data);
?>
<div class="well sidebar-nav">
    <h2><a href="<?php echo get_category_link($this_cat->cat_ID); ?>"><?php echo $parent_name." ".$this_cat->name; ?></a></h2>
    <ul class="nav nav-list">
    <?php
    foreach ($sort_data as $key => $value) {
        if(is_object($value[0])){
            echo '<li class="nav-header">'.$value[0]->ChapterName.'</li>';
            foreach ($value as $key2 => $value2) {
                echo '<li><a href="'.$value2->link.'">'.$value2->post_title.'</a></li>';
            }
        }
        else{
            echo '<li class="nav-header">'.$value["ChapterName"].'</li>';
            echo '<li class="unactive">ただいま準備中！</li>';
        }
    }
    ?>
    </ul>
</div>
