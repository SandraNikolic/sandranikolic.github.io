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
define('DB_NAME', 'projekat');

/** MySQL database username */
define('DB_USER', 'projekat');

/** MySQL database password */
define('DB_PASSWORD', 'Vlada123098');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'cn1T/9r=g9m9e2z3gtBJ%~h[$@N(Eo&]P_u$&(Rn}ovtgVp~qZO).[W9k{R-Fzt,');
define('SECURE_AUTH_KEY',  'Y8Z47K{9S=$)d@s;|]U^0bZuc2 1,527qTBOFtxKwRc,Sz?:iLx^^60R[f2IFVY1');
define('LOGGED_IN_KEY',    'N0>]V[O~aaZ7mOvFn2#y)wLQq{0A(|UHUzT@}4DF^g5aU NYyz#V0)O|#`{~V`uK');
define('NONCE_KEY',        'z{ArGWSZ8MzF<c<=_*h%lp2CbD=a2XT4B#dXSOlI=`@0I8m%9RrCoewm@B;/E8Ad');
define('AUTH_SALT',        '*JWFM45 PdwPB8qj$dDY?Dxk_~XPE,r+3q}cjCH6Ro`Bw]wB5}6?nEc@fm|dQHs(');
define('SECURE_AUTH_SALT', 'uHkF$.K+<jI1,57f0Jmx{>pD7d}>4IsRjd3)==@CcN#f]#+lD=VMfLk*EU3FH<Du');
define('LOGGED_IN_SALT',   'Z`<9/1:w#y0/dXF?.67u+_J]:TER(bgD{d3$iGjYY*i|pk/q&AhXF<jVXtd:Q)PP');
define('NONCE_SALT',       'fv|<%KBWNnp0&r!Lt0JZXP;Ix$t{=!-#iqYvW)JI_o^uRL6xRVoEv#bVv{bZ<GYl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vs';

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
