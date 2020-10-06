<?php
/****************************************

		functions.php

		テーマ内で利用する関数を定義したり、
		テーマの設定を行うためのファイルです。

		functions.php のコードに関しては、
		CHAPTER 11, 12 で詳しく解説しています。

*****************************************/

/** メインカラムの幅を指定する変数。下記は 600px を指定（記述推奨） */
if ( ! isset( $content_width ) ) $content_width = 700;

/** <head>内に RSSフィードのリンクを表示するコード */
add_theme_support( 'automatic-feed-links' );

/** ダイナミックサイドバーを定義するコード（CHAPTER 11）*/
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-1',
	'id'			=> 'sidebar-1',
	'description'	=> 'サイドバーのウィジットエリアです。デフォルトのサイドバーと丸ごと入れ替えたいときに使ってください。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
) );

/** 複数のダイナミックサイドバーを定義するコード（CHAPTER 11）*/
/**
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-2',
	'id'			=> 'sidebar-2',
	'description'	=> 'サイドバーのウィジットのテストです。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
));
*/

/** カスタムメニュー機能を有効にするコード（CHAPTER 12）*/
add_theme_support( 'menus' );

/** カスタムメニューの「場所」を設定するコード */
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );
// register_nav_menu( 'sidebar-navi', 'サイドバーのナビゲーション' );
// register_nav_menu( 'footer-navi', 'フッターのナビゲーション' );

//*アイキャッチ*/
if (!function_exists('setup_my_theme')):
function setup_my_theme() {
  add_theme_support('post-thumbnails');
}
endif;
 
add_action('after_setup_theme', 'setup_my_theme');
//*アイキャッチ*/

//現在のページ数の取得
function show_page_number() {
    global $wp_query;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $max_page = $wp_query->max_num_pages;
    return $paged;  
}

//総ページ数の取得
function max_show_page_number() {
    global $wp_query;

    $max_page = $wp_query->max_num_pages;
    echo $max_page;  
}