<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>まだある？ナビ</title>

  {{-- ViteでCSS/JSを読み込む（npm run dev 必須） --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="page">
  <main class="card">
    <h1 class="title">まだある？ナビ</h1>
    <p class="subtitle">売り切れ状況をみんなで共有</p>

    <div class="divider"></div>

    <form class="form" action="#" method="post"> {{-- 仮のaction属性 --}}
      <div class="field">
        <input class="input" type="text" name="username" placeholder="Username" autocomplete="username" />
      </div>

      <div class="field">
        <input class="input" type="password" name="password" placeholder="Password" autocomplete="current-password" />
      </div>

      <button class="btn" type="submit">Login</button>
    </form>

    <div class="links">
      <a class="link" href="#">新規登録</a>
      <a class="link" href="#">ログインせずに確認する</a>
    </div>
  </main>
</body>
</html>
