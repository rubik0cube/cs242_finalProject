<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/25/13
 * Time: 3:02 AM
 * To change this template use File | Settings | File Templates.
 */

include 'connection.php';

$enter = $_POST['name_startsWith'];
$q = "SELECT * FROM menus WHERE (dish_name LIKE '%".$enter."%')";

$result = mysql_query($q);
$rows = array();
while($row = mysql_fetch_assoc($result)){
    $rows[] = $row;
}
$json = json_encode($rows);
echo $json;


