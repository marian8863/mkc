<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Master King Constructions fulfills your expectations by emphasizing Quantity, Quality, and Speed. Trust us to deliver excellence in every project.">
<meta name="keywords" content="Master King Constructions, construction services, quality construction, reliable contractor, building projects, construction management, renovation, residential construction, commercial construction">
<meta name="author" content="Master King Constructions">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Master King Constructions - Building Your Dreams">
<meta property="og:description" content="Master King Constructions delivers exceptional construction services focusing on Quantity, Quality, and Speed. Trust us for your next project.">
<!-- <meta property="og:image" content="images/logo-or-image.jpg"> -->
<meta property="og:url" content="https://www.masterkingconstructions.com/images/logo-or-image.jpg">

    <title>Birthday Wishes | MKC</title>
    <link rel="icon" type="image/png" href="images/favicon1.png">
    <style>
        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: #fff;
        }

        /* Full-screen background image */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/construction-background.jpg') no-repeat center center/cover;
            z-index: -1;
            filter: brightness(0.7); /* Darken background for contrast */
        }

        /* Container styling */
        .container {
            z-index: 2;
            width: 80%;
            max-width: 600px;
            margin: 100px auto;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        /* Text styling */
        .number {
            margin: 0;
            animation: bounce 1.2s infinite;
        }

        .message {
            font-size: 28px;
            margin: 20px 0;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            border-right: 2px solid;
            width: 0; /* Start with no width */
            animation: typing 4s steps(30, end) infinite alternate, blink-caret 0.75s step-end infinite; /* Continuous typing and caret blinking */
        }

        .signature {
            font-size: 20px;
            color: #ddd;
            margin-top: 20px;
        }

        /* Button styling */
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: blue; /* Button background color */
            color: white; /* Button text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s; /* Transition effect */
            text-decoration: none; 
            font-weight: bold;
        }

        .button:hover {
            background-color: darkblue; /* Darker background on hover */
        }

        /* Balloon styling with PNG images */
        .balloon {
            position: absolute;
            bottom: -150px;
            width: 100px;
            height: auto;
            opacity: 0.9;
            animation: floatBalloon 10s infinite linear;
        }
        

        /* Colors and random sizes for balloons */
        .balloon:nth-child(1) { left: 10%; animation-duration: 8s; transform: scale(0.8); }
        .balloon:nth-child(2) { left: 25%; animation-duration: 10s; transform: scale(1.1); }
        .balloon:nth-child(3) { left: 40%; animation-duration: 9s; transform: scale(0.9); }
        .balloon:nth-child(4) { left: 55%; animation-duration: 11s; transform: scale(1.2); }
        .balloon:nth-child(5) { left: 70%; animation-duration: 9s; transform: scale(0.7); }
        .balloon:nth-child(6) { left: 85%; animation-duration: 12s; transform: scale(1); }

        /* Keyframes for animations */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes typing {
            0% { width: 0; }
            80% { width: 100%; }
            100% { width: 100%; }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: white; }
        }

        @keyframes floatBalloon {
            0% { transform: translateY(0); }
            100% { transform: translateY(-120vh); }
        }
    </style>
</head>
<body>
    <!-- Real balloon images with animation -->
    <img src="images/balloon1.png" class="balloon" alt="Balloon 1">
    <img src="images/balloon1.png" class="balloon" alt="Balloon 2">
    <img src="images/balloon1.png" class="balloon" alt="Balloon 3">
    <img src="images/balloon1.png" class="balloon" alt="Balloon 4">
    <img src="images/balloon1.png" class="balloon" alt="Balloon 5">
    <img src="images/balloon1.png" class="balloon" alt="Balloon 6">

    <!-- Container for the main content -->
    <div class="container">
        <p class="number"><img src="images/number.png" alt="33" style="width: 280px; height: auto;"></p>
        <p class="message">Happy Birthday, Manojkumar!</p>
        <p class="signature">- With love from MasterKing Constructions -</p>
        <!-- Button for viewing gift -->
        <a href="home"  class="button">View Your Gift</a>
    </div>
</body>
</html>
