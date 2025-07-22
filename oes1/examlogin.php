<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PES University Exam Login</title>
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/png" href="icon-20.jpg"> <!-- Change to the actual path of your icon -->

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styling */
        .header {
            background-color: white; /* White background */
            color: #003366; /* Dark blue text */
            display: flex; /* Use flexbox to align items */
            align-items: center; /* Vertically center items */
            justify-content: space-between; /* Space items between left and right */
            padding: 15px 30px; /* Padding for top, bottom, left and right */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for depth */
            width: 100%; /* Full width */
        }

        /* Logo styling */
        .logo img {
            height: 50px; /* Adjust the logo height as needed */
        }

        /* Exam login form styling */
        .login-container {
            max-width: 400px; /* Maximum width for the form */
            margin: 50px auto; /* Centering the form */
            padding: 20px;
            background-color: white; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Shadow effect */
            text-align: center; /* Center text inside the container */
        }

        .login-container h2 {
            color: #003366; /* Dark blue title */
        }

        .login-container label {
            display: block; /* Block level for labels */
            margin-bottom: 5px; /* Space between label and input */
            color: #333; /* Dark gray color */
            text-align: left; /* Align label text to the left */
        }

        .login-container input {
            width: 80%; /* Width set to 80% of the container */
            padding: 10px; /* Padding inside input */
            margin-bottom: 15px; /* Space between inputs */
            border: 1px solid #ccc; /* Border style */
            border-radius: 5px; /* Rounded corners */
        }

        .login-container button {
            width: 80%; /* Width set to 80% of the container */
            background-color: #003366; /* Dark blue background */
            color: white; /* White text */
            border: none; /* No border */
            padding: 10px; /* Padding inside button */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            font-weight: bold; /* Bold text */
        }

        .login-container button:hover {
            background-color: #0059b3; /* Darker blue on hover */
        }

        /* Instructions styling */
        .instructions {
            background-color: #e0f0ff; /* Light blue background */
            padding: 20px; /* Padding around the instructions */
            margin: 20px auto; /* Centering instructions */
            max-width: 400px; /* Maximum width for the instructions */
            border-radius: 8px; /* Rounded corners */
            text-align: left; /* Align text to the left */
        }

        /* Align checkbox and label */
        .instructions div {
            display: flex; /* Flexbox to align items */
            align-items: center; /* Center items vertically */
        }

        .instructions input[type="checkbox"] {
            margin-right: 10px; /* Space between checkbox and label */
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

    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="Examify.png" alt="PES Logo"> <!-- PES image -->
        </div>
        <nav class="nav-links">
            <!-- Removed Syllabus, Important Dates, and Note links -->
        </nav>
    </header>

    <!-- Exam Login Form -->
    <div class="login-container">
        <h2>Login to Take Exam</h2>
        <form method="POST" action="proc.php"> <!-- Submit to login.php -->
    <label for="srn">SRN</label>
    <input type="text" id="srn" name="srn" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <div>
        <input type="checkbox" id="confirm" required>
        <label for="confirm">I have read and understood the instructions.</label>
    </div>

   <form method="POST" action="proc.php"> <!-- Change to your PHP file name -->
    <button type="submit" name="submit">Login</button>
</form>

</form>

    </div>

    <!-- Instructions Section -->
    <div class="instructions">
        <h3>Instructions</h3>
        <p>Please ensure you are in a quiet environment and ready to begin the exam.</p>
        <p>Once you click 'Login', you will not be able to exit the exam until it is completed.</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Examify. All rights reserved.</p>
    </footer>

</body>
</html>
