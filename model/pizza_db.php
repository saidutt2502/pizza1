<?php

function get_pizza_sizes($db) {
    $query = 'SELECT *  FROM menu_sizes';
    $statement = $db->prepare($query);
    $statement->execute();
    $sizes = $statement->fetchAll();
    return $sizes;    
}


function get_pizza_toppings($db) {
    $query = 'SELECT *  FROM menu_toppings';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppings = $statement->fetchAll();
    return $toppings;    
}

function get_all_users($db) {
    $query = 'SELECT *  FROM shop_users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    return $users;    
}


function get_selected_users_orders($db,$user_id) {
    $query = 'SELECT pizza_orders.id,shop_users.username,pizza_orders.status FROM pizza_orders join shop_users on pizza_orders.user_id = shop_users.id join menu_sizes on menu_sizes.id = pizza_orders.size where pizza_orders.user_id  = '.$user_id.' order by pizza_orders.id asc ';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}


function order_pizza($db,$size,$toppings,$selected_user){

    $query = 'INSERT INTO pizza_orders(user_id,size,day,status) VALUES ("'.$selected_user.'","'.$size.'","1","Preparing")';
    $statement = $db->prepare($query);
    $statement->execute();
    $insert_id = $db->lastInsertId();

    foreach($toppings as $each_topping){
        $query2 = 'INSERT INTO order_topping(order_id,topping) VALUES ("'.$insert_id.'","'.$each_topping.'")';
        $statement2 = $db->prepare($query2);
        $statement2->execute();
    }
   
    return true;    
}

function mark_baked_as_finished($db,$user_id) {

    $query2 = 'UPDATE pizza_orders SET status = "Finished"  WHERE user_id = '.$user_id.' and status = "Baked"';
    $statement = $db->prepare($query2);
    $statement->execute();
    return true;    
}


