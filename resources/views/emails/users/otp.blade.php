@component('mail::message')

To authenticate please use thr following One Time Password(OTP)

OTP for {{$for}}: {{$otp}}

This OTP is valid for only 5 min.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
