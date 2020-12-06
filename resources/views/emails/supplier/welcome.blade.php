@component('mail::message')
# رسالة ترحيب

أهلا بكم

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

فريق عمل اليمان<br>
{{ config('app.name') }}
@endcomponent
