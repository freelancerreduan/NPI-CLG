@component('mail::message')
# Hello {{ $name }},

Your User Password : {{ $password }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
