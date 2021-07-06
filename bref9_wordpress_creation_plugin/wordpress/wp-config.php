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
define( 'DB_NAME', 'y-c_wordpress_bref9_plugin' );

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
define( 'AUTH_KEY',         '&:RI!$5$U-IU}aRnN/tU{iiM1i$;|Y296QsHU6!yTVW0+%0oUQ#Z*[-)ematfaX<' );
define( 'SECURE_AUTH_KEY',  '/F#AT|4z/q bCmTzfSi:eL/`D3xg1O;$q# _}Epl}:S6}<b$=7lg~d2zL!yH+%G#' );
define( 'LOGGED_IN_KEY',    '|=G-kyi$.j<y6r.Gn?qzzy(Ta3$=0dRViV&{)e}s=vNuKX-M?zza/(^B{/ks3f=>' );
define( 'NONCE_KEY',        '(^UM 05(i|aOZA7mP+X9nw7Dog25 mNH>2d@;~>vp}hF.5?b038V(~lD-#h&cO#0' );
define( 'AUTH_SALT',        'ki%;-I n*1s,0H*,6Z$4D8qg{)FI[j,R|)-!{3=#wzC#Io1Pw^;W0H@#]PKmdtrO' );
define( 'SECURE_AUTH_SALT', '`!Uvh$,>w AbpS5sSxo@F]f9B<^|QvE`NEd+XZ`1Ev3np{d4[g9P./O6?5[{)r$b' );
define( 'LOGGED_IN_SALT',   ';:yw`z: (^^b|YU-<fk*}w/#VNdG<d[Uwo<(I?=*WcR=)2U+UnMK.$ZU~Q/inOYO' );
define( 'NONCE_SALT',       'y^^1;1`:W:@Eu A|LK+k6fQ4]1u1zDrdn@2~,nvqO#GjwvYgwhSM!7M*yh2@Bl5I' );

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
