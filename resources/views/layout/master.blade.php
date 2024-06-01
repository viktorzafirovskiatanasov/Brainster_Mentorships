<html>

<head>
    @include('partials/_head')
    @yield('script')
</head>

<body>
    <div>
        @yield('content')
    </div>
    @include('partials/_footer')
    @include('partials/_script')
    @yield('script')
</body>

</html>
