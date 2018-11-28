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


$query = "UPDATE special_needs_facilities SET option_code = '$optionCode', hearing_loss = '$hearingLoss', mild_special_needs = '$mildSpecialNeeds', visually_impaired = '$visuallyImpaired', physical_disabilities = '$visuallyImpaired' 
WHERE school_school_name = '$schoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('Special Need School Updated!')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
}

?>