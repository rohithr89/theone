<link type="text/css" rel="stylesheet" href="style.css" />
<?php
session_start();

?>

<div id="wrapper">
<div id="menu">
<p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
<p class="logout"><a id="exit" href="#">Exit Chat</a></p>
<div style="clear:both"></div>
<div class="chatUser">Chatting with..<b><?php echo $_SESSION['recv_id']; ?></b></div>
</div>
<div id="userChat">
<!-- contains the list of users -->
<div id="users">
	<?php
	function create_unordered_list($result) {

  		while ($row = mysql_fetch_array($result)) {
  			$id=$row['id'];
  		echo "<div class='userlist' id=$id>";
  		print_r($row['username']);
  		echo "<br>
  		</div>";
  		}
	}
	$user='root';
	$password = 'root';
	$db = 'theone_chat';	
	mysql_connect('localhost',$user,$password) or die("cannot connect to Database");
	mysql_select_db($db) or die(mysql_error());
	$name=$_SESSION['name'];
	$query=mysql_query("SELECT username,id from user WHERE id!={$_SESSION['user_id']}") or die(mysql_error());
	create_unordered_list($query);

	?>
</div>
<!-- chat windows with the selcted user -->
<div id="chatbox"></div>
</div>
<form name="message" action="">
<input name="usermsg" type="text" id="usermsg" size="63" />
<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
</form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
</script>

<script type="text/javascript">

$(document).ready(function(){
	var recv_id = 0; // Reciever id being set
	$('#userChat').bind('click', function(event) {
    recv_id=$(event.target).attr('id');
    
 });
	  
   $("#exit").click(function(){
       var exit = confirm("Are you sure you want to end the session?");
       if(exit==true) {
       		window.location = 'index.php?logout=true';
       }
   });


   $("#submitmsg").click(function(){
      var clientmsg = $("#usermsg").val();
      $.ajax({
      		url : "post.php",
      		data : {
      			text : clientmsg
      		},
      		success : function(data){
      			console.log(data);
      			if(data == 'select user'){
      				alert("Please select a user to chat with");
      			}
      		}
      });
      $("#usermsg").attr("value", "");
      return false;
   });
   
   setInterval (loadLog, 2500);
                              


function loadLog(){
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
     $.ajax({ url: "loadChat.php",
             cache: false,
             data: {recv_id: recv_id},
             success: function(html){
                $("#chatbox").html(html);
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); 
                }
             },
   }); 
}
});
</script>