<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Добро пожаловать!</h1>

<p>
    Вы авторизованы как:
    <strong>{{ auth()->user()->login }}</strong>
</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
</form>

</body>
</html>
