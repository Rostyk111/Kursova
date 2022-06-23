<?php
session_start();
require_once "db_conect.php";
if (isset($_POST['submit'])) {
    if (md5($_POST['confirmpassword']) != md5($_POST['password'])) {
        $massege = '<div class = "massage">Паролі не співпадають</div>';
    } else {
        $sql = "SELECT email FROM users WHERE email ='" . $_POST['email'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $massege = '<div class = "massage">Під такими даними користувач уже зареєстрований</div>';
        } else {
            $firstname = $_POST['firstname'];
            $secondname = $_POST['secondname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $sql = "INSERT INTO users (email, password, firstname, secondname) VALUES('$email','$password','$firstname','$secondname')";
            if ($conn->query($sql) == TRUE) {
                $_SESSION['registration'] = 'You are registration';
                $_SESSION['firstname'] =  $firstname;
                $_SESSION['secondname'] =  $secondname;
                $_SESSION['email'] =  $email;
                header('Location: /index.php');
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">


    <title>WoodLoft</title>
</head>

<body>
    <main id="main">
        <div class="signin">
            <div class=signin__container>
                <form method="post" action="/sign_in.php" class="signin__form">
                    <input type="text" name="firstname" placeholder="Введіть ім'я" value="<?php echo @$_POST['firstname']; ?>" required>
                    <input type="text" name="secondname" placeholder="Введіть прізвище" value="<?php echo @$_POST['secondname']; ?>" required>
                    <input type="email" name="email" placeholder="Введіть e-mail" value="<?php echo @$_POST['email']; ?>" required>
                    <input type="password" name="password" placeholder="Введіть пароль" required>
                    <input type="password" name="confirmpassword" placeholder="Підтвердіть пароль" required>
                    <input type="submit" name="submit" class="submit">
                    <a href="login.php">Є акаунт? <span>Увійти</span></a>

                    <?php if (isset($massege)) {
                        echo $massege;
                    } ?>

                </form>

            </div>
        </div>
    </main>
</body>

</html>