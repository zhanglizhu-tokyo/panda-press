<?php
/****************************************

	header.php

	Webサイトのヘッダー部分を表示するための
	テンプレートファイルです。

	header.php のコードについては、
	CHAPTER 8 で詳しく説明しています。

*****************************************/
?>
<!DOCTYPE html>
<html lang='ja'>
<head>   
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111483188-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111483188-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W4FX3KL');</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
	<?php if ( is_single() /** ! is_front_page() に書き換えよう！（CHAPTER 8） */ ) {
		wp_title( '::', true, 'right' );
	}
	bloginfo( 'name' ); ?>
	</title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
        
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet" />
	<?php if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/** コメント欄をポップアップで表示したいなら、下記を有効にする */
	// comments_popup_script();
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4FX3KL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="container">
		<!-- header -->
		<div id="header" class="clearfix">
			<div class="alignleft">
				<?php /** 下記の echo home_url( '/' ) を echo esc_url( home_url( '/' ) ) に書き換えよう！（CHAPTER 8） */ ?>
				<h1 id="logo">
                                    <a href="<?php echo home_url( '/' ); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_03.jpg"></img>
                                    </a></h1>
				<!--<p id="description"><?php bloginfo( 'description' ); ?></p>-->
			</div>
			<div class="alignright">
				<?php get_search_form(); ?>
			</div>                    
			<?php wp_nav_menu( array( 'theme_location = header-navi' ) );?>
		</div>
		<!-- / header -->
<!-- /header.php -->