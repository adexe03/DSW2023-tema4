<?php
require 'conection.php';


$stmt_query = $link->stmt_init();
$stmt_query->prepare('SELECT id, first_name, cars FROM clients WHERE vip=1');
$stmt_query->bind_result($id, $first_name, $cars);

$stmt_insert = $link->stmt_init();
$stmt_insert->prepare("INSERT INTO clientsVIP (name, cars) VALUES (?, ?)");
$stmt_insert->bind_param("si", $first_name, $cars);

$stmt_delete = $link->stmt_init();
$stmt_delete->prepare("DELETE FROM clients WHERE id=?");
$stmt_delete->bind_param("i", $id);

$link->autocommit(FALSE);
$stmt_query->execute();
$result = $stmt_query->get_result();
$stmt_query->close();

while ($client = $result->fetch_object()) {
  $id = $client->id;
  $first_name = $client->first_name;
  $cars = $client->cars;

  // Comprobar si cars == 0 para anular la transacción.
  if ($cars == 0) {
    echo "Se aborta porque el cliente con id: $id tiene 0 coches";
    $link->rollback();
    exit();
  }

  // Insertar en la nueva tabla
  $stmt_insert->execute();
  echo "<p>Se ha insertado el cliente $first_name con el número de coches $cars</p>";

  // Borrar de la tabla
  $stmt_delete->execute();
  echo "<p>Se ha borrado el cliente con id $id</p>";
}
if (!$link->commit()) {
  echo "Commit transaction failed";
  exit();
}

$stmt_insert->close();
$stmt_delete->close();
$link->close();
