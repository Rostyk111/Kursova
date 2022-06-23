<?php
session_start();
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>WoodLoft</title>
</head>

<body>
    <div class="layout" id="layout">
        <?php require 'blocks/header.php' ?>
        <?php require 'blocks/intro.php' ?>
        <main id="main">

            <!-- features -->
            <section>
                <?php require 'blocks/features.php' ?>
            </section>
            <!-- features -->

            <!-- about -->
            <section>
                <?php require 'blocks/about.php' ?>
            </section>
            <!-- about -->

            <!-- book -->
            <section>
                <?php require 'blocks/furniture.php' ?>
            </section>
            <!-- book -->

            <!-- contacts -->
            <section>
                <?php
                if (isset($_POST['send'])) {
                    $headers = 'Від ' . $_POST['email'] . '';
                    $text = 'Прошу мені надіслати  меблі: ' . $_POST['title'] . '
                    ПІБ: ' . $_POST['firstname'] . ' ' . $_POST['secondname'] . '
                    Місто: ' . $_POST['address'] . '
                    Адреса ' . $_POST['street'] . '
                    Номер телефону: ' . $_POST['number'] . '';
                    mail('rosmagik@gmail.com', $headers, $text);
                }
                ?>
                <?php
                require_once "db_conect.php";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                if (isset($_POST['send'])) {
                    $sql = "INSERT INTO orders (order_id_furniture, order_id_user) SELECT id_furniture, id_user FROM table_furniture JOIN users WHERE title = '" . $_POST['title'] . "' AND email ='" . $_POST['email'] . "'";
                    $result = $conn->query($sql);

                    $conn->close();
                }
                ?>
                <div class="contacts" id="contacts">
                    <div class="contacts__bg">
                        <div class="container">
                            <div class="contacts__inner">
                                <div class="contacts__contents">
                                    <h2>Безкоштовна доставка</h2>
                                    <p>Для замовлення напишіть нам</p>
                                </div>
                                <form method="post" class="contacts__form">
                                    <h3>Напишіть нам</h3>
                                        <input class="input" type="text" name="firstname" placeholder="Введіть ім'я" value="<?php
                                                                                                                            if ((!empty($_SESSION['registration'])) || (!empty($_SESSION['login']))) {
                                                                                                                                echo $_SESSION['firstname'];
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?>" required>
                                    <input class="input" type="text" name="secondname" placeholder="Введіть прізвище" value="<?php
                                                                                                                                if ((!empty($_SESSION['registration'])) || (!empty($_SESSION['login']))) {
                                                                                                                                    echo $_SESSION['secondname'];
                                                                                                                                } else {
                                                                                                                                    echo '';
                                                                                                                                }
                                                                                                                                ?>" required>
                                    <input class="input" type="number" name="number" placeholder="Введіть номер телефону" required>
                                    <input class="input" type="email" name="email" placeholder="Введіть email" value="<?php
                                                                                                                        if ((!empty($_SESSION['registration'])) || (!empty($_SESSION['login']))) {
                                                                                                                            echo $_SESSION['email'];
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        }
                                                                                                                        ?>" required>
                                    <input class="input" type="text" name="street" placeholder="Введіть адресу" required>
                                    <input class="input" type="text" name="address" placeholder="Введіть місто" required>
                                    <input class="input" type="text" name="title" placeholder="Введіть назву мебелі або комплексу" required>
                                    <input type="submit" name="send" value="Відправити" class="contacts__form-btn">

                                    <?php if (isset($massege)) {
                                        echo $massege;
                                    } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contacts -->

        </main>

        <!-- footer -->
        <section>
            <?php require 'blocks/footer.php' ?>
        </section>
        <!-- footer -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="js/main.js"></script>
    </div>
</body>

</html>