<?php

require('../model/database.php');
require('../model/pizza_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'welcome';
    }
}

$sizes = get_pizza_sizes($db);
$toppings = get_pizza_toppings($db);
$users = get_all_users($db);
$user_orders = null;
$selected_user = 0;
$baked_orders = false;

if ($action == 'welcome') {
    include('student_welcome.php');
    //header("Location: .");
} else if ($action == 'select_user') {
    $user_id = filter_input(INPUT_POST, 'user_id');
    $selected_user = $user_id;
    $username = get_selected_users_name($db, $user_id);
    $user_orders = get_selected_users_orders($db, $user_id);
    $baked_orders = get_selected_users_orders_baked($db, $user_id);
    include('student_welcome.php');
} else if ($action == 'show_order_form') {
    $selected_user = filter_input(INPUT_GET, 'user_id');
    include('order_pizza.php');
} else if ($action == 'order_pizza') {
    $size = filter_input(INPUT_POST, 'size');
    $toppings = $_POST['toppings'];
    $selected_user = filter_input(INPUT_POST, 'user_id');
    $order_pizza = order_pizza($db, $size, $toppings, $selected_user);
    header("Location: .");
} else if ($action == 'acknowledge') {
    $selected_user2 = filter_input(INPUT_POST, 'selected_user');
    if ($selected_user2 != 0) {
        $order_pizza = mark_baked_as_finished($db, $selected_user2);
    }
    $user_orders = get_selected_users_orders($db, $selected_user2);
    include('student_welcome.php');
}
