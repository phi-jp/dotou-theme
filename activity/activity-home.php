<?php
$userName = bp_get_displayed_user_username();
$url = get_bloginfo('home')."/user/"."$userName"."/activity/favorites/";
?>
<script type="text/javascript">
  function reDirect(){
    top.location.href="<?php echo $url; ?>";
  }
  reDirect();
</script>
