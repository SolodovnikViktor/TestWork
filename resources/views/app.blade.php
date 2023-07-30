<!DOCTYPE html>
<html lang="ru" x-data="{ darkMode: localStorage.getItem('dark') === 'true'}" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign" defer=""></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=String.prototype.startsWith" defer=""></script>
    <title inertia>Тест</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased dark:bg-slate-700">
    <div class="block sm:absolute top-5 right-8 order-1">
        <x-dark-mode-toggle size="4" />
    </div>
    <div class="container mx-auto">@inertia</div>
</body>

</html>