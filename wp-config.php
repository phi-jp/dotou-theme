<?php
/**
 * The base configurations of the WordPress.
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'dotou_net');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'wp_84e1e8acb21f6');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '2b1b9bb1528a64f41374c393379d9a64');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost:/var/lib/mysql/mysql.sock');

/** データベースのテーブルを作成する際のデータベースのキャラクターセット */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '.lr,<^rr2xO_+qJ^^9Px-Y~BuxEqL)^{]!iXO1$N(-ag#pC_Tb/yV=_OYwu?zJ~n');
define('SECURE_AUTH_KEY',  'inpVoedwq^*yeo=fNc|)nQWlmF+z5<L[Q0f=q!n|HHqO<_(4Ers!A-aoH|uD&]%_');
define('LOGGED_IN_KEY',    '8!ka{|dzpWBWbcsTx.$`D#M$gUo-AaO_ !|/TdVzHo2isJ1IM*w0?srO8<-HlaD3');
define('NONCE_KEY',        'L<i|G0XHIp-F]!}o&|c00([o>@6r`U1 ]Sw*!W_`EmOG* `f~qiq7UeQBn;Fm4^a');
define('AUTH_SALT',        'vo(-EHcIjiA{YxS;JkbpHy:+-i{xQFS9E6=Ld &9fRB]Ml?eKA`U|xCj/Z*<xv``');
define('SECURE_AUTH_SALT', ';s)>+wbsP!rsmU 31[)$X2WBxB7{p-[b8D>8h|cvaJ`@+DV-Sj2zpRr]z*WiW&7%');
define('LOGGED_IN_SALT',   't<Zz>va|uS;S*kJr uUMxcZ._%{/u0-pG-@NKt%3;!~P-dwtywqEYiBKM[(}7F$=');
define('NONCE_SALT',       'v0zU,D+vNZ^-(>^cofPrV$CP:fxS|9y)r)l>2+R3Rp=J~BFX>z#A{Se|~5j!`Ei4');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

define('NCC_CACHE_DIR', '/var/cache/nginx/proxy_cache');



/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。例えば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定することでドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// debug
//define('WP_DEBUG', true);