<?php



function addSpace(){
    echo "<br>";
}

$password = "  123456  ";
echo $password;
addSpace();
///count trim spaces in front and back of a string 

echo trim($password);

addSpace();

$name = "Amos Lucky mark Lucky john Lucky";

echo str_replace("Lucky","jack",$name);

$name2 = "you-are-a-good-boy";
addSpace();
echo $name2;
addSpace();
///replace string characters
echo str_replace("-"," ",$name2);
addSpace();
///count string characters
echo strlen($name);
addSpace();

///count string characters
echo substr($name,0,15).".....";
addSpace();

$harsh = password_hash($password,PASSWORD_DEFAULT);
echo $harsh;

addSpace();
echo md5($password);

addSpace();

echo password_verify($password,$harsh);

//convert a string into an array
$str = "Hello world. It's a beautiful day.";
print_r (explode(" ",$str));
addSpace();
$arr = explode(" ",$str);

echo implode(" ",$arr);
addSpace();
echo number_format("1000000");
addSpace();
echo str_repeat("Hellow ",10);
addSpace();
echo str_word_count("Hello world!");
///Strcmp for comparing strings (case sensitive)
addSpace();
echo strcmp("Hello world!","Hello World!");
addSpace();
//strcasecmp fompareing strings (case insensitive)
echo strcasecmp("Hello world!","HELLO WORLD!");
///remove html from string

addSpace();
echo strip_tags("<h1>Hello <b>world!</b></h1>");
addSpace();

$email = "am@gmail.com";
echo stripos($email,"@");
addSpace();
if(stripos($email,"@")){
    echo "yes";
}else{
    echo "no @";
}
addSpace();
echo strtolower($name);
addSpace();

echo strtoupper($name);
 addSpace();
 
 $mb = "100GB-300";

 if(substr($mb,0,5) == "100GB"){

 }

 $mbs = str_split($mb,4);

 $mbss = explode("-",$mb);
 echo $mbss[0];
 addSpace();
 echo $mbss[1];






?>