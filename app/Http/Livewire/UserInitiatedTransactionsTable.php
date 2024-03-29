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

final class UserInitiatedTransactionsTable extends PowerGridComponent
{
    public int $userId;

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
        return Transaction::where('user_id', $this->userId)->where('status', TransactionStatusTypes::CREATED->value)->with('appointment.subService')->latest();
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
            ->addColumn('amount', fn (Transaction $transaction) => '₦ ' . number_format($transaction->amount, 2, '.', ','))
            ->addColumn('ref')
            ->addColumn('service', fn (Transaction $transaction) => $transaction->appointment?->first()?->subService?->first()?->name ?? '')
            ->addColumn('created_at_formatted', fn (Transaction $model) => Carbon::parse($model->created_at)->format('jS \of F, Y, \b\y g.ia'));
    }

    public function columns(): array
    {
        return [
            Column::make('Status', 'status'),
            Column::make('Transaction Reference', 'ref')->searchable()->sortable(),
            Column::make('Amount', 'amount')->searchable()->sortable(),
            Column::make('Service Purchased', 'service')->searchable()->sortable(),
            Column::make('Date of Transaction', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action'),
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
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Transaction $transaction): array
    {
        return [
            Button::add('<i class="fas fa-exclamation-circle"></i>')
                ->slot('<i class="fas fa-exclamation-circle"></i> Complete Transaction')
                ->class('btn btn-warning d-block btn-sm')  // Change to display: block
                ->target('')
                ->route('booking.confirm-appointment', ['uuid' => $transaction->appointment?->first()?->uuid])
        ];
    }

    protected function tableAttributes()
    {
        return [
            'class' => 'table-striped table-responsive table-hover fs-6',
            'style' => 'font-size:2px'
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
