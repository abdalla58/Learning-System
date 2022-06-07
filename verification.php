<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Complete Responsive Online Study Website Design Tutorial</title>
    
        <!-- google fonts cdn link  -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <!--<link rel="stylesheet" href="style.css">-->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="verification.css">
        <title>Document</title>
</head>

<body>
    <div >
        <div >
            <h1>Please enter the 6-digit verification code we sent via Mail:</h1>
            <div>
                <form method="POST" >
                <input type="hidden" name="email" value="<?php echo $_GET['email'];?>" >
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
                <a href="home.php" ><input type="submit" name="verify_email" value="Verify Email"></a>
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
    if (isset($_POST["email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["num1"].$_POST["num2"].$_POST["num3"].$_POST["num4"].$_POST["num5"].$_POST["num6"];
        echo $email."<br>".$verification_code;
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "lms");
 
        // mark email as verified
        $sql = "UPDATE user SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }
        echo "<p>You can login now.</p>";
        header("LOCATION: home.php");
        exit();
    }
 
?>