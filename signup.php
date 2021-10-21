
<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
	<style>
		body {
 		background-image: url('mine.jpg');
 		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;	
  		}
		
	</style>
<body>

	<style type="text/css">
	
	#text{

		height: 30px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 300px;
		color: white;
		background-color: #82EEFD;
		border: none;
	}

	#box{

		background-color: none;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>	
	<div id="box">
		
		<form method="post">
			<div style="font-size:65px;margin: 10px;color: red; text-align: center; ">TRIALS</div>
			<div style="font-size: 50px;margin: 10px;color: black; text-align: center;">Welcome</div>
			<div style="font-size: 30px;margin: 10px;color: black; text-align: center;">SIGNUP</div>

			<input id="text" type="text" name="user_name" placeholder="username"><br><br>
			<input id="text" type="password" name="password" placeholder="password"><br><br>

			<input id="button" type="submit" value="signup"><br><br>

			Already have an account?<br><a href="login.php">Click to login</a><br><br>
		</form>
	</div>
</body>
</html>