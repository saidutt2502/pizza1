<?php
// topping_db.php: DB access for topping data
// the try/catch for these actions is in the caller, index.php
function add_user($db, $user_name,$room)  
{
    $query = 'INSERT INTO shop_users(username,room) VALUES ("'.$user_name.'","'.$room.'")'; 
    $statement = $db->prepare($query);
    $statement->execute();
    return true; 
}

function get_users($db) {
    $query = 'SELECT * FROM shop_users';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppings = $statement->fetchAll();
    return $toppings;    
}
