@component('mail::message')
# Introduction

The body of your message.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

NRP : **{{ $mhs->nrp }}** <br>
Nama : *{{ $mhs->nama }}* <br>
Image : {{ $mhs->image }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
