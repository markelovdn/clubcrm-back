<!DOCTYPE html>
<html>

<head>
  <title>Восстановление пароля</title>
</head>

<body>
  <p>Вы запросили сброс пароля для вашей учетной записи.</p>
  <p>Перейдите по ссылке ниже, чтобы сбросить пароль:</p>
  <a href="{{ url('/reset-password/'.$token) }}">Сбросить пароль</a>
</body>

</html>