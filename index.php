<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$mysqli= NEW MySQLi('localhost','root','','login_sample_db');
    $resultSet= $mysqli->query("SELECT Name FROM countries");
	?>
<link rel='stylesheet' type ='text/css' href='styles.css'/>

<!DOCTYPE html>
<html>
<head>
	<title>Covid stats</title>
	<link rel="stylesheet" href="styles.php" media="screen">
</head>
<header> <button onclick="window.location.href='logout.php'">Logout</button>
</header>
<body>


	<h1>Welcome to covid statistics</h1>
	
<div class="main-container">
<h2>	Hello, <?php echo $user_data['user_name']; ?>!
	Please select the country below from the dropdown box would like to explore the information:
</h2>

</body>

<select name="countries" id="country">
    <?php
	while($rows = $resultSet->fetch_assoc())
		{
			 $Name = $rows['Name'];
			 echo"<option value='$Name'>$Name</option>";
		}
?>
</select> <h3>Click below to fetch covid statistics :</h3>
<input type="submit" onClick="myFunction()"/>
 <script>
  function myFunction() {
    window.location.href="a.html?country="+document.getElementById("country").value;
  }
 </script>
<h3>Click below to fetch vaccine statistics:</h3>
<input type="submit" onClick="myFunction1()"/>
 <script>
  function myFunction1() {
    window.location.href="vaccine.html?country="+document.getElementById("country").value;
  }
  </script>

  <h3>If you are not vaccinated,Click below:</h3>
<input type="submit" onClick="myFunction3()"/>
 <script>
  function myFunction3() {
    window.location.href="https://www.nfid.org/immunization/10-reasons-to-get-vaccinated";
  }
  </script>
</div>
 <br>
 <br>
 <br>
 <br>
 <br>
 
<footer>
        
            
			<p class="left">Thank you! For queries contact the developer:<br></p>
			<h4> <a href="mailto:covidstats@example.com">covidstats@example.com</a></h4>
			<h4> <a href="tel:123-456-7890">+3534567890</a></h4>
          </footer>
</html>