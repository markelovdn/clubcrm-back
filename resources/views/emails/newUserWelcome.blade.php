@component('mail::message')
# Добро пожаловать в личный кабинет

Ваш личный кабинет был успешно создан.

Информация для входа:

Логин: {{ $phone }}

Пароль: {{ $password }}

@component('mail::button', ['url' => 'https://' . $subDomain . '.clubcrm.ru/login'])
Войти в личный кабинет
@endcomponent
@endcomponent