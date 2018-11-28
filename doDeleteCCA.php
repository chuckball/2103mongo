<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$ccaName = $_GET['ccaName'];
$schoolName = $_GET['schoolName'];

$query = "DELETE FROM cca WHERE cca_name='$ccaName' AND school_school_name='$schoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('CCA Deleted!')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
}

?>