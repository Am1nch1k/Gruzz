<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Грузовозофф - Админ-панель</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="orders.php">Заявки</a>
            <a href="auth.php">Выход</a>
        </nav>
    </header>

    <div class="main_orders">
        <h1>Все заявки</h1>
        <div class="orders">

        <?php
            try {
                // Подключение к БД
                $connection = new PDO('mysql:dbname=moinesam;host=mysql-8.4', 'root', '');
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Обработка формы обновления заявки
                if (isset($_POST["order_id"])) {
                    $status = $_POST["status"] ?? 'Новая';
                    $admin_comment = $_POST["admin_comment"] ?? '';
                    $order_id = $_POST["order_id"];

                    $update = $connection->prepare("UPDATE orders SET status = ?, admin_comment = ? WHERE id = ?");
                    $update->execute([$status, $admin_comment, $order_id]);
                }

                // Получение всех заявок
                $query = $connection->prepare("SELECT * FROM orders ORDER BY id DESC");
                $query->execute();
                $orders = $query->fetchAll();

                // Отображение заявок
                foreach ($orders as $order) {
        ?>
            <div>
                <form method="POST" action="">
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                    <p>Номер: <span>#<?= $order["id"] ?></span></p>
                    <p>Клиент: <span><?= htmlspecialchars($order["name"]) ?></span></p>
                    <p>Телефон: <span><?= htmlspecialchars($order["phone"]) ?></span></p>
                    <p>Груз: <span><?= htmlspecialchars($order["cargo_description"]) ?></span></p>

                    <p>Статус:
                        <select name="status">
                            <option value="Новая" <?= $order["status"] === "Новая" ? "selected" : "" ?>>Новая</option>
                            <option value="В работе" <?= $order["status"] === "В работе" ? "selected" : "" ?>>В работе</option>
                            <option value="Отменена" <?= $order["status"] === "Отменена" ? "selected" : "" ?>>Отменена</option>
                        </select>
                    </p>

                    <p>Комментарий администратора:</p>
                    <textarea name="admin_comment" placeholder="Комментарий администратора"><?= htmlspecialchars($order["admin_comment"]) ?></textarea>

                    <input type="submit" value="Сохранить">
                </form>
            </div>
        <?php
                } // конец foreach
            } catch (PDOException $e) {
                echo "<p>Ошибка подключения: " . $e->getMessage() . "</p>";
            }
        ?>

        </div>
    </div>
</body>
</html>
