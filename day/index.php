<?php

require('../model/database.php');
require('../model/initial.php');
require('../model/day_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}

if ($action == 'initial_db') {
    try {
        initial_db($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
}else if ($action == 'list_orders') {
    try {
        $current_day = get_current_day($db);
        $current_day = $current_day[0]['current_day'];
        $orders = get_current_day_order($db,$current_day);
        include('day_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
}else if ($action == 'next_day') {
    try {
        $current_day = get_current_day($db);
        $current_day = $current_day[0]['current_day'];
        $day_change = change_current_day($db,$current_day);

        $current_day = get_current_day($db);
        $current_day = $current_day[0]['current_day'];

        $orders = get_current_day_order($db,$current_day);
        include('day_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
}
