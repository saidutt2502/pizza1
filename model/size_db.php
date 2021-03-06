<?php
// the try/catch for these actions is in the caller, index.php
// This is all we need for sizes, since the UI can't change them

function get_sizes($db) {
    $query = 'SELECT * FROM menu_sizes';
    $statement = $db->prepare($query);
    $statement->execute();
    $sizes = $statement->fetchAll();
    return $sizes;    
}

function delete_size($db,$id) {
    $query = 'DELETE FROM menu_sizes WHERE id='.$id.'';
    $statement = $db->prepare($query);
    $statement->execute();
    return true;    
}
