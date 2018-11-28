<?php

include "connectDB.php";
include "head.php";

//Get addSchool.php inputs
$schoolName = strtoupper($_POST['school_name']);
$address = strtoupper($_POST['address']);
$postalCode = $_POST['postal_code'];
$zone = $_POST['zone'];
$url = $_POST['url'];
$mrt = strtoupper($_POST['mrt']);
$bus = $_POST['bus'];
$telephone = $_POST['telephone'];
$dgpCode = $_POST['dgp_code'];
$clusterCode = $_POST['cluster_code'];
$vision = $_POST['vision'];
$mission = $_POST['mission'];

$query = "INSERT INTO school (school_name, address, postal_code, zone, url, mrt_desc, bus_desc, telephone_no, dgp_code, cluster_code, visionstatement_desc, missionstatement_desc) "
        . "VALUES ('$schoolName', '$address', '$postalCode', '$zone', '$url', '$mrt', '$bus', '$telephone', '$dgpCode', '$clusterCode', '$vision', '$mission')";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('School Added!')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
}

?>