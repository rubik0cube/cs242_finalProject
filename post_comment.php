<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/13/13
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

include 'connection.php';
include 'function.php';

$writer_name = mysql_real_escape_string($_POST['writer_name']);
$comment_body = mysql_real_escape_string($_POST['comment_body']);
$parent_id = mysql_real_escape_string($_POST['parent_id']);
$dish_name = mysql_real_escape_string(($_POST['dish_name']));
$restaurant = mysql_real_escape_string(($_POST['restaurant']));


$q = "INSERT INTO comment (parent_id, writer_name, dish_name, restaurant, content)
        VALUES ('$parent_id', '$writer_name', '$dish_name', '$restaurant', '$comment_body')";
$r = mysql_query($q);

$query = "SELECT * FROM comment WHERE dish_name ='" . $dish_name . "' AND restaurant = '" . $restaurant . "' AND parent_id = 0";
$result = mysql_query($query) or die(mysql_error());

/*
 * Print threaded comments
 */
while($row = mysql_fetch_assoc($result)):
    getComments($row);
endwhile;


