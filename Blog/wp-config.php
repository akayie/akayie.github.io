<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'blog_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3308' );

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
define( 'AUTH_KEY',         '*gmWh8Cb{~.yTOtJad(tx>z8)Kqv~re>#hNk}t~WM25(i^HW<vUaM[r|3j-QbxE>' );
define( 'SECURE_AUTH_KEY',  'qd~(IEKuSm*:F1_:6D!H,xqBc&7p&[M%tppIBl5889,uHQl;}%l8L?HHg9O1S}t+' );
define( 'LOGGED_IN_KEY',    'wQ6pemB2v>GL%9]_K };j%SH1?]/DEV>U8>0j1sv-}ID=o`6&`X>fc/b<yYsDnjp' );
define( 'NONCE_KEY',        'E7z3{m]?_j@>5) Z5JKpZ EoW+,7rH9vr6 .yekDL>_-.^>rwt;N#9~wr)&_,mS:' );
define( 'AUTH_SALT',        'DwgrB0x2IDA]0E:Zqq9Q;p}7WP%uL%`N=&y#Uf_)Ab.B#:,2I;ONLy`(xA^N-j,E' );
define( 'SECURE_AUTH_SALT', '16:}Vm0&@*r{^5DN/Bcb5Zi&qWA=fAsRe4m@x]0Yz+4bGV~Q^9q65~D`ToCxw#NX' );
define( 'LOGGED_IN_SALT',   'M?|s1,M,zVrXq6XvD{usG]q58k(|-_mn=jp2NAjm~,ADAi4TmN4):x|N!cU4{-n-' );
define( 'NONCE_SALT',       'k%Q8tM.}IfDBcii&s.1~;(fV{m4479C%mnT9[>7q]I;S/=CO[4A$a ]]a=_PojL[' );

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
