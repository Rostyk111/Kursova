<?php
session_start();
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

            <!-- furniture -->
            <section>
                <div class="furniture" id="furniture">
                    <div class="container">
                        <div class="furniture__search">
                            <form method="post" action="search.php" class="form">
                                <input name="search" type="text" class="search" placeholder="Пошук товара" required>
                                <input type="submit" name="submit" value="Пошук" class="furniture__btn">
                            </form>
                        </div>
                        <div class="furniture__inner">
                            <?php
                            require_once "db_conect.php";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            if (isset($_POST['submit'])) {
                                $search = $_POST['search'];
                                $sql = "SELECT * FROM table_furniture WHERE title LIKE '%$search%'  OR author LIKE '%$search%'";
                                $result = $conn->query($sql);

                                $conn->close();

                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo '
        <div class = "furniture__elements">
			<div class = "img">
				<img src = "img/furniture/' . $row["img"] . '" alt = ""/>
            </div>
            <div class = furniture__content>
				<p class = "author">' . $row["author"] . '</p>
                <p class = "title">' . $row["title"] . '</p>
                <p class = "description"> ' . $row["description"] . '</p>
                <p class = "price">' . $row["price"] . ' грн. </p>
            </div>
        </div>
				';
                                    }
                                } else {
                                    echo "<p class = 'massage'>Таких книги немає в продажі</p>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- furniture -->

            <!-- contacts -->
            <section>
                <?php
                $firstname = $_POST['firstname'];
                $secondname = $_POST['secondname'];
                if (isset($_POST['send'])) {
                    $headers = "From: $secondname\t$firstname \r\nContent-type: text\plain;charset=utf-8\r\n";
                    mail('nazar2000pok@gmail.com', $headers, $_POST['number'], $_POST['address'], $_POST['numberofpost'], $_POST['title']);
                }
                ?>
                <?php
                require_once "db_conect.php";
                if (isset($_POST['send'])) {
                    $sql = "INSERT INTO orders (order_id_furniture, order_user_id) SELECT id_furniture, user_id FROM table_furniture JOIN users WHERE title = '" . $_POST['title'] . "' AND firstname ='" . $_POST['firstname'] . "' AND secondname = '" . $_POST['secondname'] . "'";
                    if ($conn->query($sql) == TRUE) {
                        header('Location: /index.php#contacts');
                    }
                }
                ?>
                <div class="contacts" id="contacts">
                    <div class="contacts__bg">
                        <div class="container">
                            <div class="contacts__inner">
                                <div class="contacts__contents">
                                    <h2>Безкоштовна доставка</h2>
                                    <p>Для замовлення книги напишіть нам</p>
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
                                    <input class="input" type="number" name="numberofpost" placeholder="Введіть номер поштового відділення" required>
                                    <input class="input" type="text" name="address" placeholder="Введіть місто" required>
                                    <input class="input" type="text" name="title" placeholder="Введіть назву книжки" required>
                                    <input type="submit" name="send" value="Відправити" class="contacts__form-btn">
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

    </div>
</body>

</html>