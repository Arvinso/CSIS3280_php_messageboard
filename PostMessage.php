<?php
//prepare database connection
//connect msql database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmbdb";

/* // connect to database without specifying database name
 try
 {
 $conn = new PDO("mysql:host=$servername", $username, $password);

 //connect to db using error mode
 $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 echo "Connected to database succesfully";
 }
 catch(PDOException $e)
 {
 echo "Connection to db failed: " . $e->getMessage();
 }
 */
try// connect to the phpmbdb database
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);

    //connect to db using error mode
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connected to phpmbdb database successfully";
} catch(PDOException $e) {
    //echo "Connection to phpmbdb db failed: " . $e -> getMessage();
}

/*
 try //create the phpmbdb database
 {
 $dbquery = $conn->prepare("CREATE DATABASE phpmbdb; CREATE USER '$username'@'$servername' IDENTIFIED BY '$password'; GRANT ALL ON '$dbname'.* to '$username'@'$servername'; ");

 $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 //execute query

 $dbquery->execute();
 //provide feedback if succesfull
 print "phpmbdb DB was successfully created.";
 }
 catch(PDOException $e)
 {
 print "Creating phpmbdb DB failed: ".$e->getMessage();
 }
 */

/*
 try // create table messages in the phpmbdb database
 {
 $tblmessages = $conn->prepare("CREATE TABLE messages (MessageID INT(6) UNSIGNED AUTO_INCREMENT NOT NULL, Subject VARCHAR(50) NOT NULL, Name VARCHAR(30) NOT NULL, Message VARCHAR(1000) NOT NULL, PRIMARY KEY(MessageID))");

 $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 //execute queries to create tables

 $tblmessages->execute();

 //provide some feedback

 echo "Creating Messages table successfull!";
 }
 catch(PDOException $e)
 {
 print "Creating Messages table failed: ".$e->getMessage();
 }
 */

try// inserting the filled in values
{

    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $time = $_POST['cur_time'];

    //prepare query

    $messageadded = "INSERT INTO messages(MessageID,Subject,Name,Message,Time) VALUES (default,'$subject','$name','$message','$time')";

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn -> exec($messageadded);
    print "New Record inserted successfully";
    echo "<p><a href=\"MessageEntryForm.php\">Post New Message</a></p>";
    echo "</br>";
    echo "<p><a href=\"MessageBoard.php\">View Messages</a></p>";
} catch(PDOException $e) {
    $conn -> rollBack();
    //print "Inserting records into messages table failed " . $e -> getMessage();
}
?>