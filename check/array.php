<?php


function spance(){
    //this function used to brake lines
    echo "<br>";
}
$name = 'mark';
$myArr =   array("obi","ada",'chuks',"kingsley");


print_r($myArr);
spance();

echo $myArr[0];
spance();
echo $myArr[3];
$myArr2 =   array(300,600,"make",true);
$jss1 = array(array("obi","king"),array("mark","john"),array("chuks","mandela"));
//[["obi","king"],["obi","king"],["obi","king"]]
print_r($jss1);
spance();
echo $jss1[0][0];
spance();
echo $jss1[2][0];
$myArr3 = ["obi","ada",'chuks',"kingsley"];

$user = ["id"=>1,"name"=>"mark","email"=>"mark@gmail.com","phone"=>"09089085"];
spance();
echo $user['email'];

$users = [
    ["id"=>0,"name"=>"mark","email"=>"mark@gmail.com","phone"=>"09089085"],
    ["id"=>1,"name"=>"johnark","email"=>"johnark@gmail.com","phone"=>"0998555"],
    ["id"=>2,"name"=>"kings","email"=>"kings@gmail.com","phone"=>"808488484"]
];

print_r($users[1]);
spance();

echo $users[1]['name'];
spance();
echo $users[2]['phone'];

///loops
$myArr =   array("obi","ada",'chuks',"kingsley","queens");
spance();
spance();


for($i = 0; $i <  count($myArr); $i++ ){
    echo $myArr[$i];
    echo "<br>";

}
spance();
spance();


for($i = 0; $i <  count($users); $i++ ){
    echo $users[$i]["email"];
    echo "<br>";

}
spance();
spance();


$jss1 = array(array("obi","king","jude","kingobi"),array("mark","john"),array("chuks","mandela"));

for($i = 0; $i <  count($jss1); $i++ ){

    for($j = 0; $j < count($jss1[$i]); $j++ ){
        echo $jss1[$i][$j];
        spance();
    }
    

}
spance();
spance();

$myArr =   array("obi","ada",'chuks',"kingsley","queens");
$i = 0;


while($i < count($myArr)){
    echo $myArr[$i];
    spance();
    $i++;
}
spance();
spance();

foreach($myArr as $name){
    echo $name;
    spance();
}
spance();
spance();

$i = 0;

do{
    echo $myArr[$i];
    spance();
    $i++;

}while($i < count($myArr));






