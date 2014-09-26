<?php
/** 
 * Zakladna konfiguracia pre WordPress.
 *
 * Tento subor ma nasledujuce konfiguracie: nastavenia MySQL, predpony tabulky,
 * tajne kluce, jazyk WordPress, a ABSPATH. Mozete sa dozvediet viac informacii
 * navstivenim {@link http://codex.wordpress.org/Editing_wp-config.php Uprava
 * wp-config.php} Codex Stranky. Nastavenia MySQL mozete zuskat z vasho hostingu.
 *
 * Tento subor je pouzity vytvaracim skriptom pre wp-config.php pocas
 * instalacie. Nemali by ste ho pouzivat na stranke, staci nakopirovat jeho obsah
 * do "wp-config.php" a vyplnit hodnoty.
 *
 * @package WordPress
 */

// ** Nastavenia MySQL - Tieto informacie mozete ziskat od vasho hostingu ** //
/** Meno databazy pre WordPress */
define('DB_NAME', 'technik');

/** Uzivatel databazy MySQL */
define('DB_USER', 'root');

/** Heslo databazy MySQL */
define('DB_PASSWORD', '');

/** Umiestnenie databazy MySQL */
define('DB_HOST', 'localhost');

/** Kodvanie databazy pouzivane pri tvorbe databazovych tabuliek. */
define('DB_CHARSET', 'utf8');

/** Databazova kolekcia. Nemente, pokial si nieste isty. */
define('DB_COLLATE', '');

/**#@+
 * Autorizacia unikatnych klucov.
 *
 * Zmente tieto na rozne unikatne frazy! 
 * Mozete ich vytvarat pomocou {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Tieto mozete zmenit kedykolvek to uznate za vhodne, aby ste znehodnotili vsetky existujuce cookies. Toto donuti vsetkych uzivatelov sa znova prihlasit.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5czh4~w.JXkryf-NW6<5/54=B7NNT2&!5A}FPtU|vX!z2b[,xyGfn P&y}XG>|/)');
define('SECURE_AUTH_KEY',  'SwmG8xYI!M2UDgNwwKI)=Wm`KBXjAydM-CrE`%Dc+$p UGp8jzwPAW bcq`T[UCj');
define('LOGGED_IN_KEY',    'a4Hmgy-dD1Nq8y4yc&}l+-16Vuy~5|Ai: gs3]4wo{5|Z(-OOsNH 0Wr5+O-5e5i');
define('NONCE_KEY',        '&q>(saMGG@^?4W<rkZcDj .3(u0Z]b9~z^%nM}|]2fMSaI?||2esr <I/Pt0dmQp');
define('AUTH_SALT',        '7M^ydp<pP_n+$@(Q3Ah&XqAd&=dka>TUW9L[&JM:jtcAG$>4oCZ<KtD]$#{=<MJ7');
define('SECURE_AUTH_SALT', '+0ST;8_ngw-n3!KsWEAgHX6&kt-0_v`7a+7EDA+_h%SjH<2@tlM7wjmJbp.|ck8d');
define('LOGGED_IN_SALT',   'iMof|!vU?Mn>%2d$gOn10XUyvAK9NRNg)*Do:8~%DUmc2`FQRo<,qZeF,|{%0jgE');
define('NONCE_SALT',       '< _?K-ZL^K,u=Jrcn046HT(z-+3+B:BVop14KG.HR`fv1_`zDII:uZulo7@3S3!j');

/**#@-*/

/**
 * Predpona databazovej tabulky WordPress.
 *
 * Mozete mat viacero instalacii v jednej databaze tym ak kazdej date unikatnu
 * predponu. Len cisla, pismena a podtrhnutia, prosim!
 */
$table_prefix  = 'wp_';

/**
 * Lokalizacny jazyk WordPress, zakladne nastavenie Slovencina (sk_SK).
 *
 * Toto zmente pokial chcete zmenit jazyk WordPress.  Musi suhlasit s MO suborom pre vybrany
 * jazyk ktory musi byt instalovany do wp-content/languages. Ako priklad, instalovany subor
 * de.mo do wp-content/languages a nastavenie WPLANG na 'de' zapne podporu nemeckeho
 * jazyka. Pre anglictinu nechajte hodnotu prazdnu ''.
 */
define ('WPLANG', 'en');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* To je vsetko, prestante upravovat! Vesele blogovanie. */

/** Absolutna cesta WordPress k priecinku WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Nastavenia premennych WordPress a vkladanych suborov. */
require_once(ABSPATH . 'wp-settings.php');
