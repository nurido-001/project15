<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | WISATAKU</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
  </head>

  <body>
    {{-- Konten halaman akan masuk di sini --}}
    @yield('content')

    <!-- Core JS -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
