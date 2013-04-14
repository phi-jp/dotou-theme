<?php
$title = get_the_title();
$cat = get_the_category(); $cat = $cat[0];
$cat_name = "";
$cat_slug = "";

$page_slug = $_SERVER["REQUEST_URI"];
$page_slug = explode('/', $page_slug);
$lang_chapter = getThemeOptions($page_slug[1]);

$list = array();
foreach ($lang_chapter as $key => $value) {
    $has_entry = false;
    $tmp = explode(", ", $value);
    $meta = $page_slug[1]."_".$tmp[1]."_章名";
    $chapter_list = getThemeOptions($meta);
    if( $chapter_list[0] ){
        foreach ($chapter_list as $key2 => $value2) {
            $meta = $page_slug[1]."_".$tmp[1]."_".$value2;
            $entry_list = getThemeOptions($meta);

            foreach ($entry_list as $key3 => $value3) {
                if(strstr($value3, $title)){
                    $has_entry = true;
                    $chapter_meta = explode(", ", $lang_chapter[$key]);
                    $cat_name = $cat->name." ".$chapter_meta[0];
                    $cat_slug = $cat->slug."/".$chapter_meta[1];
                    break;
                }
            }
        }
        if($has_entry){ $list = $chapter_list; break; }
    }
}
?>

<div class="well sidebar-nav">
    <h2><a href="<?php echo get_bloginfo("url")."/".$cat_slug; ?>"><?php echo $cat_name; ?></a></h2>
    <ul class="nav nav-list">
    <?php
    foreach ($list as $key => $value) {
        $meta = $page_slug[1]."_".$tmp[1]."_".$value;
        $entry_list = getThemeOptions($meta);
        if($entry_list[0]){
            echo '<li class="nav-header">'.$value.'</li>';
            foreach ($entry_list as $key2 => $value2) {
                $entry = explode(", ", $value2);
                echo '<li><a href="'.$entry[1].'">'.$entry[0].'</a></li>';
            }
        }
        else{
            echo '<li class="nav-header">'.$value.'</li>';
            echo '<li class="unactive">ただいま準備中！</li>';
        }
    }
    ?>
    </ul>
</div>













<!--









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
 -->
