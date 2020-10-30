<?php

function get_baked_orders($db) {
    $query = 'SELECT pizza_orders.id,shop_users.username,pizza_orders.status FROM pizza_orders join shop_users on pizza_orders.user_id = shop_users.id join menu_sizes on menu_sizes.id = pizza_orders.size where pizza_orders.status = "Baked" order by pizza_orders.id asc ';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}



function get_preparing_orders($db) {
    $query = 'SELECT pizza_orders.id,shop_users.username,pizza_orders.status FROM pizza_orders join shop_users on pizza_orders.user_id = shop_users.id join menu_sizes on menu_sizes.id = pizza_orders.size where pizza_orders.status = "Preparing" order by pizza_orders.id asc ';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}

function mark_oldest_baked($db) {

    $query1 = 'SELECT MIN(id) AS id FROM pizza_orders WHERE status = "Preparing" ';
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $id = $statement1->fetchAll();
    $id = $id[0]['id'];

    $query2 = 'UPDATE pizza_orders SET status = "Baked"  WHERE id = "'.$id.'" ';
    $statement = $db->prepare($query2);
    $statement->execute();
    return true;    
}