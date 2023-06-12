@component('mail::message')

Ciao {{ Auth::user()->name ?? $name }},
Hai configurato correttamente la posta elettronica!
@component('mail::button', ['url' => 'https://gestionale.lavorain.cloud/'])
Ciao.
@endcomponent

Buona giornata,<br>
{{ config('app.name') }}
@endcomponent
