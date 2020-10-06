<?php
/****************************************

	functions.php

	テーマ内で利用する関数を定義したり、
	テーマの設定を行うためのファイルです。

*****************************************/

/** メインカラムの幅を指定する変数。下記は 600px を指定（記述推奨）*/
if ( ! isset( $content_width ) ) $content_width = 600;

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
/*
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

/** アイキャッチ画像機能を有効にするコード（CHAPTER 14）*/
add_theme_support( 'post-thumbnails' );

/** 抜粋の[...]を...に変更するコード（CHAPTER 14）*/
function new_excerpt_more( $more ) {
	return ' ... ';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/** カスタムヘッダーを img 要素として有効にするコード（CHAPTER 15）*/
$args = array(
	'width'			=> 940,
	'height'		=> 250,
	'flex-height'	=> true,
	'header-text'	=> false,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'		=> true,
);
add_theme_support( 'custom-header', $args );

/**
 * 【補足】カスタムヘッダーのデフォルト画像を「登録」するコード
 *  デフォルト画像を一枚、または複数枚あらかじめ「登録」しておくと、カスタムヘッダーの管理画面でいつでも登録済みの画像に切り替えることができます。
 */
register_default_headers( array(
	/** デフォルト画像の登録 */
	'image1' => array( /** 「image1」 の部分は、任意の名前をつけてください。 */
		'url'           => get_template_directory_uri() . '/images/header.jpg', /** 画像へのパス */
		'thumbnail_url' => get_template_directory_uri() . '/images/header.jpg', /** サムネイル画像へのパス（別途用意してあるなら、header-thumbnail.jpg などのファイル名に変更します。） */
		'description'   => 'I love cake &amp; coffee', /** 画像の説明文 */
	),

	/** 以下、画像を複数登録する場合に記述します。本サンプルではコメントアウトしています（画像は用意されていません）。 */
	/** 2 枚目の画像 */
	/*
	'image2' => array(
		'url'           => get_template_directory_uri() . '/images/header2.jpg',
		'thumbnail_url' => get_template_directory_uri() . '/images/header2.jpg',
		'description'   => '画像 2の説明文',
	),
	*/

	/** 3 枚目の画像 */
	/*
	'image3' => array(
		'url'           => get_template_directory_uri() . '/images/header3.jpg',
		'thumbnail_url' => get_template_directory_uri() . '/images/header3.jpg',
		'description'   => '画像 3の説明文',
	),
	*/
) );

/** カスタムヘッダーを 背景画像として有効にするコード（CHAPTER 15）*/
/*
$args = array(
	'width' 					=> 940,
	'flex-height' 				=> true,
	'height' 					=> 250,
	'default-text-color'		=> 'ffffff',
	'header-text'				=> true,
	'default-image'				=> get_template_directory_uri() . '/images/header.jpg',
	'uploads'					=> true,
	'wp-head-callback'			=> 'header_style',
	'admin-preview-callback'	=> 'admin_header_image',
	'admin-head-callback' 		=> 'admin_header_style',
);
add_theme_support( 'custom-header', $args );
*/

/** カスタムヘッダーの CSS を head 内に出力する関数（CHAPTER 15）*/
/*
function header_style() { ?>
<style>
	#header-image {
		background: url(<?php header_image(); ?>);
		color: #<?php header_textcolor(); ?>;
		width: <?php echo get_custom_header()->width; ?>px;
		height: <?php echo get_custom_header()->height; ?>px;
	}
	#header-image p {
		padding: 5em 3em;
	}
</style>
<?php }
*/

/** カスタムヘッダーの管理画面で、ヘッダー画像上にテキストを表示する関数（CHAPTER 15）*/
/*
function admin_header_image() {
	$style = 'style="background-image :url( ' . get_header_image() . ' ); max-width: ' . get_custom_header()->width . 'px; height: ' . get_custom_header()->height . 'px;"';
	$color = 'style="color: #' . get_header_textcolor() . ';"'; ?>
	<div id="headimg" <?php echo $style; ?>>
		<p <?php echo $color; ?>><?php bloginfo( 'description' ); ?></p>
	</div>
<?php }
*/

/** カスタムヘッダーの管理画面で、ヘッダー画像上のテキストのCSSを出力する関数（CHAPTER 15）*/
/*
function admin_header_style() { ?>
	<style type="text/css">
		#headimg {
			max-width: <?php echo get_custom_header()->width; ?>px;
			height: <?php echo get_custom_header()->height; ?>px;
		}
		#headimg p{
			font-size: 14px;
			padding: 5em 3em;
		}
	</style>
<?php }
*/

/** アイキャッチ画像のサイズを追加するコード（CHAPTER 15）*/
add_image_size( 'header-image', 940, 250, true );


/** 関数化したパンくずリスト（CHAPTER 16）*/
function breadcrumb() {
	global $post;
	$separater 	= '<li>&gt;</li>';
	$str 		= '';
	if ( ! is_home() && ! is_admin() ) { 	/** ! is_admin は管理ページ以外という条件分岐です */
		$str .= '<div id="breadcrumb" class="clearfix">';
		$str .= '<ul>';
		$str .= '<li><a href="' . esc_url( home_url( '/' ) ) . '">HOME</a></li>';
		$str .= $separater;
		if ( is_search() ) { 				/** 検索結果ページ */
			$str .= '<li>「' . esc_html( get_search_query() ) . '」で検索した結果</li>';
		} elseif ( is_tag() ) {
			$str .= '<li>タグ : ' . single_tag_title( '' , false ) . '</li>';
		} elseif ( is_404() ) { 			/** 404ページ */
			$str .= '<li>404 Not found</li>';
		} elseif ( is_date() ) { 			/** 日付アーカーブ */
			if ( is_day() ) { 				/** 日別アーカイブ */
				$str .= '<li><a href="' . get_year_link( get_query_var( 'year' ) ) . '">' . get_query_var( 'year' ) . '年</a></li>';
				$str .= $separater;
				$str .= '<li><a href="' . get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ) . '">' . get_query_var( 'monthnum' ) . '月</a></li>';
				$str .= $separater;
				$str .= '<li>' . get_query_var( 'day' ) . '日</li>';
			} elseif ( is_month() ) { 		/** 月別アーカイブ */
				$str .= '<li><a href="' . get_year_link( get_query_var( 'year' ) ) . '">' . get_query_var( 'year' ) . '年</a></li>';
				$str .= $separater;
				$str .= '<li>' . get_query_var( 'monthnum' ) . '月</li>';
			} elseif ( is_year() ) { 		/** 年別アーカイブ */
				$str .= '<li>' . get_query_var( 'year' ) . '年</li>';
			}
		} elseif ( is_category() ) { 		/** カテゴリーアーカイブ */
			$cat = get_queried_object();
			if ( $cat->parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
				foreach ( $ancestors as $ancestor ) {
					$str .= '<li><a href="' . esc_url( get_category_link( $ancestor ) ) . '">' . esc_html( get_cat_name( $ancestor ) ) . '</a></li>';
					$str .= $separater;
				}
			}
			$str .= '<li>' . $cat->name . '</li>';
		} elseif ( is_author() ) { 			/** 投稿者アーカイブ */
			$str .='<li>投稿者 : ' . esc_html( get_the_author_meta( 'display_name', get_query_var( 'author' ) ) ) . '</li>';
		} elseif ( is_page() ) {			/** 固定ページ */
			if ( $post->post_parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $post->ID, 'page' ) );
				foreach ( $ancestors as $ancestor) {
					$str .= '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
					$str .= $separater;
				}
			}
			$str .= '<li>' . esc_html( $post->post_title ) . '</li>';

		} elseif ( is_attachment() ) { 		/** 添付ファイルページ */
			if ( $post->post_parent != 0 ) {
				$str .= '<li><a href="' . esc_url( get_permalink( $post->post_parent ) ) . '">' . esc_html( get_the_title( $post->post_parent ) ) . '</a></li>';
				$str .= $separater;
			}
			$str .= '<li>' . esc_html( $post->post_title ) . '</li>';
		} elseif ( is_single() ) { 			/** ブログ記事ページ */
			$categories = get_the_category( $post->ID );
			$cat 		= $categories[0];
			if ( $cat->parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
				foreach ( $ancestors as $ancestor ) {
					$str .= '<li><a href="' . esc_url( get_category_link( $ancestor ) ) . '">' . esc_html( get_cat_name( $ancestor ) ) . '</a></li>';
					$str .= $separater;
				}
			}
			$str .= '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . $cat->cat_name . '</a></li>';
			$str .= $separater;
			$str .= '<li>' . esc_html( $post->post_title ) . '</li>';
		} else{								/** その他のページ */
			$str .= '<li>' . wp_title( '', true ) . '</li>';
		}
		$str .= '</ul>';
		$str .= '</div>';
	}
	echo $str;
}


