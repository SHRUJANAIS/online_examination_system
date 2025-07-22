<?php
// Database connection with port 3307
$servername = "localhost";  // Change this to your database server
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "oes";  // Your MySQL database name
$port = 3307;               // Specify port 3307

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve final results
$sql = "SELECT srn, total_marks FROM final_results ORDER BY total_marks DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Results</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header2 {
            background-color: white;
            color: #003366;
            padding: 20px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 40px;
        }

        .header2 img {
            width: 150px;
        }

        .content {
            padding: 40px;
            text-align: center;
        }

        .leaderboard {
            margin-top: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
        }

        .leaderboard h2 {
            color: #003366;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #0056a6;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e9f4ff;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #003366;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Second Header -->
    <header class="header2">
        <img src="Examify.png" alt="PES Logo">
    </header>

    <!-- Main content section -->
    <div class="content">
        <h1>Final Results Leaderboard</h1>
        <p>Displaying the highest marks for each student.</p>

        <!-- Leaderboard Table -->
        <div class="leaderboard">
            <h2>Top Performers</h2>
            <table>
                <tr>
                    <th>Student ID (SRN)</th>
                    <th>Total Marks</th>
                </tr>
                <?php
                // Check if there are results to display
                if ($result->num_rows > 0) {
                    // Output data for each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["srn"]. "</td><td>" . $row["total_marks"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No results found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Examify. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
