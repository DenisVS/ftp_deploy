<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ALL);

$info = new SplFileInfo($_SERVER['SCRIPT_FILENAME']);
echo "Real path: ".$info->getPath()."\n";

ini_set('display_errors', 1);
set_time_limit (600);

ini_set('post_max_size', '512M');
ini_set('upload_max_filesize', '512M');
ini_set('max_execution_time', '600');

echo "upload_max_filesize = ".ini_get("upload_max_filesize")."\n";
echo "post_max_size = ".ini_get("post_max_size")."\n";
echo "max_execution_time = ".ini_get("max_execution_time")."\n";
echo "max_allowed_packet = ".ini_get("max_allowed_packet")."\n";
