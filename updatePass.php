<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="updatePassstylee.css">
    <title>set Password</title>
</head>

<body>
    <div >
        <div >
            <h1>Please enter the 6-digit verification code we sent via Mail:</h1>
            <div>
                <form method="POST" action="updatePass.php">
                <input class="form" type="text" name="num1" maxLength="1" id='ist' size="1" min="0" max="9" pattern="[0-9]{1}"
                    onkeyup="clickEvent(this,'sec')" />
                <input class="form" type="text" name="num2" maxLength="1" id='sec' size="1" min="0" max="9" pattern="[0-9]{1}"
                    onkeyup="clickEvent(this,'third')" />
                <input class="form" type="text" name="num3" maxLength="1" id='third' size="1" min="0" max="9" pattern="[0-9]{1}"
                    onkeyup="clickEvent(this,'fourth')" />
                <input class="form" type="text" name="num4" maxLength="1" id='fourth' size="1" min="0" max="9" pattern="[0-9]{1}"
                    onkeyup="clickEvent(this,'fifth')" />
                <input class="form" type="text" name="num5" maxLength="1" id='fifth' size="1" min="0" max="9" pattern="[0-9]{1}"
                    onkeyup="clickEvent(this,'sixth')" />
                <input class="form" type="text" name="num6" maxLength="1" id='sixth' size="1" min="0" max="9" pattern="[0-9]{1}"/><br>
                <label class="label" style="margin-right: 385px;">Password</label>
                <input class="pass form" name="pass" type="password" placeholder="Enter Password">
                <label class="label" style="margin-right: 295px;">Confirm Password</label>
                <input class="pass form" name="passA" type="password" placeholder="Enter Password Again"><br>
                <a href="home.php" ><input type="submit" class="form btn" name="verify_email" value="Verify Email"></a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function clickEvent(first, last) {
            if (first.value.length) {
                document.getElementById(last).focus();
            }
        }
    </script>
</body>

</html>

<?php
    if (isset($_POST["verify_email"]))
    {
        session_start();
        $email=$_SESSION["email"];
        $passs=$_POST["pass"];
        $verification_code = $_POST["num1"].$_POST["num2"].$_POST["num3"].$_POST["num4"].$_POST["num5"].$_POST["num6"];
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "lms");
 
        // mark email as verified
        $sql ="UPDATE  `user` SET `email_verified_at` = NOW(),`password`=$passs,`user_status`='1' WHERE email = '$email' AND verification_code = '$verification_code'";
        $result  = mysqli_query($conn, $sql);
        header("Location: index.php");
        exit();
    }
    
    //"<script>window.close();</script>"
?>