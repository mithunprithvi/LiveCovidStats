<?php
$mysqli= NEW MySQLi('localhost','root','','login_sample_db');
    $resultSet= $mysqli->query("SELECT Name FROM countries");
	<select name="countries">
        
        while($rows = $resultSet->fetch_assoc())
            {
                 $Name = $rows['Name'];
                 echo"<option value='$Name'>$Name</option>";
            }
  
    </select>
    ?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="covid.js"></script> -->
View Countrywise covid status
</head>
<body>
    <div>
    <input type="text" id="SearchBox">
    <br><br>
    <button onclick="myFunction()" id="Submit">Enter</button>
    <br>
   
<div id="MainContent">Covid Details as requested
    <div id=confirmed></div>
    <div id=recovered></div>
    <div id=deaths></div>
    <div id=population></div>
    <div id=continent></div>
    <div id=location></div>
    <div id=capital_city></div>
</div> 

</body>
<script>
function myFunction()
{
console.log('HI')
var html="";
var searchCountry=$("#SearchBox").val();
var url='https://covid-api.mmediagroup.fr/v1/cases?country='+searchCountry;
$.get(url).then((
    data) => {
        console.log(data);
        document.getElementById("confirmed").innerHTML="Confirmed cases = "+data.All.confirmed;  
        document.getElementById("recovered").innerHTML="recovered cases ="+data.All.recovered;
        document.getElementById("deaths").innerHTML="death cases ="+data.All.deaths;
        document.getElementById("population").innerHTML="population ="+data.All.population;
        document.getElementById("continent").innerHTML="continent ="+data.All.continent;
        document.getElementById("location").innerHTML="location ="+data.All.location2;
        
         
    });
}




</script>


</html>

