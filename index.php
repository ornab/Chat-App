<?php 
include 'db.php';
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Chat System in PHP</title>
		
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<link rel="stylesheet" href="style.css" media="all"/>
	<script>
		function ajax(){
		
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('chat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','chat.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
	</head>
	
<body onload="ajax();">

<div id="container">
		<div id="chat_box">
		<div id="chat"></div>
		</div>
		<form method="post" action="index.php">
		<input  type="text" name="name" placeholder="enter name"/> 
		<textarea name="msg" placeholder="enter message"></textarea>
		<input type="submit" name="submit" value="Send it"/>
		
		</form>
		<?php 
		if(isset($_POST['submit'])){ 
		
		$name = $_POST['name'];
		$msg = $_POST['msg'];
		
		$query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
		
		$run = $con->query($query);
		
		if($run){
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
		}
		
		
		}
		?>

</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>