<?php

namespace App\Http\Livewire;

use App\Constants\StageTypes;
use App\Models\Appointment;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PendingAppointmentsTable extends PowerGridComponent
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
        $pendingStage = Stage::where('name', StageTypes::PENDING)->first();

        return Appointment::where('stage_id', $pendingStage->id)->whereNull('parent_appointment_id')->with('subService')->latest();
    }

    public function relationSearch(): array
    {
        return [
            'user' => ['first_name', 'last_name'],
            'subService' => ['name'],
            'stage' => ['name'],
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('user', fn (Appointment $appointment) => $appointment->user->first_name.' '.$appointment->user->last_name)
            ->addColumn('service', fn (Appointment $appointment) => $appointment->subService->first()->name)
            ->addColumn('created_at_formatted', fn (Appointment $appointment) => Carbon::parse($appointment->created_at)->format('jS \of F, Y, \b\y g.ia'));
    }

    public function columns(): array
    {
        return [
            Column::make('User', 'user')->searchable()->sortable(),
            Column::make('Service Purchased', 'service')->searchable()->sortable(),
            Column::make('Appointment Date', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Appointment $row): array
    {
        return [
            Button::add('view')
                ->slot('View')
                ->class('btn btn-success')
                ->target('')
                ->route(role(auth()->user()->role_id).'.appointments.show', ['appointment' => $row->id]),
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
