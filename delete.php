<?php
//Create our DELETE SQL query.
require('db.php');

if (isset($_GET['id'])){
    $statement = $pdo->prepare("DELETE FROM todos WHERE id = :id");

    //bind value :id with result from _GET
    $statement->bindValue(':id', $_GET['id']);

    //Execute prepared statement
    $delete = $statement->execute();
}
header("Location: index.php?result=$delete");
?>