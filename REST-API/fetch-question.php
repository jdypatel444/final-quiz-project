<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname="db_quiz";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
	if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
	} 

$conn->set_charset("utf8");

// Function to fetch questions
function getQuestions($conn, $topic_id) {
    $questions = [];

    // Prepare SQL statement template
    $query = "SELECT * FROM questions WHERE topic_id = ? AND isdeleted = 0 AND level_id = ? ORDER BY RAND() LIMIT ?";

    if ($stmt = $conn->prepare($query)) {

        // Fetch 4 beginner level questions
        $level_id = 1;
        $limit = 4;
        $stmt->bind_param('iii', $topic_id, $level_id, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = array_merge($questions, $result->fetch_all(MYSQLI_ASSOC));

        // Fetch 3 intermediate level questions
        $level_id = 2;
        $limit = 3;
        $stmt->bind_param('iii', $topic_id, $level_id, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = array_merge($questions, $result->fetch_all(MYSQLI_ASSOC));

        // Fetch 3 professional level questions
        $level_id = 3;
        $limit = 3;
        $stmt->bind_param('iii', $topic_id, $level_id, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = array_merge($questions, $result->fetch_all(MYSQLI_ASSOC));

        $stmt->close();
    }

    return $questions;
}

// API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['topic_id'])) {
        $topic_id = intval($_GET['topic_id']);
        $questions = getQuestions($conn, $topic_id);

        if (!empty($questions)) {
            echo json_encode([
                "status" => "success",
                "data" => $questions
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "No questions found."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid request. 'topic_id' is required."
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
