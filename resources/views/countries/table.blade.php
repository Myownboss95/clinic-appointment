<div class="table-responsive">
    <table class="table" id="countries-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Name</th>
        <th>Iso Code2</th>
        <th>Iso Code3</th>
        <th>Num Code</th>
        <th>Status</th>
        <th>Currency Symbol</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
            <td>{{ $country->iso_code2 }}</td>
            <td>{{ $country->iso_code3 }}</td>
            <td>{{ $country->num_code }}</td>
            <td>{{ $country->status }}</td>
            <td>{{ $country->currency_symbol }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('countries.show', [$country->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('countries.edit', [$country->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
