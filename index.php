<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Грузовозофф - Регистрация</title>
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
        <h1>Регистрация</h1>
        <input type="text" placeholder="Логин (кириллица)" required pattern="[А-Яа-я]{6,}" title="6+ кириллических символов">
        <input type="password" placeholder="Пароль (6+ символов)" required minlength="6">
        <input type="text" placeholder="ФИО" required pattern="[А-Яа-яЁё\s]+" title="Только кириллица и пробелы">
        <input type="tel" placeholder="Телефон (+7(XXX)-XXX-XX-XX)" required pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}" title="Формат: +7(XXX)-XXX-XX-XX">
        <input type="email" placeholder="Email" required>
        <input type="submit" class="button" value="Зарегистрироваться">
        <p class="text_center">Уже есть аккаунт?</p>
        <a href="auth.html">Войти</a>
    </form>
</body>
</html>