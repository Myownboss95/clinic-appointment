<?php

namespace App\Http\Livewire;

use App\Constants\TransactionStatus;
use App\Constants\TransactionType;
use App\Models\Transaction;
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

final class ExampleTransactionTable extends PowerGridComponent
{
    use WithExport;

    public function header(): array
    {
        return [
            Button::add('refresh')
                ->bladeComponent('refresh-table'),
        ];
    }

    public function reload()
    {
        return $this->refresh();
    }

    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage(),
        ];
    }

    public function datasource(): Builder
    {
        return Transaction::query()->with('wallet.business')->latest()->orderBy('created_at', 'desc');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('status', function (Transaction $transaction) {
                return TransactionStatus::from($transaction->status)->labels();
            })

            ->addColumn('type', function (Transaction $transaction) {
                return TransactionType::from($transaction->type)->labels();
            })
            ->addColumn('amount', fn (Transaction $transaction) => '₦ '.number_format($transaction->amount, 2, '.', ','))
            ->addColumn('fee')
            ->addColumn('reference')
            ->addColumn('business_name', fn (Transaction $model) => $model->wallet->business->name)
            ->addColumn('created_at_formatted', fn (Transaction $model) => Carbon::parse($model->created_at)->toDayDateTimeString());
    }

    public function columns(): array
    {
        return [
            Column::make('', 'status'),

            Column::make('Reference', 'reference')
                ->sortable()
                ->searchable(),

            Column::make('Business', 'business_name')
                ->sortable(),

            Column::make('Type', 'type')
                ->sortable(),

            Column::make('Amount', 'amount'),

            Column::make('Created at', 'created_at_formatted', 'created_at'),

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::enumSelect('', 'status')
                ->dataSource(TransactionStatus::cases()),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Transaction $row): array
    {
        return [
            Button::add('edit')
                ->slot('View')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('admin.transaction-details', ['transaction' => $row->reference]),
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