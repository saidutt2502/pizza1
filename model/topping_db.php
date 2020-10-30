<?php
// topping_db.php: DB access for topping data
// the try/catch for these actions is in the caller, index.php
function add_topping($db, $topping_name)  
{
    $query = 'INSERT INTO menu_toppings(topping) VALUES ("'.$topping_name.'")'; 
    $statement = $db->prepare($query);
    $statement->execute();
    return true; 
}

function get_toppings($db) {
    $query = 'SELECT * FROM menu_toppings';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppings = $statement->fetchAll();
    return $toppings;    
}

function delete_toppings($db,$id) {
    $query = 'DELETE FROM menu_toppings WHERE id='.$id.'';
    $statement = $db->prepare($query);
    $statement->execute();
    return true;    
}
