<?php
$is_api = true;

include_once '../../private/initialize.php';

use Models\Team;

$id = $_GET['id'] ?? die('Message: No id was set');


$team = new Team($db);
