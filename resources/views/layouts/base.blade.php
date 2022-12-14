<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        <wireui:scripts />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>

        @yield('body')
        <x-dialog z-index="z-50" blur="md"  />
        <x-notifications position="bottom-center" />
    </body>
    @wireUiScripts
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script>
        function select2Alpine() {
      this.select2 = $(this.$refs.select).select2();
      this.select2.on("select2:select", (event) => {
        this.selectedCity = event.target.value;
      });
      this.$watch("selectedCity", (value) => {
        this.select2.val(value).trigger("change");
      });
    }
    </script>
</html>
