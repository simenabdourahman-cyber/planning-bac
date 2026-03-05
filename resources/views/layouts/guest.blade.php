<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Système BAC Djibouti') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <!-- Scripts Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Annuler les styles Tailwind/Breeze sur body et conteneur */
            body {
                margin: 0 !important;
                padding: 0 !important;
                background: #0F2451 !important;
                font-family: 'DM Sans', sans-serif !important;
            }
            /* Supprimer le wrapper Breeze */
            body > div:first-child {
                all: unset !important;
                display: block !important;
            }
        </style>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>