Hello {{$user->name}},

Thankyou for create an account. Please verify your email account using this link :
{{ route('verify', $user->verification_token) }}
