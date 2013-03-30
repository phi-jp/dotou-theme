<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>

    <body <?php body_class($body_class); ?>>
        <?php get_header(); ?>

		<div id="wrap">
        <div class="container">
        		<div class="row">
	              <div class="sidebar span3">
	                  <?php get_sidebar('page'); ?>
	              </div>
                <div class="content span8 offset1">
				        		<div class="page-header">
				                <h1><?php the_title(); ?></h1>
				            </div>

				        		<h2>怒濤とは</h2>
				        		<p>
				        			ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        		</p>

				        		<h2>怒濤の狙い</h2>
				        		<p>
				        			ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        		</p>

				        		<h2>jsdo.it</h2>
				        		<p>
				        			ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        			サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル<br />
				        		</p>

				        		<h2>Member</h2>
				        		<div class="member-list">
				        				<ul class="row">
					        					<li class="span4 clearfix">
					        							<img class="img-polaroid pull-left" src="http://dummyimage.com/128.png/aaa/666" alt="" width="128" height="128">
					        							<div class="member-info pull-left">
					        									<h3>name</h3>
					        									<h4>post</h4>
					        									<p class="member-text">
					        										aaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaa
					        									</p>
					        							</div>
					        					</li>
					        					<li class="span4 clearfix">
					        							<img class="img-polaroid pull-left" src="http://dummyimage.com/128.png/aaa/666" alt="" width="128" height="128">
					        							<div class="member-info pull-left">
					        									<h3>name</h3>
					        									<h4>post</h4>
					        									<p class="member-text">
					        										aaaaaaaaa<br />
					        										aaaaaaaaa<br />
					        										aaaaaaaaa
					        									</p>
					        							</div>
					        					</li>
				        				</ul>
				        		</div>
				        </div>
            </div>
        </div>
        <div id="footer-padding"></div>
    </div>

    <?php get_footer(); ?>

    <?php wp_footer(); ?>
    </body>
</html>
