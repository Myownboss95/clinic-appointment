<div class="table-responsive">
    <table class="table" id="cities-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>State Id</th>
                <th>Name</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->state_id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->status }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('staff.cities.show', [$city->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('staff.cities.edit', [$city->id]) }}" class='btn btn-default btn-xs'>
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
