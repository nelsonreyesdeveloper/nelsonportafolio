<header>
    <nav class="    border-gray-200 px-4 lg:px-6  bg-gray-900 z-10 relative">
        <div class="flex flex-wrap justify-between items-center p-2 mx-auto max-w-screen-xl h-full">
            <a href="{{ route('index') }}" class="flex  items-center ">

                <div>
                    <x-application-logo />
                </div>
                <div class="flex items-center ">
                    <h1
                        class=" text-2xl md:text-3xl lg:text-4xl  font-bold  lg:h-12    self-center font-title   bg-clip-text    text-transparent bg-gradient-to-r from-indigo-200 to-indigo-100  ">
                        NelsonReyes</h1>
                </div>

            </a>
            <div class="flex items-center lg:order-1">
                {{-- 
                    AQUI DEBERIA IR EL LOGIN Y EL REGISTER
                --}}
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm  rounded-lg lg:hidden  focus:outline-none focus:ring-2  text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">

                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 relative z-10 ">



                    <li>
                        <a href="{{ route('index') }}"
                            class="block py-2 pr-4 pl-3 uppercase font-bold  border-b  lg:border-0  lg:p-0 text-gray-200 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent border-gray-700">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('portafolio') }}"
                            class="block py-2 pr-4 pl-3 uppercase font-bold border-b  t lg:border-0  lg:p-0 text-gray-200 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent border-gray-700">Portafolio</a>
                    </li>
                    <div x-data="data()">

                        <button
                            class="flex  w-full gap-2 py-2 pr-4 pl-3 uppercase font-bold  border-b  lg:border-0  lg:p-0 text-gray-200 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent border-gray-700"
                            x-on:click="toggleDarkMode">
                            CAMBIAR MODO
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>


                        </button>
                    </div>

                    @auth

                        @can('create', 'App\\Models\Project')
                            <li class="">


                                <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown"
                                    class="  flex items-center justify-between w-full py-2 pr-4 pl-3 uppercase font-bold  border-b  lg:border-0 lg:p-0 text-gray-200 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent border-gray-700"
                                    type="button">Administrador<svg class="w-5 h-5 ml-1" viewBox="0 0 24.00 24.00"
                                        fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="2.4">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z"
                                                fill="#ff9e1c"></path>
                                        </g>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class=" hidden   divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-900 "
                                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(87px, 133px); ">
                                    <ul class="  py-2 text-sm  text-gray-200" aria-labelledby="multiLevelDropdownButton">
                                        <li>
                                            <a href="{{ route('dashboard') }}"
                                                class="block px-4 py-2  hover:bg-gray-600 hover:text-white">Ir
                                                Al Panel</a>
                                        </li>

                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" "
                                                                                    class="block w-full text-left px-4 py-2  hover:bg-gray-600 hover:text-white">Cerrar
                                                                                    Sesion
                                                                                </button>
                                                                            </form>

                                                                        </li>

                                                                    </ul>
                                                                </div>



                                                            </li>
    @endcan



                    @endauth


                </ul>

            </div>
        </div>
    </nav>

    @if (request()->routeIs('index'))
                                            <section
                                                class=" relative z-0 bg-gray-900 dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
                                                <div
                                                    class="pt-6 px-4 pb-6 mx-auto max-w-screen-xl text-center lg:pt-16 z-10 relative flex-col">

                                                    <h1
                                                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-white">
                                                        Añadimos valor a tu Empresa..!</h1>
                                                    <p
                                                        class="mb-3 text-lg font-normal  lg:text-xl sm:px-16 lg:px-48 text-gray-200">
                                                        Especialista en el Desarrollo Web, queremos innovar tu marca
                                                        dandole ese toque tecnologico que
                                                        necesitas!
                                                    </p>

                                                    <a href="#"
                                                        class="inline-flex mt-5 justify-between items-center py-1 px-1 pr-4  text-sm rounded-full bg-blue-900 text-blue-300  hover:bg-blue-800">
                                                        <a href="#portafolio"
                                                            class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">PORTAFOLIO</a>


                                                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 6 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 9 4-4-4-4" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div
                                                    class="bg-gradient-to-b  to-transparent from-blue-900 w-full h-full absolute top-0 left-0 z-0">
                                                </div>
                                            </section>
                                            @endif




</header>
