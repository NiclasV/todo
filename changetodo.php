<?php
    require('db.php');
    
    $stmt = $pdo->query("SELECT id, title, completed, createdBy FROM todos ORDER BY id DESC"); //hämtar all data till $stmt
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        $id = $row['id'];
        echo '<pre>';
        echo "radiobox $id is examined";
        echo '</pre>';
        /*        array(3) {
            ["radiobox-9"]=>
            string(4) "done"
            ["radiobox-8"]=>
            string(6) "delete"
            ["submit"]=>
            string(6) "Change"
          }
  */
        echo '<pre>';
        if (isset($_POST["radiobox-" . $id]))
          echo "radiobox $id is set to " .  $_POST["radiobox-" . $id];
        echo '</pre>';
    }

echo '<pre>';
var_dump($_POST);
echo '</pre>';

?>