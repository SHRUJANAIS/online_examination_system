<?php
header('Content-Type: application/json');

// Database connection parameters
$host = 'localhost';  // Replace with your host
$dbname = 'oes';      // Replace with your database name
$username = 'root';   // Replace with your database username
$password = '';       // Replace with your database password
$port = '3307';       // MySQL port number

try {
    // Create a new PDO instance with the correct port in the DSN
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch 20 random questions with their options
    $stmt = $pdo->query("
        SELECT q.id, q.question_text, o.option_text
        FROM (SELECT id, question_text FROM questions ORDER BY RAND() LIMIT 3) AS q
        LEFT JOIN options o ON q.id = o.question_id
        ORDER BY q.id
    ");

    // Organize the data
    $questions = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $questionId = $row['id'];
        if (!isset($questions[$questionId])) {
            $questions[$questionId] = [
                'text' => $row['question_text'],
                'options' => []
            ];
        }
        $questions[$questionId]['options'][] = $row['option_text'];
    }

    // Ensure that each question has at most 4 options
    foreach ($questions as &$question) {
        $question['options'] = array_slice($question['options'], 0, 4);
    }

    // Re-index the array and return it as JSON
    $questions = array_values($questions);
    echo json_encode($questions);

} catch (PDOException $e) {
    // Return an error message as JSON if a database error occurs
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
