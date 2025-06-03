<?php
$conn = new mysqli("localhost", "root", "", "blogportal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
session_start();
$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$blog = $_POST['blog'];

if (mysqli_query($conn,"UPDATE blogs SET title = '$title', category = '$category', blog = '$blog' WHERE id = '$id'")) {
    echo "Blog updated successfully.";
} else {
    echo "Error updating blog: " . $conn->error;
}

$conn->close();
}
?>
