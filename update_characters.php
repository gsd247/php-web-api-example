<?php

	include('db_connect.php');

	//$sql = "insert into sachindath.characters values ('".$name."','".$height."','".$mass."','".$hair_color."','".$skin_color."','".$eye_color."','".$birth_year."','".$gender."','".$created."','".$home_world_name."','".$species_res_name."');";

	$sql = "select * from sachindath.characterupdates;";
		
			//echo $sql."<br><br>";
	
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) 
		{
			$name[] = $row['name'];
			$height[] = $row['height'];
			$mass[] = $row['mass'];
			$hair_color[] = $row['hair_color'];
			$skin_color[] = $row['skin_color'];
			$eye_color[] = $row['eye_color'];
			$birth_year[] = $row['birth_year'];
			$gender[] = $row['gender'];
			$created[] = $row['created'];
			
			$homeworld[] = $row['homeworld_name'];
			
			$species[] = $row['species_name'];
		}
	} 
	else 
	{
		echo "0 results";
	}
	
	for($i=0;$i<count($name);$i++)
	{
		$sql2 = "update sachindath.characters set height='".$height[$i]."',mass='".$mass[$i]."',hair_color='".$hair_color[$i]."',skin_color='".$skin_color[$i]."',eye_color='".$eye_color[$i]."',birth_year='".$birth_year[$i]."',gender='".$gender[$i]."',created='".$created[$i]."',homeworld_name='".$homeworld[$i]."',species_name='".$species[$i]."' where name='".$name[$i]."'";
		
		//echo $sql2."<br><br>";
		
		$result = mysqli_query($link, $sql2);
		
		if($result)
		{
			echo "<font color='green'>Update successfully done!</font><br><br>";
		}
		else
		{
			echo "Sorry! There was an <font color='red'>error</font> Updating.<br><br>";
		}
		
	}

?>