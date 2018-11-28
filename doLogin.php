<?php

if (!isset($_SESSION)) {
    session_start();
}
include 'connectDB.php';

$userName = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username = '$userName' AND password = '$password'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

if (mysqli_num_rows($result) > 0) {
    $name = $row['last_name']. ' ' .$row['first_name'];
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    echo "<script type='text/javascript'>alert('Welcome back, $name! Login successfully!')</script>";
    echo '<script language="javascript">window.location = "cca.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Login details is incorrect, please try again')</script>";
    echo '<script language="javascript">window.location = "login.php"</script>';
}
?>