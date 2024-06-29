<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Makaan' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?<IBU%E&-](`8Fm[=6_)Vs}g=Trx^ASn4|DGpZZj{X[tCYheh  R[XJ*n1sgvbzj' );
define( 'SECURE_AUTH_KEY',  'q${fAD{f sk{!UWl{@Z4lx%a=$ILlPnVqMRb(w1&a.T-.e]MK*u@A`z^}u?-/:o?' );
define( 'LOGGED_IN_KEY',    'zJG*;,)){~[KLrZVKpo1!ry)_!kO!t,)wnDTY,,MORLl.D}hu9?QtNQgW5r(ehW~' );
define( 'NONCE_KEY',        'Y,qrnui<sx__qjZf >mqM}0*r]?*guBTxyKy((7=TiS@7Nriul55oE%lbX~ekbJ.' );
define( 'AUTH_SALT',        'OJYAIJc7XWiF,iy[+x=^K236sI2va^aYLk|d&4,mjeZ y6a7-sN~>(NZwdjv|![m' );
define( 'SECURE_AUTH_SALT', 'gl=?}WRm!Im|{5 TRMXYQK[1y4l4!~|zUopg_:G3XmTpY?}+U8IO[8.Y6C?XaJ]d' );
define( 'LOGGED_IN_SALT',   '@w,^L?vz)v?v+t?xa }V2e):8V=OS!+bU75felfayxXU?xld5<VyJ;Ya,6=zO]-!' );
define( 'NONCE_SALT',       'G96$U.%n>~o0pZ4Pg9P4T/N9:IPEn|PEcOb=M<O]Q!?gNV;h6hD&}_t8&lxxXk+A' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
