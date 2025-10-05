<?php

$conn = mysqli_connect("localhost","root","");

///how to create DB

$sql = "CREATE DATABASE  IF NOT EXISTS tutotial";
$exec = mysqli_query($conn,$sql);
if($exec){
    echo "Db Tutorial succesfuly created <br>";

}else{
    echo "Failed to create DB tutorial ".mysqli_error($conn);
}
$conn = mysqli_connect("localhost","root","","tutotial");

//how to create table
$sql = "CREATE TABLE IF NOT EXISTS users( 
id int(11) PRIMARY KEY AUTO_INCREMENT, 
name varchar(255) ,
email varchar(255) not null,
password varchar(255) not null,
phone varchar(255),
date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP

 )";

 $exec = mysqli_query($conn,$sql);
 if($exec){
    echo " Table user succesfuly created <br>";

}else{
    echo "Failed to create table user ".mysqli_error($conn);
}

///HOW TO ADD / REMOVE A COLUMN FROM A TABEL

// $sql = "ALTER TABLE users ADD username varchar(255)";
// $exec = mysqli_query($conn,$sql);
//  if($exec){
//     echo " USERNAMe ADDED TO user table succesfuly created <br>";

// }else{
//     echo "Failed to create table user ".mysqli_error($conn);
// }


/////INSERT A ROW INTO A TABLE

$sql = "INSERT INTO users(name,email,password,phone,username) values(
    'Amos','amos@gmail.com','123456','0908789098','amoes11'
)";

$exec = mysqli_query($conn,$sql);
if($exec){
    echo " Row created <br>";

}else{
    echo "Failed to create row ".mysqli_error($conn);
}

///UPDATE QUERY

$sql = "UPDATE users SET name = 'Mark', email = 'Mark@gmail.com' WHERE id = '2'";
$exec = mysqli_query($conn,$sql);
if($exec){
    echo " Row updated <br>";

}else{
    echo "Failed to updated row ".mysqli_error($conn);
}

//DELETE QUERY

$sql = "DELETE FROM users WHERE id = '3'";

$exec = mysqli_query($conn,$sql);
if($exec){
    echo " Row deleted <br>";

}else{
    echo "Failed to deleted row ".mysqli_error($conn);
}

///READ / FETCH

// $sql = "SELECT username,email FROM users ";
$sql = "SELECT * FROM users ";
$exec = mysqli_query($conn,$sql);
if($exec){
    $users = mysqli_fetch_array($exec);
    //mysqli_fetch_assoc($exec)
    
    //print_r($users);
    while($row = mysqli_fetch_array($exec)){
        echo $row['username'];
        echo "<br>";
        echo $row['email'];
        echo "<br>";

    }

    

}else{
    echo "Failed to select row ".mysqli_error($conn);
}

$password = "123456";
$email = "Mark@gmail.com";


$sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
$exec = mysqli_query($conn,$sql);
if($exec){
    $num = mysqli_num_rows($exec);
    if($num == 1){

        $user = mysqli_fetch_assoc($exec);
        print_r($user);
        $username = $user['username'];
        $_SESSION['id'] = $user['id'];

    }else{
        echo "No user with this cresidential found";
    }
}else{
    echo "Error ".mysqli_error($conn);
}











