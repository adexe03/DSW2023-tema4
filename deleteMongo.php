<?php
require 'conectionMongo.php';

echo "Quedan en la colección clients: {$bd->clients->count()} <br>";
$deleteResult = $bd->clients->deleteOne(['nombre' => 'Pepe']);
echo "Quedan en la colección clients: {$bd->clients->count()}";
