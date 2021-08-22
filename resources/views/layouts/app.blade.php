<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ek" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;400;700&display=swap" rel="stylesheet">

    <title>トップページ</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="{{ asset('img/brand-white.svg') }}" alt="INIT"></a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーション切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navber">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-link active" aria-current="page"><a href="#">ホーム</a></li>
                        <li class="nav-link"><a href="#">はじめての方</a></li>
                        <li class="nav-link"><a href="#">レッスン検索</a></li>
                        <li class="nav-link"><a href="#">アドバイザー検索</a></li>
                        <li class="nav-link nav-link__login"><a href="#">ログイン</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="footer-brand">
                <img src="{{ asset('img/brand-white.svg') }}" alt="">
            </div>
            <div class="footer-nav-list">
                <ul>
                    <li><a href="#">INIT運営チームについて</a></li>
                    <li><a href="#">特商法に基づく表示</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                    <li><a href="#">キャンセルポリシー</a></li>
                    <li><a href="#">受講者規約</a></li>
                    <li><a href="#">アドバイザー規約</a></li>
                </ul>
            </div>
            <address>Copyright &copy; 2021 INIT. All Rights Reserved.</address>
        </div>
    </footer>

    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
