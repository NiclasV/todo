    <?php
    //Koppling till lokal "localhost" databas "todo" med inlogg och password
    $username = "admin";
    $password = "admin123";
    $dbname="todo";
    $servername = "localhost";
    try {
        $pdo = new PDO ("mysql:host=$servername;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
?>