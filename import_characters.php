<?php
  
  ini_set('max_execution_time', 300);
  error_reporting(0);
  include('functions.php');
  include('db_connect.php');
  
  $url = "https://swapi.co/api/people/";
  $fun_res = $characters_res = $people_res = array();
  
  $fun_res = call_api($url);
  $count = $fun_res['count'];
  
  //print_r($fun_res);echo "<br><br>";
  
  for($i=1;$i<=$count;$i++)
  {
		$fun_res2 = call_api($url.$i."/");
		
		$name = $fun_res2['name'];
		$height = $fun_res2['height'];
		$mass = $fun_res2['mass'];
		$hair_color = $fun_res2['hair_color'];
		$skin_color = $fun_res2['skin_color'];
		$eye_color = $fun_res2['eye_color'];
		$birth_year = $fun_res2['birth_year'];
		$gender = $fun_res2['gender'];
		$created = $fun_res2['created'];
		
		$homeworld = $fun_res2['homeworld'];
		//print_r($homeworld);echo "<br>";
		$home_res = call_api($homeworld);
		
		//print_r($home_res);
		
		$home_world_name = $home_res['name'];
		
		$species = $fun_res2['species'];
		//print_r($species);echo "<br>";
		
		$species_res = call_api($species['0']);
		//print_r($species_res);
		
		$species_res_name = $species_res['name'];
		
		/*echo $name."\t".$height."\t".$mass."\t".$hair_color."\t".$skin_color."\t";
		echo $eye_color."\t".$birth_year."\t".$gender."\t".$created."\t".$home_world_name."\t".$species_res_name."\t";echo "<br><br>";*/
		
		$sql = "insert into sachindath.characters values ('".$name."','".$height."','".$mass."','".$hair_color."','".$skin_color."','".$eye_color."','".$birth_year."','".$gender."','".$created."','".$home_world_name."','".$species_res_name."');";
	
		//echo $sql."<br><br>";
	
		$res = mysqli_query($link,$sql);
		
		if($res)
		{
			echo "<font color='green'>Import function successfully done!</font><br><br>";
		}
		else
		{
			echo "Sorry! There was an <font color='red'>error</font> Importing.<br><br>";
		}
		
  }

?>