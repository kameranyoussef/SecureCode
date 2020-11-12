<?php
// random function ::::
function rnd($length,$lower=true,$upper=true,$numbers=true){
    $pool ="";
    $result = "";
    if($lower == true){
        $pool .="abcdefghijklmnopqrstuvwxyz";
    }
    if($upper == true){
        $pool .="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
    if($numbers == true){
        $pool .="0123456789";
    }
    $cc =0;
    while($cc < $length){
        $result .=$pool[rand(0,strlen($pool)-1)];
        $cc++;
    }
    return $result;
}
?>