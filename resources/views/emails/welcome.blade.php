@component('mail::message')
# Bem-vindo, {{ $user->name }}! 🎉

Conta criada com sucesso.

@component('mail::button', ['url' => config('app.url')])
Acessar o sistema
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
