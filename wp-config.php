<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ogani' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&@z$OHgQ(f^kCfeO0Qp);%0(v=;$t(dW6}Bt7`Z|,71^bf5/5q3`N]Ijm`2mcM2w' );
define( 'SECURE_AUTH_KEY',  'Ls^S$76N(Y%>J)_@*IGJ9LdA|.cl}uB-yb r6&6&A^o^iPcfQ1.k2DU~UC2Zx~Ln' );
define( 'LOGGED_IN_KEY',    'G<8>UPL%;A]SfJKn^GCM{$<>bSPF2l=_jW0$2aZ!p/Cm(2tBNhlnck[90oh9,}Yp' );
define( 'NONCE_KEY',        'b)Lkd.2ufZ;x%S=ww%2HY/<Q9N7::RGp!g,xF!jp=ZR>j%ff?39&O;)$Ju:(pDNQ' );
define( 'AUTH_SALT',        'G3WO|Mpkl(qRfA82sZbvm,E+83tUAA5=f.@@cTUk^]BP@P@ f=A_.Q#tJjeu(Hha' );
define( 'SECURE_AUTH_SALT', '8r.IDU?%}Mon!G$vcl+/#iUoF{flWq0KT#x$TffkUNuZN(HTz4g_!vUa@${U7pi~' );
define( 'LOGGED_IN_SALT',   '}mhhvbSLY_Ts^T+{[nR6G:Kn!E-7OA@J,(`M-Q-MN&ew!(9rwJ03=iFy#10)k.$j' );
define( 'NONCE_SALT',       'AE0R?bl[M81=NjAH}A9ybQ%n F U %M#81;Y!c&Wfn.8n# X69Vu/[<#``xnZ&XC' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
