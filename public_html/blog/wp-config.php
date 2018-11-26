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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'usstoki_blog');

/** MySQL database username */
define('DB_USER', 'usstoki_blog');

/** MySQL database password */
define('DB_PASSWORD', '*to4&B&~0tlp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+k!D(tDAd*X4OP4|F8x@P]r_l:_.W;D1@T97Hy-h!7v0*=BqZ{m0<e+//*Pp>ytt');
define('SECURE_AUTH_KEY',  'qU?4Np7F/,o)*C7aIWgdKYn7OUB4>_w{pua$MzQ(8u)ArXz*jo^gx%[6YdU1CdjQ');
define('LOGGED_IN_KEY',    '2ul*][M`5^j ;<T:`LvQp4Lp3U}>GZ`8<3kaWFA?49dFE3iv+crSY5+Q-GbG_VAI');
define('NONCE_KEY',        'AK21#JA!x]Z|guQ|rvD$}uYn:9m<]m_-ak]mUkUq6yFmFTO>IFh#t68BQ? L1yT$');
define('AUTH_SALT',        'CF*tVBjUU;3+s ;f7*~Gms?pQ{a8V<wU{JM@;fM@:u/:jv2#`1JaKre*~@?JUpE~');
define('SECURE_AUTH_SALT', 'k[@)V0,>t,H8GQ97x]4bd]y57TvHh^>}MS/[F%$Ig]lWO5y7.@|(?@| 76ld1h5k');
define('LOGGED_IN_SALT',   '^=B?I7%7.v{7UL=F8OzQ{nY(vpy])z6[_iTyZDwj|?Nv<=U}{a$CmHnG_xu3_=CU');
define('NONCE_SALT',       'Q/pml7jesmGg_a57Ok[P$33MWd>; L=CL$apZt]D<81f?q&J}?y|qA^1ef]O2YxB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ussb_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
