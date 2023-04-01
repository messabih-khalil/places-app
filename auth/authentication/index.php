<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../static/css/style.css" />
    <link rel="stylesheet" href="../../static/css/modifyStyle.css">
    <title>TenesCity | Log In</title>
</head>

<body>
    <div class="log-in">
        <div class="purple-box">

            <div class="image">
                <div>
                    <h2>discover tenes from anywhere</h2>
                    <p>Ténès (Arabic: تنس; from Berber TNS 'camping') is a town in Algeria
                        located around 200 kilometers west of the capital Algiers.
                        As of 2000, it has a population of 65,000 people. <span>from wikipedia</span></p>
                </div>
            </div>

            <div class="registration">

                <div class="gray-box formContainer">
                    <div class="box-headers">
                        <h3 class="active register" onclick="changeRegisterStatus()">sign up</h3>
                        <h3 class="register" onclick="changeRegisterStatus()">log in</h3>
                    </div>

                    <div class="white-box" id="sign-up">

                        <form action="../register/register-process.php" method="post"
                            onchange="displayPasswordStatus()">
                            <div class="name take-input">
                                <label for="name">full name</label>
                                <input type="text" id="name" placeholder="Enter your name" name="username">
                            </div>
                            <div class="email take-input">
                                <label for="email" class="take-input">email address</label>
                                <input type="email" id="email" placeholder="Enter your email" name="email">
                            </div>
                            <div class="password take-input">
                                <label for="password">password</label>
                                <input type="password" id="password" placeholder="Enter your password" name="password">
                                <span class="error-password first"></span>
                            </div>
                            <div class="password take-input">
                                <label for="password">password</label>
                                <input type="password" id="password" placeholder="Repeat password" name="password2">
                                <span class="error-password second"></span>
                            </div>
                            <div class="take-input">
                                <input type="submit" id="submit" value="Sign Up">
                            </div>

                        </form>
                    </div>

                    <!-- Log In Form -->
                    <div class="white-box" id="log-in" style="display: none;">
                        <form action="../login/login-process.php" method="post" onchange="displayPasswordStatus()">
                            <div class="email take-input">
                                <label for="email">email address</label>
                                <input type="email" id="email" placeholder="Enter your email" name="email">
                            </div>
                            <div class="password take-input">
                                <label for="password">password</label>
                                <input type="password" id="password" placeholder="Enter your password" name="password">
                                <span class="error-password"></span>

                                <div class="checkbox">
                                    <input type="checkbox" id="show-password" class="show-password">
                                    <label for="show-password">show password</label>
                                </div>
                            </div>
                            <div class="take-input">
                                <input type="submit" id="submit" value="Log In">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="../../static/js/script.js"></script>
</body>

</html>