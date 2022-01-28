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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZgMDqjHDrcpB07L3x5m4MM0fHssUAA2T3Vnh7Bh4zV5vb8imPc4CycNhtSR/5f+1T1svmnJGgFuPjY2fAMqJFQ==');
define('SECURE_AUTH_KEY',  'AFWvpaYjxwEEZ4BJ4cG7qwdtlw623L/hIVZfKrIUOkQgoG4avXtjttgV6cRZPGSNTwY066v64THuNtgBfEWgVw==');
define('LOGGED_IN_KEY',    'G3TPeo72SS02KbzNlfRuZqOPi36ZAP/OI2XtAkOuqyc35f7rEL6ozG2LnPQVdik3YailPgxRh7R5RqCUiO0nKg==');
define('NONCE_KEY',        '0Kgd8GqFA7NKnW7IZWzed66dngn77OKcUgV8A0GggCqpoAtzqrSemF2U+zWM2xFi1omoaB/caa3MqNHlMzr4Xw==');
define('AUTH_SALT',        'GwtE7LEId8aD6WxNduHihjFGP6z7FghiMOGzocI8QdOLwoLBZzbqte2ckmr4v3dAWR7Z/iHeRFN6ozFF2xNYgg==');
define('SECURE_AUTH_SALT', 'KMd0widcT882ieR0tukU2BI8Wh1hamxuNvwzVPl830ubUJa7H/+nMufzUonZNv5WqFW8b7aAatm3n0RSxwUyrQ==');
define('LOGGED_IN_SALT',   '8H0HpEVZT78Hpe1iSxDiBANVzAhpyIbPftOBiNYJNDZ1peNNsCKqsRtcFs5iHgRwR0z+n60KNQHz/DhgXW8A7A==');
define('NONCE_SALT',       'iCF3y1bSnBnMV2fQgntVrFMtT8h6hxJAnPTegKAgkiU0YMVXA8VqfAMCymwSGXgDHy3MkmMSToBiNkvs4+DuZw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
