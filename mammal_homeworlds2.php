<?php
  
  ini_set('max_execution_time', 300);
  include('functions.php');
  
  $url = "https://swapi.co/api/species/3/";
  $fun_res = $characters_res = $people_res = array();
  
  $fun_res = call_api($url);
  
  //print_r($fun_res);echo "<br><br>";
  
  for($i=0;$i<count($fun_res['people']);$i++)
  {
		$characters_res[$i] = $fun_res['people'][$i];
  }
  //exit();
  //print_r($characters_res);echo "<br><br>";
  //exit();
  echo "<table><tr><td><b>Character </b></td><td><b>Home World</b></td></tr>";
  
  for($j=0;$j<count($characters_res);$j++)
  {
		
			$people_res[$j] = call_api($characters_res[$j]);
			
			/*if($k==0)*/
			$char_name = $people_res[$j]['name'];//echo " ";
			$home_world = $people_res[$j]['homeworld'];
			
			$home_res[$j] = call_api($home_world);
			
			echo "<tr><td>".$char_name."</td>";
			echo "<td>".$home_res[$j]['name']."</td></tr>";
			
			//print_r($home_res[$j]);echo "<br><br>";
			
			//echo $people_res[$j]['homeworld'];echo "<br><br>";
		
  }
  
  //print_r($people_res);echo "<br><br>";
  
  echo "</table>";

?>