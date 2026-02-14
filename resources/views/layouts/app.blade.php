<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
  @include('partials.head')
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles
</head>

{{ $slot }}

@livewireScripts

</html>