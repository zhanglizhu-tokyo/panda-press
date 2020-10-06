<?php
/****************************************

	index.php

	WordPressサイトには、なくてはならない
	テンプレートファイルです。

	index.php のコードに関しては、
	CHAPTER 9 で詳しく解説しています。

*****************************************/

get_header(); ?>
<?php 
    echo do_shortcode("[metaslider id=37]"); 
?>
<!-- index.php -->
<div id="main">
    <div class="system-page-num">
    <?php
        echo ((show_page_number('')-1)*$posts_per_page)+1;
        echo ' - ';
        echo show_page_number('')*10;
        echo '件';
    ?>
        (全件<?php echo $wp_query->found_posts;?>数中)
    </div>
    <div>
        <ul>
	<?php
            if ( have_posts() ) :                
                // ループ開始                        
                while ( have_posts() ) : the_post(); ?>
            <li class="post">
                <!--アイキャッチ-->
                <div class="post-content-img">
                   <a href="<?php the_permalink(); ?>">
                     <?php 
                     if ( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                     }else{
                         echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/noimg.png" alt="noimage"/>';
                     }
                     ?>
                   </a>
                </div>               
                    <!---->
                <div class="post-content-txt">
                    <p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></p>
                    <p class="date"><?php the_date(); ?>|<?php the_category( ', ' ); ?></p>
                    <p>
                <?php
                /**
                 * コンテンツを表示する
                 * 120文字数
                 */
                if(mb_strlen($post->post_content, 'UTF-8')>120){
                    $content = mb_substr(strip_tags($post->post_content), 0, 120, 'UTF-8');
                    echo $content.'......';
                }else{
                    echo strip_tags($post->post_content);
                }
                ?>
                </p>
                </div>       
            </li>
		<?php
			// ループ終了
			endwhile;


		// ここから記事が見つからなかった場合の処理
		else :  ?>

			<div class="post">

				<h2>記事はありません</h2>
				<p>お探しの記事は見つかりませんでした。</p>

			</div>

	<?php
		// if 文終了
		endif; ?>
        </ul>
    </div>

	<?php
		/**
		 * ページャーを表示する
		 */
		if ( $wp_query->max_num_pages > 1 ) : ?>

			<div class="posts-navigation">
				<div class="nav-next"><?php previous_posts_link( '&laquo; NEXT' ); ?></div>
				<div class="nav-previous"><?php next_posts_link( 'PREV &raquo;' ); ?></div>
			</div>

	<?php
		// if 文終了
		endif; ?>

	<?php
		/**
		 * ページャーに the_posts_navigation() を使う場合は下記のコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => 'PREV &raquo;',
		//	'next_text'          => '&laquo; NEXT',
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_navigation( $args );
	?>

	<?php
		/**
		 * ページネーション the_posts_pagination() を使う場合はコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => '&laquo; NEXT',
		//	'next_text'          => 'PREV &raquo;',
		//	'mid_size'			 => 1,
		//	'show_all'			 => false,
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_pagination( $args );
	?>

</div><!-- /#main -->
<!-- / index.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>