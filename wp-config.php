<?php
/**
 * C?u hì co b?n cho WordPress
 *
 * Trong quárì càd?t, file "wp-config.php" s? du?c t?o d?a trên?i dung
 * m?u c?a file nà B?n khôb?t bu?c ph?i s? d?ng giao di?n web d? càd?t,
 * ch? c?n luu file nàl?i v?i tê"wp-config.php" vài?n cáthôtin c?n thi?t.
 *
 * File nàch?a cáthi?t l?p sau:
 *
 * * Thi?t l?p MySQL
 * * Cákhóí?t
 * * Ti?n t? cho cáb?ng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/** Include .env **/
$___file = $_SERVER['DOCUMENT_ROOT'] . '/.generated/' . $_SERVER['SERVER_NAME'] . '.env.php';

if (file_exists($___file)) {
    require_once($___file);
} else {
    exit('Not .env');
}
unset($___file);

define('JWT_AUTH_SECRET_KEY', '059d5ef380b8bdabb9c6b4037872347b');
define('JWT_AUTH_CORS_ENABLE', true);
define('JWT_AUTH_EXPIRE', time() + (3600 * 24 * 10000));


/** Database charset s? d?ng d? t?o b?ng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Ki?u database collate. Ðng thay d?i n?u khôhi?u rõ/
define('DB_COLLATE', '');

/**#@+
 * Khóáth?c vàalt.
 *
 * Thay d?i cágiár? du?i dâthà cákhóhôtrùhau!
 * B?n có? t?o ra cákhóàb?ng côc?
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * B?n có? thay d?i chú?t c? lúo d? vô?u hó?t c?
 * cácookie hi?n cói?u nàs? bu?c t?t c? ngu?i dùh?i dang nh?p l?i.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'HO!@MRXcP`!;CyD~r.dYp(KKdv`HMig3A-)tjRf3E7avXk%]?}.J`bszy)PRQH%i' );
define( 'SECURE_AUTH_KEY',  '.GsBe|/qR_U4ZKvp6:r~UO,=1}PLU$3`O{_k1% %m~o?7ZBOv{gNS6HY#9t5(XrM' );
define( 'LOGGED_IN_KEY',    'Cbd_d:[wxa?[H)h SZdgkVlsps9vSfO}un]pL3ff:JDL]o>tZqr/TAv3,I@``,<a' );
define( 'NONCE_KEY',        '].l*^%O}j%U^6*qu}!y@bp`M0^:p]mDi5/4VbJ+__1Is[m^Q+[}l-lZ&v!B5#pbV' );
define( 'AUTH_SALT',        'd#}/@Socp07Cs.S08L;V-Dh0g1rb1-Rr,A:d#`^xG42gb!1,;[-vs?-_ruv)%q`/' );
define( 'SECURE_AUTH_SALT', 'xUezP98}DPql=QlS.y`Z++Ao@M;=QcGwOu%rX9nGNyM=X>R}.0^H~*/p[o;SQgp_' );
define( 'LOGGED_IN_SALT',   'F>>v9TNNlsj6p#i<<fdw!x<)Z67NUIH`-k<n$4JJ:!}odQ;ftHokwr(uwdRQZ[Q6' );
define( 'NONCE_SALT',       '5W4iXz7(O|Cq|01}rnCmW*1!S{4?a6c9_>:#<+X|9-/XbPqUwCGNY1gX@mE<UD4_' );

/**#@-*/

/**
 * Ti?n t? cho b?ng database.
 *
 * Ðt ti?n t? cho b?ng giún có? cànhi?u site WordPress vàcù?t database.
 * Ch? s? d?ng s?, kýà?u g?ch du?i!
 */
$table_prefix = 'wp_';

/**
 * Dà cho developer: Ch? d? debug.
 *
 * Thay d?i h?ng s? nàthà true s? làhi?n lêcáthôbátrong quárì phátri?n.
 * Chúôhuy?n cácádeveloper s? d?ng WP_DEBUG trong quárì phátri?n plugin vàheme.
 *
 * Ð cóôtin v? cáh?ng s? khácó? s? d?ng khi debug, hãxem t?i Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');

define( 'WP_CACHE', false );

/* Ð là?t c? thi?t l?p, ngung s?a t? ph?n nàtr? xu?ng. Chún vi?t blog vui v?. */

/** Ð?ng d?n tuy?t d?i d?n thu m?c càd?t WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thi?t l?p bi?n vànclude file. */
require_once(ABSPATH . 'wp-settings.php');

