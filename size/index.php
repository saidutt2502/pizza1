<?php

require('../model/database.php');
require('../model/size_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_size';
    }
}

if ($action == 'list_size') {
    try {
        $ize = get_sizes($db);
        include('size_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
 } else if ($action == 'delete_size') {
    $size_id = filter_input(INPUT_POST, 'size_id');
    try {
        delete_size($db, $size_id);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();  // needed here to avoid redirection of next line
    }
    // Redirect back to index.php (see pp. 164-165)
    // (don't try to include index.php inside index.php)
    header("Location: .");
}
