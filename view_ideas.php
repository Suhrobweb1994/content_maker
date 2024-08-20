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

$sql = "SELECT id, title, description, tags, created_at FROM content_ideas ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p><strong>Tags:</strong> " . $row["tags"] . "</p>";
        echo "<p><em>Added on: " . $row["created_at"] . "</em></p>";
        echo "<hr>";
    }
} else {
    echo "No content ideas found.";
}

$conn->close();
?>
