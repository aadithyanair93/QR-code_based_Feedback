<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "police";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$admin_username = "admin";
$admin_password = "admin@123";

$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (username, password) VALUES ('$admin_username', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "Admin credentials inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
