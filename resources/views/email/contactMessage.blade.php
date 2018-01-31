@component('mail::message')
# Message form contact form

The body of your message.

{{ $message->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
