<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide"
      dir="ltr"
      data-theme="theme-default"
     data-assets-path="../../assets/"
      data-template="vertical-menu-template"
      data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>@yield('title', 'Vuexy - Laravel')</title>
  <meta name="description" content="@yield('meta_description', 'Vuexy Template')" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ assets('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ assets('vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ assets('vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ assets('vendor/fonts/flag-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ assets('vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ assets('vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ assets('css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ assets('vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ assets('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ assets('vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{ assets('vendor/libs/@form-validation/form-validation.css') }}" />

  <!-- Page CSS -->
  @stack('page-css')

  <!-- Helpers -->
  <script src="{{ assets('vendor/js/helpers.js') }}"></script>
  <script src="{{ assets('vendor/js/template-customizer.js') }}"></script>
  <script src="{{ assets('js/config.js') }}"></script>
</head>

<body>
  @yield('content')

  <!-- Core JS -->
  <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>
  <script src="{{ asset('vendor/js/menu.js') }}"></script>

  <!-- Vendors JS -->
  <script src="{{ assets('vendor/libs/@form-validation/popular.js') }}"></script>
  <script src="{{ assets('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
  <script src="{{ assets('vendor/libs/@form-validation/auto-focus.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ assets('js/main.js') }}"></script>

  <!-- Page JS -->
  @stack('page-js')
</body>
</html>
