<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', '');

/** MySQL データベースのユーザー名 */
define('DB_USER', '');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '');

/** MySQL のホスト名 */
define('DB_HOST', 'db.sakura.ne.jp');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Pq%jYkg@@Xsw${9 x0~YjhAF}%`,=I|[<prV^;e((#m3$+6kuNax0>p@?^,xij(Q');
define('SECURE_AUTH_KEY',  '!NK{aaH R]>wi{<Oy4~:Q=SIj^PTSc.Pu/2*^y~R?v9BZ?:~RQ)g+7GQX:(oP*Wk');
define('LOGGED_IN_KEY',    'NRg>&=2*Sx#]0&~d2]6wt~NA7A7I%l-ddn- .~jAWXSTL|v_ZsxWasr`0P2Os+W@');
define('NONCE_KEY',        '`29]|W06.!>b{G:S+S= 6C.WR:Wgw_N>7^AO8xX>yuxT/{>!V_?Hl>U96]LqAHaD');
define('AUTH_SALT',        'g-Qh9x`i@PWw?37i_aF> ]KXA5lDt:pg Wy;&R|Sz(_tQ1@-#HHC5kX_T;Meg-i/');
define('SECURE_AUTH_SALT', 'H4`nNfBs:IPyOIbYhJ,bFw>zg]&S$>?lKS$nc7y@6rE)v80+1(Crx/&ayH$y3>kF');
define('LOGGED_IN_SALT',   '4J>Qs(*=@#tE =;fK-LR0!pCytoM=_l6$(o`j;Id_h.nydqMsOd/_%Y)/l?[Z%z#');
define('NONCE_SALT',       'b(0?IZ.E8tN2 1U 1R,ZKB{-B{bX?|%rx:yJt0MCWa`9$lkt/]#ueaKDdK/DXz43');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

if( isset($_SERVER['HTTP_X_SAKURA_FORWARDED_FOR']) ) {
    $_SERVER['HTTPS'] = 'on';
    $_ENV['HTTPS'] = 'on';
}
