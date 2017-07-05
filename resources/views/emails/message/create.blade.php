@component('mail::message')
# Bonjour cher client, nous sommes heureux de travailler avec vous
- {{ $nomSociete }}
- {{ $email }}
# Votre login est : {{ $login }}
# Votre mot de passe est : {{ $mot_de_passe }}
@component('mail::panel')
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate, error esse id maxime modi molestiae, nihil nobis nostrum officia omnis perspiciatis porro quas quia quisquam ratione sunt veniam voluptatem.
@endcomponent
@component('mail::button', ['url' => ''])
Cliquer sur ce lien pour vous connecter !
@endcomponent

Merci,<br>
{{ config('app.name') }}
# Avec Clean Net, faites des economies
@endcomponent
