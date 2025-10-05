<?php


///functions //////

function echoName(){

    echo "amos mark <br>";

}

echoName();


function addDonimation(){
    $balance = "5000";
    echo  "$".$balance;
}

addDonimation();

function joinNairaToPrice($price){
    echo "N",$price."<br>";

}

joinNairaToPrice(500);

joinNairaToPrice(5000);

joinNairaToPrice(1500);

function add2nums($num1,$num2,$operator){
   if($operator == '+'){
    echo $num1 + $num2;
   }else if($operator == "-"){
    echo $num1 - $num2;
   }else if($operator == "*"){
    echo $num1 * $num2;
   }

}

add2nums(100,3,"*");
echo "<br>";

add2nums(100,100,"+");

$numChracter =  strlen("amos lucky");

echo $numChracter;


function sunHistory(){
    $arr = array(300,400,2,6,80000);
    $total = 0;
    for($i = 0; $i < count($arr); $i++){
        $total += $arr[$i];
        


    }

    return $total;
}
$totalBalance = sunHistory();
echo "<br>";
joinNairaToPrice(number_format($totalBalance));

function add($num1,$num2){
    return $num1+$num2;

}

$s = add(9,5);




