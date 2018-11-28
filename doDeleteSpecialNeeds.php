<?php

include "connectDB.php";
include "head.php";

$schoolName = $_GET['schoolName'];

$query = "DELETE FROM special_needs_facilities WHERE school_school_name='$schoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('Special Needs School Deleted!')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "specialNeeds.php"</script>';
}

?>