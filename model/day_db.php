<?php

function get_current_day_order($db,$day) {
    $query = 'SELECT pizza_orders.id,shop_users.username,pizza_orders.status FROM pizza_orders join shop_users on pizza_orders.user_id = shop_users.id join menu_sizes on menu_sizes.id = pizza_orders.size where pizza_orders.day = "'.$day.'" ';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}

function get_current_day($db) {
    $query = 'SELECT current_day from pizza_sys_tab';
    $statement = $db->prepare($query);
    $statement->execute();
    $day = $statement->fetchAll();
    return $day;    
}

function change_current_day($db,$day) {
    $new_date = $day + 1;
    $query = 'UPDATE pizza_sys_tab SET current_day = '.$new_date;
    $statement = $db->prepare($query);
    $statement->execute();

    $query2 = 'UPDATE pizza_orders SET status = "Finished" where pizza_orders.day = '.$day.'';
    $statement2 = $db->prepare($query2);
    $statement2->execute();

    return true;    
}

