<?php

$database = 'agent-kmv7';
$username = 'agent-kmv7';
$password = 'sdolX57SwYa';
$host = 'localhost';
//$database = 'site5';
//$username = 'site5';
//$password = 'site5';
//$host = 'localhost';
//$file = '/usr/local/www/apache24/data/site5/dump.sql';
//$file = '/usr/local/www/apache24/data/site5/dump.sql.gz';
//$file = '/usr/local/www/apache24/data/site5/dump.sql.bz2';
$file = '/var/www/agent/data/www/new.agent-kmv.ru/dump.sql.bz2';
$compress = 'Bzip2';  //компрессия
//$compress = 'Gzip'; //компрессия
//$tmpSqlDump = '/usr/local/www/apache24/data/site5/dump.tmp.sql';
$tmpSqlDump = '/var/www/agent/data/www/new.agent-kmv.ru/dump.tmp.sql';


// Таблицы, которые надо очистить перед дампом
$truncateTables[] = "b1_cache";
$truncateTables[] = "b1_cache_admin_menu";
$truncateTables[] = "b1_cache_block";
$truncateTables[] = "b1_cache_bootstrap";
$truncateTables[] = "b1_cache_field";
$truncateTables[] = "b1_cache_filter";
$truncateTables[] = "b1_cache_form";
$truncateTables[] = "b1_cache_image";
$truncateTables[] = "b1_cache_libraries";
$truncateTables[] = "b1_cache_menu";
$truncateTables[] = "b1_cache_metatag";
$truncateTables[] = "b1_cache_page";
$truncateTables[] = "b1_cache_path";
$truncateTables[] = "b1_cache_token";
$truncateTables[] = "b1_cache_update";
$truncateTables[] = "b1_cache_views";
$truncateTables[] = "b1_cache_views_data";
/*
// Таблицы, которые надо очистить перед дампом
$truncateTables[] = "cache";
$truncateTables[] = "cache_admin_menu";
$truncateTables[] = "cache_block";
$truncateTables[] = "cache_bootstrap";
$truncateTables[] = "cache_field";
$truncateTables[] = "cache_filter";
$truncateTables[] = "cache_form";
$truncateTables[] = "cache_image";
$truncateTables[] = "cache_libraries";
$truncateTables[] = "cache_menu";
$truncateTables[] = "cache_metatag";
$truncateTables[] = "cache_page";
$truncateTables[] = "cache_path";
$truncateTables[] = "cache_token";
$truncateTables[] = "cache_update";
$truncateTables[] = "cache_views";
$truncateTables[] = "cache_views_data";
*/
//Дополнительный дамп, котрый надо залить вслед за основным
//$restoreTablesDump = $info->getPath() .'/restore_tables_dump.sql';
//$bz = bzopen($filename, "w");


error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit (600);
ini_set('mysql.connect_timeout', 600);
ini_set('post_max_size', '512M');
ini_set('upload_max_filesize', '512M');
ini_set('max_execution_time', '600');
ini_set('max_allowed_packet', 4000000000);
echo "upload_max_filesize = ".ini_get("upload_max_filesize")."\n";
echo "post_max_size = ".ini_get("post_max_size")."\n";
echo "max_execution_time = ".ini_get("max_execution_time")."\n";

/**
//Таблицы, которые надо исключить из дампа
$excludeTables[] = "cache";
$excludeTables[] = "cache_admin_menu";
$excludeTables[] = "cache_block";
$excludeTables[] = "cache_bootstrap";
$excludeTables[] = "cache_field";
$excludeTables[] = "cache_filter";
$excludeTables[] = "cache_form";
$excludeTables[] = "cache_image";
$excludeTables[] = "cache_libraries";
$excludeTables[] = "cache_menu";
$excludeTables[] = "cache_metatag";
$excludeTables[] = "cache_page";
$excludeTables[] = "cache_path";
$excludeTables[] = "cache_token";
$excludeTables[] = "cache_update";
$excludeTables[] = "cache_views";
$excludeTables[] = "cache_views_data";
*/


?>