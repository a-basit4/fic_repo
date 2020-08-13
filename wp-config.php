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
if (file_exists(dirname(__FILE__) . '/local.php')) {
	// Local database settings
	/** The name of the database for WordPress */
	define('DB_NAME', 'fic_uni');
	/** MySQL database username */
	define('DB_USER', 'root');
	/** MySQL database password */
	define('DB_PASSWORD', '');
	/** MySQL hostname */
	define('DB_HOST', 'localhost');
} else {
	// Live database settings
	/** The name of the database for WordPress */
	define('DB_NAME', 'epiz_26469806_fic');
	/** MySQL database username */
	define('DB_USER', 'epiz_26469806');
	/** MySQL database password */
	define('DB_PASSWORD', 'Basit12345');
	/** MySQL hostname */
	define('DB_HOST', 'sql113.epizy.com');
}

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
define('AUTH_KEY',         '+_/|c+5X0aY<yBq*04~}>oQ/U[|8+*`BD@e->dKkd`lISJJF7j(rZVGOCOBmAzHt');
define('SECURE_AUTH_KEY',  '<k~ %fkJ!X5Y<:>{#I$3=bcEB- 4.<*`7dkDRji=H`S`DX8cyA<f{(qDx+$}||Hm');
define('LOGGED_IN_KEY',    '}]:NY|cOnpEla5k&w?uU@]a!&F>$S[kz7WwhGuU9F(8C9mw[Ru,YK|6N@m*vjT(e');
define('NONCE_KEY',        'E?HzhXn.^+1_Fibx6/6i##J@9wBSe&XK_g|-gz&*nujyEZGS -.Ke4XT7krS5,hJ');
define('AUTH_SALT',        'U@N34p|:`0ofC&zLi<Ixx.B}#z9$srB7C+fN<p[:xyc?E~Z!:nEK-o1CU7Ib~<=d');
define('SECURE_AUTH_SALT', ' t<B)<@g-trWYnL)_;|il7PCN;tU8wV46NqNR)|WSt .qC`)NOaISX*yx:7v.80~');
define('LOGGED_IN_SALT',   'z*n1j}t&T*82HV_CNeF]Q;[,_JD!lqE7So@WDl32^zS.^{8tEW!z|AOhjzO[6u_ ');
define('NONCE_SALT',       '1l43?L@FP;PT,lf+v -_b}N<X85kHJJdx^:}kIaCY](}!hj$%G*paV^8~N{ +p?z');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
