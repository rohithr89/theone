<?php
session_start();
$user='root';
$password = 'root';
$db = 'theone_chat';
if(isset($_POST['enter']) && isset($_POST['name']) && isset($_POST['password'])) {
	
	mysql_connect('localhost',$user,$password) or die("cannot connect to Database");
	mysql_select_db($db) or die(mysql_error());
	$name=$_POST['name'];
	$password=$_POST['password'];
	if($name!='' && $password!='' && !isset($_POST['register'])){
		$query=mysql_query("SELECT * from user where username='{$_POST['name']}' and password='{$_POST['password']}' ") or die(mysql_error());
		$res=mysql_fetch_assoc($query);
		if($res){
			/* Getting into the home screen of the logged in user */
			$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
			$_SESSION['user_id']= $res['id'];
			header("location: welcome.php"); 
		
		}
		else{
			header("location: index.php"); 
			echo "Incorrect username and password";
		}
		
	}
}else{
		
		header("location: index.php"); 
	}

?>