<?php
/**
 * WordPress configuration for Render + external MySQL.
 * Database values are read from environment variables.
 */

define( 'DB_NAME', getenv( 'DB_NAME' ) ?: 'bank' );
define( 'DB_USER', getenv( 'DB_USER' ) ?: 'avnadmin' );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) ?: '' );
define( 'DB_HOST', getenv( 'DB_HOST' ) ?: 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/*
 * Aiven MySQL requires SSL.
 * Render environment variables are used so no database password is stored in GitHub.
 */
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );

define( 'AUTH_KEY',         getenv( 'AUTH_KEY' ) ?: 'change-this-auth-key' );
define( 'SECURE_AUTH_KEY',  getenv( 'SECURE_AUTH_KEY' ) ?: 'change-this-secure-auth-key' );
define( 'LOGGED_IN_KEY',    getenv( 'LOGGED_IN_KEY' ) ?: 'change-this-logged-in-key' );
define( 'NONCE_KEY',        getenv( 'NONCE_KEY' ) ?: 'change-this-nonce-key' );
define( 'AUTH_SALT',        getenv( 'AUTH_SALT' ) ?: 'change-this-auth-salt' );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) ?: 'change-this-secure-auth-salt' );
define( 'LOGGED_IN_SALT',   getenv( 'LOGGED_IN_SALT' ) ?: 'change-this-logged-in-salt' );
define( 'NONCE_SALT',       getenv( 'NONCE_SALT' ) ?: 'change-this-nonce-salt' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

/* Render terminates TLS at the proxy; tell WordPress the original request was HTTPS. */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
    $_SERVER['HTTPS'] = 'on';
}

/* Use Render's public URL when available. */
$render_url = getenv( 'RENDER_EXTERNAL_URL' );
if ( $render_url ) {
    define( 'WP_HOME', $render_url );
    define( 'WP_SITEURL', $render_url );
}

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
