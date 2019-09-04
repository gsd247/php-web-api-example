<html>
<body>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link rel="stylesheet" href="css/style.css"/>
<script src="js/form-validation.js"></script>
<center>
	<form action="" method="post" name='registration'>
	<table>
	<tr>
	<td>Name: </td><td><input type="text" name="name"></td>
	</tr>
	<tr>
	<td>Height: </td><td><input type="text" name="height"></td>
	</tr>
	<tr>
	<td>Mass: </td><td><input type="text" name="mass"></td>
	</tr>
	<tr>
	<td>Hair Color: </td><td><input type="text" name="hair_color"></td>
	</tr>
	<tr>
	<td>Skin Color: </td><td><input type="text" name="skin_color"></td>
	</tr>
	<tr>
	<td>Eye Color: </td><td><input type="text" name="eye_color"></td>
	</tr>
	<tr>
	<td>Birth Year: </td><td><input type="text" name="birth_year"></td>
	</tr>
	<tr>
	<td>Gender: </td><td><input type="text" name="gender"></td>
	</tr>
	<tr>
	<td>Created: </td><td><input type="text" name="created"></td>
	</tr>
	<tr>
	<td>HomeWorld: </td><td><input type="text" name="homeworld_name"></td>
	</tr>
	<tr>
	<td>Species: </td><td><input type="text" name="species_name"></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" name="submit" value="Add Character"></td>
	</form>
</center>
</body>
</html>
<?php
include('functions.php');
include('db_connect.php');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$height = $_POST['height'];
	$mass = $_POST['mass'];
	$hair_color = $_POST['hair_color'];
	$skin_color = $_POST['skin_color'];
	$eye_color = $_POST['eye_color'];
	$birth_year = $_POST['birth_year'];
	$gender = $_POST['gender'];
	$created = $_POST['created'];
	
	$homeworld = $_POST['homeworld_name'];
	
	$species = $_POST['species_name'];
	
	//call insert function
	
	$res = add_char($name,$height,$mass,$hair_color,$skin_color,$eye_color,$birth_year,$gender,$created,$homeworld,$species);
	
	if($res == 'success')
	{
		echo "<font color='green'>Character added successfully!</font>";
	}
	else
	{
		echo "Sorry! There was an <font color='red'>error</font> adding the Character";
	}
}
?>