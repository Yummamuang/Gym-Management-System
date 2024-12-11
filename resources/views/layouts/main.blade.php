<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Icon -->
        <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite([ 'resources/css/app.css',
                'resources/css/loader.css',
                'resources/css/main.css',
                'resources/css/fontAwesome/css/all.css',
                'resources/css/fontAwesome/css/sharp-light.css',
                'resources/css/fontAwesome/css/sharp-regular.css',
                'resources/css/fontAwesome/css/sharp-solid.css',
        ])

        @yield('style')

        <!-- Script -->
        @vite('resources/js/app.js')

    </head>
    <body class="relative w-full bg-gray-200" style="min-width: 315px">
        @php
            $members = session()->get('loggedInMembers', 'default');
            $trainers = session()->get('loggedInTrainers', 'default');
            $admin = session()->get('loggedInAdmin', 'default');
        @endphp

        @if ($admin == 'default')
            @include('layouts.loader')
        @endif

        @yield('content')

        @if ($members != 'default')
            @include('layouts.menu_members')
        @endif

        @if ($trainers != 'default')
            @include('layouts.menu_trainers')
        @endif

        @if ($admin != 'default')
            @include('layouts.menu_admin')
        @endif
    </body>
</html>
