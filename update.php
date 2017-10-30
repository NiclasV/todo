<?php
//Create our UPDATE SQL query.
require('db.php');

if (isset($_POST['done'])){
$statement = $pdo->prepare("UPDATE todos SET completed = 1 WHERE id = :id");

//Bind value :id with result from _GET
$statement->bindValue(':id', $_GET['id']);

//Execute prepared statement
$inserted = $statement->execute(array(':id' => $_POST['done']));
}

//JUST PRINTING OUT SOME DATA FOR DEBUGGING PURPOSE
echo '_POST = ';
print_r($_POST);
echo '<br /><br />';
echo '_GET = ';
print_r($_GET);

die;
header("Location: index.php?result=$inserted");
echo '<br /><br />  variable ID = ' . $id;



?>