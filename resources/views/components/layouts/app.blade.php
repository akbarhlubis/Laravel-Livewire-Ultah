<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        {{-- import karantina font all style --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karantina:300,400,500,600,700">
        {{-- import karantina font all style --}}
        <style>
            body {
                /* background: linear-gradient(180deg, #FEDE67 0%, #FDBF36 100%); */
                background: #ffe1c2;
            }
            .btn-warning {
                background: #FDBF36;
                border: 1px solid #FDBF36;
                color: #fff;
            }
        </style>
        @stack('AdditionalCSS')
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        @stack('AdditionalJS')
    </body>
</html>
