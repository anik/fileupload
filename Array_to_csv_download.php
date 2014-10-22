<?php

$data = array(
     0 => array(
     			"id" 	  => "11",
     			"name" 	  => "Anik",
     			"mobile"  => "01741415782",
     			"address" => "Dhaka",
     			),
     1 => array(
     			"id" 	  => "12",
     			"name" 	  => "Dipu",
     			"mobile"  => "01941415787",
     			"address" => "Khulna",
     			),
     2 => array(
     			"id" 	  => "13",
     			"name" 	  => "Azim",
     			"mobile"  => "015414157899",
     			"address" => "Sylhet",
     			),
     3 => array(
     			
     			"name" 	  => "Nil",
     			"mobile"  => "01841415756",
     			"address" => "Kustia",
     			),
     4 => array(
     			"id" 	  => "16",
     			"name" 	  => "Rohan",
     			"mobile"  => "01341415798",
     			"address" => "Shatkhira",
     			)
	);

$arr_condition = array("id", "name", "mobile");

$csv_header = array("#ID", "Name", "Mobile");

csv_generate($arr_condition, $data, $csv_header);

function csv_generate($arr_condition, $data, $csv_header){
	$csv_string =  implode(",", $csv_header)."\n";
	$count = count($arr_condition);
	
	foreach($data as $key) {
			$i=0;
			foreach( $arr_condition as $value ) {
				$i++;
				if(!isset($key[$value])){  $raw_value = "";  }else{ $raw_value = $key[$value]; }
					if($i==$count){
						$csv_string .= $raw_value."\n";
					}
					else{
						$csv_string .= $raw_value.",";
					}
			}
		}
		
		$file_name = date("d-m-y") . '.csv';
		header('Content-Type: application/csv'); 
		header('Content-Disposition: attachment; filename="' . $file_name . '"'); 
		echo $csv_string;
	}
