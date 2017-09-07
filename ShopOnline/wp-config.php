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
define('DB_NAME', 'shoponline');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'y{M=n+[@vC1iUF|aY;%#HVc;R&INQlkXslOxp=1Pxt(!F[3-r/9vP%Meo~_{jg-r');
define('SECURE_AUTH_KEY',  'Sh`C6qs(+Yr}Wa)*2esuB=?Qdyk`Uz:nKY{/?/^;Ldu_8@<Fc =x|FRR/8ld|<&p');
define('LOGGED_IN_KEY',    ' jpsN8VN*Unpb@Y_04YUyS-lQz;I<T$s_,v_9#j+o+phuH{:Ybp~EA..dW!pt0S,');
define('NONCE_KEY',        'Rm tyhbBM9dP3H30{V7Blv0BL<3/&-|[#{/nZU|J}q^1KP@qfj7Owq|-a]q9f|h^');
define('AUTH_SALT',        'ap9ykV*r?V*1R6-$WJ4,Xc=->rZ6OB2==T;CjOl^7JG}:)]f^-O{o7b`SY9PC<Wa');
define('SECURE_AUTH_SALT', '}5y(a_ti|g|L~Oq)rY3kS,`t|NCzXaA:5)]lMgED{}/7FN2?PjJHW548E<)[/+b1');
define('LOGGED_IN_SALT',   'E=H[aph5;p6m`!<e*k?23%O-_G<B?[/W8iOp^Jk#=)*Nuu2yIEK/u51uH]EtuXO+');
define('NONCE_SALT',       'Xos~wSxP?B%6Bq;FKx477_6&nO<lH+qj/1CoLe;^>wjer55IA3V,h~G2nH`(HlO5');

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
