<?php

$info = new SplFileInfo($_SERVER['SCRIPT_FILENAME']);
include_once($info->getPath() . '/config.php');

function uncompressGzip($srcName, $dstName) {
  $sfp = gzopen($srcName, "rb");
  $fp = fopen($dstName, "w");

  while (!gzeof($sfp)) {
    $string = gzread($sfp, 4096);
    fwrite($fp, $string, strlen($string));
  }
  gzclose($sfp);
  fclose($fp);
}

function uncompressBzip2($srcName, $dstName) {
  if (file_exists($srcName)) {
    $data = '';
    $bz = bzopen($srcName, 'r') or die('ERROR: Cannot open input file!');
    while (!feof($bz)) {
      $data .= bzread($bz, 4096) or die('ERROR: Cannot read from input file');
      ;
    }
    bzclose($bz);
    file_put_contents($dstName, $data) or die('ERROR: Cannot write to output file!');
    echo 'Decompression complete.' . "\n";
  }
}

if (isset($compress)) {
  echo "Распаковываем\n";
  if ($compress == 'Gzip') {
    uncompressGzip($file, $tmpSqlDump);
  }
  if ($compress == 'Bzip2') {
    uncompressBzip2($file, $tmpSqlDump);
  }
  // Read in entire file
  $lines = file($tmpSqlDump);
}
else {
  // Read in entire file
  $lines = file($file);
}

// Connect to MySQL server  
$mysqli = new mysqli($host, $username, $password, $database);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  //тормозит скрипт при каждой ошибке
echo "Получаем список таблиц…\n";
flush();
$result = $mysqli->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '" . $database . "'");

while ($row = $result->fetch_assoc()) {
  $tables[] = $row["TABLE_NAME"];
}
//var_dump($tables);
if (isset($tables)) {
/////  Уничтожаем данные таблиц
  foreach ($tables as $table) {
    $sql = "DROP TABLE `" . $table . "`";
    $result = $mysqli->query($sql);
  }
}


flush();
// Temporary variable, used to store current query
$templine = '';
echo "Загружаем дамп…\n";
flush();
$count = 0;
// Loop through each line
foreach ($lines as $line) {

// Skip it if it's a comment
  if (substr($line, 0, 2) == '--' || $line == '')
    continue;
// Add this line to the current segment
  $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
  if (substr(trim($line), -1, 1) == ';') {
    // Perform the query
    if ($mysqli->query($templine) === TRUE) {
      printf("Line " . $count . "\n"); //выдаём сообщение
      flush();
    }

    // Reset temp variable to empty
    $templine = '';
  }
  $count++;
}
echo "Tables imported successfully\n";
flush(); //выдаём сообщение
//

function fetch_array($result) {
  return $this->$myMySQLi->fetch_array($result);
}

// Восстанавливаем недостающие таблицы, если нужно
if (isset($restoreTablesDump)) {
  $mysqlImport->doImport($restoreTablesDump, $database);
}

if (isset($compress)) {
  echo "Удаляем временный файл\n";
  unlink($tmpSqlDump);
}

echo "OK\n";
?>

