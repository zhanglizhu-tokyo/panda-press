<?php
/****************************************

		category.php

		index.php をコピーしたものです。

*****************************************/


get_header(); ?>
<!-- category.php -->
<div id="main">
	<p>これは category.php です！ </p>
	<?php if ( have_posts() ) : /** WordPress ループ */
		while ( have_posts() ) : the_post(); /** 繰り返し処理開始 */ ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-meta">
					<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<span class="category">Category - <?php the_category( ', ' ); ?></span>
					<span class="comment-num"><?php comments_popup_link( 'Comment : 0', 'Comment : 1', 'Comments : %' ); ?></span>
				</p>
				<?php the_content( '続きを読む &raquo;', true ); ?>
			</div>
		<?php endwhile; /** 繰り返し処理終了 */
	else : /** ここから記事が見つからなかった場合の処理 */ ?>
			<div class="post">
				<h2>記事はありません</h2>
				<p>お探しの記事は見つかりませんでした。</p>
			</div>
	<?php endif; /** WordPress ループここまで */
	if ( $wp_query->max_num_pages > 1 ) : /** ここからページャー */ ?>
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link( '&laquo; NEXT' ); ?></div>
			<div class="alignright"><?php next_posts_link( 'PREV &raquo;' ); ?></div>
		</div>
	<?php endif; /** ページャーここまで */ ?>
</div>
<!-- /main -->
<!-- / category.php -->
<?php get_sidebar();
get_footer(); ?>