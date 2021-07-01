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
define( 'DB_NAME', 'plugin' );

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
define( 'AUTH_KEY',         'znO3[6T*7usu2mfQU|4jh?^Jplzek4DX r1OkFi;y2y;am+hvPgujOJ6oo=k4y!_' );
define( 'SECURE_AUTH_KEY',  'sl$rB?KVB,l+<Y#A,Q3az05}lm`GY@!5HTb]u-oZ{|UcvdZT!Jrc}L/Ja_&&Z1$k' );
define( 'LOGGED_IN_KEY',    'n=xxc%QBb{Q5M@wZZKg:+*YBM]=60qYl|aQx*7`Is6dv]=Md/t=xvcQAr> t5e74' );
define( 'NONCE_KEY',        'O;sKFXE_@]{%#@wJw vW$^#wa),to bgFxu^O>.a/>YQ0A{#I3F(V4Znro+{4DTV' );
define( 'AUTH_SALT',        'BCs0`LFX=,S`12rHS2J|<aAt7zIS-+qv0n388X->%iVATdi-+%HtKCRvwY`^,[VS' );
define( 'SECURE_AUTH_SALT', '>bfCyvDDjQ,S%8VAoUhz{v|smR=Ap|@HS.68!Q3n2vy,=HXy~K-)X+8}V0Ln_G{E' );
define( 'LOGGED_IN_SALT',   ']F M1zk@8@?*% P3=~{D21JKlfPc7h6jSVZmdu-?}i!Z)U?NPUFFnGA~}`]4N&:c' );
define( 'NONCE_SALT',       'zc1V~`Dd{2xEDae(RYjY%[#BZyhL{9Q}I,fjJ5H?Zhan<G[-JP{,:bba8n6cHO11' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
