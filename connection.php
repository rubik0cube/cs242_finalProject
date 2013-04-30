<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/9/13
 * Time: 2:41 PM
 * To change this template use File | Settings | File Templates.
 */

$host = 'localhost';
$user = 'shen';
$password = '1234';
$dbconn = mysql_connect($host, $user, $password) or die ('Could not connect to database: ' . mysql_error());
mysql_select_db('finalproject', $dbconn) or die("Cannot select the database");

