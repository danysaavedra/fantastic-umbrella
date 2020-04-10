@component('mail::message')
@foreach ($data as $infoMail => $value)
{{$infoMail}}: {{$value}}
<br>
@endforeach
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent