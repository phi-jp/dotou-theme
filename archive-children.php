<?php
$page_slug = $_SERVER["REQUEST_URI"];
$page_slug = explode('/', $page_slug);
$lang_list = getLanguageList();

$lang_chapter = getThemeOptions($page_slug[1]);
$chapter_name = getLanguageChapterList($page_slug[1]);
$chapter_slug = getLanguageSlugList($page_slug[1]);

$url = get_bloginfo('home')."/".$page_slug[1]."/".$chapter_slug[0];

$has_entry = false;
foreach ($chapter_name as $key => $value) {
    $meta = $page_slug[1]."_".trim($chapter_slug[$key])."_章名";
    $entry_list = getThemeOptions($meta);
    if($entry_list[0]){
        $has_entry = true;
        $url = get_bloginfo('home')."/".$page_slug[1]."/".$chapter_slug[$key];
        break;
    }
}

if($has_entry){
    if($_SERVER["HTTP_HOST"] != "dotou.net"){
        header("Location: ". $url);
        exit;
    }
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
