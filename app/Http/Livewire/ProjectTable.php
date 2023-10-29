<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Responsive;
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns, PowerGridEloquent};

final class ProjectTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public array $titulo = [];

    public $hasPermission = true;

    protected array $rules = [
        'titulo.*' => ['required', 'min:6', 'regex:/^[\w\W]+$/'],
    ];

    public function onUpdatedToggleable($id, $field, $value): void
    {

        Project::query()->find($id)->update([
            $field => $value,
        ]);
    }


    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();

        try {
            // Update query
            $updated = Project::query()
                ->find($id)
                ->update([
                    $field => $value
                ]);
        } catch (QueryException $exception) {
            $updated = false;
        }

        // Reload data after a successful update
        if ($updated) {
            $this->fillData();
        }
    }

    public bool $multiSort = true;
    public function setUp(): array
    {
        $this->showCheckBox();

        $this->persist(['columns', 'filters']);

        return [
            // Responsive::make() ->fixedColumns('id','titulo' ,'descripcion','created_at', Responsive::ACTIONS_COLUMN_NAME),
            Exportable::make('my-export-file')
                ->csvSeparator('|')
                ->csvDelimiter("'")
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()
                ->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Project>
     */
    public function datasource(): Builder
    {
        // return Project::query();

        return Project::query();
    }


    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    // public function relationSearch(): array
    // {
    //     return [
    //         'tecnologias' => [
    //             'tecnologia_id',
    //             'tecnologia' => ['']
    //         ]
    //     ];
    // }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('titulo')

            /** Example of custom column using a closure **/
            ->addColumn('titulo_lower', fn (Project $model) => strtolower(e($model->titulo)))

            ->addColumn('descripcion')
            ->addColumn('disponibilidad')
            ->addColumn('imagen', function (Project $project) {


                return Blade::render('<img loading="lazy" width=50 height=50 src=' . asset('storage/proyectos') . "/" . $project->imagen . '   class="custom_class" />');
            })->addColumn('user_name', function (Project $project) {
                return e($project->user->name);
            })
            ->addColumn('nivel_name', function (Project $project) {
                return e($project->nivel->nombre);
            })
            ->addColumn('especialidad_name', function (Project $project) {
                return e($project->categoria->nombre);
            })
            ->addColumn('created_at_formatted', fn (Project $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }


    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        $canEdit = true;
        return [

            Column::make('Id', 'id')
                ->sortable(),

            Column::make('Titulo', 'titulo')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Imagen', 'imagen')
                ->sortable()
                ->searchable(),
            Column::make(__('Dueño'), 'user_name', 'users.name')
                ->sortable(),
            Column::make(__('Nivel'), 'nivel_name', 'nivels.name')
                ->sortable(),
            Column::make(__('Disponibilidad'), 'disponibilidad')
                ->title('Disponibilidad')
                ->field('disponibilidad')
                ->toggleable($canEdit, 'Yes', 'No'),
            Column::make('Especialidad ', 'especialidad_name', 'categorias.nombre'),
            Column::make('Created at', 'created_at_formatted', 'created_at'),
            // Column::make('Tecnologias','tecnologias_name','tecnologias.nombre')
            //     ->sortable(),


        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('titulo')->operators(['contains']),

            Filter::datetimepicker('created_at')

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Project Action Buttons.
     *
     * @return array<int, Button>
     */
    // public function actionRules(): array
    // {
    //     return [
    //         Rule::button('edit')
    //             ->when(fn ($project) => $project->id == 1)
    //             ->hide(),

    //         Rule::button('destroy')
    //             ->when(fn ($project) => $project->id == 1)
    //             ->caption('Delete #1'),

    //         Rule::checkbox()
    //             ->when(fn ($project) => $project->id == 2)
    //             ->hide(),

    //         Rule::rows()
    //             ->when(fn ($project) => (bool)$project->in_stock === false)
    //             ->setAttribute('class', 'bg-yellow-50 hover:bg-yellow-100'),
    //     ];
    // }
    public function actions(): array
    {


        $theme = config('livewire-powergrid.theme');

        $edit = ($theme == 'tailwind') ? 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm' : 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm';

        $delete = ($theme == 'tailwind') ? 'bg-red-500 text-white px-3 py-2 m-1 rounded text-sm' : "bg-red-500 text-white px-3 py-2 m-1 rounded text-sm";


        return [
            Button::add('edit')
                ->caption(__('Editar'))
                ->class($edit)
                ->route('projects.edit', function (Project $project) {
                    return ['project' => $project->id];
                })->target('_self'),

            Button::add('destroy')
                ->caption(__('Borrar'))
                ->class($delete)
                ->openModal('delete-project', [
                    'projectId'                  => 'id',
                    'confirmationTitle'       => 'Eliminar Proyecto?',
                    'confirmationDescription' => 'Si confirmas la eliminacion no podras revertir esto',
                ]),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Project Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($project) => $project->id === 1)
                ->hide(),
        ];
    }
    */

    // protected function getListeners(): array
    // {
    //     return array_merge(
    //         parent::getListeners(),
    //         [
    //             'edit-dish' => 'editDish',
    //             'bulkDelete',
    //         ]
    //     );
    // }

    // public function bulkDelete(): void
    // {
    //     $this->emit('openModal', 'delete-project', [
    //         'projectIds'                 => $this->checkboxValues,
    //         'confirmationTitle'       => 'Borrar Proyecto',
    //         'confirmationDescription' => 'Si eliminas no podras revertir esto?',
    //     ]);
    // }
}
