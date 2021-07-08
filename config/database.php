<?php

$servername;
$username;
$password;
$database;
$dsn;

if (getenv('JAWSDB_URL')) {
  $url = getenv('JAWSDB_URL');
  $dbparts = parse_url($url);

  $servername = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'], '/');
  $dsn = "mysql:host=$servername;dbname=$database";
} else {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "myblog";
  $dsn = "mysql:host=$servername;dbname=$database";
}

try {
  $conn = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
