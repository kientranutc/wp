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
define('DB_NAME', 'shop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Gf.fgS2g5n(z 8/h.*a36mMiwZI]5c&Ih2WLxA+G]U1R/zOCKIdyvC`j1+hZ^4=:');
define('SECURE_AUTH_KEY',  '},_t{v1)s,TvzKywbWwoXOl w8v2=Q[~p$SON3Rp!HS4R98:<FynckaEOanu^!hW');
define('LOGGED_IN_KEY',    'YL&lJ4y-{.8(<T/k`Py-{7t:RYVB84hY<g2d{BbT8O87XD_(%g%+$:9--#aGf^1#');
define('NONCE_KEY',        'euuvR-P8YoL5[AcYS56tLL(``Ru`x1J{h=hOmh)WA{1b9]<R|S^xpK@[/(*I6hUK');
define('AUTH_SALT',        ' TRp)od2e(^0MOFT`VNH*3ptzo.X!)7XXN:R%]jvb6Qnd,{{nStQ6Ke<,lg~P8fE');
define('SECURE_AUTH_SALT', '=|:y$e~7.(B}-N|0;.=]cghW[YjagPP#o+w#_(.twzY<lL!;N#YX8r 08rXC]&WO');
define('LOGGED_IN_SALT',   '9kHc3^r7J|0w[&cI3Ure1x?&w@Mx8LS!g}Er)EMXJylv,i~R(NGirM9%Y(A8F$A~');
define('NONCE_SALT',       ',|b4GVGM#())%j&WY,{$y`DE6GLx/~^[Ft3|s,Lq;=+%st=fGjR>i@{#~(hpra^z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
