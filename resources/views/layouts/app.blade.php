<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>

    <body>

        @include('partials.nav')

        <div class="container">
            <div class="row">
                @if (Session::has('msg'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ Session::get('msg') }}
                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close"
                        >
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')

            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>

    </body>
</html>
