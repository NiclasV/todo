<!DOCTYPE html>

<?php
//Kräver koppling till databas med PDO via db.php
    require('db.php');
    include('header.php');
?>

<body>

    
    <div class="flex-content">

    <h1 class="center full-width">List of things to do</h1>
    
    <?php
    // take action on resulting database insertion
    if ($_GET["result"])
        echo "Insert succes!!!!";
    ?>

    <!-- FIRST FORM FOR DELETE / COMPLETE A TASK -->
    <form class="full-width" method="POST" action="changetodo.php">  <!-- needs a seperate php file??? -->
    <?php
    
    //Få ut data från databasen i en tabell: 
    //gonna redo this to a function later
    $stmt = $pdo->query("SELECT id, title, completed, createdBy FROM todos ORDER BY id DESC"); //hämtar all data till $stmt
    $header = $pdo->query("DESCRIBE todos"); //hämtar columner från databas
    $col = $header->fetchALL(PDO::FETCH_ASSOC); //skapar en assoc array av columns
    echo '<table class="table table-dark full-width">' . "\n";
    echo '<thead><tr>';
    foreach ( $col as $data ) {  //loopar ut columnerna som fetchats ut
        echo '<th scope="col">' . ($data['Field']) . '</th>';
    }
    echo '<th scope="col">' . "i did it!" . '</th>';
    echo '<th scope="col">' . "Delete" . '</th>';
    echo '</thead></tr>';
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo '<tr><td>';
        echo ($row['id']);
        echo '</td><td>';
        echo ($row['title']);
        echo '</td><td>';
        if($row['completed']){ 
            echo '<p class="red-text">' . 'Done!' . '</p>';
        } else {
            echo '<p class="red-text">' . 'Not done!' . '</p>';
        }
        echo '</td><td>';
        echo ($row['createdBy']);
        echo '</td><td>';
        #echo '<field><input type="checkbox" name="done[]"></field>';
        echo '<field><input type="radio" name=radiobox-' . $row['id'] . ' value="done"></field>';
        echo '</td><td>';
        #echo '<field><input type="checkbox" name="deletebx[]"></field>';
  
        echo '<field><input type="radio" name=radiobox-' . $row['id'] . ' value="delete"></field>';
    }
    echo '</td></tr></table>';
    echo '<field><input type="submit" name="submit" value="Change"></field>';
    ?>
    </form>
    <h1 class="center full-width">To do's, Another one!:</h1>

    <!-- SECOND FORM FOR ADDING DATA -->    
    <form action="addtodo.php" method="POST"> <!-- send data to seperate PHP file for adding to database -->
        <field><input type="text" name="namn" placeholder="Name"></field>
        <field><input type="text" name="todo" placeholder="WhatchaWonDo?"></field>
        <field><input type="submit" name="add-todo" value="Add it!"></field>
    </form>
    </div>

    

    <?php
    //Printar ut columner och rows som en associative array, for debugging purposes
    echo "<pre>\n";
    $stmt = $pdo->query("SELECT id, title, completed, createdBy FROM todos");
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
    echo "</pre>\n";
    ?>

</body>
</html>   

//header(location: index.php) <<skickar tillbaka till första sidan>>