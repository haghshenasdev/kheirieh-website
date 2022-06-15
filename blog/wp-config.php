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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress2' );

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
define( 'AUTH_KEY',         'y)I:<*2wV[M}Z``w5p$SD=aj9iSEn0?S*$4M{xPo$hdJj|oY*3L,LP6Uxa.lP-|+' );
define( 'SECURE_AUTH_KEY',  '^ps)6J;wqMM(ASB?w-T3sR7AB3KUIv8h@^duJ?z8pO5&&:{6H,O8Lkp8CsltfqH8' );
define( 'LOGGED_IN_KEY',    '0;$588J$,Pj4rABk^=18L(IqVx[Di3/N5_5,70z]<3Xlir;rdcy&^wIGbK+J gwR' );
define( 'NONCE_KEY',        ']scMf0_5#FxN-#8;^^t&C`/,7yby1l9FP,n=xu;RWs026avU[-m_Ke:2HqzE$Qf=' );
define( 'AUTH_SALT',        '$Ri-U;y[-GMMoM}oJ]<,a!+w*$z*.SBW4*,zr}eBW6!F6)`SnQ=WM%1oCh%?Lnf~' );
define( 'SECURE_AUTH_SALT', '?N6toWoAFP/4A.X>!4+hx--[$@?U~$/;c*hY>[/#DyGp;oduw*ZjOjuO|girZVki' );
define( 'LOGGED_IN_SALT',   ':<c6_NYQ]W|hPM%#^f1tfJ}CgVg<bmGJ[Spm8?:_!_&h_h+`je0q8+>z*z(Zi%/5' );
define( 'NONCE_SALT',       '=Z>RU5~R!%&BWMGEAdeDdaLrjMqAj~cb m XYy7o&bE!f:X!:mAqJ1inga2(VGQn' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
