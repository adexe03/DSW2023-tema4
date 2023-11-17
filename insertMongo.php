<?php
require "conectionMongo.php";

$res = $bd->clients->insertOne([
  "nombre" => "Adexe",
  "ciclo" => "DAW",
  "edad" => 20
]);

echo "ID del úlimo registro: {$res->getInsertedID()} <br>";

$res = $bd->clients->insertMany([
  ['nombre' => 'Marta', 'ciclo' => 'ASIR', 'edad' => 21],
  ['nombre' => 'Pepe', 'ciclo' => 'ASIR', 'edad' => 24],
  ['nombre' => 'Julia', 'ciclo' => 'DAW', 'edad' => 22]
]);

echo "Registros insertados: {$res->getInsertedCount()} <br>";
print_r($res->getInsertedIds());
