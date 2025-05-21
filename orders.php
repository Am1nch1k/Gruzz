<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Грузовозофф - Мои заявки</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="auth.php">Выход</a>
            <a href="orders.php">Мои заявки</a>
            <a href="order.php">Новая заявка</a>
        </nav>
    </header>

    <div class="main_orders">
        <h1>Мои заявки</h1>
        <a href="order.php" class="button">+ Новая заявка</a>
        <div class="orders">

        <?php
            try {
                // Подключение к БД
                $connection = new PDO('mysql:dbname=moinesam;host=mysql-8.4', 'root', '');
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Здесь можно заменить ID пользователя на реальный из сессии
                $user_id = 1; // временно фиксированный ID

                // Запрос заявок конкретного пользователя
                $query = $connection->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY date DESC, time DESC");
                $query->execute([$user_id]);
                $orders = $query->fetchAll();

                foreach ($orders as $order) {
        ?>
            <div>
                <p>Номер: <span>#<?= $order["id"] ?></span></p>
                <p>Дата: <span><?= htmlspecialchars($order["date"]) . " " . htmlspecialchars($order["time"]) ?></span></p>
                <p>Тип груза: <span><?= htmlspecialchars($order["cargo_type"]) ?></span></p>
                <p>Откуда: <span><?= htmlspecialchars($order["from_address"]) ?></span></p>
                <p>Куда: <span><?= htmlspecialchars($order["to_address"]) ?></span></p>
                <p>Статус:
                    <span style="color:
                        <?php
                            if ($order["status"] === "В работе") echo 'orange';
                            elseif ($order["status"] === "Завершена") echo 'green';
                            elseif ($order["status"] === "Отменена") echo 'red';
                            else echo 'gray';
                        ?>
                    ;">
                        <?= htmlspecialchars($order["status"]) ?>
                    </span>
                </p>
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