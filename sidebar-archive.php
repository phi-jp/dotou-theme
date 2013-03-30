<?php
$amazonData = array();
$loop = new WP_Query( array( 'post_type' => 'amazon', 'posts_per_page' => 9999 ) );
while ( $loop->have_posts() ) : $loop->the_post();
    $image = "";
    if(has_post_thumbnail()){
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id,'thumbnail', true);
    }
    $tmp = array(
        "title" => get_the_title(),
        "link" => get_the_content(),
        "image" => $image
    );
    array_push($amazonData, $tmp);
endwhile; wp_reset_query();

foreach ($amazonData as $key => $value) { ?>
    <div class="well">
        <h2><?php echo $value["title"]; ?></h2>
        <div class="book">
            <a href="<?php echo $value["link"]; ?>" title="<?php echo $value["title"]; ?>"><img src="<?php echo $value["image"][0]; ?>" width="<?php echo $value["image"][1]; ?>" height="<?php echo $value["image"][2]; ?>" alt="<?php echo $value["title"]; ?>"></a>
        </div>
    </div>
<?php } ?>

