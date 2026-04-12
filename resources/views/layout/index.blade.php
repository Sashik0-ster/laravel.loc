<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/main.css','resources/css/app.css', 'resources/js/app.js'])

    <title>{{'Мій Додаток' }}</title>

</head>

<body>

<div class="burger">
    <x-sidebar :items="$sidebarItems"/>
</div>

<main class="main">

    <header>
        <x-header/>
    </header>

    <div class="content">

        @yield('content')

    </div>

</main>

</body>
</html>

