<?php
require 'conectionMongo.php';

echo "<p>Todos los clientes</p>";
echo "<ul>";
$clients = $bd->clients->find();
foreach ($clients as $client) {
  echo "<li>$client->nombre ($client->ciclo) de  $client->edad años.</li>";
}
echo "</ul>";
