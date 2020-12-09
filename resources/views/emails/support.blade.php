@component('mail::message')
# رسالة مساعدة

<div>
    <p>الاسم : {{ $support->name }}</p>
    <p>البريد الالكتروني : {{ $support->email }}</p>
    <p>رقم الهاتف : {{ $support->phone }}</p>
    <p>الرسالة : {!! $support->message !!}</p>
</div>
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

فريق عمل اليمان<br>
{{ config('app.name') }}
@endcomponent
