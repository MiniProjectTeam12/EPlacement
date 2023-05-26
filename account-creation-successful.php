<!-- success.html -->

<!DOCTYPE html>
<html>
<head>
    <title>Account Created Successfully</title>
    <style>
        @keyframes tickAnimation {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .success-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .tick {
            font-size: 100px;
            color: green;
            animation: tickAnimation 0.5s ease-in-out;
        }
        .message {
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
  
</head>
<body>
    <div class="success-page">
        <div class="tick">&#10004;</div>
        <div class="message">YOUR ACCOUNT IS SUCCESSFULLY CREATED</div> 
        <div><a href="slogin.php">Login Now</a></div>
    </div>
</body>
</html>
