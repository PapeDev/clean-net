<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Linge</title>
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
            <h1 style="font-size: 28px;">Liste des linges</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="font-size: 22px;">Homme</h2>
        </div>
        <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Prix Unitaire</th>
                </tr>
                </thead>
                <tbody>
                @if($lingesHomme)
                    @foreach($lingesHomme as $lingesHo)
                        <tr>
                            <td>{{ $lingesHo->title }}</td>
                            <td>{{ $lingesHo->price }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 style="font-size: 22px;">Femme</h2>
        </div>
        <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Prix Unitaire</th>
                </tr>
                </thead>
                <tbody>
                @if($lingesFemme)
                    @foreach($lingesFemme as $lingesHo)
                        <tr>
                            <td>{{ $lingesHo->title }}</td>
                            <td>{{ $lingesHo->price }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 style="font-size: 22px;">Enfant</h2>
        </div>
        <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Prix Unitaire</th>
                </tr>
                </thead>
                <tbody>
                @if($lingesEnfant)
                    @foreach($lingesEnfant as $lingesHo)
                        <tr>
                            <td>{{ $lingesHo->title }}</td>
                            <td>{{ $lingesHo->price }}</td>
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
