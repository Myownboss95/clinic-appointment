<div class="table-responsive">
    <table class="table" id="currencyLists-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Dial Code</th>
                <th>Currency Name</th>
                <th>Currency Symbol</th>
                <th>Currency Code</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencyLists as $currencyList)
                <tr>
                    <td>{{ $currencyList->id }}</td>
                    <td>{{ $currencyList->name }}</td>
                    <td>{{ $currencyList->code }}</td>
                    <td>{{ $currencyList->dial_code }}</td>
                    <td>{{ $currencyList->currency_name }}</td>
                    <td>{{ $currencyList->currency_symbol }}</td>
                    <td>{{ $currencyList->currency_code }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['currencyLists.destroy', $currencyList->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('staff.currencyLists.show', [$currencyList->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('staff.currencyLists.edit', [$currencyList->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
