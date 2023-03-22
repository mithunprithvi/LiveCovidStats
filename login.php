<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$id = random_num(20);
		$password = $_POST['password'];
		$vaccinated = $_POST['vaccinated'];
		if(!empty($user_name) && !empty($password) && !empty($vaccinated) && !is_numeric($user_name))
		{
			$query1 = "insert into vaccinated (id,name,vaccinated) values ('$id','$user_name','$vaccinated')";

			mysqli_query($con, $query1);
			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	body {
		background-image: url('background.jpeg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		}
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 96%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: black;
		background-color: lightblue;
		border: none;    
		margin-top: 16px;
	}

	a{
		color: white;
	}

	#box{

		text-align: center;
		background-color: #80808059;
		margin: 0 auto;
		width: 300px;
		padding: 20px;
		position: absolute;
		top: 100px;
		left: 447px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"placeholder='username'><br><br>
			<input id="text" type="password" name="password"placeholder='password'><br><br>
			<input id="text" type="text" name="vaccinated"placeholder='yes or no'>
			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>