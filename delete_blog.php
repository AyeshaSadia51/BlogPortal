<?php
$conn = new mysqli("localhost", "root", "", "blogportal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = $_POST['id'];

if (mysqli_query($conn,"DELETE FROM blogs WHERE id = '$id'")) {
    echo "Blog deleted successfully.";
} else {
    echo "Error updating blog: " . $conn->error;
}

$conn->close();
}
?>
