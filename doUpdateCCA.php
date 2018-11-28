<?php

include "connectDB.php";
include "head.php";

//Get addCCA.php inputs
$oldCCAName = $_GET['oldCCAName'];
$oldSchoolName = $_GET['oldSchoolName'];
$ccaName = strtoupper($_POST['cca_name']);
$ccaGroup = $_POST['cca_group'];
$schoolSection = $_POST['school_section'];
$schoolName = $_POST['school_name'];

$query = "UPDATE cca SET cca_name = '$ccaName', cca_group = '$ccaGroup', school_section = '$schoolSection', school_school_name = '$schoolName' WHERE cca_name = '$oldCCAName' AND school_school_name = '$oldSchoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('CCA Updated!')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
}

?>