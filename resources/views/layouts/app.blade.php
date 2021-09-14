<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @if (!request()->is('mate/coins/buy'))
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ek" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>@yield('title', '') | INIT</title>
</head>
<body>
    @include('components.header')

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
                    <li><a href="{{ route('team') }}">INIT運営チームについて</a></li>
                    <li><a href="{{ route('tradelaw') }}">特商法に基づく表示</a></li>
                    <li><a href="{{ route('privacy') }}">プライバシーポリシー</a></li>
                    <li><a href="{{ route('privacy') }}">キャンセルポリシー</a></li>
                    <li><a href="{{ route('cancel-policy-mate') }}">受講者規約</a></li>
                    <li><a href="{{ route('cancel-policy-adviser') }}">アドバイザー規約</a></li>
                </ul>
            </div>
            <address>Copyright &copy; 2021 INIT. All Rights Reserved.</address>
        </div>
    </footer>

    <template id="notification-content">
        <div>
            <ul class="p-notification-popover__list">
                <li><a href="#">お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。お知らせ。</a></li>
                <li><a href="#">お知らせ。</a></li>
            </ul>
            <a href="#" class="p-notification-popover__to-list">一覧へ</a>
        </div>
    </template>

    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script type="text/javascript">
      const notificationLinks = document.querySelectorAll('[data-bs-toggle="notification-popover"]');
      for (let i = 0; i < notificationLinks.length; i++) {
        let popover = new bootstrap.Popover(notificationLinks[i], {
          template: `
            <div class="popover p-notification-popover" role="tooltip">
                <div class="popover-body p-0"></div>
            </div>`,
          html: true,
          content: document.querySelector('#notification-content').content.firstElementChild,
          offset: [165, 10],
          placement: 'bottom',
        });
      }
    </script>

    @yield('js')
</body>
</html>
