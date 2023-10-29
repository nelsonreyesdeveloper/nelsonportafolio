

<!DOCTYPE html>
<html  lang="en" style="height: 100vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    @wireUiScripts()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @wireUiStyles --}}

    @livewireStyles


</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <main>
            <div class="p-6">
                <a class="bg-green-500 inline-block mb-5 text-white font-bold rounded-sm px-4 py-2"
                    href="{{ route('projects.create') }}">CREA UN PROYECTO</a>
                <livewire:project-index :projects="$projects" />
            </div>

        </main>

    </div>
    @livewire('livewire-ui-modal')
    @livewireScripts



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
