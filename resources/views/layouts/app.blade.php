<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Сайт Томской авиабазы')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header>
    <h1>ОГСБУ «Томская база авиационной охраны лесов»</h1>
</header>

<main>
    @yield('content')
</main>

@stack('scripts')

</body>
</html>
