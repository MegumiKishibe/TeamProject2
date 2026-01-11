<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>新規登録 | まだある？ナビ</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="page">
  <main class="card card--plain">
    <div class="brand-row">
      <div class="brand jp">まだある？ナビ</div>
    </div>

    <h1 class="page-title jp">新規登録</h1>

    <form class="form form--spacious" method="post" action="#"> {{ csrf_field() }} {{-- 仮のaction属性 --}}

      <div class="field">
        <input class="input en" type="text" name="name" placeholder="Username" autocomplete="username" />
      </div>

      <div class="field">
        <input class="input en" type="password" name="password" placeholder="Password" autocomplete="new-password" />
      </div>

      <div class="field">
        <input class="input en" type="email" name="email" placeholder="Email" autocomplete="email" />
      </div>

      <button class="btn btn--md en" type="submit">Sign up</button>
    </form>

    <div class="links">
      <a class="link en" href="/top">Login</a>
    </div>
  </main>
</body>
</html>
