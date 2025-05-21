<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Грузовозофф - Новая заявка</title>
</head>
<body>
    <header>
        <nav>
            <a href="auth.html">Вход</a>
            <a href="index.html">Регистрация</a>
            <a href="orders.html">Мои заявки</a>
            <a href="order.html">Новая заявка</a>
        </nav>
    </header>
    <form action="#">
        <h1>Новая заявка</h1>
        <input type="datetime-local" placeholder="Дата и время" required>
        <input type="number" placeholder="Вес груза (кг)" required>
        <input type="text" placeholder="Габариты (Ш×В×Г)" required>
        <input type="text" placeholder="Адрес отправления" required>
        <input type="text" placeholder="Адрес доставки" required>
        <select required>
            <option value="" disabled selected>Тип груза</option>
            <option>Хрупкое</option>
            <option>Скоропортящееся</option>
            <option>Требуется рефрижератор</option>
            <option>Животные</option>
            <option>Жидкость</option>
            <option>Мебель</option>
            <option>Мусор</option>
        </select>
        <input type="submit" class="button" value="Отправить заявку">
    </form>
</body>
</html>