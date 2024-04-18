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
define( 'DB_NAME', 'bagino' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'Zo]}[[$KFXj9m{5:fH+txIKGb&@1@9&mrzh,DZYIgj``hP^ZkUbhbbR=i1z3pOw;' );
define( 'SECURE_AUTH_KEY',  '[/[f5<NN`Eci[dTmsW^g$BOBHXR-&w;=?9c+(AGl)O)A;a8aF!#K]Z&tb(<:%[)A' );
define( 'LOGGED_IN_KEY',    'FGQB8M^]d[D/T$ifGPO<W7#B+16%Ct4~PpGc.n$4{s;mw]J1;MozWar~eE3(:iM6' );
define( 'NONCE_KEY',        'M,:6*F}92f&x`3VZv.ihDV_2&W_eVu3EF3M(w7Z&(13^fxELruhJVYeK>$h#_;=/' );
define( 'AUTH_SALT',        'qO1sbaNJ*V04yM69Oo74N4fXaY@_ZLM!L?(k.Q4rS]|Y$>,f2=:&8Y)Nl6x9%WgY' );
define( 'SECURE_AUTH_SALT', 'pOw$k1!F;^6WoP2vYwuJ@z4sWi|jT3yIbP[Bzs}B5!.;/fDXFo km.g^mktB6H 1' );
define( 'LOGGED_IN_SALT',   'C^V34KAK??O,>tlJ`$(QS%4[8OkfffOO:Mt4<>(#*-)?(Jw^Pc^UiB-oPS n(Vg|' );
define( 'NONCE_SALT',       '(TY{g[)Gkh2$U[+}Wz5?&gZs]V#J4Kj.eMZgZ9CaV,68zZx`<mzu6(}ausKK4pM^' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
