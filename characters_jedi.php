<?php
  
  ini_set('max_execution_time', 300);
  include('functions.php');
  
  $url = "https://swapi.co/api/films/3/";
  $fun_res = $characters_res = array();
  
  $fun_res = call_api($url);
  
  //print_r($fun_res);echo "<br><br>";
  
  for($i=0;$i<count($fun_res['characters']);$i++)
  {
		$characters_res[$i] = call_api($fun_res['characters'][$i]);
  }
  
  //print_r($characters_res);echo "<br><br>";
  
  echo "<table><tr><td><b>Character names</b></td></tr>";
  
  for($j=0;$j<count($characters_res);$j++)
  {
		echo "<tr><td>".$characters_res[$j]['name']."</td></tr>";
  }
  
  echo "</table>";

?>