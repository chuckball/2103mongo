<!DOCTYPE html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html lang="en">
    <head>
        <title>Group 3 School Locator System</title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['UserID']) or $_SESSION['UserID'] == '') {
            echo '<script language="javascript">window.location = "login.php"</script>';
        } else {
            echo '<script language="javascript">window.location = "cca.php"</script>';
        }
        ?>  
    </body>
</html>