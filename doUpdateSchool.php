<?php
include "connectDB.php";
include "head.php";

//Get updateSchool.php inputs
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

$query = "UPDATE school SET address='$address', postal_code='$postalCode', zone='$zone', url='$url', mrt_desc='$mrt', bus_desc='$bus', telephone_no='$telephone', dgp_code='$dgpCode', cluster_code='$clusterCode', visionstatement_desc='$vision', missionstatement_desc='$mission'"
        . "WHERE school_name='$schoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('School updated!')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
}

?>