<?php
global $page_slug, $lang_list, $lang_chapter, $chapter_name, $chapter_slug;
$url = get_bloginfo('home')."/".$page_slug[1]."/".$chapter_slug[0];

// pr($url);
// pr($page_slug);
// pr($lang_list);
// pr($lang_chapter);
// pr($chapter_name);
// pr($chapter_slug);

$has_entry = false;
foreach ($chapter_name as $key => $value) {
    if(hasChapterEntry($page_slug[1], $value, $chapter_slug[$key])){
        $has_entry = true;
        $url = get_bloginfo('home')."/".$page_slug[1]."/".$chapter_slug[$key];
        break;
    }
}

if($has_entry){
    header("Location: ". $url);
    exit;
    ?>
    <script type="text/javascript">
      function reDirect(){
        top.location.href="<?php echo $url; ?>";
      }
      reDirect();
    </script>
<?php
}
else{
    get_template_part("404_not_found");
}
?>
