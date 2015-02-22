<?php
$connection = mysql_connect('127.4.54.130', 'ashliehorst', 'Soccermom1');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('hobbyfun');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
