@component('mail::message')
# Introduction

Welcome to Vendor System

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
