@component('mail::message')

Ciao {{ Auth::user()->name ?? $name }},
Hai configurato correttamente la posta elettronica!


Buona giornata,<br>
{{ config('app.name') }}
@endcomponent
