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

/**
 * Local configuration information.
 *
 * If you are working in a local/desktop development environment and want to
 * keep your config separate, we recommend using a 'wp-config-local.php' file,
 * which you should also make sure you .gitignore.
 */
if (file_exists(dirname(__FILE__) . '/wp-config-local.php') && !isset($_ENV['PANTHEON_ENVIRONMENT'])):
  # IMPORTANT: ensure your local config does not include wp-settings.php
  require_once(dirname(__FILE__) . '/wp-config-local.php');

else:
  /**
   * This block will be executed if you have NO wp-config-local.php and you
   * are NOT running on Pantheon. Insert alternate config here if necessary.
   *
   * If you are only running on Pantheon, you can ignore this block.
   */
  // ** MySQL settings - You can get this info from your web host ** //
  /** The name of the database for WordPress */
  define('DB_NAME', 'enreeduv_ver1');

  /** MySQL database username */
  define('DB_USER', 'enreeduv_ver1');

  /** MySQL database password */
  define('DB_PASSWORD', 'caohai@123');

  /** MySQL hostname */
  define('DB_HOST', 'localhost');

  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8mb4');

  /** The Database Collate type. Don't change this if in doubt. */
  define('DB_COLLATE', '');

  define("WP_HOME", "http://enre.edu.vn/");
  define("WP_SITEURL", "http://enre.edu.vn/");
endif;

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!XTz,?%EX=;8v8-.].{) 8VRVM]gX.5XHlu!{z(l ex}cTk(IUiLizA_Bt0Q/S}r');
define('SECURE_AUTH_KEY',  ':&hA5T?UjAB~b]tBG0]T#|8@~}/<:6t!J&*bGvSGic >jG$iZ&)xmu{CJrJ08D*P');
define('LOGGED_IN_KEY',    '$nt2cs7yHI4$<bfleG;^h}8{#ozC?nVy~=_nJ9:nSN0}>pNCm$K~~>&Uz^`BT%6=');
define('NONCE_KEY',        ';E/O5^wNX`GSJ. IMa$j/<M?vu B=kKAt({{%;[*6{O7Z}xhzEq h|A~C:O#FV2j');
define('AUTH_SALT',        '9UWK^t,m/@<0gdQz&<Az cH8Oy>^uc(#S*dyitD54|PI}}3lMtVu?pP9p(b1?B9&');
define('SECURE_AUTH_SALT', 'rM@8v~`5w}Dr!!{oF1~G4Ig?(oT~;E:f1L<=&j`uC6z1}OfPoz179,OJL|7kaJ=J');
define('LOGGED_IN_SALT',   '.`(UmBg}w_g=|wUpqmHLK^r{:wF~iB*/=W}2xi!ET0tkP6  0J>q:r0FG9Me/Yqh');
define('NONCE_SALT',       'l25H{5/:Z0sa.4|kiL!_=f!*RM*oL3Xpa|+]sO0N qu4OH9SY9;=<]4V|q(38ME?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
define('FS_METHOD', 'direct');
define('WP_MEMORY_LIMIT', '64M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
