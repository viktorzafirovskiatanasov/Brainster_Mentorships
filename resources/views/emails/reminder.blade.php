<x-mail::message>
# Introduction
Hi {{ $user_name }},

Just a reminder you have an appointment tomorrow at {{ $appointment_date }} with our dentist office.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
