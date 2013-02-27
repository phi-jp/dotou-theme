
<div class="main_content cf">
  <h1>怒濤の言語一覧</h1>

  <section>
    <h2>aaaaaaaaaaaaaa</h2>
    <?php
    $allCategory = get_terms( "category", "fields=all&get=all" );
    foreach($allCategory as $value):
      //pr($value);
      if($value->parent == 0){ ?>
        <a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a>
        <p><?php echo $value->description; ?></p>
        <?php }
    endforeach; ?>
  </section>
</div>
