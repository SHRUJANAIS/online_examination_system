<?php
session_start();
if (!isset($_SESSION['totalMarks']) || !isset($_SESSION['answers'])) {
    echo "No exam data found.";
    exit;
}

$totalMarks = $_SESSION['totalMarks'];
$answers = $_SESSION['answers'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .results-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: inline-block;
            width: 60%;
        }
        .results-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .answer-list {
            text-align: left;
        }
        .answer-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="results-container">
    <div class="results-header">Your Exam Results</div>
    <p><strong>Total Marks:</strong> <?php echo htmlspecialchars($totalMarks); ?></p>
    <h3>Your Answers:</h3>
    <div class="answer-list">
        <?php foreach ($answers as $answer): ?>
            <div class="answer-item">
                <p><strong>Question:</strong> <?php echo htmlspecialchars($answer['question']); ?></p>
                <p><strong>Your Answer:</strong> <?php echo htmlspecialchars($answer['answer']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
