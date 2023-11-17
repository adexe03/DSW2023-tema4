<?php
require 'conectionMongo.php';

$updateResult = $bd->clients->updateMany(
  ['ciclo' => 'DAW'],
  ['$set' => ['ciclo' => 'DAM']]
);

echo "Se actualizaron {$updateResult->getModifiedCount()} registros";
