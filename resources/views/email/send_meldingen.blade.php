@component('mail::message')
<h1>Beste admin van Barroc Intens,</h1>



<p>Er is een nieuwe werkbon gemaakt!</p>

<p>Kijk nu op de website voor meer informatie:)</p>

<p><a href="http://barrocintens.test/maintenance/MeldingOverzicht">barrocintens.test/maintenace</a></p>

{{-- <p>Medewerker {{$data['user_id']}} heeft een nieuwe werkbon gemaakt</p> --}}

{{-- <p>Bedrijf: {{$data['company_id']}} </p> --}}

{{-- <p>Omschrijving: {{$data['description']}} </p> --}}

{{-- <p>Materiaalen gebruikt: {{$data['materials']}} </p> --}}

Een fijne dag nog verder en met vriendelijke groet,<br>
{{ config('app.name') }}<br>
Laravel Team.
@endcomponent