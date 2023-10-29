<x-app-layout>

    <x-slot name="title">
        INICIO
    </x-slot>
    @include('components/templates/partials/header-component')

    <section class="   bg-slate-100   dark:bg-gray-900 " id="contacto">
        <div class=" gap-8   py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <div class="order-2">
                @include('components.templates.partials.form-component')
            </div>

            <div class="mt-4 md:mt-0 order-1 ">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Amplias habilidades
                    en WordPress, Laravel, JavaScript, PHP, CSS, HTML.</h2>
                <p class="mb-6 font-light text-black md:text-lg dark:text-gray-400">Soy un apasionado programador con
                    una sólida formación en diversas tecnologías web. Mi experiencia en <span class="font-bold">WordPress, Laravel, JavaScript,
                    PHP, CSS y HTML </span> me ha permitido desarrollar una amplia gama de habilidades que me destacan
                    como un profesional completo y competente en el campo del desarrollo web.</p>

            </div>
        </div>
    </section>

    <div class="dark:bg-gray-900  py-2 px-4 mx-auto max-w-screen-xl sm:py-3 lg:px-6 ">

        <h2 id="portafolio" class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">
            Portafolio.
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach ($projects as $project)
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
        <div class="flex justify-center mt-5">
            <a class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                href="{{ route('portafolio') }}">VER TODOS</a>

        </div>



    </div>

    @include('components/templates/partials/footer-component')



</x-app-layout>
