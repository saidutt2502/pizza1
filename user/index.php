<?php

require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_users';
    }
}

if ($action == 'list_users') {
    try {
        $user_list = get_users($db);
        include('user_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'show_add_form') {
    include('user_add.php');
} else if ($action == 'add_user') {
    $user_name = filter_input(INPUT_POST, 'user_name');
    $room = filter_input(INPUT_POST, 'room');
    if ($user_name == NULL || $user_name == FALSE) {
        $error = "Invalid User name";
        include('../errors/error.php');
        exit();  // we're done with this response
    }

    if ($room == NULL || $room == FALSE) {
        $error = "Invalid Room name";
        include('../errors/error.php');
        exit();  // we're done with this response
    }
    
    try {
        add_user($db, $user_name,$room);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();  // needed here to avoid redirection of next line
    }
    // Redirect back to index.php (see pp. 164-165)
    // (don't try to include index.php inside index.php)
    header("Location: .");
}