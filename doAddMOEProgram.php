<?php

include "connectDB.php";
include "head.php";

//Get addMOEProgram.php inputs
$programName = $_POST['program_name'];
$schoolName = $_POST['school_name'];

$query = "INSERT INTO moe_programme (program_name, school_school_name) VALUES ('$programName', '$schoolName')";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('MOE Program Added!')</script>";
    echo '<script language="javascript">window.location = "moe.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "moe.php"</script>';
}

?>