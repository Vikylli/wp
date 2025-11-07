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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

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
define( 'AUTH_KEY',         '09wN`kZ=o0#Xa8dTcMG;<O#Rba[I4T gXJP:]6m@sZh@>i_KEb_HeV_bFGs+w{0)' );
define( 'SECURE_AUTH_KEY',  'bCuQNqOLU<ZFvj}OwyFIi3X(x5pvy).V>ua*X? vS1[|riq:2GjqcODLg}t)oScw' );
define( 'LOGGED_IN_KEY',    '*ota`7M$uLC7G~4AMZ2}{| v]n>;l+jdo?g<Pv*-O=-xo_%MwwTSri9OixC=t R8' );
define( 'NONCE_KEY',        'YSd3Lu;r(G`65vO$EkHGJJ7:r8?8I9eV5V-!aH0)Mn`>8Nfo]}*aZQWyrbYCcZMB' );
define( 'AUTH_SALT',        'c7eXjY<KR%TUS|q/K9Z3.G6|_*Jc91?03 }J|gXQ?1@Qy,Mx!%)1WD$/73ElVE4%' );
define( 'SECURE_AUTH_SALT', '{OZv7f&682}n$v5rO+IWQ[,=n`Ly=VtDbQOdbvh[jK-=<7w.P7u4O#Gl=5`Xt(mS' );
define( 'LOGGED_IN_SALT',   '1A+N}1jnN#:Sms]DziR{K|X1U);l.~N8DXB3(P{Xi69>e}ypYu_vJz6}8{]Q{Arl' );
define( 'NONCE_SALT',       'PYJk@SbEcNi17bQB][!V6Lf0S/rkMO&A3HOD+`T-PK2%-&ABvS^?rK$a:r X{iL%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