/** メインループに働きかけるコード（CHAPTER 18）*/
function my_main_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_search ) { 								/** 検索結果をブログ記事に限定 */
			$query->set( 'post_type', 'post' );
      	} elseif ( $query->is_category || $query->is_tag ) {	/** カテゴリーページ、タグページでは表示件数を変更 */
	      	// $query->set( 'posts_per_page', '1' );
      	} elseif ( $query->is_home ) {
	      	// $query->set( 'category_name', 'cake, drink');	/** ブログのメインページを、カテゴリースラッグ「cake」、「drink」に限定 */
	      	// $query->set( 'category__in', array( 1, 2) );		/** ブログのメインページを、カテゴリーID「1, 2」に限定 */
	      	// $query->set( 'category__not_in', array( 1, ) );	/** ブログのメインページから、カテゴリーID「1」を削除 */
	      	// $query->set( 'author_name', 'Nori' );				/** ブログのメインページを、特定のユーザーの記事に限定 */
	      	// $query->set( 'order', 'ASC' );					/** ブログのメインページの記事の順番を昇順にする */
      	}
	}
}
add_action( 'pre_get_posts', 'my_main_query' );


/** コメント一覧表示部分のコード（CHAPTER 19）*/
function my_comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="clearfix">
			<div class="comment-author clearfix">
				<?php echo get_avatar( $comment->comment_author_email, 65 ); ?>
				<p class="comment-author-name"><?php comment_author_link(); ?><span class="says">says:</span></p>
				<p class="comment-meta"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date(); ?>
					<span><?php comment_time(); ?></span></a><br />
					<?php edit_comment_link( '(編集)' ); ?>
				</p>
			</div>
			<div class="comment-body">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p><em>あなたのコメントは承認待ちです。</em></p>
				<?php endif;
				comment_text(); ?>
				<p class="reply">
					<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => '返信',
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
						) ) ); ?>
				</p>
			</div>
		</div>
