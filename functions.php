<?php

function call_api($url)
{

	  // The HTTP headers for the request 	  
	  $headers = array(
		'Accept: application/json',
		'Content-Type: application/json',

		);

	  // Build the cURL session
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  //curl_setopt($ch, CURLOPT_POST, TRUE);//CURLOPT_POST
	  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	  curl_setopt($ch, CURLOPT_HEADER, 0);
	  //curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	  // Send the request and check the response
	  if (($result = curl_exec($ch)) === FALSE) 
	  {
		//die('cURL error: '.curl_error($ch)."<br />\n");
		return -1;
	  } 
	  else 
	  {
		//echo "Success!<br />\n";
		// Convert JSON string to Array
		  $res_array = json_decode($result, true);
		  
		  return $res_array;
	  }
	  curl_close($ch);
	  
}

function add_char($name,$height,$mass,$hair_color,$skin_color,$eye_color,$birth_year,$gender,$created,$home_world_name,$species_res_name)
{
	include('db_connect.php');

	$sql = "insert into sachindath.characters values ('".$name."','".$height."','".$mass."','".$hair_color."','".$skin_color."','".$eye_color."','".$birth_year."','".$gender."','".$created."','".$home_world_name."','".$species_res_name."');";
		
			//echo $sql."<br><br>";
	
	$result = mysqli_query($link, $sql);
	
	if($result)
	{
		return "success";
	}
	else
	{
		return -1;
	}
	
}

?>