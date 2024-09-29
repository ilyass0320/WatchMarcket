<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="store-alt-regular-24.png" type="image/png">
    <style>
        html {
                background-image: url(aaa.jpg);
        }
        .container {
        /* background-color: rgb(47, 55, 94); */
        text-align: center;
        padding: 160px;
        }
        .box {
        background: rgb(249, 209, 152);
        padding: 50px;
        border-radius: 15px;
        display: inline-block;
        }

        input {
                width: 200px;
                padding: 10px;
                margin: 5px;
                border-radius: 15px;
        }

        button {
                width: 100px;
                padding: 9px;
                margin: 5px;
                /* background-color: rgb(247, 246, 250); */
                border-radius: 15px;
        }

        a {
                color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <form action="conseptinput.php" method="post">
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required><br>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required><br>
                <button type="submit">Sign in</button>
            </form>
            <a href="CreationCompte.html" target="_blank">Create account</a>
        </div>
    </div>
</body>

</html>
<?php
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$conn = new mysqli('localhost','root','','loginatria');
if ($conn->connect_error) {
    die('Connection Failed : ' + $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO atria (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password); 
    $stmt->execute();
    echo "Successful...";
    $stmt->close();
    $conn->close(); 
}
Header("Location: message.html");
?>;