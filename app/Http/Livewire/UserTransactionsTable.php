<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Constants\TransactionTypes;
use App\Constants\TransactionStatusTypes;
use Illuminate\Database\Eloquent\Builder;
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

final class UserTransactionsTable extends PowerGridComponent
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
        return Transaction::where('user_id', $user->id)->with('appointment.subService')->latest();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
        ->addColumn('status', function (Transaction $transaction) {
            return TransactionStatusTypes::from($transaction->status)->labels();
        })

        ->addColumn('type', function (Transaction $transaction) {
            return TransactionTypes::from($transaction->type)->labels();
        })
            ->addColumn('amount', fn (Transaction $transaction) => '₦ '.number_format($transaction->amount, 2, '.', ','))
            ->addColumn('ref')
            ->addColumn('service', fn (Transaction $transaction) => $transaction->appointment->first()->subService()->first()->name)
            ->addColumn('created_at_formatted', fn (Transaction $model) => Carbon::parse($model->created_at)->format('jS \of F, Y, \b\y g.ia'));
    }

    public function columns(): array
    {
        return [
            Column::make('Status', 'status'),
            Column::make('Transaction Reference', 'ref'),
            Column::make('Amount', 'amount')->searchable()->sortable(),
            Column::make('Type', 'type')->sortable(),
            Column::make('Service Purchased', 'service')->searchable()->sortable(),
            Column::make('Date of Transaction', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::enumSelect('status', 'status')
            ->dataSource(TransactionStatusTypes::cases()),
            Filter::enumSelect('type', 'type')
            ->dataSource(TransactionTypes::cases()),
        Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Transaction $row): array
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
