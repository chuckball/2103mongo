<?php

include "connectDB.php";
include "head.php";

//Get addCCA.php inputs
$ccaName = strtoupper($_POST['cca_name']);
$ccaGroup = $_POST['cca_group'];
$schoolSection = $_POST['school_section'];
$schoolName = $_POST['school_name'];

$query = "INSERT INTO CCA (cca_name, cca_group, school_section, school_school_name) VALUES ('$ccaName', '$ccaGroup', '$schoolSection', '$schoolName')";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('CCA Added!')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
}

?>