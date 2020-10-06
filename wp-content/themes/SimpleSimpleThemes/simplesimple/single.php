<?php
/****************************************

	single.php

	個別記事ページを表示するための
	テンプレートファイルです。

	single.php のコードに関しては、
	CHAPTER 10 で詳しく解説しています。

*****************************************/
?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/single.css" type="text/css" />
<!-- single.php -->
<div id="single">

<!-- /single.php -->

    <?php if(have_posts()):
        while(have_posts()):the_post(); ?>
<div class="system-post-time"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></div>
     <h1><?php the_title(); ?></h1>      
      <p class ="system-category"><?php the_category(', '); ?></p>
      <p><?php the_content('Read more'); ?></p>
      <?php
            /**
             * comments.php の読み込み
             */
            comments_template();
      ?>
    <?php endwhile; 
    else :  ?>
    <div class="post">

            <h2>記事はありません</h2>
            <p>お探しの記事は見つかりませんでした。</p>

    </div>
      <?php
      // if 文終了
    endif; ?>
 </div><!-- /#main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>