<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Регистрация</title>
  <link rel="stylesheet" href="../../../public/css/form.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <?php if(isset($error)): ?>
      <h1><?php echo $error; ?>
    <?php endif; ?>
    
  <form method="post" action="/reg" class="login">
    <p>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email">
    </p>

    <p>
      <label for="login">Логин:</label>
      <input type="text" name="login" id="login">
    </p>

    <p>
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password">
    </p>
    <p>
      <label for="password">Повторите пароль:</label>
      <input type="password" name="password_confirm" id="password">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>
<br> <br>
    <p class="forgot-password"><a href="index.html">Войти</a></p>
  </form>

</body>
</html>
