<?php
require 'vendor/autoload.php';

try {
  $link = new MongoDB\Client("mongodb://localhost");
  $bd = $link->pruebaDB;
  // OPERACIONES

} catch (Exception $e) {
  print($e);
  die();
}
