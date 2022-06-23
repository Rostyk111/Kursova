
    <!-- update -->
    <?php
    require_once "db_conect.php";
    if (isset($_POST['update'])) {
        if ((trim($_POST['title_update']) == "") || (trim($_POST['author_update']) == "") || (trim($_POST['description_update']) == "") || (trim($_POST['price_update']) == "") || (trim($_POST['img_update']) == "")) {
            $massege__update = '<div class = "massage">Ви не ввели дані</div>';
        } else {

            $sql = "UPDATE table_furniture SET title='" . $_POST['title_update'] . "', author='" . $_POST['author_update'] . "' , description='" . $_POST['description_update'] . "', price='" . $_POST['price_update'] . "' , image='" . $_POST['img_update'] . "'";
            if ($conn->query($sql) == TRUE) {
                $massege__update = '<div class = "massage">Товар оновлено</div>';
                header('Location: /admin.php');
            }
        }
    }
    ?>
    <!-- update -->



    <!-- add -->
    <?php
    require_once "db_conect.php";
    $title = $_POST['title_add'];
    $author = $_POST['author_add'];
    $description = $_POST['description_add'];
    $price = $_POST['price_add'];
    $img = $_POST['img_add'];
    if (isset($_POST['add'])) {
        $sql = "SELECT  title, author, description, price, img FROM table_furniture WHERE title = '$title' OR author = '$author' OR description = '$description' OR price = '$price' OR img = '$img'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $massege__add = '<div class = "massage">Такий товар уже в магазині</div>';
        } else {
            $sql = "INSERT INTO table_furniture (title, author, description, price, img) VALUES ('$title','$author', '$description', '$price', '$img')";
            if ($conn->query($sql) == TRUE) {
                $massege__add = '<div class = "massage">Товар доданий</div>';
            }
        }
    }
    ?>
    <!-- add -->




    <!-- delete -->
    <?php
    if (isset($_POST['delete'])) {
        $sql = "SELECT title FROM table_furniture WHERE title ='" . $_POST['title_delete'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $massege__delete = '<div class = "massage">Такого товару не існує</div>';
        } else {
            $sql = "DELETE FROM table_furniture WHERE title ='" . $_POST['title_delete'] . "'";
            if ($conn->query($sql) == TRUE) {
                $massege__delete = '<div class = "massage">Товар видалений</div>';
            }
        }
    }
    ?>
    <!-- delete -->



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
        <title>furnitureType</title>
    </head>

    <body class=bg>
        <main id="main">
            <div class="admin">
                <div class="container">
                    <?php
                    echo '<a href = "login.php" class = "session_destroy">Log out</a>';
                    ?>
                    <div class="admin__content">

                        <!-- update -->
                        <form class="admin__update" method="post">
                            <h3>Оновити</h3>
                            <input type="text" name="title_for_update" placeholder="Товар, який слід оновити" require>
                            <input type="text" name="title_update" placeholder="Товар">
                            <input type="text" name="author_update" placeholder="Виробник">
                            <input type="text" name="description_update" placeholder="Опис">
                            <input type="number" name="price_update" placeholder="Ціна">
                            <input type="file" name="img_update" placeholder="Картинка" class=button_img>
                            <input type="submit" name="update" value="Оновити" class="button">
                            <?php if (isset($massege__update)) {
                                echo $massege__update;
                            } ?>
                        </form>
                        <!-- update -->


                        <!-- add -->
                        <form class="admin__add">
                            <h3>Додати</h3>
                            <input type="text" name="title_add" placeholder="Товар" require>
                            <input type="text" name="author_add" placeholder="Виробник" require>
                            <input type="text" name="description_add" placeholder="Опис" require>
                            <input type="number" name="price_add" placeholder="Ціна" require>
                            <input type="file" name="img_add" placeholder="Картинка" class=button_img require>
                            <input type="submit" name="add" value="Додати" class="button">
                            <?php if (isset($massege__add)) {
                                echo $massege__add;
                            } ?>
                        </form>
                        <!-- add -->

                        <!-- admin__block -->
                        <div class="admin__block">
                            <form class="admin__delete">
                                <h3>Видалити</h3>
                                <input type="text" name="title_delete" placeholder="Товар" require>
                                <input type="submit" name="delete" value="Видалити" class="button">
                                <?php if (isset($massege__delete)) {
                                    echo $massege__delete;
                                } ?>
                            </form>


                            <div class="admin__order">
                                <h3>Список замовлень</h3>
                                <div class="admin__inner">
                                    <div class="admin__order-user">
                                        <?php
                                        require_once "db_conect.php";
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT firstname, secondname FROM users JOIN orders WHERE id_user =  order_id_user";
                                        $result = $conn->query($sql);

                                        $conn->close();

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {
                                                echo '
                                                <p>Замовив(ла)</p>
                                                <p>' . $row["firstname"] . '</p>
                                                <p>' . $row["secondname"] . '</p>
                                                
                                                ';
                                            }
                                        } else {
                                            echo '<p>Замовлення відсутнє</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="admin__order-title">
                                        <?php
                                        require_once "db_conect.php";
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT title FROM table_furniture JOIN orders WHERE id_furniture = order_id_furniture";
                                        $result = $conn->query($sql);

                                        $conn->close();

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {
                                                echo '
                                                <p>Товар</p>
                                                <p>' . $row["title"] . '</p>
                                                ';
                                            }
                                        } else {
                                            echo '<p>Зомлення відсутнє</p>';
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- admin__block-->
                    </div>
                </div>
            </div>
        </main>

    </body>

    </html>
