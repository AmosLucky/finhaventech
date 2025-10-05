<?php

$otp =rand(10000,99999);

echo $otp;
echo "<br>";

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];

}else{
    $msg = "";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $msg ?>


<form method="POST" action="process.php">
<input type="number" name="opt" placeholder="Enter otp">
<input type="hidden" name="cotp" value="<?php echo $otp ?>">
<input type="submit"   >
</form>
    
</body>
</html>