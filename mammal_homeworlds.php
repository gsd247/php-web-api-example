<?php
  
  ini_set('max_execution_time', 300);
  error_reporting(0);
  include('functions.php');
  
  $url = "https://swapi.co/api/species/";
  $fun_res = $characters_res = $people_res = array();
  
  $fun_res = call_api($url);
  $count = $fun_res['count'];
  
  //print_r($fun_res);echo "<br><br>";
  
  for($i=0;$i<$count;$i++)
  {
		//$characters_res[$i] = $fun_res['results'][$i];
		if(in_array("mammal", $fun_res['results'][$i]))
		{
			//echo "if";
			$char_name[] = $fun_res['results'][$i]['name'];
			$home_world[$i] = $fun_res['results'][$i]['homeworld'];
			
			$home_res[$i] = call_api($home_world[$i]);
			$home_world_name[] = $home_res[$i]['name'];
		}
		/*else
		{
			echo "else";
		}*/
  }
  
  //print_r($char_name);echo "<br><br>";
  //print_r($home_world_name);echo "<br><br>";
  //exit();
  
  echo "<table><tr><td><b>Character </b></td><td><b>Home World</b></td></tr>";
  
  for($j=0;$j<count($char_name);$j++)
  {
		echo "<tr><td>".$char_name[$j]."</td>";
		echo "<td>".$home_world_name[$j]."</td></tr>";
  }
  
  echo "</table>";

?>