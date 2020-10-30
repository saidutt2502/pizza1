<?php
require('../model/database.php');
require('../model/order_db.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}

if ($action == 'list_orders') {
    try {
        $baked_orders = get_baked_orders($db);
        $preparing_orders = get_preparing_orders($db);
        include('order_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
}else if ($action == 'mark_oldest_baked') {
    try {
        mark_oldest_baked($db);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();  // needed here to avoid redirection of next line
    }
    // Redirect back to index.php (see pp. 164-165)
    // (don't try to include index.php inside index.php)
    header("Location: .");
}
