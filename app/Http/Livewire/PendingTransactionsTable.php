<?php

namespace App\Http\Livewire;

use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
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

final class PendingTransactionsTable extends PowerGridComponent
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
        return Transaction::where('status', TransactionStatusTypes::PENDING)->with('appointment.subService')->latest();
    }

    public function relationSearch(): array
    {
        return [
            'user' => ['first_name', 'last_name'],
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('user', fn (Transaction $transaction) => $transaction->user->first_name.' '.$transaction->user->last_name)
            ->addColumn('type', function (Transaction $transaction) {
                return TransactionTypes::from($transaction->type)->labels();
            })
            ->addColumn('amount', fn (Transaction $transaction) => '₦ '.number_format($transaction->amount, 2, '.', ','))
            ->addColumn('ref')
            // ->addColumn('service', fn (Transaction $transaction) => $transaction->appointment?->first()->subService()->first()->name ?? '')
            ->addColumn('created_at_formatted', fn (Transaction $model) => Carbon::parse($model->created_at)->format('jS \of F, Y, \b\y g.ia'));
    }

    public function columns(): array
    {
        return [
            Column::make('User', 'user'),
            Column::make('Transaction Reference', 'ref')->searchable()->sortable(),
            Column::make('Amount', 'amount')->searchable()->sortable(),
            Column::make('Type', 'type')->sortable(),
            // Column::make('Service Purchased', 'service')->searchable()->sortable(),
            Column::make('Date of Transaction', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
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

    public function actions(Transaction $row): array
    {
        return [
            Button::add('<i class="fas fa-eye"></i>')
                ->slot('<i class="fas fa-eye"></i>')
                ->class('btn btn-success d-block btn-sm')  // Change to display: block
                ->target('')
                ->route(role(auth()->user()->role_id).'.transactions.show', ['transaction' => $row->id]),
            Button::add('<i class="fas fa-download"></i>')
                ->slot('<i class="fas fa-download"></i>')
                ->class('btn btn-info d-block btn-sm ')  // Stack below with margin
                ->target('')
                ->route('download.transaction', ['ref' => $row->ref]),
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
