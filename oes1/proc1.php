<?php
session_start();
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1); // Display errors on the screen

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "oes";
$conn = new mysqli($servername, $username, $password, $db_name, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully<br>"; // Debug message
}

// Handling form submission
if (isset($_POST['submit'])) {
    // Sanitize and escape user inputs
    $srn = mysqli_real_escape_string($conn, $_POST['srn']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare SQL statement to fetch SRN and corresponding hashed password from the database
    $stmt = $conn->prepare("SELECT Password FROM student_info WHERE SRN = ?");
    $stmt->bind_param("s", $srn);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind the result to a variable
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        //echo '<script>
        //alert("' . addslashes($hashed_password) . '");
        //window.location.href = "login_page.php";
      //</script>';
      //echo '<script>
        //alert("' . addslashes($pwd) . '");
        //window.location.href = "login_page.php";
      //</script>';

 

       // Verify if the entered password matches the hashed password in the database
       // if (password_verify($password, $hashed_password)) {
	 if($pwd==$hashed_password){
            // Password is correct, start session and redirect to welcome page
            $_SESSION['srn'] = $srn;
            $_SESSION['loggedin'] = true;

            // Debug message before redirection
            echo "Login successful! Redirecting to welcome page...<br>";
            header("Location: student_user.php");
            exit; // Always call exit after a header redirect
        } else {
            // Password is incorrect
            echo '<script>
                    alert("Incorrect password");
                    window.location.href = "login_page.php";
                  </script>';
        }
    } else {
        // SRN not found in the database
        echo '<script>
                alert("SRN not found");
                window.location.href = "login_page.php";
              </script>';
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
