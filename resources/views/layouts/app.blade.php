<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <title>minfigs</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script>
        window.Laravel = @json([
            'csrfToken' => csrf_token(),
        ]);
        </script>
    </head>

    <body>
        <div id="app">
            <nav-bar></nav-bar>

            @include('partials.alert')

            <div class="container-fluid">
                <router-view></router-view>
            </div>

        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
    </html>
