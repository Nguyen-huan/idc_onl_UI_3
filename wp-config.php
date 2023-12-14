<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
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


/** Database charset sử dụng để tạo bảng database. */
define('DB_CHARSET', 'utf8md4');

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
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
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');

define( 'WP_CACHE', false );

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

