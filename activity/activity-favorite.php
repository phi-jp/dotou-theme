<?php
  if ( empty( $_POST['page'] ) ) : ?>
		<ul id="activity-stream" class="activity-list item-list cf">
  <?php endif;

  while ( bp_activities() ) : bp_the_activity();
    locate_template( array( 'activity/entry.php' ), true, false );
  endwhile;

  if ( bp_activity_has_more_items() ) :
  endif;

  if ( empty( $_POST['page'] ) ) : ?>
		</ul>
	<?php endif; ?>

  <!-- pagenation -->
  <!-- <div class="pag-count"><?php //bp_activity_pagination_count(); ?></div> -->
  <div class="pagination pagination-right clearfix">
    <ul>
      <?php
      global $activities_template;
      global $pageNum;
      if( $activities_template->pag_page && $activities_template->pag_page != 1){ ?>
        <li><a href="<?php echo $pageSlug; ?>?acpage=<?php echo $activities_template->pag_page-1; ?>">Prev</a></li>
      <?php }
      else{ ?>
        <li class="disabled"><span>Prev</span></li>
      <?php }

      for($i = 1; $i < $pageNum+1; $i++){
        $active = "";
        if($i == $activities_template->pag_page){ $active = "active ".$i.",".$pageNum; }
        ?>
        <li class="<?php echo $active; ?>"><a href="<?php echo $pageSlug; ?>?acpage=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php }

      if($pageNum != $activities_template->pag_page){ ?>
        <li><a href="<?php echo $pageSlug; ?>?acpage=<?php echo $activities_template->pag_page+1; ?>">Next</a></li>
        <?php }
      else{ ?>
        <li class="disabled"><span>Next</span></li>
      <?php } ?>
    </ul>
  </div>
