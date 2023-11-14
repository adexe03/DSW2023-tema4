<?php
$newClientsString = '[{
  "first_name": "Cello",
  "birthday": "2023/03/05",
  "cars": 10,
  "vip": true
}, {
  "first_name": "Ross",
  "birthday": "2023/03/25",
  "cars": 2,
  "vip": false
}, {
  "first_name": "Mavra",
  "birthday": "2023/02/14",
  "cars": 9,
  "vip": false
}, {
  "first_name": "Marillin",
  "birthday": "2022/11/22",
  "cars": 2,
  "vip": true
}, {
  "first_name": "Jean",
  "birthday": "2022/11/23",
  "cars": 4,
  "vip": false
}, {
  "first_name": "Deirdre",
  "birthday": "2023/08/08",
  "cars": 9,
  "vip": false
}, {
  "first_name": "Sheelagh",
  "birthday": "2023/07/12",
  "cars": 2,
  "vip": true
}, {
  "first_name": "Rupert",
  "birthday": "2023/08/03",
  "cars": 4,
  "vip": true
}, {
  "first_name": "Jefferson",
  "birthday": "2023/05/22",
  "cars": 5,
  "vip": false
}, {
  "first_name": "Stevana",
  "birthday": "2023/05/31",
  "cars": 9,
  "vip": false
}, {
  "first_name": "Herman",
  "birthday": "2023/10/19",
  "cars": 4,
  "vip": true
}, {
  "first_name": "Janice",
  "birthday": "2023/10/17",
  "cars": 1,
  "vip": false
}, {
  "first_name": "Dana",
  "birthday": "2023/04/17",
  "cars": 5,
  "vip": false
}, {
  "first_name": "Constanta",
  "birthday": "2023/01/17",
  "cars": 8,
  "vip": true
}, {
  "first_name": "Octavius",
  "birthday": "2022/11/24",
  "cars": 7,
  "vip": false
}, {
  "first_name": "Ryon",
  "birthday": "2022/12/06",
  "cars": 2,
  "vip": false
}, {
  "first_name": "Berna",
  "birthday": "2023/01/31",
  "cars": 10,
  "vip": true
}, {
  "first_name": "Mahalia",
  "birthday": "2023/08/31",
  "cars": 4,
  "vip": false
}, {
  "first_name": "Evangelina",
  "birthday": "2023/07/19",
  "cars": 6,
  "vip": true
}, {
  "first_name": "Lianne",
  "birthday": "2023/08/29",
  "cars": 5,
  "vip": false
}]';

$newClients = json_decode($newClientsString);

require 'conection.php';
$stmt = $link->stmt_init();

$stmt->prepare("INSERT INTO clients (first_name, birthday, cars, vip) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $birthday, $cars, $vip);

foreach ($newClients as $client) {
  $name = $client->first_name;
  $birthday = $client->birthday;
  $cars = $client->cars;
  $vip = $client->vip;
  $stmt->execute();
}

echo "Insertados con éxito";

$stmt->close();
$link->close();
