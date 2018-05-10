<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>西安交通大学西迁纪念馆预约程序后台管理</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    @include('layouts._header')
    <div class="container">
        @include('layouts._message')
        @yield('content')
    </div>
    @include('layouts._footer')
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>