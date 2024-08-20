<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_ideas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];

    $sql = "INSERT INTO content_ideas (title, description, tags) VALUES ('$title', '$description', '$tags')";

    if ($conn->query($sql) === TRUE) {
        echo "New idea added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
