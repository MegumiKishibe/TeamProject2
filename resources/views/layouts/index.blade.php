<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/style.css')

    <title>@yield('title', 'title')</title>
</head>

<body>

    <div>共通ナビゲーション・ヘッダーなど</div>


    {{-- @yield('content')は名前を変えて増やしてもよい --}}
    @yield('content')


    <div>共通フッダーなど</div>


</body>

</html>
