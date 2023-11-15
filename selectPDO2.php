<?php
require 'conectionPDO.php';

$results = $link->query('SELECT * FROM clients');

$result->bindColumn('id', $id);
$result->bindColumn('first_name', $first_name);
$result->bindColumn('cars', $cars);
$result->bindColumn('vip', $vip);

while ($results->fetch(PDO::FETCH_BOUND)) {
  echo "<li>$id: $first_name, $cars coches - $vip</li>";
}

$results = null;
$link = null;
