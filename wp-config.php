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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'c50598b9c3e14de90d5cf37d0bd524b1c35dc4dae05cf795');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '.;z2[ -G{yRE-or42.]^~#7}8IjCg1TB7uI[k3bGL.L|#rHF9cg`pL1ScrhP(=bV');
define('SECURE_AUTH_KEY',  '*$P3d)&@&a tE6vi5:a;/dw{E/3oEu4<6rS}Y%LF1h!<!~Rie8 g!zjOuC&/lxjs');
define('LOGGED_IN_KEY',    '(,zqB]wvDCQL2(w8,GX3q/<IuNzAt_!]qLq-XrJR=-[B5K.;KaA94R2K-P@/oi-W');
define('NONCE_KEY',        'awW2BLBhDOT~tW^090na=%wT[^ FBo~7MLq%SjenYX`CM*pra6mLtFnN>p]:m>`I');
define('AUTH_SALT',        ':vXd&,>Q=1![w`Drt;MFf^[Tw&?i^A8o6k`2^V8qCp~ZE[D4nUAe!IXe2~_>p`Mt');
define('SECURE_AUTH_SALT', 'J.$I9h=-Ivo@C$:`|lP?DCWIl9G+uw:B~$ZQ8_QLh0UBt3R~l^qYB^4}+mAX/&}}');
define('LOGGED_IN_SALT',   '/B-3xto,fwaLZGM1MHyVS|+fD41h6BfJjT9=3S{$wUmx8`>AUAyS0!dq(vi=YQ[-');
define('NONCE_SALT',       'y{^T56PRd~-A||1v6^JJ@aZxC5o714`>U4TweW:Q|c4&kj4V~eNb#dYGJR[[)Eoh');

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
