<?php
  
  
$array1 = array("green", "brown", "blue", "red");
$array2 = array("green", "pink", "yellow", "red");
$result_array = array_keys(array_intersect_assoc($array1, $array2));
print_r($result_array);


$arrlength = count($result_array);
echo "length  "; 

echo $arrlength;


for($x = 0; $x < $arrlength; $x++){
	echo "<br>"; 
	echo $result_array[$x]; 

} 
?>