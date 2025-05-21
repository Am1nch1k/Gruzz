<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Грузовозофф - Вход</title>
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
        <h1>Вход в систему</h1>
        <input type="text" placeholder="Логин" required pattern="[А-Яа-я]{6,}" title="Только кириллица (6+ символов)">
        <input type="password" placeholder="Пароль" required minlength="6">
        <input type="submit" class="button" value="Войти">
        <p class="text_center">Нет аккаунта?</p>
        <a href="index.html">Зарегистрироваться</a>
    </form>
</body>
</html>