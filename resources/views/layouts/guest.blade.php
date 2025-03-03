<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- icons -->
        <!-- styles -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite(['resources/css/app.css'])
    </head>

    <body class="font-sans antialiased bg-slate-200" {{ $attributes }}>
        <div class="min-h-screen">
<!-- START SUBSECTION -->


        <div class="font-sans text-white antialiased bg-slate-800">
            {{ $slot }}
        </div>


<!-- END SUBSECTION -->
        </div>
        <!-- scripts -->
        @vite(['resources/js/app.js'])
    </body>

</html>
