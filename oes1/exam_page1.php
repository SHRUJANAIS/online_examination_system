<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proctored Exam - Webcam and Screen Recording</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .webcam-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: white;
            border: 1px solid #000;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        video {
            width: 240px;
            height: auto;
        }
        .question-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: inline-block;
            width: 60%;
        }
        .question {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .options {
            text-align: left;
        }
        .options label {
            display: block;
            margin: 5px 0;
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0059b3;
        }
        #timer {
            font-size: 18px;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Proctored Exam</h1>
<p>Your webcam and screen are being recorded. Do not navigate away from the page.</p>

<!-- Webcam container -->
<div class="webcam-container">
    <video id="webcamPreview" autoplay muted></video>
    <button id="startRecording">Start Exam</button>
</div>

<div id="timer"></div>

<!-- Question Container -->
<div class="question-container" id="questionContainer" style="display: none;">
    <div class="question" id="questionText"></div>
    <div class="options" id="optionsContainer"></div>
    <button id="prevQuestion" style="display: none;">Back</button>
    <button id="nextQuestion">Next Question</button>
    <button id="submitExam" style="display: none;">Submit Exam</button>
</div>

<script>
    let webcamStream;
    let screenStream;
    let mediaRecorder;
    let chunks = [];
    let currentQuestionIndex = 0;
    let questions = [];
    let answers = [];  // To store cumulative answers
    let timer;
    const totalTime = 60 * 60; // 1 hour in seconds
    let timeLeft = totalTime;

    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);  // This will return the value of the 'param' (e.g., 'srn')
    }
    async function loadQuestions() {
        try {
            const response = await fetch('get_ques.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const jsonData = await response.json();
            console.log('Fetched Questions:', jsonData);

            questions = jsonData;

            if (questions.length > 0) {
                displayQuestion();
            } else {
                alert('No questions found.');
            }
        } catch (error) {
            console.error('Error fetching questions:', error);
            alert('Error loading questions.');
        }
    }

    function displayQuestion() {
        const question = questions[currentQuestionIndex];

        if (!question) {
            alert('No more questions.');
            return;
        }

        // Display the question text
        document.getElementById('questionText').innerText = question.text;

        // Display the options
        const optionsContainer = document.getElementById('optionsContainer');
        optionsContainer.innerHTML = ''; // Clear previous options

        question.options.forEach((option, index) => {
            optionsContainer.innerHTML += `
                <label>
                    <input type="radio" name="option" value="${option}">
                    ${option}
                </label>
            `;
        });

        // Adjust buttons visibility
        document.getElementById('prevQuestion').style.display = currentQuestionIndex > 0 ? 'inline' : 'none';
        document.getElementById('nextQuestion').style.display = currentQuestionIndex < questions.length - 1 ? 'inline' : 'none';
        document.getElementById('submitExam').style.display = currentQuestionIndex === questions.length - 1 ? 'inline' : 'none';
    }

    document.getElementById('startRecording').addEventListener('click', async function() {
         await startProctoring();
         mediaRecorder.start();
        document.getElementById('startRecording').disabled = true;
        document.getElementById('questionContainer').style.display = 'block';
        loadQuestions();
        startTimer();
        alert('Recording started. Good luck with your exam!');
    });

    document.getElementById('nextQuestion').addEventListener('click', function() {
        saveAnswer();
        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            alert('No more questions');
        }
    });

    document.getElementById('prevQuestion').addEventListener('click', function() {
        saveAnswer();
        currentQuestionIndex--;

        if (currentQuestionIndex >= 0) {
            displayQuestion();
        }
    });

    document.getElementById('submitExam').addEventListener('click', function() {
        saveAnswer();  // Save the final answer
        finishExam();
    });

    function saveAnswer() {
        const selectedOption = document.querySelector('input[name="option"]:checked');
        if (selectedOption) {
            answers[currentQuestionIndex] = {
                question: questions[currentQuestionIndex].text,
                answer: selectedOption.value
            };
        } else {
            answers[currentQuestionIndex] = {
                question: questions[currentQuestionIndex].text,
                answer: 'No answer selected'
            };
        }
        //console.log('Current Answers:', answers);  // Debugging line
    }

    async function startProctoring() {
        try {
            webcamStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            document.getElementById('webcamPreview').srcObject = webcamStream;

            if (!screenStream) {
                screenStream = await navigator.mediaDevices.getDisplayMedia({ video: true });
            }

            const combinedStream = new MediaStream([...webcamStream.getTracks(), ...screenStream.getTracks()]);
            mediaRecorder = new MediaRecorder(combinedStream);

            mediaRecorder.ondataavailable = event => {
                if (event.data.size > 0) {
                    chunks.push(event.data);
                }
            };

            mediaRecorder.onstop = saveRecording;
        } catch (error) {
            alert('Error accessing webcam or screen: ' + error.message);
        }
    }

    function saveRecording() {
        const blob = new Blob(chunks, { type: 'video/webm' });
        const formData = new FormData();
        formData.append('videoFile', blob, 'recording.webm');

        fetch('save_vid.php', {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) {
                alert('Recording saved successfully!');
            } else {
                alert('Error saving recording.');
            }
        });
    }

    function startTimer() {
        timer = setInterval(() => {
            timeLeft--;
            document.getElementById('timer').innerText = `Time left: ${Math.floor(timeLeft / 60)}:${(timeLeft % 60).toString().padStart(2, '0')}`;
            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById('submitExam').click(); // Automatically submit exam
            }
        }, 1000);
    }

    function finishExam() {
        clearInterval(timer);
        mediaRecorder.stop();
        webcamStream.getTracks().forEach(track => track.stop());
        if (screenStream) {
            screenStream.getTracks().forEach(track => track.stop());
        }
        Submit answers to the server
        submitAnswers();
    }

    async function submitAnswers() {
        try {
		
            const srn = getQueryParam('srn');  // Retrieve the SRN from the URL query parameter
            if (!srn) {
                alert('SRN not found!');
                return;
            }

            const data = {
            srn: srn,
            answers: answers
        };
            // Convert answers to JSON
            const jsonData = JSON.stringify(data);

           // const jsonData = JSON.stringify(answers);
            //console.log('Submitting Answers:', jsonData);  // Debugging line
            
            // Send answers with Content-Type application/json
            const response = await fetch('submit_answers.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: jsonData
            });

          // const text = await response.text();
          //console.log('Response as text:', text);
	    const responseData = await response.json();
            console.log('Response data:', responseData); 

           // alert('Total Marks: ' + responseData.totalMarks);
	    if (response.ok) {
                alert('Answers submitted successfully!');
                // Redirect to Thank You page
                window.location.href = 'thank_you.html'; // Redirect to the thank you page
            } else {
                const errorText = await response.text();
                console.error('Error response:', errorText);
                alert('Error submitting answers. Server response was not OK.');
            }
        } catch (error) {
            console.error('Error submitting answers:', error);
            alert('Error submitting answers due to network issues or invalid request.');
        }
    }
    
</script>

</body>
</html>
