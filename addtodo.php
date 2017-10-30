<?php
//Create our INSERT SQL query.
require('db.php');
try {

    $tbl="todos";

    $sql = "INSERT INTO $tbl (title, completed, createdBy) VALUES (:title, :completed, :createdBy)";
    //Prepare our statement.
    $statement = $pdo->prepare($sql);

    //Bind our values to our parameters
    $statement->bindValue(':title', $_POST["todo"] );
    $statement->bindValue(':completed', 0 );
    $statement->bindValue(':createdBy', $_POST["namn"]);
    
    //Execute the statement and insert our values.
    //Because PDOStatement::execute returns a TRUE or FALSE value,
    //we can easily check to see if our insert was successful.
    $inserted = $statement->execute();
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
// redirect to index with result as parameter
header("Location:index.php?result=$inserted");

?>