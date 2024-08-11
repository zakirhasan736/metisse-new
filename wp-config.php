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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'metisse-new' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'pkF5^QQci[FU>W3)fR(0%pq>N0PM@VY; Gc/>mYrRm_|3Gli.x4w5Vul)MeJKtm&' );
define( 'SECURE_AUTH_KEY',   'CDJ*d@<ZKu >!kmxctCK:,X)_XZpmH~eHk`~*<+4IZ+)g85on%tpfO/5AUOGwzdz' );
define( 'LOGGED_IN_KEY',     '_IPal/n2&Dt_:-WMcfCW}TV7~sC 7zM2f`M<Z)~btt%w^67?{%I&[ %Mxjo$DyE*' );
define( 'NONCE_KEY',         '5:!M/L|>C:mxDbt{W-@o|SZ/13m$t+D0BAU. y43312kJ+*#0{r/NTHl;!s#;]Ee' );
define( 'AUTH_SALT',         '7mQwu0chywY{W:nAgX*,wGTX>_P()Pz;2rL2aJDeU|vPd<i!FXh[OUv~RoNH9b]9' );
define( 'SECURE_AUTH_SALT',  ':zC/)G?dWvl3Mi4%$nUX0(c8(MHY[!w$VWo%!~Dn`Z&tR,9k9A{8Q@1XHO->$cy^' );
define( 'LOGGED_IN_SALT',    '.]P.KFqm-G<*|IKiC6-${C1`c dY;Ka9p8OP#{fr;$ sL?6)otvjmK)^f{^R29TX' );
define( 'NONCE_SALT',        '5s@j$%Y0/{B4y[}<MHL%7-b$%s$^;oFY(JF]4;ykpIB*YI6:Og>`{t<y)gJU!nrJ' );
define( 'WP_CACHE_KEY_SALT', ',<Uc6>wOn(h_7wg!.;|=0{YiE:P&4,./?j@1Z)O>ecPT;dYeVbMxd!|L65P@lPL!' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
