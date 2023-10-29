<div>

    <form wire:submit.prevent="editarProyecto" novalidate>
        <div class="mb-6">
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo
                Proyecto</label>
            <input type="titulo" id="titulo"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Titulo" required wire:model="titulo">

            @error('titulo')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="descripcion"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
            <textarea id="descripcion" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Di algo sobre el proyecto..." wire:model="descripcion"></textarea>
            @error('descripcion')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-6">
            <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
            <textarea id="url" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="PEGA UN ENLACE..." wire:model="url">

            </textarea>
            @error('url')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror

        </div>


        <div class="mb-6">
            <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen Del
                Proyecto</label>
            <input type="file" accept="image/*" id="imagen"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required wire:model.defer="nuevaImagen">

            @error('imagen')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror
            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" text-white">Imagen Actual</p>

            <div class="w-1/2">
                <img width="600" src="{{ asset('storage/proyectos/' . $imagen) }}" />
            </div>
        </div>
        <div class="mb-6">
            <label for="nivel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel Del
                Proyecto</label>


            <select id="nivel" wire:model="nivel"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
                <option value="" disabled>Seleccione una opcion</option>
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id }}" wire:key="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                @endforeach

            </select>

            @error('nivel')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                Desarrollador</label>


            <select id="categoria" wire:model="categoria"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>



                <option value="" disabled>Selecciona un Tipo</option>

                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach

            </select>

            @error('categoria')
                <p class="text-red-500 text-light italic my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tecnologias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tecnologias
                Utilizadas</label>

            <div class="grid grid-cols-2 md:grid md:grid-cols-5 md:gap-3 mb-4 gap-5 ">
                @forelse ($tecnologias as $tecnologia)
                    <div>
                        <input id="tecnologia" type="checkbox" wire:model.defer="tecnologia"
                            value="{{ $tecnologia->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $tecnologia->nombre }}</label>
                    </div>

                @empty
                @endforelse





            </div>



        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar
            Proyecto</button>
    </form>

</div>
