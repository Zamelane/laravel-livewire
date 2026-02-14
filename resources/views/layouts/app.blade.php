<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
  @include('partials.head')

  @livewireStyles
</head>

<body>

  @yield('header')
  {{ $slot }}
  @yield('footer')

  @livewireScripts
</body>

</html>