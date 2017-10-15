<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="" content="">

<style>

body 
{
    background-color: wheat;
}

td.left_block
{
    border-bottom: 1px solid black;
    border-right: 1px solid black;
}

td.mid_block
{
    border-right: 1px solid black;
}

td.right_block
{
    border-bottom: 1px solid black;
}

td.td_msgborders
{
    border-bottom: 1px solid black;
    
}


</style>


</head>
<body>

<br />
<h2>Message Board</h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmbdb";

try// connect to the phpmbdb database
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);

    //connect to db using error mode
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to phpmbdb database successfully";
} catch(PDOException $e) {
    echo "Connection to phpmbdb db failed: " . $e -> getMessage();
}

$dbMessagesget = $conn->prepare("SELECT * FROM messages");

$dbMessagesget->execute();

$dbMessagesresult = $dbMessagesget->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";

//print_r($dbMessagesresult);

echo "<table style=\"border-collapse:collapse; background-color:#CCFFFF; border:1px solid black;  border-collapse:none;\">";

foreach($dbMessagesresult as $message)
{
    $messageid = $message['MessageID'];
    $subject = $message['Subject'];
    $name = $message['Name'];
    $msgcontent = $message['Message'];
    $time = explode(" ", $message['Time']);
        
    echo "<tr><td class=\"left_block\" rowspan=\"3\" style='padding:0px 20px 50px 20px'>$messageid</td><td class=\"mid_block\"><strong>Subject:&nbsp;</strong>$subject</td><td class=\"right_block\" rowspan=\"3\"><strong>Date Posted&nbsp;</strong>$time[0]</br><strong>Time Posted&nbsp;</strong>$time[1]</td></tr>";
    echo "<tr><td><strong>Name:&nbsp;</strong>$name</td></tr>";
    echo "<tr><td class=\"td_msgborders\"><strong>Message:&nbsp;</strong>$msgcontent</td></tr>";    
     
}

echo "</table>";







echo "<p><a href=\"MessageEntryForm.php\">Post New Message</a></p>";



echo "</pre>";


?>