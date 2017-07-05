<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap-paper.css') }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style>
        body{
            padding-top: 80px;
        }
        .maClasse{
            display: inherit;
        }
    </style>
</head>
<body>
@include('partials._nav')
    <div class="container">
        <div class="row">
            @include('layouts._flash')
            @yield('content')
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="text-center">
                <p>Avec Cle@n net, La gestion de votre pressing devient facile.</p>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
            <script src="{{ url('js/bootstrap.min.js') }}"></script>
            <script src="{{ url('js/main.js') }}"></script>

            @yield('scripts')
        </div>
    </div>



</body>
</html>