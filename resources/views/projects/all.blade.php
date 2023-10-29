<x-app-layout>
    <x-slot name="title">
        Portafolio
    </x-slot>
    @include('components/templates/partials/header-component')


    <h2 class="mb-4 mt-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Portafolio.
    </h2>

    <div class="py-8 px-4 mx-auto max-w-screen-xl">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach ($proyectos as $project)
                <div class=" shadow-sm hover:bg-slate-200 bg-gray-200 dark:bg-gray-800 px-6 py-2 rounded-lg dark:hover:bg-gray-950 ">
                    <h3
                        class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center uppercase ">
                        {{ $project->titulo }}</h3>
                    <img class=" w-full rounded-lg  h-96 object-cover"
                        src="{{ asset('storage/proyectos' . '/' . $project->imagen) }}" alt="{{$project->titulo}}" loading="lazy">

                        <div class=" flex flex-col  text-center lg:flex-row  lg:justify-between lg:gap-10">
                            <label
                            class="bg-gray-900 mt-3 px-2 text-white py-1 mb-3 inline-block font-bold uppercase rounded-md hover:bg-gray-950">Nivel: {{ $project->nivel->nombre }}</label>
                            <a class="bg-red-800 mt-3 px-2 text-white py-1 mb-3 inline-block font-bold uppercase rounded-md hover:bg-red-900 underline"  href="{{$project->url}}" target="_blank">Demo En Vivo</a>
                        </div>
                       
                    <p class="mb-3 font-light text-black md:text-lg dark:text-gray-400">{{ $project->descripcion }}
                    </p>
                    <div class="flex justify-between">
                        <label
                            class="bg-primary-700  hover:bg-primary-800 rounded-sm px-2 text-white py-1 mb-3 inline-block font-base uppercase">Tecnologias</label>
                       

                    </div>

                    <div class=" grid grid-cols-2 gap-4 lg:grid-cols-3">


                        @foreach ($project->tecnologias as $tecnologia)
                            <p
                                class="bg-gray-900  text-white text-center dark:bg-amber-400 dark:hover:bg-amber-500 rounded-md font-bold uppercase dark:text-black">
                                {{ $tecnologia->nombre }}</p>
                        @endforeach

                    </div>

                </div>
            @endforeach

        </div>

    </div>

    @include('components/templates/partials/footer-component')

</x-app-layout>
