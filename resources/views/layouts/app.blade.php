<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? 'Nelson Reyes | ' . $title : 'Portafolio Personal' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@700&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')


</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">


        @can('create', 'App\\Models\Project')

            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        @endcan
        <!-- Page Heading -->


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>


    </div>
    @livewireScripts()



    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script>
        function data() {
            const systemPrefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const userPreference = localStorage.getItem('darkModeEnabled');
            const initialDarkMode = userPreference === 'true' || (userPreference === null && systemPrefersDarkMode);


            // Aplicar clase 'dark' si corresponde
            if (initialDarkMode) {
                document.documentElement.classList.add('dark');
            }

            return {
                darkMode: initialDarkMode,
                toggleDarkMode() {
                    document.documentElement.classList.toggle('dark');
                    const isDarkModeEnabled = document.documentElement.classList.contains('dark');
                    localStorage.setItem('darkModeEnabled', isDarkModeEnabled ? 'true' : 'false');
                }
            };
        }
    </script>


</body>
