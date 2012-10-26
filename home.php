<!DOCTYPE html>

<html>
<head>
  <?php get_template_part('head'); ?>
</head>

<body <?php body_class(); ?>>
<?php get_header(); ?>
<div id="contents">
  <div class="blanding cf">
    <section>
      <h2>怒涛とは</h2>
      <p>修練・鍛錬・熟練</p>
      <p>コードを実際に組んで学んでいこう。</p>
      <p>現在はn種類の言語をサポートしています。<br />今後も様々な言語を追加していく予定です。</p>
      <a class="button" href="">Let's Start!</a>
    </section>
    <div class="image">
    </div>
  </div>

  <div class="about_list cf">
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
<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>