<?php

$nazioniphp = array("Italia"=>"Roma", "Germania"=>"Berlino", "Francia"=>"Parigi");

$naz = $_POST["Nazioni"];

foreach ($nazioniphp as $key => $value){
if($key == $naz)
{ echo("La capitale della $key e' $value");}
}

?>