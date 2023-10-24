<div class="table-responsive">
    <table class="table" id="subServices-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Service Id</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subServices as $subService)
            <tr>
                <td>{{ $subService->name }}</td>
            <td>{{ $subService->service_id }}</td>
            <td>{{ $subService->price }}</td>
            <td>{{ $subService->description }}</td>
            <td>{{ $subService->image }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subServices.destroy', $subService->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subServices.show', [$subService->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subServices.edit', [$subService->id]) }}"
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
