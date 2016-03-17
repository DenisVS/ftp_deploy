<?php

$info = new SplFileInfo($_SERVER['SCRIPT_FILENAME']);
include_once($info->getPath() . '/config.php');
include_once($info->getPath() . '/mysqldump-php/Mysqldump.php');

echo "начали работу\n";
flush();
if (isset($truncateTables)) {
  $mysqli = new mysqli($host, $username, $password, $database);
  foreach ($truncateTables as $key => $table) {
    if ($mysqli->query("TRUNCATE TABLE `" . $table . "`") === TRUE) {
      printf("The tables was truncated.\n");
    }
  }
  $mysqli->close();
}

if (isset($excludeTables)) {
  $dumpSettings['exclude-tables'] = $excludeTables;
}
if (isset($compress)) {
  $dumpSettings['compress'] = $compress;
}
echo "Снимаем дамп\n";
flush();
if (isset($dumpSettings)) {
  $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=' . $host . ';dbname=' . $database, $username, $password, $dumpSettings);
}
else {
  $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
}

$dump->start($file);
echo "OK\n";
//    var_dump ($dumpSettings);
?>
