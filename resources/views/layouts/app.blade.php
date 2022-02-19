<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
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
                    <li><a href="{{ route('team') }}">{{ __('message.About Team INIT') }}</a></li>
                    <li><a href="{{ route('tradelaw') }}">{{ __('message.Display based on special business') }}</a></li>
                    <li><a href="{{ route('privacy') }}">{{ __('message.privacy policy') }}</a></li>
                    <li><a href="{{ route('cancel-policy') }}">{{ __('message.cancellation policy') }}</a></li>
                    <li><a href="{{ route('mate-terms') }}">{{ __('message.Terms of study') }}</a></li>
                    <li><a href="{{ route('adviser-terms') }}">{{ __('message.Instructors') }}</a></li>
                    <li><a href="{{ route('intellectual-property') }}">{{ __('message.Intellectual Property Length Guidelines') }}</a></li>
                    <li><a href="{{ route('tax-payment') }}">{{ __('message.About tax payment') }}</a></li>
                    <li><a href="{{ route('contact.index') }}">{{ __('message.inquiry') }}</a></li>
                </ul>
            </div>
            <address>Copyright &copy; 2021 INIT. All Rights Reserved.</address>
        </div>
    </footer>

    <!-- Scripts -->
    @if (!request()->is('mate/coins/buy') && !request()->is('/'))
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif
    <script src="{{ asset('assets/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/ajaxzip3/ajaxzip3.js') }}"></script>

    @yield('js')

    @if (auth()->guard('adviser')->check() || auth()->guard('mate')->check())
        <!-- お知らせポップアップ -->
        @include('components.info-nortification-popup')
        @include('components.attendance-nortification-popup')
    @endif
</body>
</html>
