<x-app-layout>
   

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administra Tus Proyectos Personales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>

                <a href="{{ route('projects') }}" class="bg-blue-500  uppercase py-2 px-4 mb-5 text-white font-bold inline-block">ATRAS</a>
            </div> 
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                   <p class="text-center text-2xl">Crea Un Nuevo Projecto Personal </p>

                   <livewire:editar-proyecto :project="$project" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
