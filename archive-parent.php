<?php
$this_cat = get_category($cat);
$url = get_bloginfo('home')."/".$this_cat->slug."/".$this_cat->slug."-shuren/";
// header("Location: ". $url);
// exit;
?>
<script type="text/javascript">
  function reDirect(){
    top.location.href="<?php echo $url; ?>";
  }
  reDirect();
</script>
