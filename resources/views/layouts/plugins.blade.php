<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
@endif

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>

    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.0/build/styles/gruvbox-dark.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.0/build/highlight.min.js"></script>
    <script>hljs.debugMode();hljs.initHighlightingOnLoad();</script>

<!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/markdown.css') }}" rel="stylesheet" type="text/css" >
</head>
<body class="bg-background h-screen antialiased leading-none">
<div id="app" class="flex flex-col h-screen">
    <nav class="bg-first shadow mb-8 py-6">
        <div class="container mx-auto px-6 md:px-0">
            <div class="flex items-center justify-center">
                <div class="mr-6">
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                    @guest
                    <div class="flex-1 text-right">
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </div>
                    @else
                    <div class="flex-1 text-right">
                        <span class="text-gray-300 text-sm pr-4">{{  Auth::user()->getUsername() }}</span>

{{--                        <a href="{{ route('logout') }}"--}}
{{--                           class="no-underline hover:underline text-gray-300 text-sm p-3"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">--}}
{{--                            {{ csrf_field() }}--}}
{{--                        </form>--}}
                    </div>
                    <x-account-dropdown :user="Auth::user()" />
                    @endguest
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-6 md:px-0 flex-grow">
        @yield('content')
    </div>
    <footer class="bg-first shadow mt-8 py-3.5">
        <div class="container mx-auto px-6 md:px-0">
            <div class="flex items-center justify-start">
                <div class="mr-6 text-gray-100">
                    <p>Source code:
                    <a href="https://github.com/jeppevinkel/exiled-plugins/" target="_blank" class="font-semibold no-underline">
                        https://github.com/jeppevinkel/exiled-plugins/
                    </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
