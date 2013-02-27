<?php
global $parentSlug;
$url = get_bloginfo('home')."/".$parentSlug."-shuren/";
?>
<script type="text/javascript">
  function reDirect(){
    top.location.href="<?php echo $url; ?>";
  }
  reDirect();
</script>
