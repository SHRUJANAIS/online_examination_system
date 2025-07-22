<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PES University Exam Timeline</title>
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/png" href="icon-20.jpg"> <!-- Change to the actual path of your icon -->

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

        .exam-timeline {
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

        .exam-timeline h2 {
            color: #003366; /* Dark blue for section heading */
            margin-bottom: 20px; /* Space below heading */
        }

        .exam-item {
            margin-bottom: 15px;
            background: #e9f4ff; /* Light blue background */
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.2s; /* Smooth transition for hover effect */
        }

        .exam-item:hover {
            transform: translateY(-5px); /* Slight lift effect on hover */
        }

        .exam-item strong {
            color: #0056a6; /* Blue for exam name */
            font-size: 1.2em; /* Slightly larger font for exam name */
        }

        .exam-item span {
            display: block; /* Stack the details */
            margin: 5px 0; /* Spacing between lines */
            color: #555; /* Grey color for exam details */
        }

        .take-exam-button {
            background-color: #28a745; /* Green background for take exam button */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition for hover */
        }

        .take-exam-button:hover {
            background-color: #218838; /* Darker green on hover */
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
        <p>Welcome to the PES University Exam Timeline. Below is the schedule for upcoming exams.</p>

        <!-- Exam Timeline Section -->
        <div class="exam-timeline">
            <h2>Exam Schedule</h2>
            <div class="exam-item">
                <strong>Database Mangagement System 101</strong>
                <span>Day: Monday, 20th November 2024</span>
                <span>Time: 10:00 AM - 12:00 PM</span>
                <a href="examlogin.php"><button class="take-exam-button">Take Exam</button></a>
            </div>
            <div class="exam-item">
                <strong>Machine learning 102</strong>
                <span>Day: Tuesday, 21st November 2024</span>
                <span>Time: 1:00 PM - 3:00 PM</span>
                <button class="take-exam-button">Take Exam</button>
            </div>
            <div class="exam-item">
                <strong>Software Engineering 103</strong>
                <span>Day: Wednesday, 22nd November 2024</span>
                <span>Time: 9:00 AM - 11:00 AM</span>
                <button class="take-exam-button">Take Exam</button>
            </div>
            <div class="exam-item">
                <strong>Data Analytics 104</strong>
                <span>Day: Thursday, 23rd November 2024</span>
                <span>Time: 3:00 PM - 5:00 PM</span>
                <button class="take-exam-button">Take Exam</button>
            </div>
            <div class="exam-item">
                <strong>Big Data 105</strong>
                <span>Day: Friday, 24th November 2024</span>
                <span>Time: 2:00 PM - 4:00 PM</span>
                <button class="take-exam-button">Take Exam</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Examify. All rights reserved.</p>
    </footer>

</body>
</html>
