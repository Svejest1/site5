<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'shop5' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '12345' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1 ~ /~!^VfWRYqm*@_pU_+1ABeC{ ~z?F`,k;sN3V`6A)&KY@ytu^ctGnRoY2ePk' );
define( 'SECURE_AUTH_KEY',  'M`gbvv6!+xq+oCNKR4mk,-T7Xb%vO.SZb[P$vagJpCf9%J7g/tyqe}+HYyf~$X8<' );
define( 'LOGGED_IN_KEY',    'y7=fN7*-S$MCWGl/R9Lmz{912jtiN5 }|nu`fVN4Nyop&FT&`11}KuOyyInkYV!W' );
define( 'NONCE_KEY',        '1E0d{Vf0wC]N^BYRhZQT|+ccp|l.93303dO4C<VB=n SQ-e>hm9 =,V~WFL`@ g_' );
define( 'AUTH_SALT',        'BUI;42I,s-eHJ{$,PnK*V%1.LoqH_$(QFea3!FFgtN,g iFBaOutshxhliaP.+p[' );
define( 'SECURE_AUTH_SALT', 'sI I_2c/!22jinF9K8&hQmU0mnxefI/61Y]lnz0yS0`:7Tr_Mgse@AD$?vE+t|Yt' );
define( 'LOGGED_IN_SALT',   'e <wcNF_aiZLrdfLVRn0etVN8d9!O &>r7&EJWsia*WrJ,a9K#Bea]/U0]mg2*2f' );
define( 'NONCE_SALT',       'q{~2=H%}Fue|dOU`#h>EH$hb2,7pV^u~3d/tXc|^CX1o1=&#{D:5ZV/[]S3vG&e{' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
