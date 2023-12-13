<?php

namespace App\Http\Livewire;

use App\Models\Stage;
use App\Models\Appointment;
use App\Constants\StageTypes;
use Illuminate\Support\Carbon;
use App\Models\AppointmentSubService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class UserAppointmentTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $user =  auth()->user();
        return Appointment::where('user_id', $user->id)->whereNull('parent_appointment_id')->with('subService')->latest();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('stage_id', fn (Appointment $appointment)=> $appointment->stage->name)
            ->addColumn('service', fn (Appointment $appointment) => $appointment->subService->first()->name)
            ->addColumn('created_at_formatted', fn (Appointment $appointment) => Carbon::parse($appointment->created_at)->format('jS \of F, Y, \b\y g.ia'));
    }

    public function columns(): array
    {
        return [
            Column::make('Stages', 'stage_id')->searchable()->sortable(),
            Column::make('Service Purchased', 'service')->searchable()->sortable(),
            Column::make('Appointment Date', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('stage_id', 'stage_id')
            ->dataSource(Stage::all())
            ->optionValue('id')
            ->optionLabel('name'),

            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Appointment $row): array
    {
        return [
            Button::add('edit')
                ->slot('View')
                ->id()
                ->class('btn btn-success')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
