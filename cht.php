<link rel="stylesheet" link href="bootstrap-5.3.3-dist/css/bootstrap.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<a href="inde.php">
<i class="fa-solid fa-backward fa-bounce fa-xl" style="color: #74C0FC;"></i>
</a>


<div class="container p-5 mx-auto d-block fs-1">


<?php
    
session_start();

$chatFile ="chat.html";
$_SESSION["chatFile"] ="chat.html";

if (!isset($_SESSION["user"])){
    $_SESSION["user"]="User_" .rand(100,999);
}

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST["messag"]))
{
    $message = htmlspecialchars($_POST["messag"]);

    $newData = "<font size='23'>". $_SESSION["user"] . ": " .$message . "\n"; //new

    $existingData = file_get_contents($chatFile);// Read current file

    file_put_contents($chatFile,$newData. $existingData); //prepend new data

    //file_put_contents
}

//display message

$chat = file_exists($chatFile)? file_get_contents($chatFile): "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    


<style>

#main{
position: relative;
width: 100%;
height: auto;
min-height: 20rem;
padding: 15rem 0;
background-attachment: scroll;
background-size: cover;
border-radius:30px;
border-bottom-right-radius:40px;
  
}



</style>

</head>
<body>

<h1 style='color:teal;text-align:center;'>Chat<u>Room</u></h1>

<div>
<iframe id="main" src="show.php" width="100%" height="400" style="behavior:smooth;
border:1px solid black;padding:10px;overflow:auto;"></iframe>

<?php


?>
</div>

<form method="post" class="text-center">
    <input type="text" name="messag" class=" rounded-end" placholder="Type message...." required>
    <br/>
    <button type="submit" class="btn btn-primary btn-lg text-end">Send</button>
</form>

<form method="post" action="clr.php" class="text-end">
 <input type="password" name="clpass" class=" rounded-start" required>
 <button id="b1" class="btn btn-danger btn-lg rounded-start" type="submit" name="clear">Clear chat</button>
</form>


    
</body>
</html>

