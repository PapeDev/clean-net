<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Rapport Liste des Clients</title>
    {{--<link rel="stylesheet" href="{{ url('css/bootstrap-paper.css') }}"/>--}}
    {!! Html::style('css/bootstrap-paper.css') !!}
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </tr>
                </thead>
                <tbody>
                @if($clients)

                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->tel  }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>

</div>
</body>
</html>



{{--
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rapport Liste des Clients</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap-paper.css') }}"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-left">
            <img src="{{ asset('images/'. \Illuminate\Support\Facades\Auth::user()->logoSociete) }}" alt=""/><span style="font-size: 24px;">{{ \Illuminate\Support\Facades\Auth::user()->nomSociete }}</span>

        </div>
        <div class="col-md-6 text-right">
            <p class="date">
                Imprimé par {{ \Illuminate\Support\Facades\Auth::user()->name }} le {{ date('Y-m-d') }} à {{ date('H:i:s') }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <h1 style="font-size: 28px;">Liste des clients</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </tr>
                </thead>
                <tbody>
                @if($clients)

                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->tel  }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="col-md-12 text-center">
            {{ $clients->links() }}
        </div>
    </div>

</div>
</body>
</html>--}}
