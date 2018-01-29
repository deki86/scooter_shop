@component('mail::message')
# Verification Account Email address

Please verify your account!

@component('mail::button', ['url' => route('sendEmailDone', ["email" => $user->email, "verification_token" => $user->verification_token] )] )
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
