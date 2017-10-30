<?php
//Create our UPDATE SQL query.
require('db.php');

if (isset($_GET['id'])){
    $statement = $pdo->prepare("UPDATE todos SET completed = 1 WHERE id = :id");

    //Bind value :id with result from _GET
    $statement->bindValue(':id', $_GET['id']);

    //Execute prepared statement
    $update = $statement->execute();
}
header("Location: index.php");
?>