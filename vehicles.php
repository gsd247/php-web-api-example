<?php
  
  ini_set('max_execution_time', 300);
  error_reporting(0);
  include('functions.php');
  
  $url = "https://swapi.co/api/vehicles/";
  $fun_res = $fun_res2 = $fun_res3 = array();
  
  $fun_res = call_api($url);
  $count = $fun_res['count'];
  
  //print_r($fun_res);echo "<br><br>";
  
  echo "<table><tr><td><b>Vehicle </b></td><td><b>Film</b></td></tr>";
  $a='0';
  for($i=1;$i<=$count;$i++)
  {
		/*$fun_res2 = call_api($url.$i."/");
		
		echo $url.$i;echo "<br><br>";
		
		print_r($fun_res2);echo "<br><br>";*/
		
		$fun_res2 = $fun_res['results'][$i];//echo "<br><br>";
		//print_r($fun_res2);echo "<br><br>";
		
		//exit();
		
		//echo $name."<br><br>";
		if(strlen($fun_res2['name'])>'15')
		{
			
			//echo "if";
			$films[$a] = $fun_res2['films'];
			//print_r($films[$a]);
			
			echo "<tr><td>".$fun_res2['name']."</td><td>";
			
			for($j=0;$j<count($films[$a]);$j++)
			{
			
				$fun_res3 = call_api($films[$a][$j]);
				echo $fun_res3['title']."<br>";//echo "<br><br>";
			}
			echo "</td>";
			
		}
		echo "</tr>";
		$a++;
  }
  
 echo "</table>";

?>