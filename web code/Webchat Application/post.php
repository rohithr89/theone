<?php
session_start();
if (isset($_SESSION['name'])) {
	$text = $_GET['text'];
	$user = 'root';
	$password = 'root';
	$db = 'theone_chat';
	mysql_connect('localhost', $user, $password) or die("cannot connect to Database");
	mysql_select_db($db);
	$time = time();
	if ($_SESSION['recv_id'] != 0) {
		$query = "INSERT INTO `convo` (`msg_id`, `sender_id`, `sender_name`, `receiver_id`, `message`, `timestamp`) VALUES (null, {$_SESSION['user_id']}, '{$_SESSION['name']}', {$_SESSION['recv_id']}, '{$text}', now())";
		$res = mysql_query($query);
		if (!$res) {
			echo "error inserting the data!!!";
		} else {
			echo "Successfully inserted";
		}
	}
	else{
		echo "select user";
	}
}
?>