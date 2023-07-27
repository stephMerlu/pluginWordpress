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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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


define('AUTH_KEY',         'ewKESxW38nCXJjLxhMQX8ke5h4VfxvAhTKOly4/wnxhH9hVOh+t9bt8ts6Ic5bqyGc/RRBzmRId07gLmF4ugDw==');
define('SECURE_AUTH_KEY',  'gCnDipZVwnWPCJzpRDTZZ7DiMwpY2Xeu7wX23E8/CgNEJEzamjhQsdPWaMv3Ks6URFf65ZkX71r0sI+RLkkjVA==');
define('LOGGED_IN_KEY',    '/vfhNcqkMDirnFHFA/E+UtPyDNY6u8bY8esyr0gjBIYlewlcZDZdexYwZkWHX2Ols7lvvPfkqgm2vghgMGKmgQ==');
define('NONCE_KEY',        'iKtdycAahsvEvH+F9YPxhpxIOZm0xg/vugZ8bJldSE5HTgHAHceyEIySJRUX8Ufy1rbEMN6eS6E7t0wMUx+OrQ==');
define('AUTH_SALT',        'VrWYj2ybx75KQs5cvT6x1dbK2jz58yXd3ehYffkINPVUgzYC29y8sEq4yDLO5tWJcUYg2oUxANNu1EEw0Wb/BA==');
define('SECURE_AUTH_SALT', '/xaKZfkWQ+dpm6ioxZx95r96lPvjzOxYuAB1n7F23qTYhiGb/qpVQPOPNMoHT1f64XXrDBVylONxsXmsZtuazw==');
define('LOGGED_IN_SALT',   'JGeNaZElN10ZNvaTI9whUAlKVsdxnZfcmAN3JWaSwlSqycNugHisG5OUuvUdqhD8Ce+f11TnaOHPwqG+seu9Pw==');
define('NONCE_SALT',       '/ZhuwFqbeeh+AM9bFVbRuEB0nWRPL1AyvAMoykVSCwzzlBGGSEPPHaqOgygOatE10w80YRtDNG4kIyeFFfEkdQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