<?php }


/** コメントフォームをカスタマイズ（CHAPTER 20）*/
add_filter( 'comment_form_default_fields', 'comment_form_custom_fields' );

/** お名前、メールアドレス、Webサイト部のマークアップ（CHAPTER 20） */
function comment_form_custom_fields( $fields ) {
	$commenter 	= wp_get_current_commenter();
	$req 		= get_option( 'require_name_email' );
	$aria_req 	= ( $req ? " aria-required='true'" : '' );
	/** 名前の項目 */
	$fields['author'] 	= '<p class="comment-form-author"><label for="author">お名前</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
	/** メールアドレスの項目 */
	$fields['email']	= '<p class="comment-form-email"><label for="email">メールアドレス</label> ' . ( $req ? '<span class="required">*</span> <span class="small">（メールアドレスは公開されません）</span>' : '' ).'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
	/**  ウェブサイトの項目 */
	/* $fields['url'] 	= '<p class="comment-form-url"><label for="url">Webサイト</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; */
	$fields['url'] 		= '';
	return $fields;
}

/** コメントフォームのラベルをカスタマイズ（CHAPTER 20） */
add_filter( 'comment_form_defaults', 'comment_form_custom' );

function comment_form_custom( $form ) {
	global $user_identity, $post;
	$req 			= get_option( 'require_name_email' );
	$required_text 	= '<span class="required">*</span> が付いている項目は、必須項目です！';
	/** コメントフォーム textarea */
	$form['comment_field'] 			=  '<p class="comment-form-comment"><label for="comment">コメント</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
	/** 要ログイン時 */
	$form['must_log_in'] 			= '<p class="must-log-in">' .  sprintf( 'コメントを残すには、<a href="%s">ログイン</a>してください。', wp_login_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '</p>';
	/** ログイン時 */
	$form['logged_in_as'] 			= '<p class="logged-in-as">' . sprintf( '<a href="%1$s">%2$s</a> としてログインしています。<a href="%3$s" title="Log out of this account">ログアウト</a>しますか？', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '</p>';
	/** コメントフォームの前に表示するテキスト */
	$form['comment_notes_before'] 	= '<p class="comment-notes">' . ( $req ? $required_text : '' ) . '</p>';
	/** コメントフォームの後ろに表示するテキスト サンプルでは空文字をいれて非表示に */
	/* $form['comment_notes_after'] = '<p class="form-allowed-tags">' . sprintf( '次の <abbr title="HyperText Markup Language">HTML</abbr> タグと属性を利用できます: %s', ' <code>' . allowed_tags() . '</code>' ) . '</p>'; */
	$form['comment_notes_after'] 	= '';
	/** form要素の id */
	$form['id_form'] 				= 'commentform';
	/** submit ボタンの id */
	$form['id_submit'] 				= 'submit';
	/** コメントフォームの見出しのタイトル */
	$form['title_reply'] 			= 'Leave a Reply';
	/** 返信コメント時のタイトル */
	$form['title_reply_to'] 		= 'Leave a Reply to %s';
	/** キャンセルリンクのテキスト */
	$form['cancel_reply_link'] 		= '(or Cancel)';
	/** 送信ボタンのラベル */
	$form['label_submit'] 			= 'Post Comment';
	return $form;
}
?>