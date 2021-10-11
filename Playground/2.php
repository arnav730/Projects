<?php

$myArray = array("Rob","Kristen","Tommy","Ralphie");

print_r($myArray);

echo $myArray[1];

echo "<br><br>";

$anotherArray[0]="Pizza";

$anotherArray[1]="Yoghurt";

$anotherArray[5]="Coffee";

$anotherArray["myFavFood"]= "icecream";

print_r($anotherArray);

echo "<br><br>";

$thirdArray = array("France" => "French",
                    "USA" => "English",
                    "Germany"=>"German");

unset($thirdArray["France"]);

print_r($thirdArray);                    
?>