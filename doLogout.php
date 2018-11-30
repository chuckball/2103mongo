<?php

ob_start();
if (!isset($_SESSION)) {
    session_start();
    session_destroy();
    echo '<script language="javascript">window.location = "frontPage.php"</script>';
} else {
    session_start();
    session_destroy();
    echo '<script language="javascript">window.location = "frontPage.php"</script>';
}
?>