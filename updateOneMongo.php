<?php
require 'conectionMongo.php';

$updateResult = $bd->clients->updateOne(
  ['nombre' => 'Pepe'],
  ['$set' => ['ciclo' => 'DAM', 'edad' => 25]]
);

echo "Se actualizaron {$updateResult->getModifiedCount()} registros";
