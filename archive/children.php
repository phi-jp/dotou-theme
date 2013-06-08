<?php
global $page_slug, $lang_list, $lang_chapter, $chapter_name, $chapter_slug;

// チャプターを取得
$meta = $page_slug[1]."_".$page_slug[2]."_章名";
$lang_chapter = getThemeOptions($meta);

// 言語名をセット
$parent_name = "";
foreach ($lang_list as $key => $value) {
  $tmp = trimString($value);
  if($tmp === $page_slug[1]){ $parent_name = $value; }
}
?>
<div class="page-header">
    <h1><?php echo $parent_name." ".$this_cat->cat_name; ?></h1>
</div>
<div class="category_list">
    <ul class="nav nav-pills">
    <?php
    foreach ($chapter_name as $key => $value) {
        if(hasChapterEntry($page_slug[1], $chapter_slug[$key])){
            $active = "";
            $link = get_bloginfo('home')."/".$page_slug[1]."/".$chapter_slug[$key];
            if( $page_slug[2] === $chapter_slug[$key] ){ $active = "active"; }
            echo '<li class="'.$active.'"><a href="'.$link.'">'.$value.'</a></li>';
        }
    }
    ?>
    </ul>
</div>


<div class="chapter_list well">
    <?php
    foreach ($lang_chapter as $key => $value) {
        echo '<h2>'.$value.'</h2>';
        $meta = $page_slug[1]."_".$page_slug[2]."_".$value;
        $entry_list = getThemeOptions($meta);
        echo '<ol>';
        if($entry_list[0]){
            foreach ($entry_list as $key2 => $value2) {
                $entry = explode( ", ", $value2 );
                echo '<li><a href="'.$entry[1].'">'.$entry[0].'</a></li>';
            }
        }
        else{
            echo '<li class="unactive">ただいま準備中！</li>';
        }
        echo '</ol>';
    }
    ?>
</div>
