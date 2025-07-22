<?php
// Database connection setup with custom port (3307)
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "oes";  // Your database name
$port = 3307;        // Custom port number

// Create connection with port specified
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $srn = mysqli_real_escape_string($conn, $_POST['srn']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Get selected courses (if any)
    $courses = isset($_POST['course']) ? implode(", ", $_POST['course']) : "";

    // Get selected subjects (if any)
    $subjects = isset($_POST['subject']) ? implode(", ", $_POST['subject']) : "";

    // SQL to insert the registration data into the database
    $sql = "INSERT INTO users (name, srn, password, email, courses, subjects) 
            VALUES ('$name', '$srn', '$password', '$email', '$courses', '$subjects')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
