<?php
 
//connect to MySql database
try {
    $dbc=new PDO("mysql:host=localhost;dbname=id4057816_pciu_notice_db","id4057816_pciu_notice","pciu_notice") 
     or die("Unable to connect.");
}
catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
 
?>