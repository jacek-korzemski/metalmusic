<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/front.css') }}" rel="stylesheet">
</head>

<body>
    <header class="main-header">
        <nav class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="/" class="logo">
                        MetalMusic.pl
                    </a>
                </div>
                <div class="col-md-8">
                    <ul class="main-menu" id="main-menu">
                        <li><a href="/recenzje">Recenzje</a></li>
                        <li><a href="/relacje">Relacje</a></li>
                        <li><a href="/zapowiedzi">Zapowiedzi</a></li>
                        <li><a href="/video">Video</a></li>
                        <li><a href="/artykuly">Artykuły</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="<?php if ($_SERVER['REQUEST_URI'] == '/') { ?>hero<?php } else { ?>hero page<?php } ?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-1"></div>
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <form class="search" action="/search">
                        <input type="text" name="s" />
                        <button> Szukaj </button>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-1"></div>
            </div>
            @yield('top')
        </div>
    </div>

    @yield('center')

    @yield('bottom')

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 footer-column">
                    <h3>Kategorie</h3>
                    <ul class="footer-pages">
                        <li><a href="/recenzje">Recenzje</a></li>
                        <li><a href="/relacje">Relacje</a></li>
                        <li><a href="/zapowiedzi">Zapowiedzi</a></li>
                        <li><a href="/video">Video</a></li>
                        <li><a href="/artykuly">Artykuły</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-4 footer-column">
                    <h3>Sekretne miejsca</h3>
                    <ul class="footer-pages">
                        <li><a href="/kontakt">Kontakt</a></li>
                        <li><a href="/o-portalu">O portalu</a></li>
                        <li><a href="/polityka-prywatnosci">Polityka prywanosci</a></li>
                        <li><a href="/tajny-katalog">Tajny katalog</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 footer-column footer-text">
                    <h3>Metal 4 life</h3>
                    <p>
                        MetalMusic.pl – niezależny, a wręcz stronniczy i subiektywny portal o muzyce metalowej!
                        Relacje z koncertów, recenzje płyt, zapowiedzi eventów, informacje o sprzęcie używanym
                        w muzycznych czeluściach piekieł a także artykuły tematyczne – to wszystko i jeszcze
                        więcej znajdziesz właśnie tutaj!
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright">
        2022 <a href="/humans.txt" target="_blank">&copy;</a> MetalMusic.pl / Jacek Korzemski
    </div>
</body>

</html>