<?php
session_start();
$user='root';
$password = 'root';
$db = 'theone_chat';
mysql_connect('localhost',$user,$password) or die("cannot connect to Database");
mysql_select_db($db) or die(mysql_error());
$_SESSION['recv_id'] =  $_GET['recv_id'];
$query = mysql_query("SELECT `timestamp`,`sender_name`,`message` FROM `convo` WHERE ((`sender_id` = {$_SESSION['user_id']}) AND (`receiver_id` = {$_SESSION['recv_id']})) OR ((`sender_id` = {$_SESSION['recv_id']}) AND (`receiver_id` = {$_SESSION['user_id']}))");
while($res=mysql_fetch_assoc($query)){
	echo " <b> [{$res['timestamp']}]</b>";
	echo "<b> {$res['sender_name']}: </b>";
	echo $res['message'];
	
	echo "<br />";	
}

?>