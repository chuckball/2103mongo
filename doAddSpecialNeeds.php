<?php

include "connectDB.php";
include "head.php";

//Get addSpecialNeeds.php inputs
$schoolName = $_POST['school_name'];
$optionCode = $_POST['option_code'];
$hearingLoss = $_POST['hearing_loss'];
$mildSpecialNeeds = $_POST['mild_special_needs'];
$visuallyImpaired = $_POST['visually_impaired'];
$physicalDisabilities = $_POST['physical_disabilities'];


$query = "INSERT INTO special_needs_facilities (school_school_name, option_code, hearing_loss, mild_special_needs, visually_impaired, physical_disabilities) VALUES
('$schoolName', '$optionCode', '$hearingLoss', '$mildSpecialNeeds', '$visuallyImpaired', '$physicalDisabilities')";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('Special Need School Added!')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
}

?>