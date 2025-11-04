<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="images/x-icon">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" sizes="16x16" type="images/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" sizes="32x32" type="images/x-icon">


    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/android-chrome-192x192.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/android-chrome-512x512.png') }}" type="image/png">

    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}" type="image/png" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/site.webmanifest') }}" type="image/png" />
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
</head>
<body class="h-full">
<div
    x-data="{ sideBarOpen: false }"
    class="min-h-full">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    @include('admin.components.navbar.mobile-navbar')

    <!-- Static sidebar for desktop -->
    @include('admin.components.navbar.desktop-navbar')

    <div class="flex flex-1 flex-col lg:pl-64">
        <livewire:admin.components.profile-menu />
        <main class="flex-1 pb-8">

            @yield('content')

        </main>
    </div>
</div>
@livewireScripts
@yield('js')
</body>
</html>
