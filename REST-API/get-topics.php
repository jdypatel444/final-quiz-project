<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Function to fetch topics
function getTopics($conn) {
    $topics = [];

    // Prepare SQL statement to get topics
    $query = "SELECT * FROM topics";

    if ($result = $conn->query($query)) {
        $topics = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
    }

    return $topics;
}

// API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $topics = getTopics($conn);

    if (!empty($topics)) {
        echo json_encode([
            "status" => "success",
            "data" => $topics
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "No topics found."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}

// Close the database connection
$conn->close();
?>
