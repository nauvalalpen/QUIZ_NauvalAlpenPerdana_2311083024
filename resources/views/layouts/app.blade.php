<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>



    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-3">
            <a href="/" class="text-xl font-bold">{{ config('app.name') }}</a>
        </div>
    </nav>


    <main class="container mx-auto px-4">
        @yield('content')
    </main>
</body>

</html>
