<div class="blanding">

<!--  <div class="home_search well">-->
<!--    <form class="form-search" method="get" action="--><?php //bloginfo( 'url' ); ?><!--">-->
<!--      <input class="input-medium search-query" type="text" name="s">-->
<!--      <button type="submit" class="btn">Search</button>-->
<!--    </form>-->
<!--  </div>-->


<div class="hero-unit">
  <h1>怒濤 <small>世界一のサンプル数</small></h1>
  <br>

  <div class="row">
    <div class="span3">
      <img alt="screenshot" src="logo.png" width=400px height=400px>
    </div>
    <div class="span6">
      <p>
        怒濤とは世界一のサンプル数を誇るサービスです. dummy dummy dummy dummy dummy dummy dummy dummy 
      </p>
      <p>
        <a class="btn btn-primary btn-large" href="https://github.com/phi1618/tmlib.js" target="_blank">
          Go Github »
        </a>
      </p>
    </div>
  </div>
</div>

  <div class="sub_blanding row-fluid">
        <section class="span4">
          <h2>修練でコードを見る</h2>
          <p class="description">
            修練はサンプルのコードを載せています。
          </p>
          <p><a class="btn" href="#">詳細 »</a></p>
        </section>

        <section class="span4">
          <h2>鍛錬でコードを書く</h2>
          <p class="description">
            jsdo.itで実際にコードを書いてみよう。<br />
            うまく動かない場合は修練のサンプルで確認してみよう。
          </p>
          <p><a class="btn" href="#">詳細 »</a></p>
        </section>

        <section class="span4">
          <h2>熟練でレベルアップ</h2>
          <p class="description">
            熟練では基礎を終えた人向けに一歩進んだ内容を紹介しています。<br />
          </p>
          <p><a class="btn" href="#">詳細 »</a></p>
        </section>
  </div>

</div>

<div class="row-fluid cf">
  <div class="news_box">
    <section class="news span7">
      <h3>新着の講座</h3>
      <table>
        <tbody>
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
          <tr>
            <td class="date"><?php echo $date; ?></td>
            <td class="category"><?php echo $parentLink." in "; the_category(", "); ?></td>
            <th><a class="link" href="<?php echo $link; ?>"><?php echo $title; ?></a></th>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </section>
    <div class="span5">
      <section class="announce">
        <h3>お知らせ</h3>
        <table>
          <tbody>
          <?php
          $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 5 ) );
          while ( $loop->have_posts() ) : $loop->the_post();
            $title = get_the_title();
            $link = get_permalink();
            $date = get_the_time('Y/m/d');
            ?>
          <tr>
            <td class="date"><?php echo $date; ?></td>
            <th><a class="link" href="<?php echo $link; ?>"><?php echo $title; ?></a></th>
          </tr>
            <?php endwhile; wp_reset_query(); ?>
          </tbody>
        </table>
      </section>
    </div>
  </div>
</div>
