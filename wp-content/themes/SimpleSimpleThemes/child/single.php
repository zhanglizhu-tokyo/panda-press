<?php
/****************************************

	single.php

	個別記事ページを表示するための
	テンプレートファイルです。

	single.php のコードに関しては、
	CHAPTER 10 で詳しく解説しています。

*****************************************/

get_header(); ?>
<!-- single.php -->
<div id="main">
	<?php if ( have_posts() ) : /** WordPress ループ */
		while ( have_posts() ) : the_post(); /** 繰り返し処理開始 */ ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-meta">
					<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<span class="category">Category - <?php the_category( ', ' ) ?></span>
					<span class="comment-num"><?php comments_popup_link( 'Comment : 0', 'Comment : 1', 'Comments : %' ); ?></span>
				</p>
				<?php the_content();
				$args = array(
					'before'	  => '<div class="page-link">',
					'after'		  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				);
				wp_link_pages( $args ); ?>
				<p class="footer-post-meta">
					<?php the_tags( 'Tag : ', ', ' ); ?>
					<span class="post-author">作成者 : <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
				</p>
				<!-- Tweetボタン -->
				<div class="tweetbutton">
					<a class="twitter-share-button" href="https://twitter.com/share">Tweet</a>
					<script type="text/javascript">
						window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
					</script>
				</div>
				<!-- /Tweetボタン -->
			</div>
			<div class="navigation"><!-- ページャー -->
				<?php if ( get_next_post() ) : ?>
					<div class="alignleft"><?php next_post_link( '%link', '&laquo; %title' ); ?></div>
				<?php endif;
				if ( get_previous_post() ) : ?>
					<div class="alignright"><?php previous_post_link( '%link', '%title &raquo;' ); ?></div>
				<?php endif; ?>
			</div><!-- /ページャー -->
			<?php comments_template(); /** コメント欄の表示 */
		endwhile; /** 繰り返し処理終了 */
	else :	/** ここから記事が見つからなかった場合の処理 */ ?>
		<div class="post">
			<h2>記事はありません</h2>
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
	<?php endif; /** WordPress ループここまで */ ?>
</div><!-- /main -->
<!-- /single.php -->
<?php get_sidebar();
get_footer(); ?>