<x-mail::message>
# Nuova richiesta informazioni

Hai ricevuto una richiesta dalla pagina GTA VI Hub.

<x-mail::panel>
**Nome:** {{ $infoRequest['name'] }}

**Email:** {{ $infoRequest['email'] }}

**Argomento:** {{ $infoRequest['topic'] }}
</x-mail::panel>

## Messaggio

{{ $infoRequest['message'] }}

Grazie,<br>
{{ config('app.name') }}
</x-mail::message>
