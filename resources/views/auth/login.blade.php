<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
        }

        .left {
            width: 55%;
            overflow: hidden;
        }

        .left img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .right {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .login-box {
            width: 380px; /* было 320 */
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 32px;
            color: #1d2b36;
        }

        input {
            width: 100%;
            padding: 14px 18px;
            margin-bottom: 25px;
            border: 2px solid #1d2b36;
            border-radius: 30px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #1d2b36;
            font-size: 16px;
            font-weight: 600;
        }


        button:hover {
            background: #e5e5e5;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .header {
            position: absolute;
            top: 0;
            width: 100%;
            height: 110px; /* увеличили */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 80px;
            z-index: 10;
        }

        .nav {
            display: flex;
            gap: 35px; /* больше расстояние */
        }

        .nav a {
            text-decoration: none;
            color: #1d2b36;
            font-size: 18px; /* крупнее */
            font-weight: 600;
            transition: 0.3s ease;
        }

        .nav a:hover {
            opacity: 0.7;
        }

        .logo img {
            height: 60px;
        }


    </style>
</head>
<body>

<header class="header">
    <div class="nav left-nav">
        <a href="#">Конкурсы</a>
        <a href="#">Новости</a>
        <a href="#">Документация</a>
    </div>

    <div class="logo">
        <img src="{{ asset('images/logo.svg') }}" alt="logo">
    </div>

    <div class="nav right-nav">
        <a href="#">РДС</a>
        <a href="#">Фотогалерея</a>
        <a href="#">Обратная связь</a>
    </div>
</header>

<div class="left">
    <img src="{{ asset('images/bg.png') }}" alt="background">
</div>

<div class="right">
    <div class="login-box">

        <h1>Вход</h1>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>Логин</label>
            <input type="text" name="login" value="{{ old('login') }}" required>

            <label>Пароль</label>
            <input type="password" name="password" required>

            <button type="submit">Войти</button>
        </form>

    </div>
</div>

</body>
</html>
