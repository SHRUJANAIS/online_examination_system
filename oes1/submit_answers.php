<?php
// Database connection parameters
$host = 'localhost'; // Update with your database host
$db   = 'oes'; // Update with your database name
$user = 'root'; // Update with your database username
$pass = ''; // Update with your database password
$port = 3307; // Update with your database port, e.g., 3306 for MySQL

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create a connection to the database with the specified port
$conn = new mysqli($host, $user, $pass, $db, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON input and decode it
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if the input is valid JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON', 'input' => $input]);
    exit;
}

// Initialize variables for aggregate marks
$aggregateMarks = 0;

// Ensure SRN is passed in the input
if (!isset($data['srn']) || empty($data['srn'])) {
    echo json_encode(['error' => 'SRN is required']);
    exit;
}

foreach ($data['answers'] as $answer) {
    // Ensure that each answer has the expected structure
    if (isset($answer['question']) && isset($answer['answer'])) {
        $questionText = $answer['question'];
        $answerText   = $answer['answer'];

        // Step 1: Retrieve the First Option ID and Marks
        $sql1 = "
            SELECT qm.first_option_id, qm.marks
            FROM question_marks qm
            WHERE qm.question_id = (
                SELECT id 
                FROM questions 
                WHERE question_text = ?
            )";

        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('s', $questionText);
        if (!$stmt1->execute()) {
            echo json_encode(['error' => 'Error in executing SQL1: ' . $stmt1->error]);
            exit;
        }
        $result1 = $stmt1->get_result();

        if ($result1->num_rows > 0) {
            // Fetch the first option id and marks
            $row1 = $result1->fetch_assoc();
            $firstOptionId = $row1['first_option_id'];
            $marks = $row1['marks'];
        } else {
            echo json_encode(['error' => 'No matching question found for: ' . $questionText]);
            $stmt1->close();
            exit; // Exit if no question found
        }

        $stmt1->close();

        // Step 2: Retrieve the Option ID based on Answer Text
        $sql2 = "
            SELECT option_id 
            FROM options o 
            WHERE o.option_text = ? AND o.question_id = (
                SELECT id 
                FROM questions 
                WHERE question_text = ?
            )";

        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('ss', $answerText, $questionText);
        if (!$stmt2->execute()) {
            echo json_encode(['error' => 'Error in executing SQL2: ' . $stmt2->error]);
            exit;
        }
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            $optionId = $row2['option_id'];

            // Step 3: Compare option IDs and add marks to aggregate
            if ($optionId == $firstOptionId) {
                $aggregateMarks += $marks; // Add marks if they match
            }
        } else {
            // Option not found, no marks added
            $aggregateMarks += 0;
        }

        $stmt2->close();
    }
}

$response = array('totalMarks' => $aggregateMarks);
header('Content-Type: application/json');
echo json_encode($response);

// Insert total marks into results table
$sqlInsert = "INSERT INTO results (srn, total_marks) VALUES (?, ?)";
$stmtInsert = $conn->prepare($sqlInsert);
$srn = $data['srn']; // Assuming SRN is passed in the request data
$stmtInsert->bind_param('si', $srn, $aggregateMarks);

// Execute the insertion query and check for errors
if (!$stmtInsert->execute()) {
    echo json_encode(['error' => 'Failed to insert results: ' . $stmtInsert->error]);
    exit;
}

$stmtInsert->close();

// Close the database connection
$conn->close();
?>
