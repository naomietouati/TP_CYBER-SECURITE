<?php

$action = filter_input(INPUT_GET, 'action');


//require_once 'includes/ftc.inc.php'; 

$client = $pdo->getAllClients();
include 'vues/vue_espace_admin.php';

?>