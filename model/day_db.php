<?php

function get_current_day_order($db,$day) {
    $query = 'SELECT pizza_orders.id,shop_users.username,pizza_orders.status FROM pizza_orders join shop_users on pizza_orders.user_id = shop_users.id join menu_sizes on menu_sizes.id = pizza_orders.size where pizza_orders.day = "'.$day.'" ';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}
