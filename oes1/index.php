<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PES University Exams</title>
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/png" href="icon-20.jpg"> <!-- Change to the actual path of your icon -->

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* First header styling */
        .header1 {
            background-color: #0056a6; /* Updated to a lighter blue */
            color: white;
            display: flex;
            align-items: center;
            padding: 5px 20px; /* Thinner padding */
        }

        .nav-links {
            flex-grow: 1;
            display: flex;
            justify-content: flex-end; /* Align links to the right */
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px; /* Reduced padding for closer spacing */
            margin-left: 10px; /* Space between buttons */
        }

        .nav-links a:hover {
            background-color: #0073e6; /* Slightly lighter on hover */
        }

        /* Second header styling */
        .header2 {
            background-color: white; /* White background */
            color: #003366; /* Dark Blue text */
            padding: 20px; /* Padding for top and bottom */
            text-align: left; /* Align text to the left */
            position: relative; /* Position for absolute elements */
            width: 100%; /* Full width */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for depth */
            display: flex; /* Use flexbox to align items */
            justify-content: space-between; /* Space items between left and right */
            align-items: center; /* Vertically center items */
            padding-left: 40px; /* More padding on the left for logo */
            padding-right: 30px; /* Less padding on the right for button */
        }

        .header2 img {
            width: 150px; /* PES image size */
            margin: 0; /* No margin */
        }

        .apply-button {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            height: 40px; /* Set height to match typical button height */
            margin-right: 100px; /* Add margin to the right to give space from the edge */
        }

        .apply-button:hover {
            background-color: #ff9900;
        }

        /* Content styling */
        .content {
            padding: 40px;
            text-align: center;
            position: relative;
        }

        .content img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            animation: fadeInUp 2s ease-in-out; /* Adding animation to image */
        }

        .welcome-overlay {
            position: absolute;
            top: 50%; /* Vertically center the overlay */
            left: 50%; /* Horizontally center the overlay */
            transform: translate(-50%, -50%); /* Ensure proper centering */
            color: white;
            font-size: 48px;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Shadow for better visibility */
        }

        .admissions-message {
            font-size: 20px;
            color: #555;
            margin-top: 10px;
        }

        /* Animation for the image */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px); /* Start slightly below */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* End at the original position */
            }
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

    <!-- First Header -->
    <header class="header1">
        <nav class="nav-links">
            <a href="">Students</a>
            <a href="">Parents</a>
            <a href="">Alumni</a>
            <a href="">Work With Us</a>
            <a href="">Give to PES</a>
            <a href="">Contact</a>
        </nav>
    </header>

    <!-- Second Header -->
   <header class="header2">
    <img src="examify.png" alt="PES Logo"> <!-- PES image -->
    <a href="index2.php"> <!-- Change "index2.php" to the actual page you want to link to -->
        <button class="apply-button">Apply</button>
    </a>
</header>

    <!-- Main content section -->
    <div class="content">
        <p>Welcome to the PES University Exam Portal. Use the navigation above to access important information regarding exams.</p>
        
        <!-- New image and overlay text -->
        <div style="position: relative;">
            <img src="download.jpg" alt="PESSAT Exam"> <!-- Change the src to your image's actual path -->
            <div class="welcome-overlay">Welcome to EXAMIFY</div>
        </div>
        
        <div class="admissions-message">
            Admissions open for 2025 batch
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024  Examify. All rights reserved.</p>
    </footer>

</body>
</html>
