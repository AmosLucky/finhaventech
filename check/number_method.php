<?php



function addSpace(){
    echo "<br>";
}

$num = 2;
$num1 = 3.3;
$num3 = "33";

var_dump($num1);
addSpace();

echo is_int($num);
addSpace();
echo (int)$num1;
addSpace();
echo (float) $num3;

addSpace();
echo pi();
addSpace();

echo(min(0, 150, 30, 20, -8, -200));
addSpace();
echo(max(0, 150, 30, 20, -8, -200));
addSpace();
echo(abs(-6.7));
addSpace();
echo(sqrt(64));
addSpace();
echo(round(0.60));
addSpace();
echo(round(0.49));


date_default_timezone_set("Africa/Lagos");

addSpace();
echo date("Y/m/d i:s a");
addSpace();

echo date("Y/M/D l m");

addSpace();
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);

