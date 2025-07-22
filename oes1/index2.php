<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examify opens Admissions for 2025</title>
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/png" href="icon-20.jpg">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styling */
        .header {
            background-color: white;
            color: #003366;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        /* Logo styling */
        .logo img {
            height: 50px;
        }

        /* Navigation links styling */
        .nav-links {
            display: flex;
            gap: 20px;
            flex-grow: 1;
            justify-content: center;
        }

        .nav-links a {
            color: #003366;
            text-decoration: none;
            font-weight: 600;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        /* Button styling */
        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-right: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        /* Content styling */
        .content {
            padding: 40px;
            text-align: center;
        }

        .programs {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
        }

        .program {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            width: 30%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .program h3 {
            color: #003366;
        }

        /* FAQ Section */
        .faq {
            margin: 40px 0;
            text-align: left;
        }

        .faq h2 {
            color: #003366;
        }

        .faq-item {
            margin: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 0;
        }

        /* Footer styling */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #003366;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #ffffff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: slide-in 0.3s ease;
        }

        /* Animation for modal */
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            color: #003366;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Checkbox styling */
        .form-group .checkbox-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .checkbox-group div {
            display: flex;
            align-items: center;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            align-self: flex-start;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="examify.png" alt="Examify Logo">
        </div>
        <nav class="nav-links" aria-label="Main navigation">
            <a href="#">Syllabus</a>
            <a href="#">Important Dates</a>
            <a href="#">Note</a>
        </nav>
        <div>
            <a href="login.php">
                <button class="button">ALREADY REGISTERED? SIGN IN</button>
            </a>
            <button class="button" id="registerBtn">REGISTER NOW</button>
        </div>
    </header>

    <!-- Main content section -->
    <main class="content">
        <h1>Admissions 2025</h1>
        <p>Choose your program to register</p>
        <p>Examify will use only JEE Main, KCET, and COMEDK scores from 2025 for B.Tech Admissions</p>

        <!-- Programs Section -->
        <section class="programs">
            <div class="program" aria-labelledby="btech">
                <h3 id="btech">B.Tech</h3>
                <p>Duration: 4 years</p>
                <p>Eligibility: 10+2 with Physics, Chemistry, and Mathematics</p>
            </div>
            <div class="program" aria-labelledby="btech-lateral">
                <h3 id="btech-lateral">B.Tech (Diploma Lateral Entry)</h3>
                <p>Duration: 3 years</p>
                <p>Eligibility: Diploma in Engineering</p>
            </div>
            <div class="program" aria-labelledby="mtech">
                <h3 id="mtech">M.Tech</h3>
                <p>Duration: 2 years</p>
                <p>Eligibility: B.Tech or equivalent</p>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item" role="region" aria-labelledby="faq1">
                <strong id="faq1">What is the application process?</strong>
                <p>Fill out the online application form, upload required documents, and pay the application fee.</p>
            </div>
            <div class="faq-item" role="region" aria-labelledby="faq2">
                <strong id="faq2">What are the important dates?</strong>
                <p>Check the Important Dates section for deadlines.</p>
            </div>
            <div class="faq-item" role="region" aria-labelledby="faq3">
                <strong id="faq3">Is there an application fee?</strong>
                <p>Yes, there is a nominal application fee. Please refer to the fee structure.</p>
            </div>
        </section>
    </main>

    <!-- Modal for Registration -->
    <!-- Modal for Registration -->
<div id="registrationModal" class="modal" role="dialog" aria-labelledby="registerModalLabel" aria-modal="true">
    <div class="modal-content">
        <span class="close" aria-label="Close Modal">&times;</span>
        <h2 id="registerModalLabel">Registration Form</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="srn">SRN</label>
                <input type="text" id="srn" name="srn" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Preferred Course</label>
                <div class="checkbox-group">
                    <div><input type="checkbox" name="course[]" value="B.Tech"> B.Tech</div>
                    <div><input type="checkbox" name="course[]" value="B.Tech (Lateral)"> B.Tech (Lateral)</div>
                    <div><input type="checkbox" name="course[]" value="M.Tech"> M.Tech</div>
                </div>
            </div>
            <div class="form-group">
                <label>Select Subjects</label>
                <div class="checkbox-group">
                    <div><input type="checkbox" name="subject[]" value="DBMS">Database Management System</div>
                    <div><input type="checkbox" name="subject[]" value="SE">Software Engineering</div>
                    <div><input type="checkbox" name="subject[]" value="ML">Machine Learning</div>
                    <div><input type="checkbox" name="subject[]" value="DA">Data Analytics</div>
                    <div><input type="checkbox" name="subject[]" value="BD">Big Data</div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</div>


    <!-- Footer -->
    <footer>
        &copy; 2025 Examify. All rights reserved.
    </footer>

    <!-- Script to handle modal -->
    <script>
        const modal = document.getElementById("registrationModal");
        const btn = document.getElementById("registerBtn");
        const closeBtn = document.querySelector(".close");

        btn.onclick = () => modal.style.display = "block";
        closeBtn.onclick = () => modal.style.display = "none";
        window.onclick = event => { if (event.target === modal) modal.style.display = "none"; };
    </script>

</body>
</html>
