<div class="flex flex-col text-center ">
    <a class="text-white font-semibold text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300  rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('projects.edit', $project->id) }}">EDITAR</a>

    <button  class="focus:outline-none text-white font-semibold text-base bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300  rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" id="deleteButton">Eliminar Proyecto</button>

    <form id="deleteForm" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

@push('scripts')
    <script>
        // Escucha el clic del botón
        document.getElementById('deleteButton').addEventListener('click', function() {
            // Muestra el mensaje de confirmación de SweetAlert2
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario de eliminación
                    document.getElementById('deleteForm').submit();
                }
            });
        });
    </script>
@endpush