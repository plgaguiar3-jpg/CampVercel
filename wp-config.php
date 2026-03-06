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
define( 'DB_NAME', 'camp_bd_26' );

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
define( 'AUTH_KEY',         'XInz|fWF/xTQ%O}C6g(ov@bEX,(k;?x8HT{jcy$zmD[gN80jc|z!4rs,tm7zlQFA' );
define( 'SECURE_AUTH_KEY',  '1DoTl*u.70#j^PUK`XcKOj2%$|A#Wcp;Bs.-[c7y Zt&9Ad?v#?L^R:Mq[d/I{f7' );
define( 'LOGGED_IN_KEY',    '`qE5O;#8$i01Hz?qPrSf0]P3Do~$2#giVG:2`-tR`oU,jtqBw_UUq >>9@d)}%$V' );
define( 'NONCE_KEY',        'Keo#Y-S+zp,9n}sH6;+0gvGdmMcBO/$m^|C!6ML|rbq$2%3}+0`h#s:w6s%?SOIW' );
define( 'AUTH_SALT',        '>~+n/N?+zEUe@</V${JL0r#(kXU@/6>/g2f?)H9M!z7M3:/T#=N|U?>(_blKZdJZ' );
define( 'SECURE_AUTH_SALT', 'j<5>osZGN=;3Bx>%]D?egWA5Gq].l[Yw, +EPdcsQH(EjORlI!DLiHjK[=JAco_.' );
define( 'LOGGED_IN_SALT',   'GRKUhm$,o?e^<^BGIrySx1GO9@k{o8{4&7Tt&w7/U)kBUz$i806KZ,27DTx3*,q+' );
define( 'NONCE_SALT',       '5% BfGdK|7jcndWbY_3Fm~Ztkt`ypH]weJqfnrBXaC&/O(s!I~Bfrv2Yv=tUy;cM' );

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
