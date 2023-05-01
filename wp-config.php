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
define( 'DB_NAME', 'loan' );

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
define( 'AUTH_KEY',         'nqA6 84Yf&@,*c#QT9]!+ZY!nlA4aPF)Ae(7p|McnN?z^P2!o@CJ9:FjBPMlrJ:Z' );
define( 'SECURE_AUTH_KEY',  'HQ|ER0b2!Ph*2*Ybd@@~$# 9{O330x?J-=?W,D1<mM-em)}7ytP@sckQYis??=[q' );
define( 'LOGGED_IN_KEY',    'E*];SO=5p#n$vymVD z6Qc~`r<>^MR?F{.1`H(Xt$A*Nf5J.W#B/X|<YM^r ZB8^' );
define( 'NONCE_KEY',        '`UI})r#<!ke`,4=_V%rE]oelK)kd4Nwm:i[qu:g3D(Gf*KZ8j]N=iB$A~zKi!}FT' );
define( 'AUTH_SALT',        'Dxk@v%}0H}^3RSwi|aFwv0TvD26:^}z +;$Wm+wz-|Va2AZaL^#M#KfT1}@+Qx?X' );
define( 'SECURE_AUTH_SALT', 'ewv_Z+wV?]_9q3T#RgP{HJH*gtum.ho6JZ)A5NeWkf9{#;C]qyXLEh#]4{O.m%y ' );
define( 'LOGGED_IN_SALT',   'eoSg7X-SukJl@w}|FU:O!5g JoI5)+Cb&oP8J_krPbv|eH-d&>KYPzsDK/m?I3~Z' );
define( 'NONCE_SALT',       '7`9[E4r^7m0.zyl@4R,AdAF^)4u{$GE`tv&o@_.5|DUHW)yS%q+SrlA[vI 7I}:0' );

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
