<?php
// Start the session to access session variables
session_start();

// Database connection setup with custom port (3307)
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "oes";     // Your database name
$port = 3307;        // Custom port number

// Create connection with port specified
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the session contains the 'srn' value, if not redirect or show an error
if (!isset($_SESSION['srn'])) {
    echo "No user logged in.";
    exit;  // End the script
}

// Retrieve SRN from session
$srn = $_SESSION['srn']; // Assuming SRN is stored in the session when user logs in

// Sanitize the SRN to prevent SQL injection
$srn = $conn->real_escape_string($srn);

// SQL query to fetch user data based on SRN
$sql = "SELECT name, srn, courses, subjects FROM users WHERE srn = '$srn'";
$result = $conn->query($sql);

$user_data = null;
if ($result->num_rows > 0) {
    // Fetch user data
    $user_data = $result->fetch_assoc();
} else {
    echo "User not found!";
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PES University Student Dashboard</title>
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/png" href="icon-20.png"> <!-- Change to the actual path of your icon -->

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Second header styling */
        .header2 {
            background-color: white; /* White background */
            color: #003366; /* Dark Blue text */
            padding: 20px; /* Padding for top and bottom */
            position: relative; /* Position for absolute elements */
            width: 100%; /* Full width */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for depth */
            display: flex; /* Use flexbox to align items */
            justify-content: flex-start; /* Align items to the left */
            align-items: center; /* Vertically center items */
            padding-left: 40px; /* More padding on the left for logo */
        }

        .header2 img {
            width: 150px; /* PES image size */
            margin: 0; /* No margin */
        }

        /* Content styling */
        .content {
            padding: 40px;
            text-align: center;
        }

        .login-details {
            margin-top: 20px;
            text-align: left; /* Align text to the left for exam details */
            max-width: 800px; /* Set a max width for better readability */
            margin-left: auto;
            margin-right: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .login-details h2 {
            color: #003366; /* Dark blue for section heading */
            margin-bottom: 20px; /* Space below heading */
        }

        .info-item {
            margin-bottom: 15px;
            background: #e9f4ff; /* Light blue background */
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.2s; /* Smooth transition for hover effect */
        }

        .info-item:hover {
            transform: translateY(-5px); /* Slight lift effect on hover */
        }

        .info-item strong {
            color: #0056a6; /* Blue for exam name */
            font-size: 1.2em; /* Slightly larger font for exam name */
        }

        .nav-link {
            background-color: #0056a6; /* Blue background */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition for hover */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Make it like a button */
        }

        .nav-link:hover {
            background-color: #0073e6; /* Lighter blue on hover */
        }

        /* Footer styling */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #003366; /* Footer background color */
            color: white; /* Footer text color */
            position: relative; /* Maintain footer positioning */
            bottom: 0;
            width: 100%; /* Full width */
        }
    </style>
</head>
<body>

    <!-- Second Header -->
    <header class="header2">
        <img src="Examify.png" alt="PES Logo"> <!-- PES image -->
    </header>

    <!-- Main content section -->
    <div class="content">
        <h1>Student Dashboard</h1>
        <p>Welcome to your student dashboard. Below are your login details and navigation options.</p>

        <!-- Login Details Section -->
        <div class="login-details">
            <h2>Your Login Details</h2>
            <?php if ($user_data): ?>
                <div class="info-item">
                    <strong>Student ID:</strong> <?php echo $user_data['srn']; ?>
                </div>
                <div class="info-item">
                    <strong>Name:</strong> <?php echo $user_data['name']; ?>
                </div>
                <div class="info-item">
                    <strong>Course:</strong> <?php echo $user_data['courses']; ?>
                </div>
                <div class="info-item">
                    <strong>Registered Subjects:</strong>
                    <ul>
                        <?php 
                            $subjects = explode(",", $user_data['subjects']);
                            foreach ($subjects as $subject) {
                                echo "<li>" . htmlspecialchars($subject) . "</li>";
                            }
                        ?>
                    </ul>
                </div>
            <?php else: ?>
                <div class="info-item">
                    <strong>No data found for this student.</strong>
                </div>
            <?php endif; ?>
        </div>

        <!-- Navigation Options -->
        <div class="content" style="margin-top: 30px;">
            <h2>Navigate to:</h2>
            <a href="exam_sch.php" class="nav-link">Exam Timeline</a>
            <a href="results_lb.php" class="nav-link" style="margin-left: 15px;">Results</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Examify. All rights reserved.</p>
    </footer>

</body>
</html>
