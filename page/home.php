<div id="contents">
  <div class="blanding">

    <div class="main_blanding cf">
      <section>
        <h2>怒涛</h2>
        <p class="desc">世界一のサンプル数</p>
        <a href="">怒涛とは</a>
      </section>
      <div class="image">
      </div>
    </div>

    <div class="sub_blanding cf">
      <section>
        <h2>修練でコードを見る</h2>
        <p>
          修練はサンプルのコードを載せています。
        </p>
      </section>

      <section>
        <h2>鍛錬でコードを書く</h2>
        <p>
          jsdo.itで実際にコードを書いてみよう。<br />
          うまく動かない場合は修練のサンプルで確認してみよう。
        </p>
      </section>

      <section>
        <h2>熟練でレベルアップ</h2>
        <p>
          熟練では基礎を終えた人向けに一歩進んだ内容を紹介しています。<br />
        </p>
      </section>
    </div>

  </div>

  <div class="dotou_content cf">
    <div class="news_box">
      <section class="news">
        <h2>新着の講座</h2>
        <ul class="cf">
        <?php
          $posts = get_posts('numberposts=5&exclude=1');

          if($posts): foreach($posts as $post): setup_postdata($post);
            $date = get_the_time('Y/m/d');
            $title = get_the_title();
            $link = get_permalink();
            $category = get_the_category(); $category = $category[0];
            $parentLink = get_category_parents($category->category_parent, true, '');

            if($parentLink->errors['invalid_term'][0] == "キーワードなし"){
              $parentLink = "";
            }
            ?>

          <li class="cf">
            <p><span class="date"><?php echo $date; ?></span><span class="category"><?php echo $parentLink; the_category(", "); ?></span> </p>
            <a class="link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
          </li>
        <?php endforeach; endif; ?>
        </ul>
      </section>
      <section class="announce">
        <h2>お知らせ</h2>
        <ul class="cf">
          <?php
          $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 9999 ) );
          while ( $loop->have_posts() ) : $loop->the_post();
            $title = get_the_title();
            $link = get_permalink();
            $date = get_the_time('Y/m/d');
            ?>
          <li class="cf">
            <p><span class="date"><?php echo $date; ?></span></p>
            <a class="link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
          </li>
          <?php endwhile; wp_reset_query(); ?>
        </ul>
      </section>
    </div>
    <div class="sns">
      <p class="WebIconFonts">t</p>
      <p class="WebIconFonts">f</p>
    </div>
  </div>

</div>
