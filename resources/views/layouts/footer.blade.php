<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        
    <nav class="bg-white border-gray-200 px-2 sm:px-4  rounded dark:bg-gray-900">
        <div class="text-center">
            <a href="https://www.facebook.com/profile.php?id=100087425955962" class="fa fa-facebook"></a>
            <a href="https://twitter.com/BarrocIntens" class="fa fa-twitter"></a>
            <a href="https://www.instagram.com/barroc.intens/" class="fa fa-instagram"></a>
        </div>
    </nav>

    </body>
</html>
