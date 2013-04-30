<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/13/13
 * Time: 4:16 PM
 * To change this template use File | Settings | File Templates.
 */

include 'connection.php';
include 'function.php';

$dish_name = mysql_real_escape_string(($_POST['dish_name']));
$restaurant = mysql_real_escape_string(($_POST['restaurant']));

$query = "SELECT * FROM comment WHERE dish_name ='" . $dish_name . "' AND restaurant = '" . $restaurant . "' AND parent_id = 0";
$result = mysql_query($query) or die(mysql_error());

/*
 * Print threaded comments
 */
if(mysql_num_rows($result)==0){
    echo "Sorry. No customer has given comment for this dish.<br>";
}
else {
    while($row = mysql_fetch_assoc($result)):
        getComments($row);
    endwhile;
}
