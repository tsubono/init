<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">

    <title>@yield('title', '') | INIT</title>

    <meta name="keywords" content="英語,ビジネス英語,語学学習,オンライン学習,オンライン英会話,マッチング,init,online lesson,Japan,online learning">
    <meta name="description" content="「やりたいこと」を「学びたい言語」で。INITに登録して、世界中からあなただけの講師を見つけよう。ただ勉強するのではなく、趣味を通じて繋がる講師と楽しく学び、あなたの目標に挑戦しませんか？INITは、あなたの挑戦を待っています！">
</head>
<body>
    <!-- 固定ヘッダーメニュー -->
    @include('components.header')

    <!-- ページ上部見出しなど -->
    @include('components.page-head')

    <main id="app">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-brand">
                <img src="{{ asset('img/brand-white.svg') }}" alt="">
            </div>
            <div class="footer-nav-list">
                <ul>
                    <li><a href="{{ route('team') }}">TEAM INITについて</a></li>
                    <li><a href="{{ route('tradelaw') }}">特商法に基づく表示</a></li>
                    <li><a href="{{ route('privacy') }}">プライバシーポリシー</a></li>
                    <li><a href="{{ route('cancel-policy') }}">キャンセルポリシー</a></li>
                    <li><a href="{{ route('mate-terms') }}">受講者規約</a></li>
                    <li><a href="{{ route('adviser-terms') }}">講師規約</a></li>
                    <li><a href="{{ route('intellectual-property') }}">知的財産権ガイドライン</a></li>
                    <li><a href="{{ route('tax-payment') }}">納税について</a></li>
                    <li><a href="{{ route('contact.index') }}">お問い合わせ</a></li>
                </ul>
            </div>
            <address>Copyright &copy; 2021 INIT. All Rights Reserved.</address>
        </div>
    </footer>

    <!-- Scripts -->
    @if (!request()->is('mate/coins/buy') && !request()->is('/'))
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ek" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="//ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    @yield('js')

    @if (auth()->guard('adviser')->check() || auth()->guard('mate')->check())
        <!-- お知らせポップアップ -->
        @include('components.info-nortification-popup')
        @include('components.attendance-nortification-popup')
    @endif
</body>
</html>
