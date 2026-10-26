<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-800 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-10 bg-slate-50">
            <div>
                <a href="/" class="inline-flex items-center justify-center rounded-2xl bg-blue-600 p-4 text-white shadow-md shadow-blue-600/20">
                    <x-application-logo class="h-10 w-10 fill-current" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-6 py-8 bg-white border border-slate-200 shadow-lg shadow-slate-900/5 overflow-hidden rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
