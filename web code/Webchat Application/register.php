<?php
session_start();
$user='root';
$password = 'root';
$db = 'theone_chat';
mysql_connect('localhost',$user,$password) or die("cannot connect to Database");
mysql_select_db($db) or die(mysql_error());
$name=$_POST['name'];
$password=$_POST['password'];
if($name!='' && $password!='') {
		$query1=mysql_query("SELECT * from user where username='{$_POST['name']}' and password='{$_POST['password']}' ") or die(mysql_error());
		$res1=mysql_fetch_assoc($query1);
		if(!$res1) {
		$query2 = "INSERT INTO `theone_chat`.`user` (`id`, `username`, `password`, `visability`) VALUES ('', '{$name}', '{$password}', 0)";
		$res2=mysql_query($query2);
		if(!$res2) {
			echo "error inserting the data!!!";
		
 		}
		else{
			echo"Successfully inserted";
 		}
		}
		else{
			echo "User already exists";
		}
}
else{
	echo "enter username and pwd";
}


?>