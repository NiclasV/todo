    <?php
    //Koppling till lokal "localhost" databas "todo" med inlogg och password
    $username = "admin";
    $password = "admin123";
    $dbname="todo";
    $servername = "localhost";

    $pdo = new PDO ("mysql:host=$servername;dbname=$dbname",$username,$password);
    ?>