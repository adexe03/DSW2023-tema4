<?php
$link = new mysqli('localhost', 'root', '', 'pruebas');

$id = $_POST['data'];
$sql = "SELECT * FROM clients WHERE id=$id";
$results = $link->query($sql);

while ($row = $results->fetch_object()) {
  echo "<p>$row->id $row->first_name</p>";
}

$results->free();

$link->close();
