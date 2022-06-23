<?php
session_start();
require_once "db_conect.php";
if (isset($_POST['submit'])) {
    $password = md5($_POST['password']);
    $sql = "SELECT email, password, firstname FROM users WHERE email ='" . $_POST['email'] . "' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $massege = '<div class = "massage">Користувач не зареєстрований</div>';
    } else {

        $sql = "SELECT firstname, secondname FROM users WHERE email ='" . $_POST['email'] . "'";
        $result = $conn->query($sql);

        $conn->close();

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['login'] = 'Your are login';
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['secondname'] = $row['secondname'];
                $_SESSION['email'] = $_POST['email'];
                header("Location: /index.php");
            }
        }
    }
    if ($_POST['password'] == 'admin' && $_POST['email'] == 'admin@gmail.com') {
        $_SESSION['admin'] = 'Hello admin';
        header("Location: /admin.php");
    } else {
        $massege = '<div class = "massage">Користувач не зареєстрований</div>';
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
        <div class="login">
            <div class=login__container>
                <form method="post" action="/login.php" class="login__form">
                    <input type="email" name="email" placeholder="Введіть e-mail" value="<?php echo @$_POST['email']; ?>" required>
                    <input type="password" name="password" placeholder="Введіть пароль" required>
                    <input type="submit" name="submit" class="submit">
                    <a href="sign_in.php">Немає акаунта? <span>Зареєструватись</span></a>

                    <?php if (isset($massege)) {
                        echo $massege;
                    } ?>
                </form>
            </div>
        </div>
    </main>
</body>

</html>