<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>
    
    <body>
        <?php get_header(); ?>

		<div id="wrap">
	        <div class="container">
				<div class="hero-unit">
					<h1>怒濤 <small>~ 世界一のサンプル数 ~</small></h1>
					<br>

					<div class="row">
						<div class="span3">
							<img alt="screenshot" src="logo.png" width=400px height=400px>
						</div>
						<div class="span8">
							<p>
								『怒濤』とは, プログラミングを学ぶためのサイトです.
								本を読むのではなく実際に作って学ぼうをモットーに一緒に学んでいきましょう♪
								世界一のサンプル数を誇るサービスです.
							</p>
							<p>
								<a class="btn btn-primary btn-large" href="#" target="">
									始めよう »
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="row-fluid detail-block">
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
			<div id="footer-padding"></div>
        </div>
        
        <?php get_footer(); ?>
        
        <?php wp_footer(); ?>
    </body>
</html>
