<?php
include "../../includes/header2.php";
?>
<link rel="stylesheet" href="../../css/form.css">
</head>

<body id="forgot-password-body">
    <div class="forgot-password-form">
        <h2>Forgot Password</h2>
        <p class="valid-input">Verification code sent to your email!</p>
        <p class="error-msg">Invalid Input!</p>
        <form>
            <div class="input-control" id="pass">
                <label for="email">Email</label>
                <input type="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div>
                <button type="btn-getcode" class="btn-getcode">Get Code</button>
                <div class="input-control" id="pass">
                    <label for="code">Verification Code</label>
                    <input type="text" id="vcode" required>
                </div>

        </form>
    </div>
    <?php
    include "../../includes/footer.php";
    ?>

    </html>